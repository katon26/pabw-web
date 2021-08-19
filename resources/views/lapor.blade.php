@extends('layouts.appapp')

@section('title', 'Laporin Lur!')

@section('content')
<div class="container container-contact100">
    <scrip>
      @if ($message = Session::get('success'))
          <div class="alert alert-success alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <strong>{{ $message }}</strong>
          </div>
      @endif

      @if (count($errors) > 0)
          <div class="alert alert-danger">
              <strong>Whoops!</strong> There were some problems with your input.<br><br>
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
    </script>

  <div class="wrap-contact100">
    <form action="submit" method="POST" enctype="multipart/form-data" class="contact100-form validate-form">
      <span class="form-title">Form Laporan</span>
      @csrf
      <input type="hidden" name="pelapor" value="{{ Auth::user()->name }}">
      <input type="hidden" name="point" value="{{ 25 }}">
      <input type="hidden" name="status" value="{{ 'Sedang menunggu untuk diproses' }}">

      <div class="wrap-input100 input100-select bg1">
        <span class="label-input100">Kategori masalah *</span>
        <div>
          <select class="js-select2" name="kategori" require>
              <option value=" " disabled selected hidden>Pilih kategori laporan</option>
              <option value="Keamanan">Keamanan</option>
              <option value="Kebersihan">Kebersihan</option>
          </select>
          <div class="dropDownSelect2"></div>
        </div>
      </div>

      <div class="wrap-input100 validate-input bg0 rs1-alert-validate" data-validate = "Tolong isi laporan Anda">
        <span class="label-input100">Isi Laporan *</span>
        <textarea class="input100" name="deskripsi" placeholder="Ketik masalah yang ingin dilaporkan disini..." require></textarea>
      </div>

      <div class="wrap-input100 input100-select bg1">
          <label>alamat lokasi*</label>
          <input type="text" class="form-control inputku" name="lokasi" require>
      </div>

      <div class="wrap-input100 input100-select bg1">
          <input type="file" class="form-control-file" name="gambar" id="file" onchange="readURL(this);" accept=".jpg,.jpeg,.png" aria-describedby="fileHelp"/>
          <small id="fileHelp" class="form-text text-muted">Beri gambar pendukung. Ukuran gambar maksimal 2MB.</small>
      </div>

      <div class="container-contact100-form-btn">
        <input type="submit" class="contact100-form-btn" value="LAPOR!"/>
        <input type="reset" class="contact100-form-btn" value="RESET FORM"/>
      </div>

    </form>
  </div>
</div>
@endsection
