
<?php

$ci = &get_instance();
$ci->load->model('m_landingpage');
$bulan = $ci->m_landingpage->getBulanforSidebar()->result();

?>
<div class="col-lg-4 col-12 px-0 mx-0">

<div class="sidebar ml-lg-4 ml-md-0">

<h3 class="sidebar-title text-success">Search</h3>
<div class="sidebar-item search-form">
    <form action="<?=base_url()?>user/search/blog" method="post">
    <input name="search" type="text">
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
        <?php $i=0; foreach($bulan as $rowBulan) :?>
        <div class="card">
            <a href="" data-toggle="collapse" data-target="#collapse<?=$i?>" aria-expanded="true" aria-controls="collapse<?=$i?>">
            <div class="card-header" id="heading<?=$i?>">
                <span class="mb-0 text-dark">
                    <?php $blnabjad = substr($rowBulan->tanggal_berita, 0, 7) . "-01 00:00:00";
                    $old_date = $blnabjad;
                    $old_date_timestamp = strtotime($old_date);
                    echo date('F yy', $old_date_timestamp);
                    ?>
                </span>
            </div>
            </a>
            <div id="collapse<?=$i?>" class="collapse <?=$i == 0 ? "show" : ""?>" aria-labelledby="heading<?=$i?>" data-parent="#accordion">
            <div class="card-body pb-0">
                <div class="sidebar-item recent-posts">
                    <?php 
                    $bln = substr($rowBulan->tanggal_berita, 0, 7);
                    $beritaBulan = $ci->m_landingpage->getBeritabyBulan($bln)->result();
                    foreach ($beritaBulan as $rowBeritaBulan) :

                    $old_date = $rowBeritaBulan->tanggal_berita;
                    $old_date_timestamp = strtotime($old_date);
                    ?>
                    <div class="post-item clearfix">
                        <img src="<?=base_url()?>assets/user/img/blog-2.jpg" alt="<?=$rowBeritaBulan->judul_berita?>">
                        <h4><a href="blog-single.html"><?=$rowBeritaBulan->judul_berita?></a></h4>
                        <time datetime="2020-01-01"><?=date('l, d F yy H:i:s', $old_date_timestamp);?></time>
                    </div>

                    <?php endforeach;?>
                </div>
            </div>
            </div>
        </div>
        <?php $i++; endforeach;?>
    </div>


</div><!-- End sidebar -->