<main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
        <div class="container mt-5">

            <div class="d-flex justify-content-between align-items-center">
            <!-- <h2>Pembayaran Zakat</h2> -->
            <ol>
                <li><a href="<?=base_url()?>user/landingpage">Beranda</a></li>
            </ol>
            </div>

        </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Blog Section ======= -->
        <section id="blog" class="blog">
        <div class="container">

            <div class="row justify-content-center">

            <?php foreach($zakat as $detBayar){?>
            <div class="col-lg-8 col-12 px-0 card shadow mb-5">
                <div class="card-header bg-success my-0 text-white text-center">
                <h4>Nota Pembayaran Zakat</h4>
                </div>
                <form action="<?=base_url()?>user/nota_pembayaran/detail/<?=$detBayar->id_zakat?>" method="post" enctype="multipart/form-data">
                <div class="card-body px-5">
                    <?=$this->session->flashdata('pesan');?>
                    <input type="hidden" name="zakat" value="<?=$detBayar->id_zakat?>">
                    <table class="table table-sm table-borderless">
                    <tbody>
                        <tr>
                        <th  class="text-right">Tanggal Pembayaran</th>
                        <td>:</td>
                        <td><?=$detBayar->tanggal_zakat?></td>
                        </tr>
                        <tr>
                        <th  class="text-right">Nama Anggota</th>
                        <td>:</td>
                        <td><?=$detBayar->nama_anggota?></td>
                        </tr>
                        <tr>
                        <th  class="text-right">Nomor HP</th>
                        <td>:</td>
                        <td><?=$detBayar->no_hp_anggota?></td>
                        </tr>
                        <tr>
                        <th  class="text-right">Metode Pembayaran</th>
                        <td>:</td>
                        <td><?=$detBayar->nama_metode?></td>
                        </tr>
                        <tr>
                        <th  class="text-right">Nomor Rekening</th>
                        <td>:</td>
                        <td><?=$detBayar->nomer_metode?></td>
                        </tr>
                        <tr>
                        <th  class="text-right">Atas Nama</th>
                        <td>:</td>
                        <td><?=$detBayar->atas_nama?></td>
                        </tr>
                        <tr>
                        <th  class="text-right">Bulan</th>
                        <td>:</td>
                        <td><?=$detBayar->bulan_zakat?></td>
                        </tr>
                        <tr>
                        <th  class="text-right">Nominal</th>
                        <td>:</td>
                        <td>Rp. <?= number_format($detBayar->nominal_zakat, 0, ',', '.') ?></td>
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