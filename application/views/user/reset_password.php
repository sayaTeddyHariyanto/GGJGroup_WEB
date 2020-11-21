<?php foreach ($anggota as $rowAng ) { ?>
<div class="wrapper py-5 bg-success" style="width: 100vw; height:100vh;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 col-12">
                <div class="card shadow bg-white">
                    <form action="<?=base_url()?>/user/auth/password_reset" method="post">
                    <div class="card-header text-center">
                        <h4 class="font-weight-bold">Atur Ulang Kata Sandi</h4>
                    </div>
                    <div class="card-body px-5 pt-5 pb-4">
                        <div class="form-group text-justify">
                            <h6>Halo <strong><?=$rowAng->nama_anggota?>!</strong> Anda dapat mengatur ulang kata sandi Anda. Pastikan anda mengingat kata sandi baru anda dengan baik.</h6>
                        </div>
                        <?php echo $this->session->flashdata('pesan'); ?>
                        <?php echo validation_errors(); ?>
                        <input type="hidden" name="token" value="<?=$rowAng->token_anggota?>">
                        <input type="hidden" name="id" value="<?=$rowAng->id_anggota?>">
                        <div class="form-group">
                            <label for="password">Kata Sandi Baru :</label>
                            <div class="input-group">
                                <input type="password" value="<?=set_value('password')?>" title="Masukkan password minimal 8 karakter" required
                                class="form-control" name="password" pattern="{8,}" id="password" aria-describedby="password" placeholder="Masukkan Kata Sandi..">
                                <div class="input-group-append">
                                    <a role="button" class="input-group-text" id="show"><i class="fa fa-eye-slash" id="icon" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <small id="password" class="form-text text-muted">Masukkan kata sandi 8 karakter atau lebih</small>
                        </div>
                        <div class="form-group">
                            <label for="repassword">Ulangi Kata Sandi Baru :</label>
                            <input type="password" value="<?=set_value('repassword')?>" title="Masukkan repassword yang valid" required
                                class="form-control" name="repassword" id="repassword" aria-describedby="repassword" placeholder="Masukkan Ulang Kata sandi..">
                            <small id="repassword" class="form-text text-muted">Masukkan kata sandi sama persis seperti diatas</small>
                        </div>
                    </div>
                    <div class="card-footer text-center bg-white">
                        <input class="btn btn-primary" type="submit" value="Submit">
                        <a class="btn btn-secondary" href="<?=base_url()?>/user/auth/login">Login?</a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }?>