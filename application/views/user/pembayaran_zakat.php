<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

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

        <div class="row">

          <div class="col-lg-8 col-12 px-0 card shadow mb-5">
            <div class="card-header bg-success my-0 text-white text-center">
              <h4>Pembayaran Zakat</h4>
            </div>
            <form action="<?=base_url()?>user/pembayaran_zakat/bayar" method="post">
            <div class="card-body px-5">
                <table class="table table-sm table-borderless">
                  <tbody>
                    <tr>
                      <th style="width:100px;" class="text-right">Nama</th>
                      <td>:</td>
                      <td>Primasdika Yunia Putra</td>
                    </tr>
                    <tr>
                      <th style="width:100px;" class="text-right">Nomor HP</th>
                      <td>:</td>
                      <td>085376215972</td>
                    </tr>
                    <tr>
                      <th style="width:100px;" class="text-right"></th>
                      <td></td>
                      <td><a class="btn btn-success" href="<?=base_url()?>user/profil/edit" role="button">Edit Profil</a></td>
                    </tr>
                  </tbody>
                </table>
                <hr> <!-- Batas data diri anggota -->
                <div class="form-group">
                  <label for="bulan">Pilih Bulan:</label>
                  <select class="form-control" name="bulan" id="bulan" required>
                    <option value="">-- Pilih Bulan --</option>
                    <option value="Januari">Januari</option>
                    <option value="Februari">Februari</option>
                    <option value="Maret">Maret</option>
                    <option value="April">April</option>
                    <option value="Mei">Mei</option>
                    <option value="Juni">Juni</option>
                    <option value="Juli">Juli</option>
                    <option value="Agustus">Agustus</option>
                    <option value="September">September</option>
                    <option value="Oktober">Oktober</option>
                    <option value="Novermber">Novermber</option>
                    <option value="Desember">Desember</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="nominal">Nominal</label>
                  <input type="number" onkeyup="myTotalBayar()" required
                    class="form-control" name="nominal" id="nominal_bayar" aria-describedby="nominal" placeholder="Masukkan Nominal">
                  <small id="nominal" class="form-text text-muted">Masukkan nominal zakat anda dengan benar.</small>
                </div>  
                <hr> <!-- Batas Gambar doa zakat -->
                <div class="text-center">
                  <h4>Doa Membayar Zakat</h4>
                  <img src="<?=base_url()?>assets/user/img/doa_zakat.jpg" alt="Doa Zakat" class="img-fluid">
                </div>
                <hr> <!-- Batas Metode pembayaran -->
                <div class="text-center">
                  <h4>Metode Pembayaran</h4>
                </div>
                <?php foreach($metode as $rowMetode){?>
                <div class="card m-0 p-0 no-box-shadow">
                    <label for="option1" class="card-body">
                        <label class="form-radio-label m-0">
                            <input class="form-radio-input mr-2" id="option<?=$rowMetode->id_metode?>" type="radio" name="metode" value="<?=$rowMetode->id_metode?>" required>
                            <span class="form-radio-sign">
                              <img src="<?=base_url()?>assets/user/img/metode_pembayaran/<?=$rowMetode->logo_metode?>" alt="Logo <?=$rowMetode->nama_metode?>" width="200" class="img-fluid">
                            </span>
                        </label>
                    </label>
                </div>
                <?php }?>
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

          <div class="col-lg-4 col-12 px-0 mx-0">

            <div class="sidebar ml-lg-4 ml-md-0">

              <h3 class="sidebar-title text-success">Search</h3>
              <div class="sidebar-item search-form">
                <form action="" method="post">
                  <input type="text">
                  <button type="submit"><i class="icofont-search"></i></button>
                </form>

              </div><!-- End sidebar search formn-->

              <!-- <h3 class="sidebar-title text-success">Categories</h3>
              <div class="sidebar-item categories">
                <ul>
                  <li><a href="#">General <span>(25)</span></a></li>
                  <li><a href="#">Lifestyle <span>(12)</span></a></li>
                  <li><a href="#">Travel <span>(5)</span></a></li>
                  <li><a href="#">Design <span>(22)</span></a></li>
                  <li><a href="#">Creative <span>(8)</span></a></li>
                  <li><a href="#">Educaion <span>(14)</span></a></li>
                </ul>

              </div> -->
              <!-- End sidebar categories-->

              <h3 class="sidebar-title text-success">Recent Posts</h3>
                <div id="accordion">
                  <div class="card">
                    <a href="" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      <div class="card-header" id="headingOne">
                        <span class="mb-0 text-dark">
                          Collapsible Group Item #1
                        </span>
                      </div>
                    </a>
                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                      <div class="card-body pb-0">
                        <div class="sidebar-item recent-posts">
                          <div class="post-item clearfix">
                            <img src="<?=base_url()?>assets/user/img/blog-2.jpg" alt="">
                            <h4><a href="blog-single.html">Nihil blanditiis at in nihil autem</a></h4>
                            <time datetime="2020-01-01">Jan 1, 2020</time>
                          </div>

                          <div class="post-item clearfix">
                            <img src="<?=base_url()?>assets/user/img/blog-2.jpg" alt="">
                            <h4><a href="blog-single.html">Quidem autem et impedit</a></h4>
                            <time datetime="2020-01-01">Jan 1, 2020</time>
                          </div>

                          <div class="post-item clearfix">
                            <img src="<?=base_url()?>assets/user/img/blog-2.jpg" alt="">
                            <h4><a href="blog-single.html">Id quia et et ut maxim</a></h4>
                            <time datetime="2020-01-01">Jan 1, 2020</time>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <a href="" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      <div class="card-header" id="headingTwo">
                        <span class="mb-0">
                          <span class="text-dark collapsed">
                            Collapsible Group Item #2
                          </span>
                        </span>
                      </div>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                      <div class="card-body">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis, officiis itaque optio quis cumque obcaecati quod, iure ad suscipit nihil labore omnis explicabo eos voluptatum rerum dignissimos delectus. Repudiandae, saepe?
                      </div>
                    </div>
                  </div>
                </div>


            </div><!-- End sidebar -->

          </div><!-- End blog sidebar -->

        </div>

      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->