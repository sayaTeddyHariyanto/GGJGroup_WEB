<div class="container-fluid">

    <div class="row justify-content-center py-3">
        <div class="col-md-8 card p-0">
            <div class="card-header pb-0">
                <h2 class="font-weight-bolder mb-0">Edit Data</h2>
                <ul class="breadcrumb bg-transparent ml-n3 mt-n3 mb-0">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>admin/dashboard"><i class="fa fa-home"></i> Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>admin/kontak"></i> Kontak</a></li>
                    <li class="breadcrumb-item active">Edit Kontak</li>
                </ul>
            </div>
            <div class="card-body">
                <div class="px-2">
                    <?php echo $this->session->flashdata('pesan'); ?>
                </div>

                <?php foreach ($kontak as $detKontak) { ?>

                    <form action="<?= base_url() . 'admin/kontak/update'; ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_kontak" value="<?= $detKontak->id_kontak ?>">

                    <div class="modal-body">
                        <div class="form-group">
                        <label for="nama">Nama Sosial Media</label>
                            <select required name="nama" id="nama" class="form-control mb-3" placeholder="Masukkan Sosial Media . ." aria-describedby="nama">
                            <option value=""> Mohon pilih Sosmed Anda </option>
                            <option value="Whatsapp"> Whatsapp </option>
                            <option value="Instagram"> Instagram </option>
                            <option value="Facebook"> Facebook </option>
                            <option value="Twitter"> Twitter </option>
                            </select>
                        <small id="nama" class="text-muted">Pilih Jenis Sosmed Anda.</small>
                        </div>
                        <div class="form-group">
                            <label for="akun">Nama Akun:</label>
                            <input type="text" pattern="[a-zA-Z0-9 ]{2,100}" required
                                class="form-control" name="akun" id="akun" aria-describedby="akun" placeholder="Masukkan nama akun..." value="<?=set_value('akun')?>">
                            <small id="akun" class="form-text text-muted">Masukkan nama akun yang sesuai</small>
                            <?php echo form_error('akun'); ?>
                        </div>
                        <div class="form-group">
                            <label for="link">Link Akun:</label>
                            <input type="text" required
                                class="form-control" name="link" id="link" aria-describedby="link" placeholder="Masukkan link akun..." value="<?=set_value('link')?>">
                            <small id="link" class="form-text text-muted">Masukkan link akun yang sesuai</small>
                            <?php echo form_error('link'); ?>
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