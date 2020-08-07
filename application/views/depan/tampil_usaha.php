<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="<?=base_url()?>/assets1/img/b3.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Usaha</h2>
                    <div class="breadcrumb__option">
                        <span>Home - Usaha</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->
 <section class="hero" style="padding-top: 30px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form method="GET">
                            <input type="text" name="cari" placeholder="What do yo u need?">
                            <button type="submit" class="site-btn">SEARCH</button>
                        </form>
                        <?php 
                        if (isset($_GET['cari']))
                            {
                                $cari = $_GET['cari'];
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Blog Section Begin -->
<section class="from-blog spad">
    <div class="container">
        <!-- <div class="row">
            <div class="col-lg-12">
                <div class="section-title from-blog__title">
                    <h2>Daftar Usaha</h2>
                </div>
            </div>
        </div> -->
        <div class="row">
            <?php $no=1; 
            foreach ($row->result() as $key => $data) {
            ?> 
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="<?=base_url('uploads/usaha/'.$data->foto_usaha)?>" style="height: 300px">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-map-marker">&nbsp; Kec.</i><?=$data->nama_kecamatan?></li>
                            </ul>
                            <h4><a><?=$data->nama_usaha?></a></h4>
                            <p>
                                <?php {
                                    $num_char = 20;
                                ?>
                                <?php echo substr($data->deskripsi, 0, $num_char) . '...'; ?>
                                <?php } ?> 
                            </p>

                            <a href="<?=site_url('chome/detailusaha/'. $data->id_usaha)?>" class="blog__btn">Lihat Toko <span class="arrow_right"></span></a>
                        </div>
                    </div>
                </div>
            <?php 
            }
            ?> 
        </div>
    </div>
</section>
<!-- Blog Section End -->