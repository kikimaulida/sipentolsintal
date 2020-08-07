<section class="hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-1">
                <!-- <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>Kab. Tanah Laut</span>
                    </div>
                     <ul>
                      <?php $no=1; 
                        foreach ($row1->result() as $key => $data) {
                      ?>
                          <li>
                            <a><?=$data->nama_kecamatan?></a>
                          </li>
                      <?php 
                        }
                      ?>
                    </ul>
                </div> -->
            </div>
            <div class="col-lg-10">
               <div class="bxslider">
                <?php foreach ($row2->result() as $key => $data) { ?> 
                    <img src="<?=base_url('uploads/banner/'.$data->foto_banner)?>">
                 <?php } ?>
                </div>
            </div>
            <div class="col-lg-1"></div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Categories Section Begin -->
<section class="categories" style="padding-bottom: 80px; padding-top: 30px;">
    <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="section-title">
              <h2>Kategori Usaha</h2>
            </div>
          </div>
            <div class="categories__slider owl-carousel">
                <?php
                  foreach ($row3->result() as $key => $data) {
                  ?> 
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="<?=base_url('uploads/kategori/'.$data->icon)?>">
                            <h5><a><?=$data->nama_kategori?></a></h5>
                        </div>
                    </div>

                 <?php 
                    }
                  ?>
            </div>
        </div>
    </div>
</section>
<!-- Categories Section End -->

<section class="categories" style="padding-bottom: 80px; padding-top: 30px;">
    <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="section-title">
              <h2>SI ACIL Kabupaten Tanah Laut</h2>
            </div>
          </div>
          <div class="col-lg-12">
            <p style="padding-bottom: 30px;" align="justify">
              Sistem ini bertujuan untuk memudahkan para pelaku usaha yang ada di kabupaten Tanah Laut untuk mempublikasikan atau mempromosikan usaha yang sedang digeluti agar dapat diketahui oleh seluruh masyarakat khususnya di kabupaten Tanah Laut. Selain memudahkan para pelaku usaha, sistem ini juga bertujuan untuk memudahkan masyarakat yang bertindak sebagai konsumen untuk mencari informasi mengenai usaha yang ada dikabupaten tanah laut sekaligus juga dapat memberikan penilaian terhadap produk. Penilaian terhadap produk yang di hasilkan atau yang disediakan oleh pelaku usaha merupakan salah satu hal yang penting agar pelaku usaha dapat mengetahui keluhan dan keinginan konsumen agar dapat dengan mudah memperbaiki dan meningkatkan kualitasnya.
            </p>
          </div>
        </div>
    </div>
</section>