<!-- Breadcrumb Section Begin -->
<?php $no=1; 
foreach ($row->result() as $key => $data) {
?> 

<section class="blog-details-hero set-bg" data-setbg="<?=base_url('uploads/usaha/'.$data->foto_usaha)?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="blog__details__hero__text">
                    <h2><?=$data->nama_usaha?></h2>
                    <ul>
                        <li><?=$data->nama_kategori?></li>
                        <li><?=date('d M Y', strtotime($data->bergabung))?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="blog-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 order-md-1 order-1">
                <div class="blog__details__text">
                    <h4 style="padding-top: 50px;">Deskripsi Usaha:</h4>
                    <p><?=$data->deskripsi?></p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="contact spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <span class="icon_profile"></span>
                    <h4>Pemilik Usaha</h4>
                    <p><?=$data->nama_lengkap?></p>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <span class="icon_phone"></span>
                    <h4>Telepon</h4>
                    <p><?=$data->telepon?></p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <span class="icon_clock_alt"></span>
                    <h4>Jam Operasional</h4>
                    <p><?=$data->jam_operasional?></p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <span class="icon_pin_alt"></span>
                    <h4>Alamat</h4>
                    <p><?=$data->alamat?></p>
                </div>
            </div>
        </div>
    </div>
</section>
<?php } ?>

<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Produk</h2>
                </div>
            </div>
        </div>
        <div class="row">
        <?php $no=1; 
            foreach ($row1->result() as $key => $data) {
        ?>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="<?=base_url('uploads/produk/'.$data->foto_produk)?>">
                        <ul class="featured__item__pic__hover">
                             <li><a href="<?=site_url('chome/detail_produk/'. $data->id_produk)?>"><i class="fa fa-list"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><b style="color: black;"><?=$data->nama_produk?></b></h6>
                        <h6><b style="color: #dd2222;"><?=$data->harga?></b></h6>
                        <h6><i class="fa fa-map-marker">&nbsp;</i><?=$data->nama_kecamatan?></h6>
                    </div>
                </div>
            </div>
        <?php } ?>
        </div>
    </div>
</section>
