<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs">
    <div class="container mt-5">

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

      <div class="row">

        <div class="col-lg-8 col-12 px-0 card shadow mb-5">
          <div class="card-header bg-success my-0 text-white text-center">
            <h4>Pembayaran Zakat</h4>
          </div>
          <form action="<?= base_url() ?>user/pembayaran_zakat/bayar" method="post">
            <div class="card-body px-5">
              <table class="table table-sm table-borderless">
                  <?php $user = $this->db->get_where('tb_anggota', ['id_anggota' => $this->session->userdata('id')])->row(); ?>
                <tbody>
                  <tr>
                    <th style="width:100px;" class="text-right">Nama</th>
                    <td>:</td>
                    <td><?php echo $user->nama_anggota?></td>
                  </tr>
                  <tr>
                    <th style="width:100px;" class="text-right">Nomor HP</th>
                    <td>:</td>
                    <td><?= $user->no_hp_anggota ?></td>
                  </tr>
                  <tr>
                    <th style="width:100px;" class="text-right"></th>
                    <td></td>
                    <td><a class="btn btn-success" href="<?= base_url() ?>user/anggota/edit" role="button">Edit Profil</a></td>
                  </tr>
                </tbody>
              </table>
              <hr> <!-- Batas data diri anggota -->
              <div class="form-group">
                <label for="bulan">Pilih Bulan:</label>
                <input type="month" required class="form-control" name="bulan"  placeholder="Pilih Bulan">
              </div>
              <div class="form-group">
                <label for="nominal">Nominal</label>
                <input min="0" type="number" onkeyup="myTotalBayar()" required class="form-control" name="nominal" id="nominal_bayar" aria-describedby="nominal" placeholder="Masukkan Nominal">
                <small id="nominal" class="form-text text-muted">Masukkan nominal zakat anda dengan benar.</small>
              </div>
              <hr> <!-- Batas Gambar doa zakat -->
              <div class="text-center">
                <h4>Doa Membayar Zakat</h4>
                <img src="<?= base_url() ?>assets/user/img/doa_zakat.JPG" alt="Doa Zakat" class="img-fluid">
              </div>
              <!-- Batas Metode pembayaran -->
              <div class="text-center">
                <h4>Metode Pembayaran</h4>
              </div>
              <?php foreach ($metode as $rowMetode) { ?>
                <div class="card m-0 p-0 no-box-shadow">
                  <label for="option1" class="card-body">
                    <label class="form-radio-label m-0">
                      <input class="form-radio-input mr-2" id="option<?= $rowMetode->id_metode ?>" type="radio" name="metode" value="<?= $rowMetode->id_metode ?>" required>
                      <span class="form-radio-sign">
                        <img src="<?= base_url() ?>assets/user/img/metode_pembayaran/<?= $rowMetode->logo_metode ?>" alt="Logo <?= $rowMetode->nama_metode ?>" width="200" class="img-fluid">
                      </span>
                    </label>
                  </label>
                </div>
              <?php } ?>
              <hr>
              <div class="row mt-3">
                <div class="col-lg-8 col-12 text-lg-left text-right">
                  <h5>Total Pembayaran Zakat :</h5>
                </div>
                <div class="col-lg-4 col-12 text-right">
                  <h5>Rp. <span id="total_bayar">0</span></h5>
                </div>
              </div>
            </div>
            <div class="card-footer text-center">
              <button type="submit" class="btn btn-success my-2">Lanjutkan Pembayaran</button>
            </div>
          </form>

        </div><!-- End blog entries list -->

        <?php require_once(APPPATH . 'views/user/sidebar.php'); ?>

      </div><!-- End blog sidebar -->

    </div>

    </div>
  </section><!-- End Blog Section -->

</main><!-- End #main -->