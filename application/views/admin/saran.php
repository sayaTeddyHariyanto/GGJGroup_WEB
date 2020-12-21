<div class="container-fluid">

    <!-- Page Heading -->
    <div class="block-header">
        <div class="row">
            <div class="col-12">
                <h2 class="font-weight-bolder">Data Saran</h2>
                <ul class="breadcrumb bg-transparent ml-n3 mt-n4 mb-0">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>admin/guide"><i class="fa fa-home"></i> Dashboard</a></li>
                    <li class="breadcrumb-item active">Saran</li>
                </ul>
            </div>
        </div>
    </div>

    <?php echo $this->session->flashdata('pesan'); ?>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Saran</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Email</th>
                            <th>Saran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($saran as $detSaran) : ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $detSaran->email_saran ?></td>
                                <td><?= $detSaran->saran ?></td>
                                <td style="width: 100px;">
                                    <a class="btn mb-2 px-3 btn-info btn-sm mr-2" data-toggle="tooltip" data-placement="top" title="Detail" href="<?= base_url() ?>admin/saran/detail/<?= $detSaran->id_saran ?>"><i class="fa fa-info"></i></a>
                                    <a onclick="return confirm('Apakah anda yakin ingin menghapus item ini?');" data-toggle="tooltip" data-placement="top" title="Hapus" href="<?= base_url() ?>admin/saran/hapus/<?= $detSaran->id_saran ?>" class="btn btn-danger mb-2 btn-sm"><i class="fa fa-trash"></i></a>
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