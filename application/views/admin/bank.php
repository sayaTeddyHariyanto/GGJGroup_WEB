<div class="container-fluid">

<!-- Page Heading -->
    <div class="block-header">
        <div class="row">
            <div class="col-12">
                <h2 class="font-weight-bolder">Data Bank</h2>
                <ul class="breadcrumb bg-transparent ml-n3 mt-n4 mb-0">
                    <li class="breadcrumb-item"><a href="<?=base_url()?>admin/guide"><i class="fa fa-home"></i> Dashboard</a></li>
                    <li class="breadcrumb-item active">Bank</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <button class="btn btn-sm btn-success mb-2" data-toggle="modal" data-target="#tambah_data"><i class="fas fa-plus fa-sm mr-2"></i>Tambah Data</button>
        </div>
    </div>

    <?php echo $this->session->flashdata('pesan'); ?>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Bank</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered" id="dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Nomor</th>
                        <th>Atas Nama</th>
                        <th>Logo</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1; foreach ($bank as $detbank ) : ?>
                    <tr>
                        <td><?=$i?></td>
                        <td><?=$detbank->nama_metode?></td>
                        <td><?=$detbank->nomer_metode?></td>
                        <td><?=$detbank->atas_nama?></td>
                        <td><img max-width="250" width="200" src="<?=base_url()?>assets/user/img/metode_pembayaran/<?=$detbank->logo_metode?>" alt="Logo <?=$detbank->nama_metode?>"></td>
                        <td>
                            <a class="btn mb-2 btn-primary btn-sm mr-2" href="<?=base_url()?>admin/bank/edit/<?=$detbank->id_metode?>"><i class="fa fa-edit"></i></a>
                            <a onclick="return confirm('Apakah anda yakin ingin menghapus item ini?');" href="<?=base_url()?>admin/bank/hapus/<?=$detbank->id_metode?>" 
                                class="btn btn-danger mb-2 btn-sm"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php $i++; endforeach;?>
                </tbody>
            </table>
            </div>
        </div>
    </div>

</div>
</div>

<div class="modal fade" id="tambah_data" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <form action="<?=base_url()?>admin/bank/tambah" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bolder text-ijo">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama:</label>
                        <input type="text" pattern="[a-zA-Z0-9 @_-.+]{2,100}" required
                            class="form-control" name="nama" id="nama" aria-describedby="nama" placeholder="Masukkan nama..." value="<?=set_value('nama')?>">
                        <?php echo form_error('nama'); ?>
                    </div>
                    <div class="form-group">
                        <label for="nomor">Nomor:</label>
                        <input type="text" pattern="[0-9]{2,100}" required
                            class="form-control" name="nomor" id="nomor" aria-describedby="nomor" placeholder="Masukkan nama nomor..." value="<?=set_value('nomor')?>">
                        <?php echo form_error('nomor'); ?>
                    </div>
                    <div class="form-group">
                        <label for="atas_nama">Atas Nama:</label>
                        <input type="text" pattern="[a-zA-Z ]{2,100}" required
                            class="form-control" name="atas_nama" id="atas_nama" aria-describedby="atas_nama" placeholder="Masukkan nama atas nama..." value="<?=set_value('atas_nama')?>">
                        <?php echo form_error('atas_nama'); ?>
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto:</label><br>
                        <img id="prev_foto1" src="<?= base_url()?>assets/user/img/upload.png" class="img-responsive img-thumbnail mb-2" alt="Preview Image" width="300px">
                        <div class="custom-file mb-2">
                            <input type="file" class="custom-file-input" name="foto" id="foto" required>
                            <label class="custom-file-label" for="foto">Masukkan foto berukuran kurang dari 3MB</label>
                        </div>
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