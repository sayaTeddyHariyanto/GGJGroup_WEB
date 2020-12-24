<div class="container-fluid">

    <div class="row justify-content-center py-3">
        <div class="col-md-8 card p-0">
            <div class="card-header pb-0">
                <h2 class="font-weight-bolder mb-0">Form Pendaftaran Penerima</h2>
                <!--
                <ul class="breadcrumb bg-transparent ml-n3 mt-n3 mb-0">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>admin/dashboard"><i class="fa fa-home"></i> Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>admin/penerima"></i> Penerima</a></li>
                    <li class="breadcrumb-item active">Edit Penerima</li>
                </ul>-->
            </div>
            <div class="card-body">
                <div class="px-2">
                    <?php echo $this->session->flashdata('pesan'); ?>
                </div>

                <form action="<?= base_url() . 'user/pendaftaran_penerima/tambah_penerima2'; ?>" method="post">
                    <div class="form-group">
                        <label>Kategori</label>
                        <select name="nama_kategori" class="form-control selectpicker" data-live-search="true">
                            <option value="">--Pilih Kategori--</option>
                            <?php foreach ($kategori as $key) { ?>
                                <option value="<?php echo $key->id_kategori; ?>">
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
                                <option value="<?php echo $agt->id_anggota; ?>">
                                    <?php echo $agt->nama_anggota; ?>
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
                        <input type="number" pattern="[0-9]{1-32}" title="Minimum 1, isi dengan angka" required class="form-control" name="jumlah_tanggungan" id="jumlah_tanggungan" aria-describedby="jumlah_tanggungan" placeholder="Masukkan jumlah tanggungan..." value="<?= set_value('jumlah_tanggungan') ?>">
                        <small id="jumlah_tanggungan" class="form-text text-muted">Masukkan jumlah tanggungan</small>
                        <?php echo form_error('jumlah_tanggungan'); ?>
                    </div>
                    <div class="form-group">
                        <label for="jumlah_terima">Jumlah Terima:</label>
                        <input type="number" pattern="[0-9 ]{0,32}" title="Maksimum 32, isi hanya dengan angka" required class="form-control" name="jumlah_terima" id="jumlah_terima" aria-describedby="jumlah_terima" placeholder="Masukkan jumlah terima..." value="<?= set_value('jumlah_terima') ?>">
                        <small id="jumlah_terima" class="form-text text-muted">Masukkan jumlah terima</small>
                        <?php echo form_error('jumlah_terima'); ?>
                    </div>
                    <div class="form-group">
                        <label for="status_penerima">Status Penerima:</label>
                        <select class="custom-select" name="status_penerima" id="status_penerima" required>
                            <option value="" selected>Pilih Status</option>
                            <option value="1">AKTIF</option>
                            <option value="0">NONAKTIF</option>
                        </select>
                        <?php echo form_error('status_penerima'); ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Tambah</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>