<div class="container-fluid">

<!-- Page Heading -->
    <div class="block-header">
        <div class="row">
            <div class="col-12">
                <h2 class="font-weight-bolder">Data Kontak</h2>
                <ul class="breadcrumb bg-transparent ml-n3 mt-n4 mb-0">
                    <li class="breadcrumb-item"><a href="<?=base_url()?>admin/guide"><i class="fa fa-home"></i> Dashboard</a></li>
                    <li class="breadcrumb-item active">Kontak</li>
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
            <h6 class="m-0 font-weight-bold text-primary">Data Kontak</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered" id="dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Sosial Media</th>
                        <th>Nama Akun</th>
                        <th>Link Akun</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1; foreach ($kontak as $detKontak ) : ?>
                    <tr>
                        <td><?=$i?></td>
                        <td><?=$detKontak->nama_sosmed?></td>
                        <td><?=$detKontak->nama_akun?></td>
                        <td><?=$detKontak->link_akun?></td>
                        <td>
                            <a class="btn mb-2 btn-primary btn-sm mr-2" href="<?=base_url()?>admin/kontak/edit/<?=$detKontak->id_kontak?>"><i class="fa fa-edit"></i></a>
                            <a class="btn mb-2 px-3 btn-info btn-sm mr-2" href="<?=base_url()?>admin/kontak/detail/<?=$detKontak->id_kontak?>"><i class="fa fa-info"></i></a>
                            <a onclick="return confirm('Apakah anda yakin ingin menghapus item ini?');" href="<?=base_url()?>admin/kontak/hapus/<?=$detKontak->id_kontak?>" 
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
            <form action="<?=base_url()?>admin/kontak/tambah" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bolder text-ijo">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                    <label for="nama">Nama Sosial Media</label>
                        <select required name="nama" id="nama" class="form-control mb-3" placeholder="Masukkan Sosial Media . ." aria-describedby="nama">
                        <option value=""> Mohon pilih Sosmed Anda </option>
                        <option value="Whatsapp"> Whatsapp </option>
                        <option value="Instagram"> Instagram </option>
                        <option value="Facebook"> Facebook </option>
                        <option value="Twitter"> Twitter </option>
                        </select>
                    <small id="nama" class="text-muted">Pilih Jenis Sosmed Anda.</small>
                    </div>
                    <div class="form-group">
                        <label for="akun">Nama Akun:</label>
                        <input type="text" pattern="[a-zA-Z0-9 @_-.+]{2,100}" required
                            class="form-control" name="akun" id="akun" aria-describedby="akun" placeholder="Masukkan nama akun..." value="<?=set_value('akun')?>">
                        <small id="akun" class="form-text text-muted">Masukkan nama akun yang sesuai</small>
                        <?php echo form_error('akun'); ?>
                    </div>
                    <div class="form-group">
                        <label for="link">Link Akun:</label>
                        <input type="text" required
                            class="form-control" name="link" id="link" aria-describedby="link" placeholder="Masukkan link akun..." value="<?=set_value('link')?>">
                        <small id="link" class="form-text text-muted">Masukkan link akun yang sesuai</small>
                        <?php echo form_error('link'); ?>
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