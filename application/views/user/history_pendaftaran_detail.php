<main id="main">

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
<div class="container">

    <div class="d-flex justify-content-between align-items-center">
    <!-- <h2>Pembayaran Zakat</h2> -->
    <ol>
        <li><a href="<?=base_url()?>user/landingpage">Beranda</a></li>
        <li><a href="<?=base_url()?>user/history_pendaftaran"><span >History Pendaftaran Penerima</span></li>
    </ol>
    </div>

</div>
</section><!-- End Breadcrumbs -->

<!-- ======= Blog Section ======= -->
<section id="blog" class="blog">
<div class="container">

    <div class="row justify-content-center">

    <?php foreach($penerima as $detDaftar){?>
    <div class="col-lg-8 col-12 px-0 card shadow mb-5">
        <div class="card-header bg-success my-0 text-white text-center">
        <h4>History Pendaftaran Penerima</h4>
        </div>
        <form action="<?=base_url()?>user/history_pendaftaran/detail/<?=$detDaftar->id_penerima?>" method="post" enctype="multipart/form-data">
        <div class="card-body px-5">
            <?=$this->session->flashdata('pesan');?>
            <input type="hidden" name="penerima" value="<?=$detDaftar->id_penerima?>">
            <table class="table table-sm table-borderless">
            <tbody>
                <tr>
                <th  width="350px" class="text-right">Nama Calon Penerima</th>
                <td>:</td>
                <td><?=$detDaftar->nama_penerima?></td>
                </tr>
                <tr>
                <th  class="text-right">Alamat</th>
                <td>:</td>
                <td><?=$detDaftar->alamat_penerima?></td>
                </tr>
                <tr>
                <th  class="text-right">Pekerjaan</th>
                <td>:</td>
                <td><?=$detDaftar->pekerjaan?></td>
                </tr>
                <tr>
                <th  class="text-right">Jumlah Tanggungan</th>
                <td>:</td>
                <td><?=$detDaftar->jumlah_tanggungan?></td>
                </tr>
                <tr>
                <th  class="text-right">Jumlah Terima</th>
                <td>:</td>
                <td><?=$detDaftar->jumlah_terima?></td>
                </tr>
                <tr>
                <tr><th class="text-right">Status</th>
                <td>:</td>
                <td><?php if ($detDaftar->status_penerima == '0'){
                            echo '<li class="badge badge-danger">Menunggu Verifikasi</li>';
                
                        }else if ($detDaftar->status_penerima == '1'){
                        echo '<li class="badge badge-primary">Terverifikasi</li>';
                        }
                        ?></td>
                </tr>   
            </tbody>
            </table>
            <hr>
        </div>
        </form>

    </div><!-- End blog entries list -->
    <?php }?>
    </div>

</div>
</section><!-- End Blog Section -->

</main><!-- End #main -->