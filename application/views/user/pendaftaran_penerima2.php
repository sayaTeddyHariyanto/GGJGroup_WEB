<d<main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
        <div class="container mt-5">

            <div class="d-flex justify-content-between align-items-center">
            <!-- <h2>Pembayaran Zakat</h2> -->
            <ol>
                <li><a href="<?= base_url() ?>user/landingpage">Beranda</a></li>
                <li><span>Pendaftaran Calon Penerima</span></li>
            </ol>
            </div>

        </div>
        </section><!-- End Breadcrumbs -->
        <!-- ======= Blog Section ======= -->
        <section id="blog" class="blog">
            <div class="container">

            <div class="row">

                <div class="col-lg-8 col-12 px-0 card shadow mb-5">
                <div class="card-header bg-success my-0 text-white text-center">
                    <h4>Pendaftaran Penerima</h4>
                </div>
                <div class="card-body">
                    <div class="px-2">
                        <?php echo $this->session->flashdata('pesan'); ?>
                    </div>

                    <form action="<?= base_url() . 'user/pendaftaran_penerima/tambah_penerima2'; ?>" method="post">
                        <div class="form-group">
                            <label>Kategori</label>
                            <select name="nama_kategori" class="form-control selectpicker" data-live-search="true" required>
                                <option value="">--Pilih Kategori--</option>
                                <?php foreach ($kategori as $key) { ?>
                                    <option value="<?php echo $key->id_kategori; ?>">
                                        <?php echo $key->nama_kategori; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nama_penerima">Nama Penerima:</label>
                            <input type="text" pattern="[a-zA-Z0-9 ]{2,100}" title="Masukkan minimal 2, maksimum 100, hanya alphabet, spasi, dash dan underscore" required class="form-control" name="nama_penerima" id="nama_penerima" aria-describedby="nama_penerima" placeholder="Masukkan nama penerima..." value="<?= set_value('nama_penerima') ?>">
                            <small id="nama_penerima" class="form-text text-muted">Masukkan nama penerima dengan benar (tidak diperbolehkan karakter spesial)</small>
                            <?php echo form_error('nama_penerima'); ?>
                        </div>
                        <div class="form-group">
                            <label for="alamat_penerima">Alamat Penerima:</label>
                            <textarea class="form-control" name="alamat_penerima" id="alamat_penerima" rows="3" maxlength="255" placeholder="Masukkan Alamat Penerima..." required><?= set_value('alamat_penerima') ?></textarea>
                            <small id="alamat_penerima" class="form-text text-muted">Masukkan alamat penerima maksimum 255 karakter</small>
                            <?php echo form_error('alamat_penerima'); ?>
                        </div>
                        <div class="form-group">
                            <label for="pekerjaan">Pekerjaan:</label>
                            <input type="text" pattern="[a-zA-Z0-9]{2,100}" title="Masukkan hanya huruf, angka dan spasi" required class="form-control" name="pekerjaan" id="pekerjaan" aria-describedby="pekerjaan" placeholder="Masukkan Pekerjaan..." value="<?= set_value('pekerjaan') ?>">
                            <small id="pekerjaan" class="form-text text-muted">Masukkan pekerjaan penerima dengan benar (hanya angka)</small>
                            <?php echo form_error('pekerjaan'); ?>
                        </div>
                        <div class="form-group">
                            <label for="jumlah_tanggungan">Jumlah Tanggungan:</label>
                            <input type="number" pattern="[0-9]{1-32}" title="Minimum 1, isi dengan angka" required class="form-control" name="jumlah_tanggungan" id="jumlah_tanggungan" aria-describedby="jumlah_tanggungan" placeholder="Masukkan jumlah tanggungan..." value="<?= set_value('jumlah_tanggungan') ?>" min="1">
                            <small id="jumlah_tanggungan" class="form-text text-muted">Masukkan jumlah tanggungan</small>
                            <?php echo form_error('jumlah_tanggungan'); ?>
                        </div>
                        
                        <input type="hidden"  name="jumlah_terima" value="0" >
                        
                </div>
                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-success my-2">Tambahkan Penerima</button>
                </div>
            </form>
        </div><!-- End blog entries list -->

        <?php require_once(APPPATH . 'views/user/sidebar.php'); ?>

      </div><!-- End blog sidebar -->

    </div>

    </div>
  </section><!-- End Blog Section -->

</main><!-- End #main -->