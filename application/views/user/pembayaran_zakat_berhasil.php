<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container mt-5">

        <div class="d-flex justify-content-between align-items-center">
          <!-- <h2>Pembayaran Zakat</h2> -->
          <ol>
            <li><a href="<?=base_url()?>user/landingpage">Beranda</a></li>
            <li><span >Pembayaran Zakat</span></li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container">

        <div class="row justify-content-center">

        <?php foreach($pembayaran as $row){?>
          <div class="col-lg-8 col-12 px-0 card shadow mb-5">
            <div class="card-header bg-success my-0 text-white text-center">
              <h4>Pembayaran Zakat</h4>
            </div>
            <div class="card-body px-5">
                <input type="hidden" name="id_zakat" value="<?=$row->id_zakat?>">
                <?=$this->session->flashdata('pesan');?>
                <table class="table table-sm table-borderless">
                  <tbody>
                    <tr>
                      <th style="width:200px;" class="text-right">Tanggal Pembayaran</th>
                      <td>:</td>
                      <td><?=$row->tanggal_zakat?></td>
                    </tr>
                    <tr>
                      <th style="width:200px;" class="text-right">Nama Anggota</th>
                      <td>:</td>
                      <td><?=$row->nama_anggota?></td>
                    </tr>
                    <tr>
                      <th style="width:200px;" class="text-right">Nomor HP</th>
                      <td>:</td>
                      <td><?=$row->no_hp_anggota?></td>
                    </tr>
                    <tr>
                      <th style="width:200px;" class="text-right">Bulan</th>
                      <td>:</td>
                      <td><?=$row->bulan_zakat?></td>
                    </tr>
                    <tr>
                      <th style="width:200px;" class="text-right">Nominal Pembayaran</th>
                      <td>:</td>
                      <td><?=currency($row->nominal_zakat)?></td>
                    </tr>
                    <tr>
                      <th style="width:200px;" class="text-right">Bukti Pembayaran</th>
                      <td>:</td>
                      <td><img src="<?=base_url()?>assets/user/img/bukti_bayar/<?=$row->bukti_zakat?>" width="300" alt="Bukti Pembayaran" class="img-fluid"></td>
                    </tr>
                  </tbody>
                </table>
                <!-- <hr> -->
            </div>
            <div class="card-footer text-center">
            <a href="<?=base_url()?>user/history_pembayaran/detail/<?=$row->id_zakat?>" class="btn btn-success my-2">Lihat Nota</a>
            </div>

          </div><!-- End blog entries list -->
        <?php }?>
        </div>

      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->