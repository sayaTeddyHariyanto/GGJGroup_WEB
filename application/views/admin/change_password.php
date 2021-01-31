<div class="container-fluid">
    <div class="row justify-content-center py-3">
        <div class="col-md-8 card p-0">
            <div class="card-header pb-0">
                <h2 class="font-weight-bolder mb-0">Ubah Password Admin</h2>
            </div>
            <div class="card-body">
                <div class="px-2">
                    <?php echo $this->session->flashdata('pesan'); ?>
                </div>
                <form action="<?= base_url() . 'admin/profile_admin/changePassword'; ?>" method="post">

                    <div class="form-group">
                        <label for="password_sekarang">Password Sekarang: </label>
                        <input type="password" class="form-control" name="password_sekarang" id="password_sekarang" placeholder="Masukkan password saat ini...">
                        <?php echo form_error('password_sekarang'); ?>
                    </div>
                    <div class="form-group">
                        <label for="password_baru">Password Baru: </label>
                        <input type="password" class="form-control" name="password_baru" id="password_baru" placeholder="Masukkan password baru...">
                        <?php echo form_error('password_baru'); ?>
                    </div>
                    <div class="form-group">
                        <label for="password_baru2">Re-type Password: </label>
                        <input type="password" class="form-control" name="password_baru2" id="password_baru2" placeholder="Ketik ulang password baru...">
                        <?php echo form_error('password_baru2'); ?>
                    </div>

                    <div class="form-group text-center">
                        <button class="btn btn-primary px-3 mr-1" type="submit">Simpan Perubahan</button>
                        <a href="<?=base_url()?>admin/guide" class="btn btn-danger px-3 mr-1">Batal</a>
                    </div>
                </form>
            </div>