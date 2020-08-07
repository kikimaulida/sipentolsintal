<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="<?=base_url()?>/assets1/img/b3.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Produk</h2>
                    <div class="breadcrumb__option">
                        <span>Home - </span>
                        <span>Produk</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-5">
            <div class="col-lg-12">
                <div class="sidebar">  
                  <div class="left_sidebar_area">
                    <form data-parsley-validate class="form-horizontal form-label-left" method="POST" action="<?php echo base_url('chome/tampilproduk') ?>">
                      <aside class="left_widgets p_filter_widgets">
                        <div class="l_w_title">
                          <h3>Pilih Kecamatan</h3>
                        </div>
                        <div class="widgets_inner">
                          <ul class="list">
                            <?php $no=1; 
                              foreach ($row1->result() as $key => $data) {
                            ?>
                                <li>
                                  <!-- <a href="#"></a> -->
                                  <input type="checkbox" name="nama_kecamatan[]" value="<?=$data->nama_kecamatan?>"> <?=$data->nama_kecamatan?>
                                </li>
                            <?php 
                              }
                            ?>
                            <li><button type="submit" class="btn btn-success">Filter</button></li>
                          </ul>
                        </div>
                      </aside>
                      <aside class="left_widgets p_filter_widgets">
                        <div class="l_w_title">
                          <h3>Pilih Kategori</h3>
                        </div>
                        <div class="widgets_inner">
                          <ul class="list">
                            <?php $no=1; 
                              foreach ($row2->result() as $key => $data) {
                            ?>
                              <li>
                                <input type="checkbox" name="nama_kategori[]" value="<?=$data->nama_kategori?>"> <?=$data->nama_kategori?>
                              </li>
                            <?php 
                              }
                            ?>
                            <li><button type="submit" class="btn btn-success">Filter</button></li>
                          </ul>
                        </div>
                      </aside>
                    </form>
                  </div>
                </div>
              </div>
            </div>

            
            <div class="col-lg-9 col-md-7">
                <div class="product_top_bar">
                  <div class="left_dorp">
                  <br>
                  </div>
                </div> <br>
                <div class="row">
                    <?php $no=1; 
                        foreach ($row as $data) {
                        ?> 
                            <div class="col-lg-3 col-md-5 col-sm-5">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="<?=base_url('uploads/produk/'.$data->foto_produk)?>">
                                        <ul class="product__item__pic__hover">
                                            <li><a href="<?=site_url('chome/detail_produk/'. $data->id_produk)?>"><i class="fa fa-list"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__item__text">
                                        <h6><b style="color: black;"><?=$data->nama_produk?></b></h6>
                                        <h6><b style="color: #dd2222;"><?=$data->harga?></b></h6>
                                        <h6><i class="fa fa-map-marker">&nbsp;</i><?=$data->nama_kecamatan?></h6>
                                    </div>
                                </div>    
                            </div>
                    <?php 
                        }
                    ?> 
                </div>
               <!--  <div class="product__pagination">
                    <a href="<?=site_url('Chome/tampilproduk')?>">1</a>
                    <a href="<?=site_url('Chome/tampilproduk')?>">2</a>
                    <a href="<?=site_url('Chome/tampilproduk')?>">3</a>
                    <a href="<?=site_url('Chome/tampilproduk')?>"><i class="fa fa-long-arrow-right"></i></a>
                </div> -->
            </div>
        </div>
    </div>
</section>
<!-- Product Section End -->
