<main id="main">

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container mt-5">

        <div class="d-flex justify-content-between align-items-center">
        <!-- <h2>Pembayaran Zakat</h2> -->
        <ol>
            <li><a href="<?=base_url()?>user/landingpage">Beranda</a></li>
            <li><a href="">Edit Profil</a></li>
        </ol>
        </div>

    </div>
</section><!-- End Breadcrumbs -->

<!-- ======= Blog Section ======= -->
<section id="blog" class="blog">
<div class="container">

    <div class="row justify-content-center">

    <div class="col-lg-8 col-12 px-0 card shadow mb-5">
        <div class="card-header bg-success my-0 text-white text-center">
            <h4>Edit Profil Saya</h4>
        </div>
        <div class="card mb-4">
        <div class="card-body">

            <div class="px-2">
                <?php echo $this->session->flashdata('pesan'); ?>
            </div>

        <?php foreach ($anggota as $detAng) { ?>

            <form action="<?= base_url() . 'user/anggota/update'; ?>" method="post">
                <input type="hidden" name="id_anggota" value="<?= $detAng->id_anggota ?>">

                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama:</label>
                        <input disabled type="text" pattern="[a-zA-Z0-9 ]{2,100}" title="Masukkan minimal 2, maksimum 100, hanya alphabet, spasi, dash dan underscore" required
                            class="form-control" name="nama" id="nama" aria-describedby="nama" placeholder="Masukkan nama..." value="<?=$detAng->nama_anggota?>">
                        <small id="nama" class="form-text text-muted">Masukkan nama anggota dengan benar (tidak diperbolehkan karakter spesial)</small>
                        <?php echo form_error('nama'); ?>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat:</label>
                        <textarea class="form-control" name="alamat" id="alamat" rows="3" maxlength="255" placeholder="Masukkan Alamat..." required><?=$detAng->alamat_anggota?></textarea>
                        <small id="nama" class="form-text text-muted">Masukkan alamat maksimum 255 karakter</small>
                        <?php echo form_error('alamat'); ?>
                    </div>
                    <div class="form-group">
                        <label for="no_hp">Nomor HP:</label>
                        <input type="text" pattern="[0-9]{11,13}" title="Masukkan hanya angka, minimal 11, maksimal 13" required
                            class="form-control" name="no_hp" id="no_hp" aria-describedby="no_hp" placeholder="Masukkan Nomor Hp..." value="<?=$detAng->no_hp_anggota?>">
                        <small id="no_hp" class="form-text text-muted">Masukkan Nomor Hp anggota dengan benar (hanya angka)</small>
                        <?php echo form_error('no_hp'); ?>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" title="Masukkan email yang valid" required
                            class="form-control" name="email" id="email" aria-describedby="email" placeholder="Masukkan Alamat Email..." value="<?=$detAng->email_anggota?>">
                        <small id="email" class="form-text text-muted">Masukkan alamat email yang valid</small>
                        <?php echo form_error('email'); ?>
                    </div>
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" pattern="[a-zA-Z0-9 ]{2,32}" title="Masukkan minimal 2, maksimum 32, hanya alphabet, spasi, dash dan underscore" required
                            class="form-control" name="username" id="username" aria-describedby="username" placeholder="Masukkan Username..." value="<?=$detAng->username_anggota?>">
                        <small id="username" class="form-text text-muted">Masukkan Username anggota dengan benar</small>
                        <?php echo form_error('username'); ?>
                    </div>
                </div>
                <div class="form-group text-center">
                    <a class="btn btn-success px-3 mr-1" href="<?=base_url()?>user/anggota/ganti_password">Reset Password</a>
                    <button class="btn btn-primary px-4 mr-1" type="submit">Simpan</button>
                    <button onclick="window.history.go(-1); return false;" class="btn btn-danger text-white px-3 mr-1"><i class="fas fa-arrow-left mr-2"></i>Kembali</button>
                </div>
            </form>
        <?php } ?>
        </div>
    </div>

    </div><!-- End blog entries list -->

    </div><!-- End blog sidebar -->

    </div>

</div>
</section><!-- End Blog Section -->

</main><!-- End #main -->