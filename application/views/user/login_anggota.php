<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url('assets/admin/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets/admin/'); ?>https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url('assets/admin/'); ?>css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-success">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-md-5">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h3 text-gray-900 mb-2">Selamat Datang Anggota</h1>
                                        <h1 class="h6 text-black-900 mb-4">Silakan Login Dahulu</h1>
                                    </div>
                                    <hr>
                                    <form class="user" method="post" action="<?php echo base_url('user/Auth/login_anggota'); ?>">
                                        <?php echo $this->session->flashdata('message'); ?>
                                        <?php echo validation_errors(); ?>
                                        <div class="form-group">
                                            <input type="text" required class="form-control form-control-user" id="username_anggota" name="username_anggota" placeholder="Masukkan Username Anda..." value="<?= set_value('username_anggota'); ?>">
                                            <small id="username_anggota" class="form-text text-muted">Masukkan Username Admin</small>

                                            <?php //echo form_error('username'); 
                                            ?>
                                        </div>

                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="password_anggota" name="password_anggota" placeholder="Password">
                                            <small id="password_anggota" class="form-text text-muted">Masukkan Password min.8 Karakter</small>
                                            <?php //echo form_error('password_admin'); 
                                            ?>
                                        </div>
                                        <center>
                                            <button type="submit" class="btn btn-success btn-lg">
                                                Login
                                            </button>
                                        </center>

                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="<?=base_url()?>user/auth/lupa_password">Lupa Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="<?=base_url()?>user/register">Buat Akun Baru</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url('assets/admin/'); ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url('assets/admin/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url('assets/admin/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('assets/admin/'); ?>js/sb-admin-2.min.js"></script>

</body>

</html>