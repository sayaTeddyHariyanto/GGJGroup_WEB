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
                                <td>
                                    <?php if($detAng->status_anggota == 0){?>
                                    <a class="btn mb-2 btn-primary btn-sm mr-2" data-toggle="tooltip" data-placement="top" title="Aktifkan" href="<?= base_url() ?>admin/anggota/status/<?= $detAng->id_anggota ?>/1">Aktifkan</a>
                                    <?php }else{ ?>
                                    <a class="btn mb-2 btn-danger btn-sm mr-2" data-toggle="tooltip" data-placement="top" title="Non-Aktifkan" href="<?= base_url() ?>admin/anggota/status/<?= $detAng->id_anggota ?>/0">Non-Aktifkan</a>
                                    <?php }?>
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