<main id="main">

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
<div class="container mt-5">

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
<section id="blog">
<div class="container">

    <div class="row justify-content-center">

    <?php foreach($penerima as $detDaftar){?>
    <div class="col-lg-8 col-12 px-0 card shadow mb-5">
        <div class="card-header bg-success my-0 text-white text-center">
            <h4>History Pendaftaran Penerima</h4>
        </div>
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
                            echo '<li class="badge badge-danger p-2">Menunggu Verifikasi</li>';
                
                        }else if ($detDaftar->status_penerima == '1'){
                        echo '<li class="badge badge-primary p-2">Terverifikasi</li>';
                        }
                        ?></td>
                </tr>   
            </tbody>
            </table>
            <hr>
            <div class="text-center">
                <span onclick="window.history.go(-1); return false;" class="btn btn-secondary text-white px-3 mr-1"><i class="fas fa-arrow-left mr-2"></i>Kembali</span>
            </div>
        </div>

    </div><!-- End blog entries list -->
    <?php }?>
    </div>

</div>
</section><!-- End Blog Section -->

</main><!-- End #main -->