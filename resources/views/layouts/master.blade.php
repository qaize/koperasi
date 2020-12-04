<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="csrf-token" content="{{csrf_token()}}">
<title>Absensi Online</title>
<!-- Tell the browser to be responsive to screen width -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- overlayScrollbars -->
<link rel="stylesheet" href="{{ asset('adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
<!-- SweetAlert2 -->
<link rel="stylesheet" href="{{asset('adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<!-- Date picker -->
<link rel="stylesheet" href="{{ asset('dist/css/bootstrap-datepicker.min.css') }}">
<script src="{{ asset('dist/css/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
   integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
   crossorigin=""/>

   <style>
      #mapid {
         position: absolute;
         top: 0;
         bottom: 0;
         left: 0;
         right: 0;
         }

      #mapmarker {
         height: 550px;
      }
   </style>
</head>

<body class="sidebar-mini layout-fixed layout-navbar-fixed" style="height: auto;">
<!-- Site wrapper -->
<div class="wrapper">
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-dark navbar-info">
    <!-- Left navbar links -->
   <ul class="navbar-nav">
   <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
   </li>
   <li class="nav-item d-none d-sm-inline-block">
      <a href="#" class="nav-link">Home</a>
   </li>
   <li class="nav-item d-none d-sm-inline-block">
      <a href="#" class="nav-link">Kontak</a>
   </li>
   </ul>

   <!-- SEARCH FORM -->
   <form class="form-inline ml-3">
   <div class="input-group input-group-sm">
      <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
      <div class="input-group-append">
         <button class="btn btn-navbar" type="submit">
         <i class="fas fa-search"></i>
         </button>
      </div>
   </div>
   </form>

   <!-- Right navbar links -->
   <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
          <img src="{{ asset('adminlte/dist/img/user8-128x128.jpg') }}" class="user-image img-circle elevation-2" alt="User Image">
          <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
          <!-- User image -->
          <li class="user-header bg-primary">
            <img src="{{ asset('adminlte/dist/img/user8-128x128.jpg') }}" class="img-circle elevation-2" alt="User Image">

            <p>
              {{ Auth::user()->name }} - Web Developer
              <small>Member since Nov. 2012</small>
            </p>
          </li>
          <li class="user-footer">
            @yield('profile')
            <a class="btn btn-default btn-flat float-right" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
               {{ __('Logout') }}
            </a>
            @auth('admin')
            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                  @csrf
            </form>
            @endauth
            @auth('web')
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
            </form>
            @endauth
          </li>
        </ul>
      </li>
   </ul>

</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-info elevation-4">
   <!-- Brand Logo -->
   <a href="../../index3.html" class="brand-link text-center" style="background-color: var(--info)">
      <span class="brand-text font-weight-light">Absensi Online</span>
   </a>

   <!-- Sidebar -->
   <div class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-transition"><div class="os-resize-observer-host observed"><div class="os-resize-observer" style="left: 0px; right: auto;"></div></div><div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;"><div class="os-resize-observer"></div></div><div class="os-content-glue" style="margin: 0px -8px; width: 249px; height: 921px;"></div><div class="os-padding"><div class="os-viewport os-viewport-native-scrollbars-invisible" style="overflow-y: scroll;"><div class="os-content" style="padding: 0px 8px; height: 100%; width: 100%;">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
         <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
               <div class="image">
                  <img src="{{ asset('adminlte/dist/img/user8-128x128.jpg') }}" class="img-circle elevation-2" alt="User Image">
               </div>
               <div class="info">
                  <a href="#" class="d-block">{{ Auth::user()->name }}</a>
               </div>
            </div>


            @auth('admin')
            <li class="nav-item has-treeview">
               <a href="{{ route('admin.dashboard') }}" class="nav-link">
               <i class="nav-icon fas fa-home"></i>
               <p>Dashboard</p>
               </a>
            </li>
            <li class="nav-item has-treeview">
               <a href="#" class="nav-link">
               <i class="nav-icon fas fa-users"></i>
               <p>
                  List Pegawai
                  <i class="right fas fa-angle-left"></i>
               </p>
               </a>
               <ul class="nav nav-treeview ml-4">
                  <li class="nav-item">
                     <a href="{{ url('/pegawai') }}" class="nav-link">
                     <i class="fa fa-user nav-icon"></i>
                     <p>Data Pegawai</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="{{ url('/pegawai/create') }}" class="nav-link">
                     <i class="fa fa-user-plus nav-icon"></i>
                     <p>Tambah Data</p>
                     </a>
                  </li>
               </ul>
            </li>
            <li class="nav-item has-treeview">
               <a href="{{ url('/daftar_hadir') }}" class="nav-link">
               <i class="nav-icon far fa-calendar"></i>
               <p>Daftar Kehadiran</p>
               </a>
            </li>
            @endauth
            @auth('web')
            <li class="nav-item">
               <a href="{{ route('home') }}" class="nav-link">
               <i class="nav-icon fas fa-home"></i>
               <p>Home</p>
               </a>
            </li>
            <li class="nav-item">
               <a href="{{ url('/absensi/riwayat') }}" class="nav-link">
                  <i class="nav-icon far fa-calendar"></i>
                  <p>Absensi</p>
               </a>
            </li>
            @endauth
            <li class="nav-item">
               <a href="#" class="nav-link">
                  <i class="nav-icon far fa-id-badge"></i>
                  {{-- <i class="far fa-id-badge"></i> --}}
                  <p>Kontak</p>
               </a>
            </li>
            <li class="nav-item">
               <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-info-circle"></i>
                  <p>Tentang</p>
               </a>
            </li>
         </ul>
      </nav>
      <!-- /.sidebar-menu -->
   </div></div></div><div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden"><div class="os-scrollbar-track"><div class="os-scrollbar-handle" style="width: 100%; transform: translate(0px, 0px);"></div></div></div><div class="os-scrollbar os-scrollbar-vertical os-scrollbar-auto-hidden"><div class="os-scrollbar-track"><div class="os-scrollbar-handle" style="height: 64.4305%; transform: translate(0px, 0px);"></div></div></div><div class="os-scrollbar-corner"></div></div>
   <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="min-height: 865px;">
   <!-- Content Header (Page header) -->
   <section class="content-header">

   </section>

   <!-- Main content -->
   <section class="content">

      <div class="container-fluid">
      <div class="row">
         <div class="col-12">
            @yield('content')
         </div>
      </div>
      </div>
   </section>
   <!-- /.content -->
   @yield('modal')
</div>
<!-- /.content-wrapper -->

<footer class="main-footer">
   <div class="float-right d-none d-sm-block">

   </div>
   <strong>Copyright © 2020</strong> All rights
   reserved.
</footer>

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
<!-- SweetAlert -->
<script src="{{asset('adminlte/plugins/sweetalert2/sweetalert2.all.min.js')}}"></script>


</body>
</html>
