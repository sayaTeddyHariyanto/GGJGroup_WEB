<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>GGJ Group Zakah</h3>
              <p>
                <span>Alamat GGJ Group Zakah ini satu baris aja apa bisa ke Enter sendiri</span><br>
                <strong>Phone:</strong> +1 5589 55488 55<br>
                <strong>Email:</strong> info@example.com<br>
              </p>
              <div class="social-links mt-3">
                <?php $ci = &get_instance(); $kontak = $ci->m_crud->getAll('kontak')->result();
                foreach($kontak as $rowKontak){?>
                <a href="<?=$rowKontak->link_akun?>" data-toggle="tooltip" data-placement="top" title="<?=$rowKontak->nama_akun?> (<?=$rowKontak->nama_sosmed?>)"><i class="bx <?=$rowKontak->ikon?>"></i></a>
                <?php }?>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Beranda</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Tentang Kami</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Kontak Kami</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Bantuan</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Pendistribusian</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Pendaftaran Penerima</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Pembayaran Zakat</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6">
            <h4>Kritik dan Saran</h4>
            <?=$this->session->flashdata('pesan_footer');?>
            <form action="<?=base_url()?>user/landingpage/saran" method="post">
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email"
                  class="form-control" name="email" id="email" aria-describedby="email" placeholder="Masukkan Email . . ." value="<?=set_value('email')?>">
                  <?php echo form_error('email'); ?>
              </div>
              <div class="form-group">
                <label for="kritik">Kritik dan Saran</label>
                <textarea class="form-control" name="kritik" id="kritik" rows="3" placeholder="Masukkan Kritik dan saran dengan sopan.."><?=set_value('kritik')?></textarea>
                <?php echo form_error('kritik'); ?>
              </div>
              <button type="submit" class="btn btn-success">Submit</button>
            </form>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>GGJ Group Zakah</span></strong>. All Rights Reserved
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?=base_url()?>assets/user/vendor/jquery/jquery.min.js"></script>
  <script src="<?=base_url()?>assets/user/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?=base_url()?>assets/user/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="<?=base_url()?>assets/user/vendor/php-email-form/validate.js"></script>
  <script src="<?=base_url()?>assets/user/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?=base_url()?>assets/user/vendor/venobox/venobox.min.js"></script>
  <script src="<?=base_url()?>assets/user/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="<?=base_url()?>assets/user/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="<?= base_url() ?>assets/admin/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url() ?>assets/admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url() ?>assets/admin/js/demo/datatables-demo.js"></script>

  <!-- Template Main JS File -->
  <script src="<?=base_url()?>assets/user/js/main.js"></script>