<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container mt-5">

        <div class="d-flex justify-content-between align-items-center">
            <!-- <h2>Pembayaran Zakat</h2> -->
            <ol>
                <li><a href="<?=base_url()?>user/landingpage">Beranda</a></li>
                <li><span>Tentang Kami</span></li>
            </ol>
        </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container">
        <?php foreach($profil as $rowProfil):?>
            <div class="row content">
                <div class="col-lg-6">
                    <h2><?=$rowProfil->nama_profil?></h2>
                    <h4><?=$rowProfil->deskripsi_about?></h4>
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0">
                    <p>
                        <?=$rowProfil->konten_about?>
                    </p>
                </div>
            </div>
        <?php endforeach;?>
        </div>
    </section><!-- End About Section -->

</main><!-- End #main -->