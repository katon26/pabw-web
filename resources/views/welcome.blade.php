<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Sistem Informasi Jaga Jogja</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="{{ asset('/assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="{{ asset('/assets/lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="{{ asset('/assets/lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('/assets/lib/animate/animate.min.css') }}" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="{{ asset('/assets/css/style.css') }}" rel="stylesheet">
</head>

<body>


  <!--==========================
  Header
  ============================-->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <!-- <a href="#hero"><img src="img/logo.png" alt="" title="" /></img></a> -->
        <!-- Uncomment below if you prefer to use a text logo -->
        <h1><a href="#hero">JagaJogja</a></h1>
      </div>

      <div>
      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="#hero">Beranda</a></li>
          <li><a href="#about">Tentang</a></li>
          <li><a href="#services">Proses Laporan</a></li>
          <li><a href="#contact">Hubungi Kami</a></li>

          @if (Route::has('login'))
                  @auth
                      <li>
                        <a href="{{ url('/dashboard') }}"><i class="fa fa-user mr-2"></i>{{ Auth::user()->name }}</a>
                      </li>
                  @else
                      <li><a class="btn btn-login" href="{{ url('/login') }}">Masuk</a></li>

                      @if (Route::has('register'))
                          <li><a class="btn btn-register" href="{{ url('/register') }}">Daftar</a></li>
                      @endif
                  @endauth
              </div>
          @endif

        </ul>
      </nav> <!-- #nav-menu-container -->
    </div>
  </header> <!-- #header -->




  <!--==========================
    Hero Section
  ============================-->
  <section id="hero">
    <div class="hero-container">
      <h1>Sistem Informasi Jaga Jogja</h1>
      <h2>Laporkan keresahan yang terjadi di sekitar Anda dengan SiJago</h2>
      <a href="#about" class="btn-get-started">Mulai Sekarang</a>
    </div>
  </section><!-- #hero -->

  <main id="main">


    <!--==========================
      About Us Section
    ============================-->
    <section id="about">
      <div class="container">
        <div class="row about-container">

          <div class="col-lg-6 content order-lg-1 order-2">
            <h2 class="title">Tentang SiJago</h2>
            <p>
              Daerah Istimewa Yogyakarta dikenal sebagai daerah yang menyimpan potensi pariwisata yang sangat luas, hal ini jelas berdampak dengan banyaknya kunjungan wisatawan baik wisatawan domestik maupun asing.  Peningkatan jumlah wisatawan tentunya akan berpengaruh terhadap pendapatan provinsi DIY dari sektor pariwisata. Oleh karena itu, Pemerintah Daerah Istimewa Yogyakarta akan terus berupaya untuk meningkatkan citra apik DIY serta meningkatkan promosi dan pemasaran pariwisata.
            </p>
            <p>
              Salah satu upaya pemerintah dalam meningkatkan citra apik DIY ialah dengan menghadirkan Si Jago. Sistem Informasi Jaga Jogja (disingkat SI JAGO) adalah sebuah sistem informasi berbasis website yang ditujukkan kepada masyarakat DIY agar senantiasa berperan aktif dan peduli dengan lingkungan sekitarnya sehingga dapat tercipta lingkungan yang aman, bersih, serta fasilitas umum yang terjaga.
            </p>
            <p>
              Diharapkan melalui layanan yang disajikan oleh Si Jago, seluruh lapisan masyarakat bisa melaporkan berbagai kerusakan yang ada di sekitar DIY. Contohnya dalam menjaga fasiltas umum, masyarakat dapat melaporkan adanya coretan mural pada dinding sebuah cagar budaya agar coretan tersebut dapat segera dihilangkan. Setiap laporan yang terkumpul akan diverifikasi oleh Dinas Pekerjaan Umum, dan laporan yang telah terverifikasi akan segera ditindaklanjuti. Dengan upaya tersebut diharapkan DIY akan senantiasa menjadi provinsi yang memiliki citra apik yang baik.
            </p>

            <!-- <div class="icon-box wow fadeInUp">
              <div class="icon"><i class="fa fa-glass"></i></div>
              <h4 class="title"><a href="">judul</a></h4>
              <p class="description">deskripsi</p>
            </div>

            <div class="icon-box wow fadeInUp" data-wow-delay="0.2s">
              <div class="icon"><i class="fa fa-smile-o"></i></div>
              <h4 class="title"><a href="">judul</a></h4>
              <p class="description">deskripsi</p>
            </div>

            <div class="icon-box wow fadeInUp" data-wow-delay="0.4s">
              <div class="icon"><i class="fa fa-coffee"></i></div>
              <h4 class="title"><a href="">judul</a></h4>
              <p class="description">deskripsi</p>
            </div> -->

          </div>

          <div class="col-lg-6 background order-lg-2 order-1 wow fadeInRight"></div>
        </div>

      </div>
    </section><!-- #about -->

    <!--==========================
      Proses Laporan Section
    ============================-->
    <section id="services">
      <div class="container wow fadeIn">
        <div class="section-header">
          <h3 class="section-title">Proses Laporan</h3>
          <p class="section-description"></p>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
            <div class="box">
              <div class="icon"><a href=""><i class="fa fa-pencil-square-o"></i></a></div>
              <h4 class="title"><a href="">1. Tulis Laporan</a></h4>
              <p class="description">Laporkan keluhan atau aspirasi anda dengan jelas dan lengkap</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
            <div class="box">
              <div class="icon"><a href=""><i class="fa fa-mail-forward"></i></a></div>
              <h4 class="title"><a href="">2. Proses Verifikasi</a></h4>
              <p class="description">Dalam 3 hari, laporan Anda akan diverifikasi dan diteruskan kepada instansi berwenang</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
            <div class="box">
              <div class="icon"><a href=""><i class="fa fa-comments"></i></a></div>
              <h4 class="title"><a href="">3. Proses Tindak Lanjut</a></h4>
              <p class="description">Dalam 5 hari, instansi akan menindaklanjuti dan membalas laporan Anda</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
            <div class="box">
              <div class="icon"><a href=""><i class="fa fa-commenting-o"></i></a></div>
              <h4 class="title"><a href="">4. Beri Tanggapan</a></h4>
              <p class="description">Anda dapat menanggapi kembali balasan yang diberikan oleh instansi dalam waktu 10 hari</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
            <div class="box">
              <div class="icon"><a href=""><i class="fa fa-check"></i></a></div>
              <h4 class="title"><a href="">5. Selesai</a></h4>
              <p class="description">Laporan Anda akan terus ditindaklanjuti hingga terselesaikan</p>
            </div>
          </div>
        </div>
      </div>
    </section><!-- #services -->

    <!--==========================
    Call To Action Section
    ============================-->
    <section id="call-to-action">
      <div class="container wow fadeIn">
        <div class="row">
          <div class="col-lg-9 text-center text-lg-left">
            <!-- <h3 class="cta-title">h </h3> -->
            <!-- <p class="cta-text"> h</p> -->
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
          </div>
          <div class="col-lg-3 cta-btn-container text-center">
            <!-- <a class="cta-btn align-middle" href="#">Laporkan Masalah</a> -->
          </div>
        </div>

      </div>
    </section><!-- #call-to-action -->

    <!--==========================
      Contact Section
    ============================-->
    <section id="contact">
      <div class="container wow fadeInUp">
        <div class="section-header">
          <h3 class="section-title">Hubungi Kami</h3>
          <p class="section-description"></p>
        </div>
      </div>

      <!-- Uncomment below if you wan to use dynamic maps -->
      <iframe src="https://maps.google.com/maps?q=universitas%20islam%20indonesia&t=&z=17&ie=UTF8&iwloc=&output=embed" width="100%" height="380" frameborder="0" style="border:0" allowfullscreen></iframe>

      <div class="container wow fadeInUp mt-5">
        <div class="row justify-content-center">

          <div class="col-lg-3 col-md-4">

            <div class="info">
              <div>
                <i class="fa fa-map-marker"></i>
                <p>Yogyakarta 55584</p>
              </div>

              <div>
                <i class="fa fa-envelope"></i>
                <p>admin@jagajogja.co</p>
              </div>

            </div>

          </div>

          <div class="col-lg-5 col-md-8">
            <div class="form">
              <div id="sendmessage">Your message has been sent. Thank you!</div>
              <div id="errormessage"></div>
              <form action="" method="post" role="form" class="contactForm">
                <div class="form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                  <div class="validation"></div>
                </div>
                <div class="text-center"><button type="submit">Send Message</button></div>
              </form>
            </div>
          </div>

        </div>

      </div>
    </section><!-- #contact -->

  </main>

  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">

      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>JagaJogja</strong>. All Rights Reserved
      </div>
      <div class="credits">
        Designed by <a href="">-</a>
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="{{ asset('assets/lib/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/lib/jquery/jquery-migrate.min.js') }}"></script>
  <script src="{{ asset('assets/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/lib/easing/easing.min.js') }}"></script>
  <script src="{{ asset('assets/lib/wow/wow.min.js') }}"></script>
  <script src="{{ asset('assets/lib/waypoints/waypoints.min.js') }}"></script>
  <script src="{{ asset('assets/lib/counterup/counterup.min.js') }}"></script>
  <script src="{{ asset('assets/lib/superfish/hoverIntent.js') }}"></script>
  <script src="{{ asset('assets/lib/superfish/superfish.min.js') }}"></script>

  <!-- Contact Form JavaScript File -->
  <script src="{{ asset('assets/contactform/contactform.js') }}"></script>

  <!-- Template Main Javascript File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>

</body>
</html>
