<div class="container-fluid">

    <div class="row justify-content-center py-3">
        <div class="col-md-8 card p-0">
            <div class="card-header pb-0">
                <h2 class="font-weight-bolder mb-0">Edit Data</h2>
                <ul class="breadcrumb bg-transparent ml-n3 mt-n3 mb-0">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>admin/dashboard"><i class="fa fa-home"></i> Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>admin/penerima"></i> Penerima</a></li>
                    <li class="breadcrumb-item active">Edit Penerima</li>
                </ul>
            </div>
            <div class="card-body">
                <div class="px-2">
                    <?php echo $this->session->flashdata('pesan'); ?>
                </div>

                <?php foreach ($penerima as $pnrm) { ?>

                    <form action="<?= base_url() . 'admin/penerima/update_penerima'; ?>" method="post">
                        <input type="hidden" name="id_penerima" value="<?= $pnrm->id_penerima ?>">

                        <div class="modal-body">
                            <!--
                            <div class="form-group">
                                <label for="nama">Kategori:</label>
                                <input type="text" pattern="[a-zA-Z0-9 ]{2,100}" title="Masukkan minimal 2, maksimum 100, hanya alphabet, spasi, dash dan underscore" required class="form-control" name="nama" id="nama" aria-describedby="nama" placeholder="Masukkan nama..." value="<?= $detAng->nama_anggota ?>">
                                <small id="nama" class="form-text text-muted">Masukkan nama anggota dengan benar (tidak diperbolehkan karakter spesial)</small>
                                <?php// echo form_error('nama'); ?>
                            </div> -->
                            <div class="form-group">
                                <label>Kategori</label>
                                <select name="nama_kategori" class="form-control selectpicker" data-live-search="true">
                                    <option value="">--Pilih Kategori--</option>
                                    <?php foreach ($kategori as $key) { ?>
                                        <option <?php if ($key->id_kategori == $pnrm->id_kategori) {
                                                    echo "selected";
                                                }  ?> value="<?php echo $key->id_kategori; ?>">
                                            <?php echo $key->nama_kategori; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nama_anggota">Nama Anggota:</label>
                                <select name="nama_anggota" class="form-control selectpicker" data-live-search="true">
                                    <option value="">--Pilih Anggota--</option>
                                    <?php foreach ($anggota as $agt) { ?>
                                        <option <?php if ($agt->id_anggota == $pnrm->id_anggota) {
                                                    echo "selected";
                                                } ?> value="<?php echo $agt->id_anggota; ?>">
                                            <?php echo $agt->nama_anggota; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="nama_penerima">Nama Penerima:</label>
                                <input type="text" pattern="[a-zA-Z0-9 ]{2,100}" title="Masukkan minimal 2, maksimum 100, hanya alphabet, spasi, dash dan underscore" required class="form-control" name="nama_penerima" id="nama_penerima" aria-describedby="nama-penerima" placeholder="Masukkan nama penerima..." value="<?= $pnrm->nama_penerima ?>">
                                <small id="nama_penerima" class="form-text text-muted">Masukkan nama penerima dengan benar (tidak diperbolehkan karakter spesial)</small>
                                <?php echo form_error('nama_penerima'); ?>
                            </div>
                            <div class="form-group">
                                <label for="alamat_penerima">Alamat Penerima:</label>
                                <textarea class="form-control" name="alamat_penerima" id="alamat_penerima" rows="3" maxlength="255" placeholder="Masukkan Alamat Penerima..." required><?= $pnrm->alamat_penerima ?></textarea>
                                <small id="alamat_penerima" class="form-text text-muted">Masukkan alamat penerima maksimum 255 karakter</small>
                                <?php echo form_error('alamat_penerima'); ?>
                            </div>
                            <div class="form-group">
                                <label for="pekerjaan">Pekerjaan:</label>
                                <input type="text" pattern="[a-zA-Z]{2,100}" title="Masukkan hanya huruf, minimal 2, maksimal 100" required class="form-control" name="pekerjaan" id="pekerjaan" placeholder="Masukkan pekerjaan penerima..." value="<?= $pnrm->pekerjaan ?>">
                                <small id="pekerjaan" class="form-text text-muted">Masukkan pekerjaan penerima dengan benar (hanya huruf)</small>
                                <?php echo form_error('pekerjaan'); ?>
                            </div>
                            <div class="form-group">
                                <label for="jumlah_tanggungan">Jumlah Tanggungan</label>
                                <input type="text" pattern="[0-9]{1-32}" title="Minimum 1. Hanya dengan angka" required class="form-control" name="jumlah_tanggungan" id="jumlah_tanggungan" placeholder="Masukkan jumlah tanggungan..." value="<?= $pnrm->jumlah_tanggungan ?>">
                                <small id="jumlah_tanggungan" class="form-text text-muted">Masukkan jumlah tanggungan</small>
                                <?php echo form_error('jumlah_tanggungan'); ?>
                            </div>
                            <div class="form-group">
                                <label for="jumlah_terima">Jumlah Terima</label>
                                <input readonly type="text" pattern="[0-9 ]{0,32}" title="Maksimum 32, Hanya Angka" required class="form-control" name="jumlah_terima" id="jumlah_terima" placeholder="Masukkan Jumlah Terima..." value="<?= $pnrm->jumlah_terima ?>">
                                <small id="jumlah_terima" class="form-text text-muted">Masukkan jumlah terima</small>
                                <?php echo form_error('jumlah_terima'); ?>
                            </div>
                            <div class="form-group">
                                <label for="status_penerima">Status Penerima:</label>
                                <select class="custom-select" name="status_penerima" id="status_penerima" required>
                                    <option value="" selected>Pilih Status</option>
                                    <option value="1" <?= $pnrm->status_penerima == '1' ? "selected" : "" ?>>AKTIF</option>
                                    <option value="0" <?= $pnrm->status_penerima == '0' ? "selected" : "" ?>>NONAKTIF</option>
                                </select>
                                <?php echo form_error('status_penerima'); ?>
                            </div>
                            <!--
                            <a class="btn btn-success px-3 mr-1" href="<?= base_url() ?>admin/anggota/reset_password">Reset Password</a>-->
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