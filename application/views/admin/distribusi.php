<div class="container-fluid">

    <!-- Page Heading -->
    <div class="block-header">
        <div class="row">
            <div class="col-12">
                <h2 class="font-weight-bolder">Data Distribusi</h2>
                <ul class="breadcrumb bg-transparent ml-n3 mt-n4 mb-0">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>admin/guide"><i class="fa fa-home"></i> Dashboard</a></li>
                    <li class="breadcrumb-item active">Data Distribusi</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <button class="btn btn-sm btn-success mb-2" data-toggle="modal" data-target="#tambah_data"><i class="fas fa-plus fa-sm mr-2"></i>Tambah Data</button>
            <a href="<?= base_url() ?>admin/" class="btn btn-sm btn-primary mb-3"><i class="fas fa-file-pdf fa-sm mr-2"></i>Cetak Data</a>
        </div>
    </div>

    <?php echo $this->session->flashdata('pesan'); ?>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Distribusi Zakat</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Id Distribusi</th>
                            <th>Judul Distribusi</th>
                            <th>Tanggal</th>
                            <th>Nominal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($dis as $row_dis) : ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $row_dis->id_distribusi ?></td>
                                <td><?= $row_dis->judul_distribusi ?></td>
                                <td><?= $row_dis->tanggal_distribusi ?></td>
                                <td><?= $row_dis->nominal_distribusi ?></td>
                                <td>
                                    <?php
                                    if ($row_dis->status_distribusi == 1) {
                                        echo '<a class="btn mb-2 btn-danger btn-sm mr-2" href="' . base_url("admin/distribusi/ubah_status/$row_dis->id_distribusi") . '"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>';
                                    } elseif ($row_dis->status_distribusi == 0) {
                                        echo '<a class="btn mb-2 btn-success btn-sm mr-2" href="' . base_url("admin/distribusi/ubah_status2/$row_dis->id_distribusi") . '"><i class="fa fa-eye" aria-hidden="true"></i></a>';
                                    }
                                    ?>
                                    <a class="btn mb-2 btn-primary btn-sm mr-2" href="<?= base_url() ?>admin/distribusi/edit/<?= $row_dis->id_distribusi ?>"><i class="fa fa-edit"></i></a>
                                    <a onclick="return confirm('Apakah anda yakin ingin menghapus item ini?');" href="<?= base_url() ?>admin/distribusi/hapus/<?= $row_dis->id_distribusi ?>" class="btn btn-danger mb-2 btn-sm"><i class="fa fa-trash"></i></a>
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
            <form action="<?= base_url() ?>admin/dis/tambah" method="post">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bolder text-ijo">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="status">Kategori:</label>
                        <select class="custom-select" name="status" id="status" required>
                            <option value="" selected>Pilih Kategori</option>
                            <option value="1">Fakir Miskin</option>
                            <option value="2">Kaum Duafa</option>
                            <option value="3">Anak Yatim</option>
                            <option value="4">Korban Bencana</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="judul">Judul:</label>
                        <textarea class="form-control" pattern="[a-zA-Z0-9 ]{2,100}" name=" judul" id="judul" rows="3" maxlength="100" placeholder="Masukkan Judul..." required><?= set_value('judul') ?></textarea>
                        <small id="judul" class="form-text text-muted">Judul maksimum 100 karakter</small>
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal:</label>
                        <input type="date" required class="form-control" name="tanggal" id="tanggal">
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Nominal:</label>
                        <input type="number" required class="form-control" name="nominal" id="nominal">
                    </div>
                    <div class="form-group">
                        <label for="status">Status Tampil:</label>
                        <select class="custom-select" name="status" id="status" required>
                            <option value="" selected>Pilih Status</option>
                            <option value="0">PERENCANAAN</option>
                            <option value="1">SUDAH DILAKSANAKAN</option>
                        </select>
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