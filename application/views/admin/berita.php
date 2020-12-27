<div class="container-fluid">

    <!-- Page Heading -->
    <div class="block-header">
        <div class="row">
            <div class="col-12">
                <h2 class="font-weight-bolder">Data Berita Kegiatan</h2>
                <ul class="breadcrumb bg-transparent ml-n3 mt-n4 mb-0">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>admin/guide"><i class="fa fa-home"></i> Dashboard</a></li>
                    <li class="breadcrumb-item active">Berita</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <a href="<?= base_url() ?>admin/berita/add" class="btn btn-sm btn-success mb-2" ><i class="fas fa-plus fa-sm mr-2"></i>Tambah Data</a>
        </div>
    </div>

    <?php echo $this->session->flashdata('pesan'); ?>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Berita</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($berita as $row_berita) : ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td width="250px"><?= $row_berita->judul_berita ?></td>
                                <td><?= $row_berita->deskripsi ?></td>
                                <td width="150px"><?= $row_berita->tanggal_berita ?></td>
                                <td width="150px">
                                    <?php
                                    if ($row_berita->status_berita == 1) {
                                        echo '<a data-toggle="tooltip" data-placement="top" title="Sembunyikan" class="btn mb-2 btn-danger btn-sm mr-2" href="' . base_url("admin/berita/ubah_status/$row_berita->id_berita") . '"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>';
                                    } elseif ($row_berita->status_berita == 0) {
                                        echo '<a data-toggle="tooltip" data-placement="top" title="Tampilkan" class="btn mb-2 btn-success btn-sm mr-2" href="' . base_url("admin/berita/ubah_status2/$row_berita->id_berita") . '"><i class="fa fa-eye" aria-hidden="true"></i></a>';
                                    }
                                    ?>
                                    <a data-toggle="tooltip" data-placement="top" title="Edit" class="btn mb-2 btn-primary btn-sm mr-2" href="<?= base_url() ?>admin/berita/edit/<?= $row_berita->id_berita ?>"><i class="fa fa-edit"></i></a>
                                    <a data-toggle="tooltip" data-placement="top" title="Hapus" onclick="return confirm('Apakah anda yakin ingin menghapus item ini?');" href="<?= base_url() ?>admin/berita/hapus/<?= $row_berita->id_berita ?>" class="btn btn-danger mb-2 btn-sm"><i class="fa fa-trash"></i></a>
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
