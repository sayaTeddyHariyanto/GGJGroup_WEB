<div class="container-fluid mb-5">

    <div class="row justify-content-center py-3">
        <div class="col-md-8 card p-0">
            <div class="card-header pb-0">
                <h2 class="font-weight-bolder mb-0">Detail Data</h2>
                <ul class="breadcrumb bg-transparent ml-n3 mt-n3 mb-0">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>admin/dashboard"><i class="fa fa-home"></i> Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>admin/slider"></i> Slider</a></li>
                    <li class="breadcrumb-item active">Detail Slider</li>
                </ul>
            </div>
            <div class="card-body">
                <div class="px-2">
                    <?php echo $this->session->flashdata('pesan'); ?>
                </div>

                <?php foreach ($slider as $detSlider) { ?>

                        <table class="table table-borderless mt-1">
                            <tbody>
                                <tr>
                                    <td class="text-right" width="200px">Nama Slider :</td>
                                    <td ><?=$detSlider->foto?></td>
                                </tr>
                                <tr>
                                    <td class="text-right">Deskripsi Slider :</td>
                                    <td ><?=$detSlider->deskripsi?></td>
                                </tr>
                                <tr>
                                    <td class="text-right">Foto Slider :</td>
                                    <td ><img src="<?=base_url()?>assets/user/img/slide/<?=$detSlider->file?>" alt="Foto Slider" class="img-fluid"></td>
                                </tr>
                            </tbody>
                        </table>

                <?php }?>

            </div>
        </div>
    </div>
    </div>


</div>