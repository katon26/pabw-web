@extends('layouts.appapp')

@section('title', 'Laporan Saya')

@section('content')
<div id="konten" class="container">

  <section class="container">
        <div id="back-to-dashboard" class="col-lg-3 wu-btn-container text-right">
          <a class="wu-btn align-middle" href="{{ route('dashboard') }}">Kembali ke Dashboard</a>
        </div>
  </section>

  <section id="laporan-saya">
    <div class="page-container">
          <div class="card user-activity-card">

              <div class="card-header">
                  <h5>Laporan Terbaru</h5>
              </div>

              <div class="card-block product-list" id="load-data" >
                @if(!$laporan->isEmpty())
                @foreach($laporan as $datalapor)
                  <div class="post row m-b-25">
                      <div class="col-auto p-r-0">
                          <div class="u-img">
                            <img src="{{ asset('assets/img/default-avatar.png') }}" alt="user image" class="img-radius cover-img">
                          </div>
                      </div>
                      <div class="col wrap-input100 input100-select bg1">
                          <h6 class="m-b-5">{{ $datalapor->pelapor }}</h6>
                          <p class="m-b-5">#{{ $datalapor->id_laporan }}<span class="statuslapor"> <i class="fa fa-circle m-r-10" aria-hidden="true"></i>{{ $datalapor->status }}</span></p>
                          <p class="m-b-0">{{ $datalapor->deskripsi }}</p>
                          <p class="m-b-5">Lokasi : {{ $datalapor->lokasi }}</p>
                          <div class="col-auto p-r-0">
                              @if($datalapor->gambar)
                              <div class="u-img"> <img class="myImages img-radius cover-img" id="myImg" src="{{ asset('/bukti_laporan/'.$datalapor->gambar) }}" alt="user image" width="300" height="200"></div>
                              @else
                              <p class="">Tidak ada lampiran.</p>
                              @endif
                              <div id="myModal" class="modal">
                              <!-- The Close Button -->
                              <span class="close">&times;</span>
                              <!-- Modal Content (The Image) -->
                              <img class="modal-content" id="img01">
                              <!-- Modal Caption (Image Text) -->
                              <div id="caption"></div>
                              </div>
                        </div>
                          <p class="date text-muted m-b-0"><i class="fa fa-clock-o m-r-10"></i>{{ $datalapor->created_at }}</p>
                      </div>
                  </div>
                  @endforeach

              </div>

              <div id="remove-row" class="text-center">
                <!-- <button id="btn-more" data-id="{{ $datalapor->id }}" class="btn btn-get-started" > Load More </button> -->
                <p id="btn-more2" class="btn-get-started text-center" style="cursor:pointer" data-id="{{ $datalapor->id_laporan }}">Lihat laporan lainnya</p>
              </div>
              @endif

          </div>
    </div>
  </section>
</div>

@endsection
