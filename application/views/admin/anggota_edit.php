<div class="container-fluid">

    <div class="row justify-content-center py-3">
        <div class="col-md-8 card p-0">
            <div class="card-header pb-0">
                <h2 class="font-weight-bolder mb-0">Edit Data</h2>
                <ul class="breadcrumb bg-transparent ml-n3 mt-n3 mb-0">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>admin/dashboard"><i class="fa fa-home"></i> Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>admin/anggota"></i> Anggota</a></li>
                    <li class="breadcrumb-item active">Edit Anggota</li>
                </ul>
            </div>
            <div class="card-body">
                <div class="px-2">
                    <?php echo $this->session->flashdata('pesan'); ?>
                </div>

                <?php foreach ($anggota as $detAng) { ?>

                    <form action="<?= base_url() . 'admin/anggota/update'; ?>" method="post">
                        <input type="hidden" name="id_anggota" value="<?= $detAng->id_anggota ?>">

                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nama">Nama:</label>
                                <input type="text" pattern="[a-zA-Z0-9 ]{2,100}" title="Masukkan minimal 2, maksimum 100, hanya alphabet, spasi, dash dan underscore" required
                                    class="form-control" name="nama" id="nama" aria-describedby="nama" placeholder="Masukkan nama..." value="<?=$detAng->nama_anggota?>">
                                <small id="nama" class="form-text text-muted">Masukkan nama anggota dengan benar (tidak diperbolehkan karakter spesial)</small>
                                <?php echo form_error('nama'); ?>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat:</label>
                                <textarea class="form-control" name="alamat" id="alamat" rows="3" maxlength="255" placeholder="Masukkan Alamat..." required><?=$detAng->alamat_anggota?></textarea>
                                <small id="nama" class="form-text text-muted">Masukkan alamat maksimum 255 karakter</small>
                                <?php echo form_error('alamat'); ?>
                            </div>
                            <div class="form-group">
                                <label for="no_hp">Nomor HP:</label>
                                <input type="text" pattern="[0-9]{11,13}" title="Masukkan hanya angka, minimal 11, maksimal 13" required
                                    class="form-control" name="no_hp" id="no_hp" aria-describedby="no_hp" placeholder="Masukkan Nomor Hp..." value="<?=$detAng->no_hp_anggota?>">
                                <small id="no_hp" class="form-text text-muted">Masukkan Nomor Hp anggota dengan benar (hanya angka)</small>
                                <?php echo form_error('no_hp'); ?>
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" title="Masukkan email yang valid" required
                                    class="form-control" name="email" id="email" aria-describedby="email" placeholder="Masukkan Alamat Email..." value="<?=$detAng->email_anggota?>">
                                <small id="email" class="form-text text-muted">Masukkan alamat email yang valid</small>
                                <?php echo form_error('email'); ?>
                            </div>
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" pattern="[a-zA-Z0-9 ]{2,32}" title="Masukkan minimal 2, maksimum 32, hanya alphabet, spasi, dash dan underscore" required
                                    class="form-control" name="username" id="username" aria-describedby="username" placeholder="Masukkan Username..." value="<?=$detAng->username_anggota?>">
                                <small id="username" class="form-text text-muted">Masukkan Username anggota dengan benar</small>
                                <?php echo form_error('username'); ?>
                            </div>
                            <div class="form-group">
                                <label for="status">Status:</label>
                                <select class="custom-select" name="status" id="status" required>
                                    <option value="" selected>Pilih Status</option>
                                    <option value="1" <?=$detAng->status_anggota=='1'?"selected":""?>>AKTIF</option>
                                    <option value="0" <?=$detAng->status_anggota=='0'?"selected":""?>>NONAKTIF</option>
                                </select>
                                <?php echo form_error('status'); ?>
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