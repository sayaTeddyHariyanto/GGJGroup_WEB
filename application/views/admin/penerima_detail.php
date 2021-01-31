<div class="container-fluid mb-5">

    <div class="row justify-content-center py-3">
        <div class="col-md-8 card p-0">
            <div class="card-header pb-0">
                <h2 class="font-weight-bolder mb-0">Detail Data</h2>
                <ul class="breadcrumb bg-transparent ml-n3 mt-n3 mb-0">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>admin/dashboard"><i class="fa fa-home"></i> Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>admin/penerima"></i> Penerima</a></li>
                    <li class="breadcrumb-item active">Detail Penerima</li>
                </ul>
            </div>
            <div class="card-body">
                <div class="px-2">
                    <?php echo $this->session->flashdata('pesan'); ?>
                </div>
                
                <?php foreach ($penerima as $pnrm) { ?>

                    <table class="table table-borderless mt-1">
                        <tbody>
                            <tr>
                                <td class="text-right" width="200px">Nama Anggota :</td>
                                <td><?= $pnrm->nama_anggota ?></td>
                            </tr>
                            <tr>
                                <td class="text-right" width="200px">Kategori :</td>
                                <td><?= $pnrm->nama_kategori ?></td>
                            </tr>
                            <tr>
                                <td class="text-right" width="200px">Nama Penerima :</td>
                                <td><?= $pnrm->nama_penerima ?></td>
                            </tr>
                            <tr>
                                <td class="text-right">Alamat Penerima :</td>
                                <td><?= $pnrm->alamat_penerima ?></td>
                            </tr>
                            <tr>
                                <td class="text-right">Pekerjaan :</td>
                                <td><?= $pnrm->pekerjaan ?></td>
                            </tr>
                            <tr>
                                <td class="text-right">Jumlah Tanggungan :</td>
                                <td><?= $pnrm->jumlah_tanggungan ?></td>
                            </tr>
                            <tr>
                                <td class="text-right">Jumlah Terima :</td>
                                <td><?= $pnrm->jumlah_terima ?></td>
                            </tr>
                            <tr>
                                <td class="text-right">Status Penerima :</td>
                                <td><?= $pnrm->status_penerima == 1 ? "AKTIF" : "NONAKTIF" ?></td>
                            </tr>
                        </tbody>
                    </table>

                <?php } ?>

            </div>
        </div>
    </div>


</div>