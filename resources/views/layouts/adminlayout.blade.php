<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>@yield('title')</title>

  <!-- Custom fonts for this template-->
  <link href="{{ asset('assets/lib/font-awesome/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('assets/lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <link href="{{ asset('assets/lib/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">


  <!-- Custom styles for this template-->
  <link href="{{ asset('assets/css/admin.css') }}" rel="stylesheet">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index.html">Admin Menu JAGAJOGJA</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fa fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link" href="{{ url('/notif') }}">
          <i class="fa fa-bell fa-fw"></i>@if($d != 0)<span class="badge badge-danger ml-0">{{ $d }}</span>@endif
        </a>
      </li>
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{route ('logout')}}">Logout</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="{{ url('/admin') }}">
          <i class="fa fa-fw fa-user"></i>
          <span>Menu</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/daftar-laporan') }}">
          <i class="fa fa-fw fa-table"></i>
          <span>Daftar Laporan</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/kelola-laporan') }}">
          <i class="fa fa-fw fa-pencil-square-o"></i>
          <span>Kelola Laporan</span></a>
      </li>
    </ul>

    @yield('content')

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fa fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('assets/lib/jquery/jquery-3.4.1.min.js') }}"></script>
  <script src="{{ asset('assets/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('assets/lib/easing/easing.min.js') }}"></script>

  <!-- Page level plugin JavaScript-->
  <script src="{{ asset('assets/lib/datatables/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('assets/lib/datatables/dataTables.bootstrap4.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('assets/js/admin.min.js') }}"></script>
  <script src="{{ asset('assets/js/admin.js') }}"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>
  <script src="{{ asset('assets/lib/datatables/datatables-demo.js') }}"></script>

</body>

</html>
