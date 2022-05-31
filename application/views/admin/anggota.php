<div class="container-fluid">

    <!-- Page Heading -->
    <div class="block-header">
        <div class="row">
            <div class="col-12">
                <h2 class="font-weight-bolder">Data Anggota</h2>
                <ul class="breadcrumb bg-transparent ml-n3 mt-n4 mb-0">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>admin/guide"><i class="fa fa-home"></i> Dashboard</a></li>
                    <li class="breadcrumb-item active">Anggota</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <button class="btn btn-sm btn-success mb-3" data-toggle="modal" data-target="#tambah_data"><i class="fas fa-plus fa-sm mr-2"></i>Tambah Data</button>
            <a href="<?= base_url() ?>admin/anggota/printpdf" class="btn btn-sm btn-primary mb-3"><i class="fas fa-file-pdf fa-sm mr-2"></i>Cetak Data</a>
        </div>
    </div>

    <?php echo $this->session->flashdata('pesan'); ?>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Anggota</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No Hp</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($anggota as $detAng) : ?>
                            <tr>
                                <td><?= $i ?>.</td>
                                <td><?= $detAng->nama_anggota ?></td>
                                <td><?= $detAng->alamat_anggota ?></td>
                                <td><?= $detAng->no_hp_anggota ?></td>
                                <td class="text-center">
                                    <?php if($detAng->status_anggota == 1){?>
                                    <span class="badge badge-primary p-1">Aktif</span>
                                    <?php }else{ ?>
                                    <span class="badge badge-danger">Non-Aktif</span>
                                    <?php }?>
                                    </td>
                                <td>
                                    <a class="btn mb-2 btn-primary btn-sm mr-2" data-toggle="tooltip" data-placement="top" title="Edit" href="<?= base_url() ?>admin/anggota/edit/<?= $detAng->id_anggota ?>"><i class="fa fa-edit"></i></a>
                                    <a class="btn mb-2 px-3 btn-info btn-sm mr-2" data-toggle="tooltip" data-placement="top" title="Detail" href="<?= base_url() ?>admin/anggota/detail/<?= $detAng->id_anggota ?>"><i class="fa fa-info"></i></a>
                                    <a onclick="return confirm('Apakah anda yakin ingin menghapus item ini?');" data-toggle="tooltip" data-placement="top" title="Hapus" href="<?= base_url() ?>admin/anggota/hapus/<?= $detAng->id_anggota ?>" class="btn btn-danger mb-2 btn-sm"><i class="fa fa-trash"></i></a>
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
            <form action="<?= base_url() ?>admin/anggota/tambah" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama:</label>
                        <input type="text" pattern="[a-zA-Z0-9 ]{2,100}" title="Masukkan minimal 2, maksimum 100, hanya alphabet, spasi, dash dan underscore" required class="form-control" name="nama" id="nama" aria-describedby="nama" placeholder="Masukkan nama..." value="<?= set_value('nama') ?>">
                        <small id="nama" class="form-text text-muted">Masukkan nama anggota dengan benar (tidak diperbolehkan karakter spesial)</small>
                        <?php echo form_error('nama'); ?>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat:</label>
                        <textarea class="form-control" name="alamat" id="alamat" rows="3" maxlength="255" placeholder="Masukkan Alamat..." required><?= set_value('alamat') ?></textarea>
                        <small id="alamat" class="form-text text-muted">Masukkan alamat maksimum 255 karakter</small>
                        <?php echo form_error('alamat'); ?>
                    </div>
                    <div class="form-group">
                        <label for="no_hp">Nomor HP:</label>
                        <input type="text" pattern="[0-9]{11,13}" title="Masukkan hanya angka, minimal 11, maksimal 13" required class="form-control" name="no_hp" id="no_hp" aria-describedby="no_hp" placeholder="Masukkan Nomor Hp..." value="<?= set_value('no_hp') ?>">
                        <small id="no_hp" class="form-text text-muted">Masukkan Nomor Hp anggota dengan benar (hanya angka)</small>
                        <?php echo form_error('no_hp'); ?>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" title="Masukkan email yang valid" required class="form-control" name="email" id="email" aria-describedby="email" placeholder="Masukkan Alamat Email..." value="<?= set_value('email') ?>">
                        <small id="email" class="form-text text-muted">Masukkan alamat email yang valid</small>
                        <?php echo form_error('email'); ?>
                    </div>
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" pattern="[a-zA-Z0-9 ]{2,32}" title="Masukkan minimal 2, maksimum 32, hanya alphabet, spasi, dash dan underscore" required class="form-control" name="username" id="username" aria-describedby="username" placeholder="Masukkan Username..." value="<?= set_value('username') ?>">
                        <small id="username" class="form-text text-muted">Masukkan Username anggota dengan benar</small>
                        <?php echo form_error('username'); ?>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" name="password" pattern="{8,}" id="password" aria-describedby="password" placeholder="Masukkan Password..." value="<?= set_value('password') ?>">
                        <small id="password" class="form-text text-muted">Masukkan Password minimal 8</small>
                        <?php echo form_error('password'); ?>
                    </div>
                    <div class="form-group">
                        <label for="status">Status:</label>
                        <select class="custom-select" name="status" id="status" required>
                            <option value="" selected>Pilih Status</option>
                            <option value="1">AKTIF</option>
                            <option value="0">NONAKTIF</option>
                        </select>
                        <?php echo form_error('status'); ?>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>