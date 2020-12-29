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
            <button class="btn btn-sm btn-success mb-3" data-toggle="modal" data-target="#tambah_data"><i class="fas fa-plus fa-sm mr-2"></i>Tambah Data</button>
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
                            <th>Kategori</th>
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
                                <td><?= $i ?>.</td>
                                <td>
                                    <?php
                                        foreach ($kategori as $rowKat ) {
                                            if ($rowKat->id_kategori == $row_dis->id_kategori) {
                                                echo $rowKat->nama_kategori;
                                            }
                                        }
                                    ?>
                                </td>
                                <td><?= $row_dis->judul_distribusi ?></td>
                                <td><?= $row_dis->tanggal_distribusi ?></td>
                                <td>Rp. <?= number_format($row_dis->nominal_distribusi, 0, ',', '.') ?></td>
                                <td>
                                    <a data-toggle="tooltip" data-placement="top" title="Detail" class="btn mb-2 px-3 btn-info btn-sm mr-2" href="<?= base_url() ?>admin/distribusi/detail/<?= $row_dis->id_distribusi ?>"><i class="fa fa-info"></i></a>
                                    <a data-toggle="tooltip" data-placement="top" title="Edit" class="btn mb-2 btn-primary btn-sm mr-2" href="<?= base_url() ?>admin/distribusi/edit/<?= $row_dis->id_distribusi ?>"><i class="fa fa-edit"></i></a>
                                    <a data-toggle="tooltip" data-placement="top" title="Hapus" onclick="return confirm('Apakah anda yakin ingin menghapus item ini?');" href="<?= base_url() ?>admin/distribusi/hapus/<?= $row_dis->id_distribusi ?>" class="btn btn-danger mb-2 btn-sm"><i class="fa fa-trash"></i></a>
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
            <form action="<?= base_url() ?>admin/distribusi/tambah" method="post">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bolder text-ijo">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="status">Kategori:</label>
                        <select class="form-control selectpicker" data-live-search="true" name="kategori" id="kategori" required>
                            <option value="" selected>Pilih Kategori</option>
                            <?php foreach($kategori as $kat){?>
                            <option value="<?=$kat->id_kategori?>"><?=$kat->nama_kategori?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status">Anggota:</label>
                        <select class="form-control selectpicker" multiple data-live-search="true" name="anggota[]" id="anggota" required>
                            <option value=""></option>
                            <?php foreach($anggota as $ang){?>
                            <option value="<?=$ang->id_anggota?>"><?=$ang->nama_anggota?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status">Penerima:</label>
                        <select class="form-control selectpicker" multiple data-live-search="true" name="penerima[]" id="penerima" required>
                            <option value=""></option>
                            <?php foreach($penerima as $pnm){?>
                            <option <?=$pnm->jumlah_terima >= 3 ? "disabled class='text-danger'" : ""?>
                            value="<?=$pnm->id_penerima?>"><?=$pnm->nama_penerima?> (<?=$pnm->alamat_penerima?>/<?=$pnm->jumlah_terima?>)</option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="judul">Judul:</label>
                        <input type="text" class="form-control" pattern="[a-zA-Z0-9 ,.-]{2,100}" name="judul" id="judul"maxlength="100" placeholder="Masukkan Judul..." required value="<?= set_value('judul') ?>">
                        <small id="judul" class="form-text text-muted">Judul maksimum 100 karakter</small>
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal:</label>
                        <input type="date" required class="form-control" name="tanggal" id="tanggal">
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Nominal:</label>
                        <input type="number" required class="form-control" min="0" placeholder="Masukkan nominal distribusi zakat" name="nominal" id="nominal">
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