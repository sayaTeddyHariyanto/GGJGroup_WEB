<?php foreach($blog as $rowBlog): ?>
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <!-- <h2>Pembayaran Zakat</h2> -->
          <ol>
            <li><a href="<?=base_url()?>user/landingpage">Beranda</a></li>
            <li><a href="<?=base_url()?>user/distribusi/all">Distribusi</a></li>
            <li><span><?=$rowBlog->judul_berita?></span></li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container">

        <div class="row">

          <div class="col-lg-8 entries">

            <article class="entry entry-single">

              <div class="entry-img">
                <img src="<?=base_url()?>assets/user/img/blog-1.jpg" alt="" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <span><?=$rowBlog->judul_berita?></span>
              </h2>

              <div class="entry-meta">
                <ul>
                  <?php
                  $old_date = $rowBlog->tanggal_berita;
                  $old_date_timestamp = strtotime($old_date);
                  ?>
                  <li class="d-flex align-items-center"><i class="icofont-user"></i> <span>Admin</span></li>
                  <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <span"><time datetime="<?=$rowBlog->tanggal_berita?>"><?=date('l, d F yy', $old_date_timestamp)?></time></span></li>
                </ul>
              </div>

              <div class="entry-content">
                <p class="text-justify">
                  <?=$rowBlog->konten?>
                </p>
              </div>

              <div class="entry-footer clearfix">
                <!-- <div class="float-left">
                  <i class="icofont-folder"></i>
                  <ul class="cats">
                    <li><a href="#">Business</a></li>
                  </ul>

                  <i class="icofont-tags"></i>
                  <ul class="tags">
                    <li><a href="#">Creative</a></li>
                    <li><a href="#">Tips</a></li>
                    <li><a href="#">Marketing</a></li>
                  </ul>
                </div> -->

                <div class="float-right share">
                  <a target="_blank" href="https://www.facebook.com/share.php?u=<?=base_url()?>user/distribusi/<?=$rowBlog->id_berita?>" title="Share on Facebook"><i class="icofont-facebook"></i></a>
                  <a target="_blank" href="https://twitter.com/intent/tweet?url=<?=base_url()?>user/distribusi/<?=$rowBlog->id_berita?>" title="Share on Twitter"><i class="icofont-twitter"></i></a>
                </div>

              </div>

            </article><!-- End blog entry -->

          </div><!-- End blog entries list -->

          <?php require_once(APPPATH.'views/user/sidebar.php');?>

          </div><!-- End blog sidebar -->

        </div>

      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->
  <?php endforeach;?>