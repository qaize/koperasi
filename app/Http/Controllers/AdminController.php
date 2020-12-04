<?php

namespace App\Http\Controllers;

use App\User;
use App\Pegawai;
use \App\Absensi;
use \App\Detailabsensi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin');
    }

    public function getData()
    {

        $jabatan = DB::table('jabatans')->where('kd_jabatan')->value('jabatan');
        $p = Pegawai::all();

        return response()->json($p);
    }

    public function tampil(Request $request )
    {
            $no = 0;

        if ($request->has('cari')) {
            $pegawai = \App\Pegawai::where('nama', 'LIKE', '%' . $request->cari . '%')->paginate(7);
        } else {
            $pegawai = DB::table('pegawais')->paginate(7);
        }
        return view('pegawai.index', compact('pegawai', 'no'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jabatans = DB::table('jabatans')->get();


        return view('pegawai.create', ['jabatans' => $jabatans]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'nama'     => 'required|min:4',
            'email' => 'required|email|unique:users',
            'nip' => 'required|unique:pegawais',
            'tgl_lahir' => 'required',
            'j_kel' => 'required',
            'alamat' => 'required',
            'no_tlp' => 'required',
            'jabatan' => 'required',
        ]);

        // Insert ke table user
        $user = new \App\User;
        $user->role = 'user';
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->password = Hash::make('12345678');
        $user->remember_token = Str::random(60);
        $user->save();

        // $request->request->add(['user_id' => $user->id]);

        // $request->request->add(['kd_jabatan' => $request->jabatan]);

        $pegawai = \App\Pegawai::create([
            'user_id' => $user->id,
            'nama' => $request->nama,
            'nip' => $request->nip,
            'tgl_lahir' => $request->tgl_lahir,
            'j_kel' => $request->j_kel,
            'alamat' => $request->alamat,
            'no_tlp' => $request->no_tlp,
            'kd_jabatan' => $request->jabatan,
        ]);

        return response()->json('ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pegawai = Pegawai::find($id);
        return response()->json($pegawai);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pegawai = Pegawai::find($id);
        $pegawai->nama = $request->nama;
        $pegawai->nip = $request->nip;
        $pegawai->tgl_lahir = $request->tgl_lahir;
        $pegawai->j_kel = $request->j_kel;
        $pegawai->alamat = $request->alamat;
        $pegawai->no_tlp = $request->no_tlp;
        $pegawai->kd_jabatan = $request->jabatan;
        $pegawai->save();

        $user = User::find($request->user_id);
        $user->name = $request->nama;
        $user->save();
        return response()->json('Success');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getdestroy($id)
    {
        $p = Pegawai::find($id);
        return response()->json($p);
    }

    public function destroy(Request $request, $id)
    {
        User::destroy($request->user_id);
        Pegawai::destroy($id);
        return response()->json('Success');
    }

    public function daftarHadir(Request $request)
    {
        $no = 0;
        if ($request->has('cari')) {
            // $pegawai = \App\Pegawai::where('nama', 'LIKE', '%' . $request->cari . '%')->paginate(7);
            $hadir = DB::table('users')
            ->join('absensis', 'users.id', '=', 'absensis.user_id')
            ->select('users.name', 'absensis.id', 'absensis.tgl_absen', 'absensis.time_in', 'absensis.time_out',  'absensis.gambar', 'absensis.lat', 'absensis.lng', 'absensis.keterangan')
            ->where('users.name', 'LIKE', '%' . $request->cari . '%')
            ->paginate(5);
        } else {
            // $pegawai = DB::table('pegawais')->paginate(7);
            $hadir = DB::table('users')
            ->join('absensis', 'users.id', '=', 'absensis.user_id')
            ->select('users.name', 'absensis.id', 'absensis.tgl_absen', 'absensis.time_in', 'absensis.time_out',  'absensis.gambar', 'absensis.lat', 'absensis.lng', 'absensis.keterangan')
            ->paginate(5);
        }


        return view('absensi.dhadir', compact('hadir', 'no'));
    }

    public function detail($id)
    {

        $pegawai = Pegawai::find($id);
        return view('pegawai.detail', compact('pegawai'));
    }

    public function lokasi()
    {
        return view('pegawai.location');
    }
}
