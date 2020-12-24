<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <!-- <h2>Pembayaran Zakat</h2> -->
        <ol>
          <li><a href="<?= base_url() ?>user/landingpage">Beranda</a></li>
          <li><span>Pembayaran Zakat</span></li>
        </ol>
      </div>

    </div>
  </section><!-- End Breadcrumbs -->

  <!-- ======= Blog Section ======= -->
  <section id="blog" class="blog">
    <div class="container">

      <div class="row justify-content-center">

        <?php foreach ($pembayaran as $row) { ?>
          <div class="col-lg-8 col-12 px-0 card shadow mb-5">
            <div class="card-header bg-success my-0 text-white text-center">
              <h4>Pembayaran Zakat</h4>
            </div>
            <form action="<?= base_url() ?>user/pembayaran_zakat/buktipembayaran" method="post" enctype="multipart/form-data">
              <div class="card-body px-5">
                <?= $this->session->flashdata('pesan'); ?>
                <input type="hidden" name="id_zakat" value="<?= $row->id_zakat ?>">
                <table class="table table-sm table-borderless">
                  <tbody>
                    <tr>
                      <th style="width:200px;" class="text-right">Tanggal Pembayaran</th>
                      <td>:</td>
                      <td><?= $row->tanggal_zakat ?></td>
                    </tr>
                    <tr>
                      <th style="width:200px;" class="text-right">Nama Anggota</th>
                      <td>:</td>
                      <td><?= $row->nama_anggota ?></td>
                    </tr>
                    <tr>
                      <th style="width:200px;" class="text-right">Nomor HP</th>
                      <td>:</td>
                      <td><?= $row->no_hp_anggota ?></td>
                    </tr>
                  </tbody>
                </table>
                <hr>
                <table class="table table-sm table-borderless">
                  <tbody>
                    <tr>
                      <th style="width:200px;" class="text-right"></th>
                      <td></td>
                      <td><img src="<?= base_url() ?>assets/user/img/metode_pembayaran/<?= $row->logo_metode ?>" alt="Logo" width="200" class="img-fluid"></td>
                    </tr>
                    <tr>
                      <th style="width:200px;" class="text-right">Metode Pembayaran</th>
                      <td>:</td>
                      <td><?= $row->nama_metode ?></td>
                    </tr>
                    <tr>
                      <th style="width:200px;" class="text-right">Nomor Rekening</th>
                      <td>:</td>
                      <td><?= $row->nomer_metode ?></td>
                    </tr>
                    <tr>
                      <th style="width:200px;" class="text-right">Atas Nama</th>
                      <td>:</td>
                      <td><?= $row->atas_nama ?></td>
                    </tr>
                    <tr>
                      <th style="width:200px;" class="text-right">Bulan</th>
                      <td>:</td>
                      <td><?= $row->bulan_zakat ?></td>
                    </tr>
                    <tr>
                      <th style="width:200px;" class="text-right">Nominal</th>
                      <td>:</td>
                      <td>Rp. <?= currency($row->nominal_zakat) ?></td>
                    </tr>
                  </tbody>
                </table>
                <hr>
                <div class="form-group mx-4">
                  <label for="bukti">Bukti Pembayaran :</label><br>
                  <img id="preview" for="bukti" src="<?= base_url() ?>assets/user/img/upload.png" class="img-responsive mb-2 img-thumbnail" alt="Preview Image" width="400px">
                  <div class="custom-file mb-2">
                    <input type="file" accept=".png, .jpg, .jpeg" class="custom-file-input" name="bukti" id="bukti" required>
                    <label class="custom-file-label" for="bukti">Masukkan bukti berukuran max 3mb . .</label>
                  </div>
                  <small class="form-text text-muted">Pilihlah bukti transfer Max 3 MB. Format (JPG/PNG)</small>
                </div>
              </div>
              <div class="card-footer text-center">
                <button type="submit" class="btn btn-success my-2">Lanjutkan Pembayaran</button>
              </div>
            </form>

          </div><!-- End blog entries list -->
        <?php } ?>
      </div>

    </div>
  </section><!-- End Blog Section -->

</main><!-- End #main -->