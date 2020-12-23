<main id="main">

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container mt-5">

        <div class="d-flex justify-content-between align-items-center">
        <!-- <h2>Pembayaran Zakat</h2> -->
        <ol>
            <li><a href="<?=base_url()?>user/landingpage">Beranda</a></li>
            <li><a href="">Ganti Password</a></li>
        </ol>
        </div>

    </div>
</section><!-- End Breadcrumbs -->

<!-- ======= Blog Section ======= -->
<section id="blog" class="blog">
<div class="container">

    <div class="row justify-content-center">

    <div class="col-lg-6 col-12 px-0 card shadow mb-5">
        <div class="card-header bg-success my-0 text-white text-center">
            <h4>Ganti Password</h4>
        </div>
        <div class="card">
        <div class="card-body">

            <div class="px-2">
                <?php echo $this->session->flashdata('pesan'); ?>
            </div>
            <form action="<?= base_url() . 'user/anggota/aturulang_sandi'; ?>" method="post">
                <div class="form-group">
                    <label for="password_sekarang">Kata Sandi Anda Sebelumnya: </label>
                    <input type="password" class="form-control" name="password_sekarang" id="passlama" placeholder="Masukkan password saat ini...">
                    <?php echo form_error('password_sekarang'); ?>
                <div class="form-group">
                    <label for="password_baru">Kata Sandi Baru: </label>
                    <div class="input-group">
                        <input type="password" class="form-control" name="password_baru" id="password" placeholder="Masukkan password baru...">
                        <div class="input-group-append">
                            <a role="button" class="input-group-text" id="show"><i class="fa fa-eye-slash" id="icon" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <?php echo form_error('password_baru'); ?>
                </div>
                <div class="form-group">
                    <label for="password_baru2">Masukkan Ulang Kata Sandi: </label>
                    <input type="password" class="form-control" name="password_baru2" id="repassword" placeholder="Ketik ulang password baru...">
                    <?php echo form_error('password_baru2'); ?>
                </div>

                <div class="form-group text-center">
                    <button class="btn btn-primary text-white px-3 mr-1" type="submit">Simpan Perubahan</button>
                    <button onclick="window.history.go(-1); return false;" class="btn btn-danger text-white px-3 mr-1"><i class="fas fa-arrow-left mr-2"></i>Kembali</button>
                </div>
            </form>
        </div>
    </div>

    </div><!-- End blog entries list -->

    </div><!-- End blog sidebar -->

    </div>

</div>
</section><!-- End Blog Section -->

</main><!-- End #main -->