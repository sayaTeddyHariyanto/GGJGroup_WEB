<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top bg-success">
    <div class="container d-flex align-items-center">

      <h1 class="logo"><a class="text-light" href="index.html">GGJ Group</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="<?=base_url()?>assets/user/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav class="nav-menu d-none d-lg-block">

        <ul>
          <li class="active"><a href="<?=base_url()?>user/landingpage">Beranda</a></li>

          <li><a href="services.html">Pendistribusian</a></li>
          <li class="drop-down"><a href="#">Layanan</a>
            <ul>
              <li><a href="about.html">Pendaftaran Penerima</a></li>
              <li><a href="<?=base_url()?>user/pembayaran_zakat">Pembayaran Zakat</a></li>
            </ul>
          </li>
          <li><a href="pricing.html">Kontak Kami</a></li>
          <li><a href="pricing.html">Tentang Kami</a></li>

        </ul>

      </nav><!-- .nav-menu -->

      <a href="<?=base_url()?>user/login_anggota/login_anggota" class="btn btn-light text-success font-weight-bold ml-5">Login</a>

    </div>
  </header><!-- End Header -->