<div class="container-fluid">

    <!-- Page Heading -->
    <div class="block-header">
        <div class="row">
            <div class="col-12">
                <h2 class="font-weight-bolder">Data Zakat</h2>
                <ul class="breadcrumb bg-transparent ml-n3 mt-n4 mb-0">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>admin/guide"><i class="fa fa-home"></i> Dashboard</a></li>
                    <li class="breadcrumb-item active">Zakat</li>
                </ul>
            </div>
        </div>
    </div>

    <?php echo $this->session->flashdata('pesan'); ?>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Zakat</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tgl Zakat</th>
                            <th>Id Anggota</th>
                            <th>Bulan</th>
                            <th>Nominal</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($zakat as $row_zakat) : ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $row_zakat->tanggal_zakat ?></td>
                                <td><?= $this->db->get_where('tb_anggota', ['id_anggota' => $row_zakat->id_anggota])->row()->nama_anggota; ?></td>
                                <td><?= $row_zakat->bulan_zakat ?></td>
                                <td>Rp. <?= number_format($row_zakat->nominal_zakat, 0, ',', '.') ?></td>
                                <td>
                                    <?php if($row_zakat->status_zakat != 0){
                                        if($row_zakat->status_zakat == 1){
                                            echo "<span class='badge badge-success p-2'>Terverifikasi</span>";
                                        }else{
                                            echo "<span class='badge badge-danger p-2'>Gagal Terverifikasi</span>";
                                        }
                                        
                                    }else{
                                        echo "<span class='badge badge-danger p-2'>Belum Terverifikasi</span>";
                                    }?>
                                </td>
                                <td>
                                    <a class="btn mb-2 px-3 btn-info btn-sm mr-2" href="<?= base_url() ?>admin/zakat/detail/<?= $row_zakat->id_zakat ?>"><i class="fa fa-info"></i></a>
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