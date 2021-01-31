<div class="container-fluid">

    <!-- Page Heading -->
    <div class="block-header">
        <div class="row">
            <div class="col-12">
                <h2 class="font-weight-bolder">Daftar Penerima</h2>
                <ul class="breadcrumb bg-transparent ml-n3 mt-n4 mb-0">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>admin/guide"><i class="fa fa-home"></i> Dashboard</a></li>
                    <li class="breadcrumb-item active">Penerima</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <button class="btn btn-sm btn-success mb-2" data-toggle="modal" data-target="#tambah_data"><i class="fas fa-plus fa-sm mr-2"></i>Registrasi Penerima</button>
        </div>
    </div>

    <?php echo $this->session->flashdata('pesan'); ?>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Penerima</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kategori</th>
                            <th>Nama Anggota</th>
                            <th>Nama Penerima</th>
                            <th>Jumlah Terima</th>
                            <th>Status</th>

                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($penerima as $pnrm) : ?>
                            <tr>
                                <td><?= $i ?>.</td>
                                <td><?= $pnrm->nama_kategori ?></td>
                                <td><?= $pnrm->nama_anggota ?></td>
                                <td><?= $pnrm->nama_penerima ?></td>
                                <td><?= $pnrm->jumlah_terima ?></td>
                                <td><?php
                                    if ($pnrm->status_penerima == "0") {
                                        echo "<span class='badge badge-danger p-2'> Tidak Aktif</span>";
                                    } else {
                                        echo "<span class='badge badge-primary p-2'> Aktif</span>";
                                    }
                                    ?></td>
                                <td>
                                    <a data-toggle="tooltip" data-placement="top" title="Edit" class="btn mb-2 btn-primary btn-sm mr-2" href="<?= base_url() ?>admin/penerima/edit_penerima/<?= $pnrm->id_penerima ?>"><i class="fa fa-edit"></i></a>
                                    <a data-toggle="tooltip" data-placement="top" title="Detail" class="btn mb-2 px-3 btn-info btn-sm mr-2" href="<?= base_url() ?>admin/penerima/detail_penerima/<?= $pnrm->id_penerima ?>"><i class="fa fa-info"></i></a>
                                    <a data-toggle="tooltip" data-placement="top" title="Hapus" onclick="return confirm('Apakah anda yakin ingin menghapus item ini?');" href="<?= base_url() ?>admin/penerima/hapus_penerima/<?= $pnrm->id_penerima ?>" class="btn btn-danger mb-2 btn-sm"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php $i++;
                        endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<div class="modal fade" id="tambah_data" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <form action="<?= base_url() ?>admin/penerima/tambah_penerima" method="post">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bolder text-ijo">Registrasi Penerima</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
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
                        <input type="text" pattern="[a-zA-Z0-9 ,-_]{2,100}" title="Masukkan hanya huruf, angka dan spasi" required class="form-control" name="pekerjaan" id="pekerjaan" aria-describedby="pekerjaan" placeholder="Masukkan Pekerjaan..." value="<?= set_value('pekerjaan') ?>">
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
                        <input type="number" pattern="[0-9 ]{0,32}" title="Maksimum 32, isi hanya dengan angka" required class="form-control" name="jumlah_terima" readonly id="jumlah_terima" aria-describedby="jumlah_terima" placeholder="Masukkan jumlah terima..." value="0">
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>