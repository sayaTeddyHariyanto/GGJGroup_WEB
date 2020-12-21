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
            <h4>Data Saya</h4>
            <hr>
            <div class="row mx-4">
                <div class="col-9">
                    <table>
                        <tbody class="table table-borderless">
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td><?=$profil->nama_anggota?></td>
                            </tr>
                            <tr>
                                <td>No. Anggota</td>
                                <td>:</td>
                                <td><?=$profil->id_anggota?></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td><?=$profil->alamat_anggota?></td>
                            </tr>
                            <tr>
                                <td>No Hp</td>
                                <td>:</td>
                                <td><?=$profil->no_hp_anggota?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-3 text-right">
                    <img src="http://placehold.it/50x50" alt="Hahaha" width="100" class="img-fluid rounded-circle">
                </div>
                <a class="btn btn-success btn-sm mt-4 ml-auto px-5" href="<?=base_url()?>user/anggota/edit/<?=$this->session->userdata('id');?>" role="button">Edit</a>
            </div>

            <h4 class="mt-4">Navigasi</h4>
            <hr>
            <div class="row mx-2">
                <a class="col-lg-6 col-12 my-2" href="<?=base_url()?>user/pembayaran_zakat">
                    <div class="card bg-info text-white p-2 align-items-center justify-content-center">
                        <h6>Pembayaran Zakat</h6>
                    </div>
                </a>
                <a class="col-lg-6 col-12 my-2" href="<?=base_url()?>user/distribusi_zakat">
                    <div class="card bg-success text-white p-2 align-items-center justify-content-center">
                        <h6>Distribusi Zakat</h6>
                    </div>
                </a>
                <a class="col-lg-6 col-12 my-2" href="<?=base_url()?>user/pendaftaran_penerima">
                    <div class="card bg-success text-white p-2 align-items-center justify-content-center">
                        <h6>Pendaftaran Penerima</h6>
                    </div>
                </a>
                <a class="col-lg-6 col-12 my-2" href="<?=base_url()?>user/notifikasi">
                    <div class="card bg-info text-white p-2 align-items-center justify-content-center">
                        <h6>Notifikasi</h6>
                    </div>
                </a>
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