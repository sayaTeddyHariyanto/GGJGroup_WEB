<div class="wrapper py-5 bg-info" style="width: 100vw; height:100vh;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 col-12">
                <div class="card shadow bg-white">
                    <form action="<?=base_url()?>/user/auth/forgot_password" method="post">
                    <div class="card-header text-center">
                        <h4 class="font-weight-bold">Lupa Password</h4>
                    </div>
                    <div class="card-body px-5 py-5">
                        <div class="form-group text-justify">
                            <h6>Masukkan Email anda, kami akan mengirimkan link untuk mengatur ulang kata sandi anda.</h6>
                        </div>
                        <?php echo $this->session->flashdata('pesan'); ?>
                        <?php echo validation_errors(); ?>
                        <div class="form-group">
                            <label for="email">Email :</label>
                            <input type="email" value="<?=set_value('email')?>" title="Masukkan email yang valid" required
                                class="form-control" name="email" id="email" aria-describedby="email" placeholder="Masukkan Email..">
                            <small id="email" class="form-text text-muted">Masukkan email anda yang valid</small>
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