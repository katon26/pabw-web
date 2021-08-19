@extends('layouts.adminlayout')

@section('title', 'Admin - JagaJogja')

@section('content')
    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-body">
            <h6>Selamat Datang, {{Auth::user()->name}} !</h6>
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->

    </div>
    <!-- /.content-wrapper -->
@endsection
