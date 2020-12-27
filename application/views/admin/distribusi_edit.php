<div class="container-fluid">

    <div class="row justify-content-center py-3">
        <div class="col-md-8 card p-0">
            <div class="card-header pb-0">
                <h2 class="font-weight-bolder mb-0">Edit Data</h2>
                <ul class="breadcrumb bg-transparent ml-n3 mt-n3 mb-0">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>admin/dashboard"><i class="fa fa-home"></i> Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>admin/distribusi"></i> Distribusi</a></li>
                    <li class="breadcrumb-item active">Edit Distribusi Zakat</li>
                </ul>
            </div>
            <div class="card-body">
                <div class="px-2">
                    <?php echo $this->session->flashdata('pesan'); ?>
                </div>

                <?php foreach ($dis as $detDis) { ?>

                    <form action="<?= base_url() . 'admin/distribusi/update'; ?>" method="post">
                        <input type="hidden" name="id_distribusi" value="<?= $detDis->id_distribusi ?>">

                        <div class="modal-body">
                            <div class="form-group">
                                <label for="status">Kategori:</label>
                                <select class="form-control selectpicker" data-live-search="true" name="kategori" id="kategori" required>
                                    <option value="" selected>Pilih Kategori</option>
                                    <?php foreach($kategori as $kat){?>
                                    <option value="<?=$kat->id_kategori?>" <?=$kat->id_kategori == $detDis->id_kategori ? "selected" : ""?>><?=$kat->nama_kategori?></option>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="status">Anggota:</label>
                                <select class="form-control selectpicker" multiple data-live-search="true" name="anggota[]" id="anggota" required>
                                    <option value=""></option>
                                    <?php foreach($anggota as $ang){?>
                                    <option value="<?=$ang->id_anggota?>"
                                    <?php
                                    foreach($det_anggota as $detAng){
                                        echo $detAng->id_anggota == $ang->id_anggota ? "selected" : "";
                                    }
                                    ?>
                                    ><?=$ang->nama_anggota?></option>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="status">Penerima:</label>
                                <select class="form-control selectpicker" multiple data-live-search="true" name="penerima[]" id="penerima" required>
                                    <option value=""></option>
                                    <?php foreach($penerima as $pnm){?>
                                    <option value="<?=$pnm->id_penerima?>"
                                    <?php
                                    foreach($det_penerima as $detPnm){
                                        echo $detPnm->id_penerima == $pnm->id_penerima ? "selected" : "";
                                    }
                                    ?>
                                    ><?=$pnm->nama_penerima?></option>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="judul">Judul:</label>
                                <input type="text" class="form-control" pattern="[a-zA-Z0-9 ,.-]{2,100}" name="judul" id="judul"maxlength="100" placeholder="Masukkan Judul..." required value="<?=$detDis->judul_distribusi?>">
                                <small id="judul" class="form-text text-muted">Judul maksimum 100 karakter</small>
                            </div>
                            <div class="form-group">
                                <label for="tanggal">Tanggal:</label>
                                <input type="date" required class="form-control" value="<?=$detDis->tanggal_distribusi?>" name="tanggal" id="tanggal">
                            </div>
                            <div class="form-group">
                                <label for="tanggal">Nominal:</label>
                                <input type="number" required class="form-control" value="<?=$detDis->nominal_distribusi?>" min="0" placeholder="Masukkan nominal distribusi zakat" name="nominal" id="nominal">
                            </div>
                            <div class="form-group">
                                <label for="status">Status Tampil:</label>
                                <select class="custom-select" name="status" id="status" required>
                                    <option value="" selected>Pilih Status</option>
                                    <option value="0" <?=$detDis->status_distribusi == 0 ? "selected" : ""?>>PERENCANAAN</option>
                                    <option value="1" <?=$detDis->status_distribusi == 1 ? "selected" : ""?>>SUDAH DILAKSANAKAN</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-primary px-3 mr-1" type="submit">Simpan</button>
                            <a class="btn btn-secondary" href="<?=base_url()?>admin/distribusi" role="button"><i class="fas fa-arrow-left mr-2"></i>Kembali</a>
                        </div>
                    </form>

            </div>
        </div>
    </div>


</div>

<?php } ?>