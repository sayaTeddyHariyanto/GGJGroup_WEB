<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-text mx-3">GGJ Group Zakah</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item <?php if(isset($sidebar)){ echo $sidebar == 'dashboard' ? "active" : ""; }?>">
        <a class="nav-link" href="<?= base_url() ?>admin/guide">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Nav Item - Tables -->
      <li class="nav-item <?php if(isset($sidebar)){ echo $sidebar == 'penerima' ? "active" : ""; }?>">
        <a class="nav-link" href="<?= base_url() ?>admin/penerima">
          <i class="fas fa-user-alt"></i>
          <span>Penerima Zakat</span></a>
      </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item <?php if(isset($sidebar)){ echo $sidebar == 'keanggotaan' ? "active" : ""; }?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-user-friends"></i>
          <span>Keanggotaan</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Kelola Anggota</h6>
            <a class="collapse-item" href="<?= base_url() ?>admin/anggota">Data Anggota</a>
            <a class="collapse-item" href="<?= base_url() ?>admin/anggota/verifikasi">Verifikasi Data Anggota</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item <?php if(isset($sidebar)){ echo $sidebar == 'zakat' ? "active" : ""; }?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-dollar-sign"></i>
          <span>Pembayaran Zakat</span>
        </a>
        <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">kelola zakat</h6>
            <a class="collapse-item" href="<?= base_url() ?>admin/zakat">Data Zakat</a>
            <a class="collapse-item" href="<?= base_url() ?>admin/zakat/verifikasi">Verifikasi Zakat</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item <?php if(isset($sidebar)){ echo $sidebar == 'distribusi' ? "active" : ""; }?>">
        <a class="nav-link" href="<?= base_url() ?>admin/distribusi">
          <i class="fas fa-car"></i>
          <span>Distribusi Zakat</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item <?php if(isset($sidebar)){ echo $sidebar == 'laporan' ? "active" : ""; }?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Laporan</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Pilih Laporan</h6>
            <a class="collapse-item" href="<?= base_url() ?>admin/pembayaran_zakat">Pembayaran Zakat</a>
            <a class="collapse-item" href="<?= base_url() ?>admin/keuangan">Keuangan</a>
            <a class="collapse-item" href="<?= base_url() ?>admin/laporan_distribusi">Distribusi</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item <?php if(isset($sidebar)){ echo $sidebar == 'website' ? "active" : ""; }?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePagees" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-cog"></i>
          <span>Kelola Website</span>
        </a>
        <div id="collapsePagees" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Pilih Aksi</h6>
            <a class="collapse-item" href="<?= base_url() ?>admin/slider">Slider</a>
            <a class="collapse-item" href="<?= base_url() ?>admin/berita">Konten website</a>
            <a class="collapse-item" href="<?= base_url() ?>admin/jadwal">Jadwal Kegiatan</a>
            <a class="collapse-item" href="<?= base_url() ?>admin/kontak">Kontak Person</a>
            <a class="collapse-item" href="<?= base_url() ?>admin/saran">Kritik Saran</a>
            <a class="collapse-item" href="<?= base_url() ?>admin/bank">Metode Pembayaran</a>
            <a class="collapse-item" href="<?= base_url() ?>admin/profil">Profil Kami</a>
          </div>
        </div>
      </li>


      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->