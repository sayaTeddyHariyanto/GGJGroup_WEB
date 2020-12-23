<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

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

            <div>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3948.829717380375!2d113.46926351475133!3d-8.219873494084657!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6893683b3f3b7%3A0xdcf94593e48d4837!2sGGJ%20GROUP!5e0!3m2!1sid!2sid!4v1608682792577!5m2!1sid!2sid" width="100%" height="350" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>

            <div class="row mt-5">

            <div class="col-lg-8">
                <div class="info">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="address">
                                <i class="icofont-google-map"></i>
                                <h4>Location:</h4>
                                <p>Alamat GGJ Group Zakah ini satu baris aja apa bisa ke Enter sendiri</p>
                            </div>

                            <div class="email">
                                <i class="icofont-envelope"></i>
                                <h4>Email:</h4>
                                <p>info@example.com</p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="address">
                                <i class="icofont-phone"></i>
                                <h4>Call:</h4>
                                <p>+1 5589 55488 55s</p>
                            </div>

                            <div class="email">
                                <i class="icofont-envelope"></i>
                                <h4>Email:</h4>
                                <p>info@example.com</p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

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