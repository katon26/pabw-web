@extends('layouts.appapp')

@section('title', 'Dashboard')



@section('content')
  <!-- <div class="row h-100 align-items-center justify-content-center"> -->
    <div id="konten" class="container">


      <!--==========================
      Call To Action Section
      ============================-->
      <section id="welcome-user">
        <div class="container wow fadeIn">
          <div class="row">
            <div class="col-lg-9 text-center text-lg-left">
              <h3 class="wu-title">Selamat Datang, {{ Auth::user()->name }}! </h3>
              <p class="wu-text"> Mulai laporkan masalah yang terjadi di sekitar Anda</p>
            </div>
            <div class="col-lg-3 wu-btn-container text-center">
              <a class="wu-btn align-middle" href="#formlapor">Laporkan Masalah</a>
            </div>
          </div>
        </div>
      </section><!-- #welcome-user -->

        <section id="formlapor">
          <div class="container container-contact100">
            <div class="container wrap-contact100">
              <form id="formlaporan" action="{{ url('submit') }}" method="POST" enctype="multipart/form-data" class="contact100-form validate-form">
                <span class="form-title">Form Laporan</span>
                @csrf
                <input type="hidden" name="pelapor" value="{{ Auth::user()->name }}">
                <input type="hidden" name="status" value="{{ 'Sedang diproses' }}">


                <div class="wrap-input100 input100-select bg1">
                  <span class="label-input100">Kategori masalah *</span>
                  <div>
                    <select class="js-select2" name="kategori" required>
                        <option value=" " disabled selected hidden>Pilih kategori laporan</option>
                        <option value="Keamanan">Keamanan</option>
                        <option value="Kebersihan">Kebersihan</option>
                        <option value="Infrasktuktur">Infrasktuktur</option>
                    </select>
                    <div class="dropDownSelect2"></div>
                  </div>
                </div>

                <div class="wrap-input100 validate-input bg0 rs1-alert-validate" data-validate = "Tolong isi laporan Anda">
                  <span class="label-input100">Isi Laporan *</span>
                  <textarea class="input100" name="deskripsi" placeholder="Ketik masalah yang ingin dilaporkan disini..." required></textarea>
                </div>

                <div class="wrap-input100 input100-select bg1">
                    <span class="label-input100">Lokasi *</span>
                    <input type="text" class="input100" name="lokasi" placeholder="Lokasi kejadian..." required>
                </div>

                <div class="wrap-input100 input100-select bg1">
                    <input type="file" class="form-control-file" name="gambar" id="file" onchange="readURL(this);" accept=".jpg,.jpeg,.png" aria-describedby="fileHelp"/>
                    <small id="fileHelp" class="form-text text-muted">Beri gambar pendukung. Ukuran gambar maksimal 2MB.</small>
                </div>

                <div class="container-contact100-form-btn">
                  <input type="submit" id="laporin" class="contact100-form-btn" value="LAPOR!"/>
                  <input type="reset" class="contact100-form-btn" value="RESET FORM"/>
                </div>


              </form>
            </div>
          </div>
        </section>

        <section id="laporan-terbaru">
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
                      <p id="btn-more" class="btn-get-started text-center" style="cursor:pointer" data-id="{{ $datalapor->id_laporan }}">Lihat laporan lainnya</p>
                    </div>
                    @endif

                </div>
          </div>
      </section>
    </div>

@endsection
