<body>

  <!-- ======= Header ======= -->
  <?php $id_anggota = $this->session->userdata('id');
        $anggota = $this->db->get_where('tb_anggota', ['id_anggota' => $id_anggota])->row();?>
  <header id="header" class="fixed-top bg-success">
    <div class="container d-flex align-items-center">

      <h1 class="logo"><a class="text-light" href="<?=base_url()?>user/landingpage">GGJ Group</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="<?=base_url()?>assets/user/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav class="nav-menu d-none d-lg-block">

        <ul>
          <li class="active"><a href="<?=base_url()?>user/landingpage">Beranda</a></li>

          <li><a href="<?=base_url()?>user/distribusi/all">Pendistribusian</a></li>
          <li class="drop-down"><a href="#">Layanan</a>
            <ul>
              <li><a href="<?=base_url()?>user/pendaftaran_penerima">Pendaftaran Penerima</a></li>
              <li><a href="<?=base_url()?>user/pembayaran_zakat">Pembayaran Zakat</a></li>
              <li><a href="<?=base_url()?>user/history_pendaftaran">History Pendaftaran Penerima</a></li>
              <li><a href="<?=base_url()?>user/history_pembayaran">History Pembayaran Zakat</a></li>
            </ul>
          </li>
          <li><a href="<?=base_url()?>user/kontakkami">Kontak Kami</a></li>
          <li><a href="<?=base_url()?>user/tentangkami">Tentang Kami</a></li>
          <?php if($this->session->userdata('id') != ''){?>
          <li class="drop-down d-lg-none d-block"><a href="">Profil Saya</a>
            <ul>
                <li><a href="<?=base_url()?>user/dashboard">Dashboard</a></li>
                <li><a href="<?=base_url()?>user/history_pembayaran">History Pembayaran Zakat</a></li>
                <li><a href="<?=base_url()?>user/history_pendaftaran">History Pendaftaran Penerima</a></li>
                <li><a href="<?=base_url()?>user/anggota/edit">Edit Profile</a></li>
                <li><a onclick="return confirm('Apakah anda yakin ingin logout?');" href="<?=base_url()?>user/anggota/logout">Log Out</a></li>
            </ul>
          </li>
          <?php }?>

        </ul>

      </nav><!-- .nav-menu -->

      <?php if($this->session->userdata('id') != ''){?>
      <nav class="navbar navbar-success ml-auto navbar-expand-sm d-xs-none d-sm-none d-md-none d-lg-block">
  
        <button class="navbar-toggler d-sm-none d-xs-none" type="button" data-toggle="collapse" data-target="#navbar-list-4" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-xs-none d-sm-none" id="navbar-list-4">
          <ul class="navbar-nav">
              <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php if($anggota->foto_anggota == null || $anggota->foto_anggota == ''){?>
                <img src="http://placehold.it/50x50" width="40" height="40" class="rounded-circle">
                <?php }else{ ?>
                <img src="<?=base_url()?>assets/user/img/profil/<?=$anggota->foto_anggota?>" alt="Foto Profil" width="40" class="img-fluid rounded-circle">
                <?php }?>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="<?=base_url()?>user/dashboard">Dashboard</a>
                <a class="dropdown-item" href="<?=base_url()?>user/history_pembayaran">History Pembayaran Zakat</a>
                <a class="dropdown-item" href="<?=base_url()?>user/history_pendaftaran">History Pendaftaran Penerima</a>
                <a class="dropdown-item" href="<?=base_url()?>user/anggota/edit">Edit Profile</a>
                <a onclick="return confirm('Apakah anda yakin ingin logout?');" class="dropdown-item" href="<?=base_url()?>user/anggota/logout">Log Out</a>
              </div>
            </li>   
          </ul>
        </div>
      </nav>
      <?php }else{?>
      <a href="<?=base_url()?>user/auth/login_anggota" class="btn btn-light text-success font-weight-bold ml-5">Login</a>
      <?php }?>

    </div>
  </header><!-- End Header -->