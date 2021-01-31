<div class="container-fluid">

    <div class="row justify-content-center py-3">
        <div class="col-md-8 card p-0">
            <div class="card-header pb-0">
                <h2 class="font-weight-bolder mb-0">Edit Profil Admin</h2>
            </div>
            <div class="card-body">
                <div class="px-2">
                    <?php echo $this->session->flashdata('pesan'); ?>
                </div>

                <?php foreach ($admin as $prfl); { ?>

                    <form action="<?= base_url() . 'admin/profile_admin/update_profil'; ?>" method="post">
                        <input type="hidden" name="id_admin" id="id_admin" value="<?= $prfl->id_admin ?>">

                        <div class="form-group">
                            <label for="nama_admin">Nama Admin:</label>
                            <input type="text" pattern="[a-zA-Z0-9]{2,100}" class="form-control" name="nama_admin" id="nama_admin" aria-describedby="nama_admin" placeholder="Masukkan nama admin..." value="<?= $prfl->nama_admin ?>">
                            <small id="nama_admin" class="form-text text-muted">Masukkan Nama Admin Tanpa Karakter Spesial</small>
                            <?php echo form_error('nama_admin'); ?>
                        </div>
                        <div class="form-group">
                            <label for="no_hp_admin">No.HP Admin:</label>
                            <input type="text" pattern="[0-9]{10-13}" class="form-control" name="no_hp_admin" id="no_hp_admin" aria-describedby="no_hp_admin" placeholder="Masukkan nomor Hp admin..." value="<?= $prfl->no_hp_admin ?>">
                            <small id="no_hp_admin" class="form-text text-muted">Masukkan No HP Admin Hanya Dengan Angka</small>
                            <?php echo form_error('no_hp_admin'); ?>
                        </div>
                        <div class="form-group">
                            <label for="alamat_admin">Alamat Admin:</label>
                            <textarea class="form-control" name="alamat_admin" id="alamat_admin" rows="3" maxlength="255" placeholder="Masukkan Alamat Admin..."><?= $prfl->alamat_admin ?></textarea>
                            <small id="alamat_admin" class="form-text text-muted">Masukkan Alamat Admin</small>
                            <?php echo form_error('alamat_admin'); ?>
                        </div>
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" pattern="[a-zA-Z]{2-32}" class="form-control" name="username" id="username" placeholder="Masukkan Username admin..." value="<?= $prfl->username ?>">
                            <small id="username" class="form-text text-muted">Masukkan username Admin</small>
                            <?php echo form_error('username'); ?>
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="password_admin" id="password_admin" placeholder="Masukkan Password Admin..." value="<?= $prfl->password_admin ?>">
                        </div>
                        <div class="form-group">
                            <label for="status">Status :</label>
                            <select class="custom-select" name="status" id="status" required>
                                <option value="" selected>Pilih Status</option>
                                <option value="1" <?= $prfl->status == '1' ? "selected" : "" ?>>AKTIF</option>
                                <option value="0" <?= $prfl->status == '0' ? "selected" : "" ?>>NONAKTIF</option>
                            </select>
                            <?php echo form_error('status'); ?>
                        </div>
                        <!--
                            <a class="btn btn-success px-3 mr-1" href="<?= base_url() ?>admin/anggota/reset_password">Reset Password</a>-->

                        <div class="form-group text-center">
                            <button class="btn btn-primary px-3 mr-1" type="submit">Simpan</button>
                        </div>
                    </form>

            </div>
        </div>
    </div>


</div>


<?php } ?>