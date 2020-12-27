<main id="main">
<?php //var_dump($result); die;?>

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container mt-5">

            <div class="d-flex justify-content-between align-items-center">
            <!-- <h2>Pembayaran Zakat</h2> -->
            <ol>
                <li><a href="<?=base_url()?>user/landingpage">Beranda</a></li>
                <li><a href=""><?=$breadcrum?></a></li>
            </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->
    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-12">
                    <?= $this->session->flashdata('pesan');?>
                    <form action="<?=base_url()?>user/search/blog" method="post">
                    <div class="input-group mx-auto mb-4 w-50 flex-nowrap">
                        <input type="text" class="form-control" placeholder="Search . . ." name="search" aria-label="Username" aria-describedby="addon-wrapping">
                        <div class="input-group-append">
                            <button type="submit" class="input-group-text"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                    </form>
                </div>
                <?php foreach($result as $rowResult) :?>
                <div class="col-lg-4  col-md-6 d-flex align-items-stretch" data-aos="fade-up">
                    <article class="entry">

                    <a href="<?=base_url()?>user/distribusi/detail/<?=$rowResult->id_berita?>">
                        <div class="entry-img">
                            <img src="<?=base_url()?>assets/admin/img/berita/<?=$rowResult->thumbnail?>" alt="" class="img-fluid">
                        </div>
                    </a>

                    <h2 class="entry-title">
                        <a href="<?=base_url()?>user/distribusi/detail/<?=$rowResult->id_berita?>"><?=$rowResult->judul_berita?></a>
                    </h2>

                    <div class="entry-meta">
                        <ul>
                            <?php
                            $old_date = $rowResult->tanggal_berita;
                            $old_date_timestamp = strtotime($old_date);
                            ?>
                            <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a href="<?=base_url()?>user/distribusi/detail/<?=$rowResult->id_berita?>"><time datetime="2020-01-01"><?=date('l, d F yy', $old_date_timestamp)?></time></a></li>
                        </ul>
                    </div>

                    <div class="entry-content">
                        <p class="text-justify">
                            <?=$rowResult->deskripsi?>
                        </p>
                        <div class="read-more">
                            <a href="<?=base_url()?>user/distribusi/detail/<?=$rowResult->id_berita?>">Read More</a>
                        </div>
                    </div>

                    </article><!-- End blog entry -->
                </div>
                <?php endforeach;?>

            </div>

            <?php echo $pagination; ?>

        </div>
    </section><!-- End Blog Section -->
    
</main><!-- End #main -->