<div class="container-fluid">

    <div class="row justify-content-center py-3">
        <div class="col-md-8 card p-0">
            <div class="card-header pb-0">
                <h2 class="font-weight-bolder mb-0">Edit Data</h2>
                <ul class="breadcrumb bg-transparent ml-n3 mt-n3 mb-0">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>admin/dashboard"><i class="fa fa-home"></i> Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>admin/slider"></i> Slider</a></li>
                    <li class="breadcrumb-item active">Edit Slider</li>
                </ul>
            </div>
            <div class="card-body">
                <div class="px-2">
                    <?php echo $this->session->flashdata('pesan'); ?>
                </div>

                <?php foreach ($slider as $detSlider) { ?>

                    <form action="<?= base_url() . 'admin/slider/update'; ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_foto" value="<?= $detSlider->id_foto ?>">

                        <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama Slider:</label>
                        <input type="text" pattern="[a-zA-Z0-9 ]{2,100}" title="Masukkan minimal 2, maksimum 100, hanya alphabet, spasi, dash dan underscore" required
                            class="form-control" name="nama" id="nama" aria-describedby="nama" placeholder="Masukkan nama..." value="<?=set_value('nama')?>">
                        <small id="nama" class="form-text text-muted">Masukkan nama slider yang sesuai</small>
                        <?php echo form_error('nama'); ?>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi Slider:</label>
                        <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3" maxlength="255" placeholder="Masukkan deskripsi..." required><?=set_value('deskripsi')?></textarea>
                        <small id="deskripsi" class="form-text text-muted">Masukkan deskripsi maksimum 255 karakter</small>
                        <?php echo form_error('deskripsi'); ?>
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto Slider</label><br>
                        <img id="prev_foto1" src="<?= base_url()?>assets/user/img/upload.png" class="img-responsive img-thumbnail" alt="Preview Image" width="300px">
                        <div class="custom-file mb-2">
                            <input type="file" class="custom-file-input" name="foto" id="foto" required>
                            <label class="custom-file-label" for="foto">Masukkan foto berukuran 753 x 258 . .</label>
                        </div>
                        <small id="foto" class="form-text text-muted">Pilihlah File foto slider berukuran 710 x 285. Max 3 MB. Format (JPG/PNG)</small>
                    </div>
                </div>
                        <div class="form-group text-center">
                            <button class="btn btn-primary px-3 mr-1" type="submit">Simpan</button>
                        </div>
                    </form>

            </div>
        </div>
    </div>


</div>

<?php } ?>