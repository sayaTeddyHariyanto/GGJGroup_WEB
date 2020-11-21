<div class="container-fluid mb-5">

    <div class="row justify-content-center py-3">
        <div class="col-md-8 card p-0">
            <div class="card-header pb-0">
                <h2 class="font-weight-bolder mb-0">Detail Data</h2>
                <ul class="breadcrumb bg-transparent ml-n3 mt-n3 mb-0">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>admin/dashboard"><i class="fa fa-home"></i> Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>admin/anggota"></i> Anggota</a></li>
                    <li class="breadcrumb-item active">Detail Anggota</li>
                </ul>
            </div>
            <div class="card-body">
                <div class="px-2">
                    <?php echo $this->session->flashdata('pesan'); ?>
                </div>

                <?php foreach ($anggota as $detAng) { ?>

                        <table class="table table-borderless mt-1">
                            <tbody>
                                <tr>
                                    <td class="text-right" width="200px">Nama Anggota :</td>
                                    <td ><?=$detAng->nama_anggota?></td>
                                </tr>
                                <tr>
                                    <td class="text-right">Alamat Anggota :</td>
                                    <td ><?=$detAng->alamat_anggota?></td>
                                </tr>
                                <tr>
                                    <td class="text-right">Nomor Hp Anggota :</td>
                                    <td ><?=$detAng->no_hp_anggota?></td>
                                </tr>
                                <tr>
                                    <td class="text-right">Username Anggota :</td>
                                    <td ><?=$detAng->username_anggota?></td>
                                </tr>
                                <tr>
                                    <td class="text-right">Email Anggota :</td>
                                    <td ><?=$detAng->email_anggota?></td>
                                </tr>
                                <tr>
                                    <td class="text-right">Status Anggota :</td>
                                    <td ><?=$detAng->status_anggota==1?"AKTIF":"NONAKTIF"?></td>
                                </tr>
                            </tbody>
                        </table>

                <?php }?>

            </div>
        </div>
    </div>


</div>