<div class="container-fluid">

    <div class="row justify-content-center py-3">
        <div class="col-md-8 card p-0">
            <div class="card-header pb-0">
                <h2 class="font-weight-bolder mb-0">Edit Profil</h2>
                <ul class="breadcrumb bg-transparent ml-n3 mt-n3 mb-0">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>admin/dashboard"><i class="fa fa-home"></i> Dashboard</a></li>
                    <li class="breadcrumb-item active">Profil Kami</li>
                </ul>
            </div>
            <div class="card-body">
                <div class="px-2">
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Perhatian!</strong> Isian pada kolom dibawah akan ditampilkan sebagai profil organisasi pada tampilan web anggota. Termasuk Kontak Kami, Tentang Kami, Footer.
                        <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php echo $this->session->flashdata('pesan'); ?>
                </div>

                <?php foreach ($profil as $row_profil) { ?>

                    <form action="<?= base_url() . 'admin/profil/update'; ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_profil" value="<?= $row_profil->id_profil?>">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nama">Nama :</label>
                                <input type="text" pattern="[a-zA-Z0-9 ,.-]{2,100}" title="Masukkan minimal 2, maksimum 100, hanya alphabet, spasi, dash dan underscore" required class="form-control" name="nama" value="<?= $row_profil->nama_profil ?>">
                                <?php echo form_error('nama'); ?>
                            </div>
                            <div class="form-group">
                                <label for="email">Email :</label>
                                <input type="email" title="Masukkan email yang valid" required class="form-control" name="email" value="<?= $row_profil->email_profil ?>">
                                <?php echo form_error('email'); ?>
                            </div>
                            <div class="form-group">
                                <label for="no_hp">Nomor HP :</label>
                                <input type="text" pattern="[0-9 .-+]{11,15}" title="Masukkan hanya angka, minimal 11, maksimal 13" required
                                    class="form-control" name="no_hp" id="no_hp" aria-describedby="no_hp" placeholder="Masukkan Nomor Hp..." value="<?= $row_profil->no_telp_profil ?>">
                                <?php echo form_error('no_hp'); ?>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat :</label>
                                <textarea class="form-control" name="alamat" id="alamat" rows="3"  placeholder="Masukkan alamat..." required><?= $row_profil->alamat_profil ?></textarea>
                                <?php echo form_error('alamat'); ?>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi :</label>
                                <textarea class="form-control" pattern="[a-zA-Z0-9 ,.-]{2,250}" name="deskripsi" id="deskripsi" rows="3" maxlength="250" placeholder="Masukkan Deskripsi..." required><?= $row_profil->deskripsi_about ?></textarea>
                                <?php echo form_error('deskripsi'); ?>
                            </div>
                            <div class="form-group">
                                <label for="konten">Konten Tentang Kami :</label>
                                <textarea class="form-control" name="konten" id="ckeditor" rows="3" maxlength="250" required><?= $row_profil->konten_about ?></textarea>
                                <?php echo form_error('konten'); ?>
                            </div>
                            <div class="form-group">
                                <label for="maps">maps :</label>
                                <input type="url" title="Masukkan link maps pada kolom sematkan yang valid" required class="form-control" name="maps" value="<?= $row_profil->maps ?>">
                                <?php echo form_error('maps'); ?>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <a class="btn btn-primary px-3 mr-1" href="<?= base_url() ?>admin/berita">Kembali</a>
                            <button class="btn btn-success px-3 mr-1" type="submit">Simpan</button>
                        </div>
                    </form>

                <?php } ?>
            </div>
        </div>
    </div>


</div>