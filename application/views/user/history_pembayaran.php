<main id="main">

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center">
    <!-- <h2>Pembayaran Zakat</h2> -->
    <ol>
        <li><a href="<?=base_url()?>user/landingpage">Beranda</a></li>
        <li><a href="<?=base_url()?>user/history_pembayaran">History Pembayaran Zakat</a></li>
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
        <h4>History Pembayaran Zakat</h4>
        </div>
        <div class="card mb-4">
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered" id="dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Pembayaran Bulan</th>
                        <th>Nominal Zakat</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1; foreach ($zakat as $detBayar ) : ?>
                    <tr>
                        <td><?=$i?></td>
                        <td><?=$detBayar->tanggal_zakat?></td>
                        <td><?=$detBayar->bulan_zakat?></td>
                        <td>Rp. <?= number_format($detBayar->nominal_zakat, 0, ',', '.') ?></td>
                        <td>
                                <?php if ($detBayar->status_zakat == '0'){
                                    echo 'Menunggu Verifikasi';
                        
                                }else if ($detBayar->status_zakat == '1'){
                                    echo 'Terverifikasi';
                                }else{
                                    echo 'Gagal Terverifikasi';
                                }
                                ?>
                                <br><a class="badge badge-success text-white p-2" href="<?=base_url()?>user/history_pembayaran/detail/<?=$detBayar->id_zakat?>">Lihat Detail</a></li>
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