<main id="main">

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
<div class="container">

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
        <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered" id="dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Pembayaran Zakat</th>
                        <th>Nominal Zakat</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1; foreach ($zakat as $detBayar ) : ?>
                    <tr>
                        <td><?=$i?></td>
                        <td><?=$detBayar->tanggal_zakat?></td>
                        <td><?=$detBayar->nominal_zakat?></td>
                        <td>
                                <?php if ($detBayar->status_zakat == '0'){
                                    echo '<li class="breadcrumb-item">Menunggu Verifikasi</li>';
                        
                                }else if ($detBayar->status_zakat == '1'){
                                echo '<li class="breadcrumb-item active">Terverifikasi</li>';
                                }
                                ?>
                                <li><a href="<?=base_url()?>user/history_pembayaran/detail/<?=$detBayar->id_zakat?>">Lihat Detail</a></li>
                        </td>
                    </tr>
                    <?php $i++; endforeach;?>
                </tbody>
            </table>
            </div>
        </div>
    </div>

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