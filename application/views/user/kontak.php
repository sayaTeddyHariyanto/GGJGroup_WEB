<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container mt-5">

        <div class="d-flex justify-content-between align-items-center">
            <!-- <h2>Pembayaran Zakat</h2> -->
            <ol>
                <li><a href="<?=base_url()?>user/landingpage">Beranda</a></li>
                <li><span>Kontak</span></li>
            </ol>
        </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container">

            <?php foreach($profil as $rowProfil):?>
            <div>
                <iframe src="<?=$rowProfil->maps?>" width="100%" height="350" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>

            <div class="row mt-5">

            <div class="col-lg-8">
                <div class="info">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="address">
                                <i class="icofont-google-map"></i>
                                <h4>Location:</h4>
                                <p><?=$rowProfil->alamat_profil?></p>
                            </div>

                            <div class="email">
                                <i class="icofont-envelope"></i>
                                <h4>Email:</h4>
                                <p><?=$rowProfil->email_profil?></p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="address">
                                <i class="icofont-phone"></i>
                                <h4>Call:</h4>
                                <p><?=$rowProfil->no_telp_profil?></p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <?php endforeach;?>

            <div class="col-lg-4 mt-5 mt-lg-0">

                <div class="row">
                    <?php $ci = &get_instance(); $kontak = $ci->m_crud->getAll('kontak')->result();
                    foreach($kontak as $rowKontak){?>
                    <div class="col-lg-3 bg-light mx-1 py-2 rounded text-center">
                    <a class="py-3" href="<?=$rowKontak->link_akun?>" data-toggle="tooltip" data-placement="top" title="<?=$rowKontak->nama_akun?> (<?=$rowKontak->nama_sosmed?>)"><i class="bx bx-md <?=$rowKontak->ikon?>"></i></a>
                    </div>
                    <?php }?>
                </div>

            </div>

            </div>

        </div>
    </section><!-- End Contact Section -->

</main><!-- End #main -->