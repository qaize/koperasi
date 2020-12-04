@extends('layouts.master')

@section('content')
   <!-- Info boxes -->
   <div class="row">
      <div class="col-12 col-sm-6 col-md-3">
         <div class="info-box">
         <span class="info-box-icon bg-info elevation-1"><i class="fa fa-check"></i></span>

         <div class="info-box-content">
            <span class="info-box-text">Hadir</span>
            <span class="info-box-number">
               40
               <small>%</small>
            </span>
         </div>
         <!-- /.info-box-content -->
         </div>
         <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-3">
         <div class="info-box mb-3">
         <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-clock"></i></span>

         <div class="info-box-content">
            <span class="info-box-text">Terlambat</span>
            <span class="info-box-number">5</span>
         </div>
         <!-- /.info-box-content -->
         </div>
         <!-- /.info-box -->
      </div>
      <!-- /.col -->

      <!-- fix for small devices only -->
      <div class="clearfix hidden-md-up"></div>

      <div class="col-12 col-sm-6 col-md-3">
         <div class="info-box mb-3">
         <span class="info-box-icon bg-success elevation-1"><i class="fas fa-calendar-times"></i></span>

         <div class="info-box-content">
            <span class="info-box-text">Absen</span>
            <span class="info-box-number">5</span>
         </div>
         <!-- /.info-box-content -->
         </div>
         <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-3">
         <div class="info-box mb-3">
         <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

         <div class="info-box-content">
            <span class="info-box-text">Jumlah Pegawai</span>
            <span class="info-box-number">50</span>
         </div>
         <!-- /.info-box-content -->
         </div>
         <!-- /.info-box -->
      </div>
      <!-- /.col -->
   </div>
   <!-- /.row -->

      <div class="card">
         <!-- /.card-header -->
         <div class="card-body">
            {{-- <div id="mapmarker"></div> --}}

         </div>
      </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
   integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
   crossorigin=""></script>

<script>

   var mymap = L.map('mapmarker').setView([-8.577056, 116.102667], 18);
   var circle = L.circle([-8.577056, 116.102667], {
    color: 'red',
    fillColor: '#f03',
    fillOpacity: 0.5,
    radius: 60
}).addTo(mymap);
var marker = L.marker([-8.577056, 116.102667]).addTo(mymap);
marker.bindPopup("<b>Dinas Komunikasi Informatika <br> dan Statistik Provinsi NTB</b>").openPopup();


      L.tileLayer('https://api.maptiler.com/maps/bright/{z}/{x}/{y}.png?key=e2KK7nRmkEvVJMreqVP5', {
         attribution: '<a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a>'
      }).addTo(mymap);


</script>

@endsection
