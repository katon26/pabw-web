@extends('layouts.adminlayout')

@section('title', 'Admin - JagaJogja')

@section('content')
  <div id="content-wrapper">

    <div class="container-fluid">

      <!-- Kelola Laporan -->
      <div class="card mb-3">

        <div class="card-header">
          <i class="fa fa-pencil-square-o"></i>
          Kelola Laporan</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nama Pelapor</th>
                  <th>Kategori</th>
                  <th>Deskripsi</th>
                  <th>Lokasi</th>
                  <th>Gambar</th>
                  <th>Tanggal Laporan</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Nama Pelapor</th>
                  <th>Kategori</th>
                  <th>Deskripsi</th>
                  <th>Lokasi</th>
                  <th>Gambar</th>
                  <th>Tanggal Laporan</th>
                  <th>Status</th>
                </tr>
              </tfoot>
              <tbody>
                @if(!$laporan->isEmpty())
                @foreach($laporan as $datalapor)
                <tr>
                  <td>#{{ $datalapor->id_laporan }}</td>
                  <td>{{ $datalapor->pelapor }}</td>
                  <td>{{ $datalapor->kategori }}</td>
                  <td>{{ $datalapor->deskripsi }}</td>
                  <td>{{ $datalapor->lokasi }}</td>
                  @if($datalapor->gambar)
                  <td><img class="myImages img-radius cover-img" id="myImg" src="{{ asset('/bukti_laporan/'.$datalapor->gambar) }}" alt="user image" width="100" height="100"></td>
                  @else
                  <td><p>Tidak ada</p></td>
                  @endif
                  <td>{{ $datalapor->created_at }}</td>
                  @if($datalapor->status == "Sedang diproses")
                  <td>
                      <form action="{{ url('/kelola-laporan/'.$datalapor->id_laporan) }}" method="post">
                          @method('patch')
                          @csrf
                          <button type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Klik Tombol untuk Verifikasi">{{$datalapor->status}}</button>
                      </form>
                  </td>
                  @elseif($datalapor->status == "Terverifikasi")
                  <td>
                      <form action="{{ url('/kelola-laporan/'.$datalapor->id_laporan) }}" method="post">
                          @method('patch')
                          @csrf
                          <button type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Klik tombol untuk laporan sudah Dikerjakan">{{$datalapor->status}}</button>
                      </form>
                  </td>
                  @else
                  <td><span></span>{{$datalapor->status}}</td>
                  @endif
                </tr>
                @endforeach
                @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->
  </div>

@endsection
