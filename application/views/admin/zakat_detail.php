<div class="container-fluid mb-5">

    <div class="row justify-content-center py-3">
        <div class="col-md-8 card p-0">
            <div class="card-header pb-0">
                <h2 class="font-weight-bolder mb-0">Detail Data</h2>
                <ul class="breadcrumb bg-transparent ml-n3 mt-n3 mb-0">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>admin/dashboard"><i class="fa fa-home"></i> Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>admin/anggota"></i> Zakat</a></li>
                    <li class="breadcrumb-item active">Detail Zakat</li>
                </ul>
            </div>
            <div class="card-body">
                <div class="px-2">
                    <?php echo $this->session->flashdata('pesan'); ?>
                </div>

                <?php foreach ($zakat as $row_zakat) { ?>

                    <table class="table table-borderless mt-1">
                        <tbody>
                            <tr>
                                <td class="text-right" width="200px">Id Zakat :</td>
                                <td><?= $row_zakat->id_zakat ?></td>
                            </tr>
                            <tr>
                                <td class="text-right">Id Anggota :</td>
                                <td><?= $row_zakat->id_anggota ?></td>
                            </tr>
                            <tr>
                                <td class="text-right">Id Admin :</td>
                                <td><?= $row_zakat->id_admin ?></td>
                            </tr>
                            <tr>
                                <td class="text-right">Tanggal Zakat :</td>
                                <td><?= $row_zakat->tanggal_zakat ?></td>
                            </tr>
                            <tr>
                                <td class="text-right">Bulan Zakat :</td>
                                <td><?= $row_zakat->bulan_zakat ?></td>
                            </tr>
                            <tr>
                                <td class="text-right">Nominal Zakat :</td>
                                <td><?= $row_zakat->nominal_zakat ?></td>
                            </tr>
                            <tr>
                                <td class="text-right">Bukti Zakat :</td>
                                <td><?= $row_zakat->bukti_zakat ?></td>
                            </tr>
                            <tr>
                                <td class="text-right"></td>
                                <td>
                                    <div> <img src="..." class="rounded" alt="..."></div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-right">Status Zakat :</td>
                                <td><?= $row_zakat->status_zakat == 1 ? "AKTIF" : "NONAKTIF" ?></td>
                            </tr>
                            <tr>
                                <td class="text-right"></td>
                                <td>
                                    <?php
                                    if ($row_zakat->status_zakat == 1) {
                                        echo '<span name="" id="" class="btn btn-danger" role="button">Terverifikasi</span>';
                                    } else {
                                        echo '<a name="" id="" class="btn btn-primary" href="' . base_url("admin/zakat/ubah_status/$row_zakat->id_zakat") . '" role="button">Verifikasi</a>';
                                    }
                                    ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                <?php } ?>

            </div>
        </div>
    </div>


</div>