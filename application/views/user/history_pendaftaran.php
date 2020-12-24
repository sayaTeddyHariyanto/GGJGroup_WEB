<main id="main">

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
<div class="container">

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
        <div class="card-header bg-success my-0 text-white text-center">
        <h4>History Pendaftaran Penerima</h4>
        </div>
        <div class="card mb-4">
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered" id="dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Calon Penerima</th>
                        <th>Alamat</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1; foreach ($penerima as $detDaftar ) : ?>
                    <tr>
                        <td><?=$i?></td>
                        <td><?=$detDaftar->nama_penerima?></td>
                        <td><?=$detDaftar->alamat_penerima?></td>
                        <td>
                                <?php if ($detDaftar->status_penerima == '0'){
                                    echo '<li class="breadcrumb-item">Menunggu Verifikasi</li>';
                        
                                }else if ($detDaftar->status_penerima == '1'){
                                echo '<li class="breadcrumb-item active">Terverifikasi</li>';
                                }
                                ?>
                                <li><a href="<?=base_url()?>user/history_pendaftaran/detail/<?=$detDaftar->id_penerima?>">Lihat Detail</a></li>
                        </td>
                    </tr>
                    <?php $i++; endforeach;?>
                </tbody>
            </table>
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