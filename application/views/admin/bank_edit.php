<div class="container-fluid">

    <div class="row justify-content-center py-3">
        <div class="col-md-8 card p-0">
            <div class="card-header pb-0">
                <h2 class="font-weight-bolder mb-0">Edit Data</h2>
                <ul class="breadcrumb bg-transparent ml-n3 mt-n3 mb-0">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>admin/dashboard"><i class="fa fa-home"></i> Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>admin/bank"></i> Metode Pembayaran</a></li>
                    <li class="breadcrumb-item active">Edit Metode Pembayaran</li>
                </ul>
            </div>
            <div class="card-body">
                <div class="px-2">
                    <?php echo $this->session->flashdata('pesan'); ?>
                </div>

                <?php foreach ($bank as $detbank) { ?>

                    <form action="<?= base_url() . 'admin/bank/update'; ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_metode" value="<?= $detbank->id_metode ?>">

                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nama">Nama:</label>
                                <input type="text" pattern="[a-zA-Z0-9 @_-.+]{2,100}" required
                                    class="form-control" name="nama" id="nama" aria-describedby="nama" placeholder="Masukkan nama..." value="<?=$detbank->nama_metode?>">
                                <?php echo form_error('nama'); ?>
                            </div>
                            <div class="form-group">
                                <label for="nomor">Nomor:</label>
                                <input type="text" pattern="[0-9]{2,100}" required
                                    class="form-control" name="nomor" id="nomor" aria-describedby="nomor" placeholder="Masukkan nama nomor..." value="<?=$detbank->nomer_metode?>">
                                <?php echo form_error('nomor'); ?>
                            </div>
                            <div class="form-group">
                                <label for="atas_nama">Atas Nama:</label>
                                <input type="text" pattern="[a-zA-Z ]{2,100}" required
                                    class="form-control" name="atas_nama" id="atas_nama" aria-describedby="atas_nama" placeholder="Masukkan nama atas nama..." value="<?=$detbank->atas_nama?>">
                                <?php echo form_error('atas_nama'); ?>
                            </div>
                            <div class="form-group">
                                <label for="foto">Foto:</label><br>
                                <img id="prev_foto1" src="<?= base_url()?>assets/user/img/metode_pembayaran/<?=$detbank->logo_metode?>" class="img-responsive img-thumbnail mb-2" alt="Preview Image" width="300px">
                                <div class="custom-file mb-2">
                                    <input type="file" class="custom-file-input" name="foto" id="foto">
                                    <label class="custom-file-label" for="foto">Masukkan foto berukuran kurang dari 3MB</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-primary px-3 mr-1" type="submit">Simpan</button>
                        </div>
                    </form>

            </div>
        </div>
    </div>


</div>

<?php } ?>