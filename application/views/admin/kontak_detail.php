<div class="container-fluid mb-5">

    <div class="row justify-content-center py-3">
        <div class="col-md-8 card p-0">
            <div class="card-header pb-0">
                <h2 class="font-weight-bolder mb-0">Detail Data</h2>
                <ul class="breadcrumb bg-transparent ml-n3 mt-n3 mb-0">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>admin/dashboard"><i class="fa fa-home"></i> Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>admin/kontak"></i> Kontak</a></li>
                    <li class="breadcrumb-item active">Detail Kontak</li>
                </ul>
            </div>
            <div class="card-body">
                <div class="px-2">
                    <?php echo $this->session->flashdata('pesan'); ?>
                </div>

                <?php foreach ($kontak as $detKontak) { ?>

                        <table class="table table-borderless mt-1">
                            <tbody>
                                <tr>
                                    <td class="text-right" width="200px">Nama Sosial Media :</td>
                                    <td ><?=$detKontak->nama_sosmed?></td>
                                </tr>
                                <tr>
                                    <td class="text-right">Nama Akun :</td>
                                    <td ><?=$detKontak->nama_akun?></td>
                                </tr>
                                <tr>
                                    <td class="text-right">Link Akun :</td>
                                    <td ><?=$detKontak->link_akun?></td>
                                </tr>
                            </tbody>
                        </table>

                <?php }?>

            </div>
        </div>
    </div>
    </div>


</div>