<div class="container-fluid mb-5">

    <div class="row justify-content-center py-3">
        <div class="col-md-8 card p-0">
            <div class="card-header pb-0">
                <h2 class="font-weight-bolder mb-0">Detail Data</h2>
                <ul class="breadcrumb bg-transparent ml-n3 mt-n3 mb-0">
                    <li class="breadcrumb-item active">Profil Admin</li>
                </ul>
            </div>
            <div class="card-body">
                <div class="px-2">
                    <?php echo $this->session->flashdata('pesan'); ?>
                </div>

                <?php foreach ($admin as $adm) { ?>

                    <table class="table table-borderless mt-1">
                        <tbody>
                            <tr>
                                <td class="text-right" width="200px">Nama Admin :</td>
                                <td><?= $adm->nama_admin ?></td>
                            </tr>
                            <tr>
                                <td class="text-right">No.HP Admin :</td>
                                <td><?= $adm->no_hp_admin ?></td>
                            </tr>
                            <tr>
                                <td class="text-right">Nomor Hp Admin :</td>
                                <td><?= $adm->no_hp_admin ?></td>
                            </tr>
                            <tr>
                                <td class="text-right">Alamat Admin :</td>
                                <td><?= $adm->alamat_admin ?></td>
                            </tr>
                            <tr>
                                <td class="text-right">Username Admin :</td>
                                <td><?= $adm->username ?></td>
                            </tr>
                            <tr>
                                <td class="text-right">Status Admin :</td>
                                <td><?= $adm->status == 1 ? "AKTIF" : "NONAKTIF" ?></td>
                            </tr>
                        </tbody>
                    </table>

                <?php } ?>

            </div>
        </div>
    </div>


</div>