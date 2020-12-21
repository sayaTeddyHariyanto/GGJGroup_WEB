<div class="container-fluid mb-5">

    <div class="row justify-content-center py-3">
        <div class="col-md-8 card p-0">
            <div class="card-header pb-0">
                <h2 class="font-weight-bolder mb-0">Detail Data</h2>
                <ul class="breadcrumb bg-transparent ml-n3 mt-n3 mb-0">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>admin/dashboard"><i class="fa fa-home"></i> Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>admin/saran"></i>Saran</a></li>
                    <li class="breadcrumb-item active">Detail Saran</li>
                </ul>
            </div>
            <div class="card-body text-center">
                <div class="px-2">
                    <?php echo $this->session->flashdata('pesan'); ?>
                </div>

                <?php foreach ($saran as $detAng) { ?>

                        <table class="table table-borderless text-left mt-1">
                            <tbody>
                                <tr>
                                    <td class="text-right" width="200px">Email saran :</td>
                                    <td ><?=$detAng->email_saran?></td>
                                </tr>
                                <tr>
                                    <td class="text-right">Saran :</td>
                                    <td ><?=$detAng->saran?></td>
                                </tr>
                            </tbody>
                        </table>

                <?php }?>

                <button onclick="window.history.go(-1); return false;" class="btn btn-danger text-white px-3 mr-1"><i class="fas fa-arrow-left mr-2"></i>Kembali</button>

            </div>
        </div>
    </div>


</div>