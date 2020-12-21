<div class="container-fluid">

    <div class="row justify-content-center py-3">
        <div class="col-md-8 card p-0">
            <div class="card-header pb-0">
                <h2 class="font-weight-bolder mb-0">Edit Data</h2>
                <ul class="breadcrumb bg-transparent ml-n3 mt-n3 mb-0">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>admin/dashboard"><i class="fa fa-home"></i> Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>admin/berita"></i>Berita</a></li>
                    <li class="breadcrumb-item active">Edit Artikel / Berita</li>
                </ul>
            </div>
            <div class="card-body">
                <div class="px-2">
                    <?php echo $this->session->flashdata('pesan'); ?>
                </div>

                <?php foreach ($berita as $row_berita) { ?>

                    <form action="<?= base_url() . 'admin/berita/update'; ?>" method="post">
                        <input type="hidden" name="id_berita" value="<?= $row_berita->id_berita ?>">
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="hidden" required class="form-control" name="tanggal" id="tanggal" value="<?= $row_berita->tanggal_berita ?>">
                            </div>
                            <div class="form-group">
                                <label for="judul">Ubah Judul</label>
                                <input type="text" pattern="[a-zA-Z0-9 ]{2,100}" title="Masukkan minimal 2, maksimum 100, hanya alphabet, spasi, dash dan underscore" required class="form-control" name="judul" value="<?= $row_berita->judul_berita ?>">
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Ubah Deskripsi</label>
                                <input type="text" pattern="[a-zA-Z0-9 ]{2,100}" title="Masukkan minimal 2, maksimum 250, hanya alphabet, spasi, dash dan underscore" required class="form-control" name="deskripsi" value="<?= $row_berita->deskripsi ?>">
                            </div>
                            <div class="form-group">
                                <label for="thumbnail">Upload Thumbnail</label><br>
                                <img id="prev_foto1" src="<?= base_url() ?>assets/user/img/upload.png" class="img-responsive img-thumbnail" alt="Preview Image" width="300px">
                                <div class="custom-file mb-2">
                                    <input type="file" class="custom-file-input" name="thumbnail" id="foto" required>
                                    <label class="custom-file-label" for="thumbnail">Masukkan foto berukuran 753 x 258 . .</label>
                                </div>
                                <small id="foto" class="form-text text-muted">Pilihlah File foto slider berukuran 710 x 285. Max 3 MB. Format (JPG/PNG)</small>
                            </div>
                            <div class="form_group">
                                <label for="konten">Ubah Artikel / Berita</label>
                                <textarea name="editor1" id="editor1" rows="10" cols="80"><?= $row_berita->konten ?>
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label for="status">Ubah Status Tampil:</label>
                                <select class="custom-select" name="status" id="status" required>
                                    <option value="" selected>Ubah Status Tampil</option>
                                    <option value="1" <?= $row_berita->status_berita == '1' ? "selected" : "" ?>>AKTIF</option>
                                    <option value="0" <?= $row_berita->status_berita == '0' ? "selected" : "" ?>>NONAKTIF</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <a class="btn btn-primary px-3 mr-1" href="<?= base_url() ?>admin/berita">Kembali</a>
                            <button class="btn btn-success px-3 mr-1" type="submit">Simpan</button>
                        </div>
                    </form>

            </div>
        </div>
    </div>


</div>

<?php } ?>