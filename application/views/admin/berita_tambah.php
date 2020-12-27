<div class="container-fluid">

    <div class="row justify-content-center py-3">
        <div class="col-md-8 card p-0">
            <div class="card-header pb-0">
                <h2 class="font-weight-bolder mb-0">Tambah Data</h2>
                <ul class="breadcrumb bg-transparent ml-n3 mt-n3 mb-0">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>admin/dashboard"><i class="fa fa-home"></i> Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>admin/berita"></i>Berita</a></li>
                    <li class="breadcrumb-item active">Tambah Artikel / Berita</li>
                </ul>
            </div>
            <div class="card-body">
                <div class="px-2">
                    <?php echo $this->session->flashdata('pesan'); ?>
                </div>
                    <form action="<?= base_url() ?>admin/berita/tambah" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="judul">Judul</label>
                                <input type="text" class="form-control" pattern="[a-zA-Z0-9 ,.-]{2,100}" name=" judul" id="judul" rows="3" maxlength="100" placeholder="Masukkan Judul..." value="<?= set_value('judul') ?>" required>
                                <small id="judul" class="form-text text-muted">Judul maksimum 100 karakter</small>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea class="form-control" pattern="[a-zA-Z0-9 ,.-]{2,250}" name="deskripsi" id="deskripsi" rows="3" maxlength="250" placeholder="Masukkan Deskripsi..." required><?= set_value('deskripsi') ?></textarea>
                                <small id="deskripsi" class="form-text text-muted">Deskripsi maksimum 250 karakter</small>
                            </div>
                            <div class="form-group">
                                <label for="thumbnail">Upload Thumbnail</label><br>
                                <img id="prev_foto1" src="<?= base_url() ?>assets/user/img/upload.png" class="img-responsive img-thumbnail" alt="Preview Image" width="300px">
                                <div class="custom-file mb-2">
                                    <input type="file" class="custom-file-input" name="thumbnail" id="foto" required>
                                    <label class="custom-file-label" for="thumbnail">Masukkan foto berukuran 753 x 258 . .</label>
                                </div>
                                <small id="thumbnail" class="form-text text-muted">Pilihlah File foto thumbnail berukuran 710 x 285. Max 3 MB. Format (JPG/PNG)</small>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Artikel / Berita</label>
                                <textarea class="form-control" name="editor1" id="ckeditor"></textarea>
                            </div>
                            <input type="hidden" readonly required class="form-control" name="tanggal" id="tanggal" value="<?= date('Y-m-d H:i:s') ?>">
                            <div class="form-group">
                                <label for="status">Status Tampil Berita</label>
                                <select class="custom-select" name="status" id="status" required>
                                    <option value="" selected>Pilih Status</option>
                                    <option value="1">AKTIF</option>
                                    <option value="0">NONAKTIF</option>
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