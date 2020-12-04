<div class="container-fluid">

<!-- Page Heading -->
    <div class="block-header">
        <div class="row">
            <div class="col-12">
                <h2 class="font-weight-bolder">Data Slider</h2>
                <ul class="breadcrumb bg-transparent ml-n3 mt-n4 mb-0">
                    <li class="breadcrumb-item"><a href="<?=base_url()?>admin/guide"><i class="fa fa-home"></i> Dashboard</a></li>
                    <li class="breadcrumb-item active">Slider</li>
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
            <h6 class="m-0 font-weight-bold text-primary">Data Slider</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered" id="dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Slider</th>
                        <th>Deskripsi Slider</th>
                        <th>Foto Slider</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1; foreach ($slider as $detSlider ) : ?>
                    <tr>
                        <td><?=$i?></td>
                        <td><?=$detSlider->foto?></td>
                        <td><?=$detSlider->deskripsi?></td>
                        <td><img width="150" height="150" src="<?=base_url()?>assets/user/img/slide/<?=$detSlider->file?>" alt="<?=$detSlider->foto?>" srcset="" class="img-fluid"></td>
                        <td>
                            <a class="btn mb-2 btn-primary btn-sm mr-2" href="<?=base_url()?>admin/slider/edit/<?=$detSlider->id_foto?>"><i class="fa fa-edit"></i></a>
                            <a class="btn mb-2 px-3 btn-info btn-sm mr-2" href="<?=base_url()?>admin/slider/detail/<?=$detSlider->id_foto?>"><i class="fa fa-info"></i></a>
                            <a onclick="return confirm('Apakah anda yakin ingin menghapus item ini?');" href="<?=base_url()?>admin/slider/hapus/<?=$detSlider->id_foto?>" 
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

<div class="modal fade" id="tambah_data" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <form action="<?=base_url()?>admin/slider/tambah" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bolder text-ijo">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>