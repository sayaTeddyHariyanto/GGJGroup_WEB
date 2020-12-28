<main id="main">

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container mt-5">

        <div class="d-flex justify-content-between align-items-center">
        <!-- <h2>Pembayaran Zakat</h2> -->
        <ol>
            <li><a href="<?=base_url()?>user/landingpage">Beranda</a></li>
            <li><a href="<?=base_url()?>user/history_pendaftaran">History Pendaftaran Penerima</a></li>
        </ol>
        </div>

    </div>
</section><!-- End Breadcrumbs -->

<!-- ======= Blog Section ======= -->
<section id="blog" class="blog">
<div class="container">

    <div class="row">
    <div class="col-lg-8 col-12 px-0 card shadow mb-5">
        <div class="card-header bg-success my-0 text-white text-left">
            <h4>Dashboard Saya</h4>
        </div>
        <div class="card mb-4">
        <div class="card-body">
            <?=$this->session->flashdata('pesan');?>
            <h4>Data Saya</h4>
            <hr>
            <div class="row mx-4">
                <div class="col-lg-3 col-12 text-lg-right my-lg-0 my-4 d-lg-none d-block text-center">
                    <div class="text-center">
                    <img src="http://placehold.it/50x50" alt="Hahaha" width="100" class="img-fluid rounded-circle"><br>
                    <button type="button" class="btn mt-2 btn-sm btn-primary" data-toggle="modal">Edit Foto</button>
                    </div>
                </div>
                <div class="col-lg-9 col-12">
                    <table>
                        <tbody class="table table-borderless">
                            <tr>
                                <td class="py-1">No. Anggota</td>
                                <td class="py-1">:</td>
                                <td class="py-1"><?=$profil->id_anggota?></td>
                            </tr>
                            <tr>
                                <td class="py-1">Nama</td>
                                <td class="py-1">:</td>
                                <td class="py-1"><?=$profil->nama_anggota?></td>
                            </tr>
                            <tr>
                                <td class="py-1">Alamat</td>
                                <td class="py-1">:</td>
                                <td class="py-1"><?=$profil->alamat_anggota?></td>
                            </tr>
                            <tr>
                                <td class="py-1">No Hp</td>
                                <td class="py-1">:</td>
                                <td class="py-1"><?=$profil->no_hp_anggota?></td>
                            </tr>
                            <tr>
                                <td class="py-1">Username</td>
                                <td class="py-1">:</td>
                                <td class="py-1"><?=$profil->username_anggota?></td>
                            </tr>
                            <tr>
                                <td class="py-1">Email</td>
                                <td class="py-1">:</td>
                                <td class="py-1"><?=$profil->email_anggota?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-3 col-12 text-lg-right my-lg-0 my-4 d-lg-block d-none text-center">
                    <div class="text-center">
                    <?php if($profil->foto_anggota == null || $profil->foto_anggota == ''){?>
                    <img src="http://placehold.it/50x50" alt="Foto Profil" width="100" class="img-fluid rounded-circle"><br>
                    <?php }else{ ?>
                    <img src="<?=base_url()?>assets/user/img/profil/<?=$profil->foto_anggota?>" alt="Foto Profil" width="100" id="preview" class="img-fluid rounded-circle">
                    <?php }?><br>
                    <button type="button" data-target="#modalUploadFoto" class="btn mt-2 btn-sm btn-primary" data-toggle="modal">Edit Foto</button>
                    </div>
                </div>
                <div class="col-12 text-lg-right text-center">
                    <a class="btn btn-success btn-sm mt-4 px-5" href="<?=base_url()?>user/anggota/edit" role="button">Edit Profil</a>
                </div>
            </div>

            <h4 class="mt-4">Navigasi</h4>
            <hr>
            <div class="row mx-2">
                <a class="col-lg-6 col-12 my-2" href="<?=base_url()?>user/pembayaran_zakat">
                    <div class="card bg-info text-white p-2 align-items-center justify-content-center">
                        <h6>Pembayaran Zakat</h6>
                    </div>
                </a>
                <a class="col-lg-6 col-12 my-2" href="<?=base_url()?>user/distribusi/all">
                    <div class="card bg-success text-white p-2 align-items-center justify-content-center">
                        <h6>Distribusi Zakat</h6>
                    </div>
                </a>
                <a class="col-lg-6 col-12 my-2" href="<?=base_url()?>user/pendaftaran_penerima">
                    <div class="card bg-success text-white p-2 align-items-center justify-content-center">
                        <h6>Pendaftaran Penerima</h6>
                    </div>
                </a>
                <!-- <a class="col-lg-6 col-12 my-2" href="<?//=base_url()?>user/notifikasi">
                    <div class="card bg-info text-white p-2 align-items-center justify-content-center">
                        <h6>Notifikasi</h6>
                    </div>
                </a> -->
            </div>
        </div>
    </div>

    </div><!-- End blog entries list -->

    <?php require_once(APPPATH.'views/user/sidebar.php');?>

    </div><!-- End blog sidebar -->

    </div>

</div>
</section><!-- End Blog Section -->

</main><!-- End #main -->

<!-- Modal -->
<div class="modal fade" id="modalUploadFoto" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Foto Profil</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <form action="<?=base_url()?>user/anggota/upload_foto" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_anggota" value="<?=$profil->id_anggota?>">
            <div class="modal-body text-center">
                <?php if($profil->foto_anggota == null || $profil->foto_anggota == ''){?>
                <img src="http://placehold.it/50x50" alt="Foto Profil" width="200" id="preview" class="img-fluid rounded-circle"><br>
                <div class="text-left custom-file text-left mt-3 mb-2">
                    <input type="file" accept=".png, .jpg, .jpeg" class="custom-file-input" name="bukti" id="bukti" required>
                    <label class="custom-file-label" for="bukti">Klik untuk memilih foto</label>
                </div>
                <small>Masukkan foto resolusi 512x512px berukuran max 3mb . .</small>
                <?php }else{ ?>
                <img src="<?=base_url()?>assets/user/img/profil/<?=$profil->foto_anggota?>" alt="Foto Profil" width="200" id="preview" class="img-fluid rounded-circle"><br>
                <div class="text-left custom-file text-left mt-3 mb-2">
                    <input type="file" accept=".png, .jpg, .jpeg" class="custom-file-input" name="bukti" id="bukti" required>
                    <label class="custom-file-label" for="bukti">Klik untuk memilih foto</label>
                </div>
                <small>Masukkan foto resolusi 512x512px berukuran max 3mb . .</small>
                <?php }?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>