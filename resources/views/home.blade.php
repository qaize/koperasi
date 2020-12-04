@extends('layouts.master')

@section('profile')

@endsection

@section('content')
@if (session('sukses'))
            <div class="alert alert-success" role="alert">
                {{session('sukses')}}
            </div>
	@endif
   <div class="row">
      <div class="col-md-12">
         <div class="card">
         <!-- /.card-header -->
				<div class="card-body">
					<h3 class="panel-title">Home</h3>
         <hr>
         <p></p>
					{{-- <div id="mapmarker"></div> --}}
				</div>
         </div>
    </div>
         <!-- /.card -->
      <!-- /.col -->
   </div>
   <!-- /.row -->
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
