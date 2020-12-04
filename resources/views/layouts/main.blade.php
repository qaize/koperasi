<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>@yield('title')</title>
   <!-- Tell the browser to be responsive to screen width -->
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- Font Awesome -->
   <link rel="stylesheet" href="{{asset('adminlte/plugins/fontawesome-free/css/all.min.css')}}">
   <!-- Ionicons -->
   <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
   <!-- overlayScrollbars -->
   <link rel="stylesheet" href="{{asset('adminlte/dist/css/adminlte.min.css')}}">
   <!-- SweetAlert2 -->
   <link rel="stylesheet" href="{{asset('adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
   <!-- Google Font: Source Sans Pro -->
   <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="sidebar-mini layout-fixed layout-navbar-fixed">

   <!-- Site wrapper -->
   <div class="wrapper">

      <!-- Navbar -->		      
      <nav class="main-header navbar navbar-expand navbar-dark navbar-primary">
         <!-- Left navbar links -->
         <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
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
            <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
               {{ Auth::user()->name }}
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
               <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
               </a>
               <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
               </form>
            </div>
            </li>
         </ul>
      </nav>   
      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-info elevation-4">
         <!-- Brand Logo -->
         <a href="../../index3.html" class="brand-link">
            <img src="{{asset('adminlte/dist/img/AdminLTELogo.png')}}"
               alt="AdminLTE Logo"
               class="brand-image img-circle elevation-3"
               style="opacity: .8">
            <span class="brand-text font-weight-light">Absensi Online</span>
         </a>

         <!-- Sidebar -->
         <div class="sidebar">
            <!-- Sidebar Menu -->
            <nav class="mt-2">
               <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
                        with font-awesome or any other icon font library -->
                  <li class="nav-item has-treeview">
                     <a href="{{ route('admin.dashboard') }}" class="nav-link">
                     <i class="nav-icon fas fa-tachometer-alt"></i>
                     <p>
                        Dashboard
                     </p>
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
                     <ul class="nav nav-treeview">
                     <li class="nav-item">
                        <a href="{{ url('/pegawai') }}" class="nav-link">
                        <i class="fa fa-user nav-icon"></i>
                        <p>Data Pegawai</p>
                        </a>
                     </li>
                     <li class="nav-item">
                        <a href="#" class="nav-link">
                        <i class="fa fa-user-plus nav-icon"></i>
                        <p>Tambah Data Pegawai</p>
                        </a>
                     </li>
                     </ul>
                  </li>
                  <li class="nav-item has-treeview">
                     <a href="#" class="nav-link">
                     <i class="nav-icon fas fa-calendar"></i>
                     <p>
                        Daftar Kehadiran
                     </p>
                     </a>					
                  </li>
               </ul>
            </nav>
         <!-- /.sidebar-menu -->
         </div>         
      <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <section class="content-header">
      
         </section>

     

         <!-- Main content -->
         <section class="content" style="margin-top: 10px;">

            
                  @yield('content')
            

         </section>
         @yield('modal')
      </div>
      <!-- /.content-wrapper -->

      <footer class="main-footer">
         <div class="float-right d-none d-sm-block">
            <b>Version</b> 3.0.5
         </div>
         <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
         reserved.
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
         <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
   </div>
   <!-- ./wrapper -->

   <!-- jQuery -->
   <script src="{{asset('adminlte/plugins/jquery/jquery.min.js')}}"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <!-- Bootstrap 4 -->
   <script src="{{asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
   <!-- AdminLTE App -->
   <script src="{{asset('adminlte/dist/js/adminlte.min.js')}}"></script>
   <!-- SweetAlert -->
   <script src="{{asset('adminlte/plugins/sweetalert2/sweetalert2.all.min.js')}}"></script>  


   

</body>
</html>
   
