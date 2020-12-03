<div class="container-fluid">

    <div class="row justify-content-center py-3">
        <div class="col-md-8 card p-0">
            <div class="card-header pb-0">
                <h2 class="font-weight-bolder mb-0">Edit Data</h2>
                <ul class="breadcrumb bg-transparent ml-n3 mt-n3 mb-0">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>admin/dashboard"><i class="fa fa-home"></i> Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>admin/jadwal"></i>Jadwal Kegiatan</a></li>
                    <li class="breadcrumb-item active">Edit Jadwal Kegiatan</li>
                </ul>
            </div>
            <div class="card-body">
                <div class="px-2">
                    <?php echo $this->session->flashdata('pesan'); ?>
                </div>

                <?php foreach ($jadwal as $row_jadwal) { ?>

                    <form action="<?= base_url() . 'admin/jadwal/update'; ?>" method="post">
                        <input type="hidden" name="id_kegiatan" value="<?= $row_jadwal->id_kegiatan ?>">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="tanggal">Ubah Tanggal</label>
                                <input type="date" required class="form-control" name="tanggal" id="tanggal" value="<?= $row_jadwal->tanggal_kegiatan ?>">
                            </div>
                            <div class="form-group">
                                <label for="judul">Ubah Judul</label>
                                <input type="text" pattern="[a-zA-Z0-9 ]{2,100}" title="Masukkan minimal 2, maksimum 100, hanya alphabet, spasi, dash dan underscore" required class="form-control" name="judul" value="<?= $row_jadwal->judul ?>">
                            </div>
                            <div class="form-group">
                                <label for="status">Ubah Status Tampil:</label>
                                <select class="custom-select" name="status" id="status" required>
                                    <option value="" selected>Ubah Status Tampil</option>
                                    <option value="1" <?= $row_jadwal->status_kegiatan == '1' ? "selected" : "" ?>>AKTIF</option>
                                    <option value="0" <?= $row_jadwal->status_kegiatan == '0' ? "selected" : "" ?>>NONAKTIF</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <a class="btn btn-primary px-3 mr-1" href="<?= base_url() ?>admin/jadwal">Kembali</a>
                            <button class="btn btn-success px-3 mr-1" type="submit">Simpan</button>
                        </div>
                    </form>

            </div>
        </div>
    </div>


</div>

<?php } ?>