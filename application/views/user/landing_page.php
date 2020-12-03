<!-- ======= Hero Section ======= -->
  
  <section id="hero">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">

        <?php $i=0; foreach($slider as $rowSlider){?>
        <!-- Slide 1 -->
        <div class="carousel-item <?=$i == 0 ? "active" : ""?>" style="background-image: url(<?=base_url()?>assets/user/img/slide/<?=$rowSlider->file?>)">
          <div class="carousel-container">
          </div>
        </div>
        <?php $i++; }?>

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon icofont-simple-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon icofont-simple-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>

    </div>
  </section><!-- End Hero -->

  <main id="main">

    <section id="pricing" class="pricing">
      <div class="container mb-n5">

        <div class="row py-3">

          <div class="col-lg-3 col-md-6">
            <div class="box featured">
              <h3 class="px-4">Total Pemasukan Zakat Bulan ini :</h3>
              <h4 class="pt-3"><sup>Rp</sup><?=thousandsCurrencyFormat($pemasukan)?><span></span></h4>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-4 mt-md-0">
            <div class="box featured">
                <h3 class="px-4">Total Pendistribusian Zakat Bulan ini :</h3>
                <h4 class="pt-3"><sup>Rp</sup><?=thousandsCurrencyFormat($distribusi)?><span></span></h4>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
            <div class="box featured">
                <h3 class="px-4">Total Penerima zakat yang dijangkau : </h3>
                <h4 class="pt-3"><sup></sup><?=thousandsCurrencyFormat($penerima)?><span></span></h4>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
            <div class="box featured">
                <h3 class="px-4">Total Sisa saldo zakat Bulan ini :</h3>
                <h4 class="pt-3"><sup>Rp</sup><?=thousandsCurrencyFormat($saldo)?><span></span></h4>
            </div>
          </div>

        </div>

      </div>
    </section>
    <!-- End Pricing Section -->

    <!-- Jadwal Section -->
    <section class="container mt-n5">
      <div class="row bs-wizard" style="border-bottom:0;">
          <div class="col-lg-12 text-center mb-3">
            <h3>Jadwal Bulan Ini</h3>
          </div>
          <?php foreach($jadwal as $rowJadwal){?>
          <div class="col-lg-3 bs-wizard-step <?=$rowJadwal->status_kegiatan=='aktif'?'':'active'?>">
            <div class="text-center bs-wizard-stepnum"><?=$rowJadwal->tanggal_kegiatan?></div>
            <div class="progress"><div class="progress-bar"></div></div>
            <a href="#" class="bs-wizard-dot"></a>
            <div class="bs-wizard-info text-justify px-3"><?=$rowJadwal->judul?></div>
          </div>
          <?php }?>
          
          <!-- <div class="col-lg-3 bs-wizard-step active">
            <div class="text-center bs-wizard-stepnum">12 November 2020</div>
            <div class="progress"><div class="progress-bar"></div></div>
            <a href="#" class="bs-wizard-dot"></a>
            <div class="bs-wizard-info text-justify px-3">Nam mollis tristique erat vel tristique. Aliquam erat volutpat. Mauris et vestibulum nisi. Duis molestie nisl sed scelerisque vestibulum. Nam placerat tristique placerat</div>
          </div>
          
          <div class="col-lg-3 bs-wizard-step">
            <div class="text-center bs-wizard-stepnum">20 November 2020</div>
            <div class="progress"><div class="progress-bar"></div></div>
            <a href="#" class="bs-wizard-dot"></a>
            <div class="bs-wizard-info text-justify px-3">Integer semper dolor ac auctor rutrum. Duis porta ipsum vitae mi bibendum bibendum</div>
          </div>
          
          <div class="col-lg-3 bs-wizard-step">
            <div class="text-center bs-wizard-stepnum">28 November 2020</div>
            <div class="progress"><div class="progress-bar"></div></div>
            <a href="#" class="bs-wizard-dot"></a>
            <div class="bs-wizard-info text-justify px-3"> Curabitur mollis magna at blandit vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae</div>
          </div> -->
      </div>
    </section>
    <!-- End Jadwal Section -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container">

        <div class="row">
          <div class="col-lg-12 text-center mb-5">
            <h3>Dokumentasi Terbaru</h3>
          </div>

          <?php $i=1; foreach($berita as $rowBerita){
            $totalberita = count((array)$berita); ?>
          <div class="col-lg-<?php if($totalberita <= 3){echo "4";}else if($totalberita == 4){if($i==2 || $i==3){echo "8";}else{echo "4";}}else{if($i==2){echo "8";}else{echo "4";}}?>  col-md-6 d-flex align-items-stretch" data-aos="fade-up">
            <article class="entry">

              <a href="<?=base_url()?>user/berita/detail/<?=$rowBerita->id_berita?>">
                <div class="entry-img">
                  <img src="<?=base_url()?>assets/user/img/blog-1.jpg" alt="" class="img-fluid">
                </div>
              </a>

              <h2 class="entry-title">
                <a href="<?=base_url()?>user/berita/detail/<?=$rowBerita->id_berita?>"><?=$rowBerita->judul_berita?></a>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a href="<?=base_url()?>user/berita/detail/<?=$rowBerita->id_berita?>"><time datetime="2020-01-01"><?=$rowBerita->tanggal_berita?></time></a></li>
                </ul>
              </div>

              <div class="entry-content">
                <p>
                  <?=$rowBerita->konten?>
                </p>
                <div class="read-more">
                  <a href="<?=base_url()?>user/berita/detail/<?=$rowBerita->id_berita?>">Read More</a>
                </div>
              </div>

            </article><!-- End blog entry -->
          </div>
          <?php $i++; }?>

        <div class="blog-pagination mx-auto" data-aos="fade-up">
          <ul class="justify-content-center">
            <li><a href="#">Lihat selengkapnya <i class="icofont-rounded-right"></i></a></li>
          </ul>
        </div>

      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->