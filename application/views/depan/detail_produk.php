<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="<?=base_url()?>/assets1/img/b3.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Produk</h2>
                    <div class="breadcrumb__option">
                        <span>Home - Produk - Detail Produk</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->
<!-- Product Details Section Begin -->
<section class="product-details spad">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-6">
          <div class="product__details__pic">
            <?php
              foreach ($row->result() as $key => $data) {
            ?>
              <div class="product__details__pic__item">
                  <img class="product__details__pic__item--large"
                      src="<?=base_url('uploads/produk/'.$data->foto_produk)?>" alt="">     
              </div>
            <?php } ?>

              
              <div class="product__details__pic__slider owl-carousel">
              <?php 
                foreach ($row3->result() as $key => $data) {
              ?>
                  <img data-imgbigurl="<?=base_url('uploads/produk/'.$data->foto_produk)?>"
                      src="<?=base_url('uploads/produk/'.$data->foto_produk)?>" alt="">
                  <?php } ?>
              </div>
              
          </div>
      </div>
      
      <?php $no=1; 
        foreach ($row->result() as $key => $data) {
      ?>
      <div class="col-lg-6 col-md-6">
          <div class="product__details__text">
              <h3><?=$data->nama_produk?></h3>
              <div class="product__details__rating">
                <!-- <span>(<?php echo $jumlah_rating?> rating)</span> -->
                <?php 
                  if($jumlah_rating == null)
                  { ?>
                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>
                  <?php }
                  else if ($jumlah_rating == '1')
                  { ?>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>
                  <?php } 
                else if ($jumlah_rating > '1' && $jumlah_rating < '2')
                  {?>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>
                 <?php }
                 else if ($jumlah_rating == '2')
                  { ?>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>
                  <?php } 
                  else if ($jumlah_rating > '2' && $jumlah_rating < '3')
                  {?>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>
                  <?php }
                  else if ($jumlah_rating == '3')
                  { ?>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>
                  <?php } 
                  else if ($jumlah_rating > '3' && $jumlah_rating < '4')
                  {?>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                    <i class="fa fa-star-o"></i>
                   <?php }
                  else if ($jumlah_rating == '4')
                  { ?>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                  <?php } 
                  else if ($jumlah_rating > '4' && $jumlah_rating < '5')
                  {?>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                  <?php } 
                  else{ ?>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                  <?php } ?>
                  <span>(<?php echo $jumlah_review?> reviews)</span>
              </div>
              <div class="product__details__price"><?=$data->harga?></div>
              <p><?=$data->deskripsi_produk?></p>
              <ul>
                  <li><b style="color: black;">Status Produk</b> <span><?=$data->status_produk?></span></li>
                  <li><b style="color: black;">Usaha/Toko</b> <span><?=$data->nama_usaha?></span>
                    <!-- <a href="<?=site_url('chome/detailusaha')?>">
                    <button class="btn badge-success" >Lihat Toko</button></li> -->
                  <li><b style="color: black;">Order</b> <span><?=$data->telepon?></span></li>
                  <li><b style="color: black;">Alamat</b> <span><?=$data->alamat?></span></li>
                  
              </ul>
          </div>
      </div>
      <div class="col-lg-12">
        <section class="product_description_area">
          <div class="">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a
                  class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                  aria-selected="true">Description</a
                >
              </li>
              <li class="nav-item">
                <a
                  class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact"
                  aria-selected="false" >Comments</a
                >
              </li>
              <li class="nav-item">
                <a
                  class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Reviews</a
                >
              </li>
            </ul>
                    
            <div class="tab-content" id="myTabContent">
              <div
                class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <p><?=$data->deskripsi_produk?></p>
              </div>
      <?php 
        }
      ?>
              <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="comment_list">
                      <?php
                          $query = $this->db->query("SELECT tb_komentar_produk.*, tb_produk.id_produk, tb_pengguna.id_pengguna, tb_pengguna.username, tb_pengguna.foto_pengguna FROM tb_produk JOIN tb_komentar_produk ON tb_produk.id_produk = tb_komentar_produk.id_produk JOIN tb_pengguna ON tb_pengguna.id_pengguna = tb_komentar_produk.id_pengguna where tb_komentar_produk.status='0' AND tb_produk.id_produk = '$id_produk'");
                          foreach ($query->result() as $dt):
                      ?>
                      <div class="review_item">
                        <div class="media">
                          <div class="d-flex">
                            <img class="rounded-circle mx-auto d-block" src="<?=base_url('uploads/pengguna/'.$dt->foto_pengguna)?>" alt="Card image cap" style="width: 50px; height: 50px;">
                          </div>
                          <div class="media-body">
                            <h4><?=$dt->username?></h4>
                            <h5><?=date('d M Y', strtotime($dt->tanggal))?></h5>
                            <?php
                              if($this->session->userdata('id_pengguna')){
                            ?>
                              <a class="reply_btn" data-toggle="modal" data-target="#balaskomen<?php echo $dt->id_komentar?>" data-whatever="@getbootstrap">Balas</a>
                            <?php 
                            } 
                              else
                              { ?> 
                                <a class="reply_btn" data-toggle="modal" disabled>Balas</a>
                              <?php } ?>
                          </div>
                        </div>
                        <p><?=$dt->komentar?></p>
                      </div>   
                        <?php
                          $id_komentar = $dt->id_komentar;
                          $query = $this->db->query("SELECT tb_komentar_produk.*, tb_produk.id_produk, tb_pengguna.id_pengguna, tb_pengguna.username, tb_pengguna.foto_pengguna FROM tb_produk JOIN tb_komentar_produk ON tb_produk.id_produk = tb_komentar_produk.id_produk JOIN tb_pengguna ON tb_pengguna.id_pengguna = tb_komentar_produk.id_pengguna where tb_komentar_produk.status='$id_komentar' AND tb_produk.id_produk = '$id_produk'");
                          foreach ($query->result() as $utama):
                        ?>
                          <div class="review_item reply">
                            <div class="media">
                              <div class="d-flex">
                                <img class="rounded-circle mx-auto d-block" src="<?=base_url('uploads/pengguna/'.$utama->foto_pengguna)?>" alt="Card image cap" style="width: 50px; height: 50px;">
                              </div>
                              <div class="media-body">
                                <h4><?=$utama->username?></h4>
                                <h5><?=date('d M Y', strtotime($utama->tanggal))?></h5>
                                <!-- <a class="reply_btn" data-toggle="modal" data-target="#balaskomen<?php echo $dt->id_komentar?>" data-whatever="@getbootstrap">Balas</a> -->
                              </div>
                            </div>
                            <p><?=$utama->komentar?></p>
                          </div>
                       <?php endforeach;?> 
                        <div class="modal fade" id="balaskomen<?php echo $dt->id_komentar?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title" id="exampleModalLabel"><b style="color: black;">Balas Komentar</b></h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" <?php echo $dt->id_komentar;?>>&times;</span>
                              </button>
                            </div>
                            <div class="modal-body"> 
                              <form method="post" action="<?php echo base_url('Chome/prosesbalasan')?>" enctype="multipart/form-data">
                              <div class="col-md-12">
                                <div class="form-group">
                                  <input type="hidden" name="id" value="<?php echo $dt->id_komentar?>">
                                  <textarea class="form-control" name="komentar" id="komentar"  rows="1" placeholder="Masukkan Balasan Komentar Anda" style="height: 100px;"></textarea>
                                  <input type="hidden" name="id_pengguna" value="<?php echo $this->session->userdata('id_pengguna')?>">
                                  <input type="hidden" name="id_produk" value="<?php echo $id_produk?>">
                                  <!-- <input type="text" name="id_komentar" value="<?php echo $id_komentar?>"> -->
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="submit" value="submit" class="btn submit_btn"><i class="fa fa-location-arrow"></i>&nbsp; Kirim</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div> 
                    <?php endforeach;?> 
                  </div>
                </div>
                <?php
                    if($this->session->userdata('id_pengguna')){
                  ?>
                  <div class="col-lg-6">
                    <div class="review_box">
                      <h4>Post a comment</h4>
                      <form class="row contact_form" method="post" id="contactForm" action="<?=site_url('Chome/proseskomentar')?>">
                        <div class="col-md-12">
                          <div class="form-group">
                            <textarea class="form-control" name="komentar" id="message"  rows="1" placeholder="Masukkan Komentar Anda" style="height: 100px;" required oninvalid="this.setCustomValidity('Kolom Masih Kosong, Silahkan Diisi')" oninput="setCustomValidity('')"></textarea>
                            <input type="hidden" name="id_pengguna" value="<?php echo $this->session->userdata('id_pengguna')?>">
                            <input type="hidden" name="id_produk" value="<?php echo $id_produk?>">
                          </div>
                        </div>
                        <div class="col-md-12 text-right">
                          <button type="submit" value="submit" class="btn submit_btn"><i class="fa fa-location-arrow"></i>&nbsp; Kirim</button>
                        </div>
                      </form>
                    </div>
                  </div>
                  <?php 
                  } 
                  else
                  { ?> 
                    <div class="col-lg-6">
                      <div class="review_box">
                        <h4>Post a comment</h4>
                        <form class="row contact_form" method="post" id="contactForm">
                          <div class="col-md-12">
                            <div class="form-group">
                              <textarea class="form-control" name="komentar" id="message"  rows="1"
                                placeholder="Silahkan login terlebih dahulu untuk menambahkan komentar" style="height: 100px;" disabled></textarea>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  <?php 
                  } ?> 
              </div>
            </div>
                      
            <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
              <div class="row">
                <div class="col-lg-6">
                  <div class="review_list">
                    <?php $no=1; 
                      foreach ($row2->result() as $key => $datar) {
                    ?> 
                    <div class="review_item">
                      <div class="media">
                        <div class="d-flex">
                          <img class="rounded-circle mx-auto d-block" src="<?=base_url('uploads/pengguna/'.$datar->foto_pengguna)?>" alt="Card image cap" style="width: 50px; height: 50px;">
                        </div>
                        <div class="media-body" style="color: black;">
                          <h4><?=$datar->username?></h4>
                          <!-- <h4><?=$datar->rating?></h4> -->
                          <?php 
                            if ($datar->rating == '1')
                            {?>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star-o"></i>
                              <i class="fa fa-star-o"></i>
                              <i class="fa fa-star-o"></i>
                              <i class="fa fa-star-o"></i>
                          <?php }
                            else if ($datar->rating =='2')
                            { ?>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star-o"></i>
                              <i class="fa fa-star-o"></i>
                              <i class="fa fa-star-o"></i>
                          <?php  }
                            else if ($datar->rating =='3') 
                          {?>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star-o"></i>
                              <i class="fa fa-star-o"></i>
                          <?php }
                          else if ($datar->rating == '4')
                          { ?>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star-o"></i>
                          <?php }
                          else
                          { ?>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                          <?php } ?> &nbsp;
                          <?=date('d/m/Y', strtotime($datar->tanggal))?>
                        </div>
                      </div>
                      <p><?=$datar->review?></p>
                    </div>
                    <?php } ?>
                  </div>
                </div>
                <?php
                    if($this->session->userdata('id_pengguna')){
                  ?>
                <div class="col-lg-6">
                  <div class="review_box">
                    <h5>Berikan Rating dan Review Anda Terhadap Produk Ini:</h5>
                    <form class="row contact_form" method="post" id="contactForm" action="<?=site_url('Chome/prosesrating')?>">
                      <div class="col-md-12">
                          <ul class="list">
                            <li>
                                <a><i class="fa fa-star"></i></a>
                                <input type="radio" name="rating" value="1">
                            </li>
                            <li style="padding-left: 20px;">
                                <a><i class="fa fa-star"></i><i class="fa fa-star"></i></a>
                                <input type="radio" name="rating" value="2">
                            </li>
                            <li style="padding-left: 20px;">
                                <a><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></a>
                                <input type="radio" name="rating" value="3"> 
                            </li>
                            <li style="padding-left: 20px;">
                                <a><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></a>
                                <input type="radio" name="rating" value="4">
                            </li>
                            <li style="padding-left: 20px;">
                                <a><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></a>
                                <input type="radio" name="rating" value="5">
                            </li>
                          </ul>
                          <div class="form-group">
                            <textarea class="form-control" name="review" id="message"  rows="1" placeholder="Masukkan Review Anda" style="height: 100px;" required oninvalid="this.setCustomValidity('Kolom Masih Kosong, Silahkan Diisi')" oninput="setCustomValidity('')"></textarea>
                            <input type="hidden" name="id_pengguna" value="<?php echo $this->session->userdata('id_pengguna')?>">
                            <input type="hidden" name="id_produk" value="<?php echo $id_produk?>">
                          </div>
                      </div>
                      <div class="col-md-12 text-right">
                        <button type="submit" value="submit" class="btn submit_btn"><i class="fa fa-location-arrow"></i>&nbsp; Kirim</button>
                      </div>
                    </form>
                  </div>
                  </div>
                  <?php 
                  } 
                  else
                  { ?> 
                    <div class="col-lg-6">
                  <div class="review_box">
                    <h5>Berikan Rating dan Review Anda Terhadap Produk Ini:</h5>
                    <form class="row contact_form" method="post" id="contactForm" action="<?=site_url('Chome/prosesrating')?>">
                      <div class="col-md-12">
                          <ul class="list">
                            <li>
                                <a><i class="fa fa-star"></i></a>
                                <input type="radio" name="rating" value="1">
                            </li>
                            <li style="padding-left: 20px;">
                                <a><i class="fa fa-star"></i><i class="fa fa-star"></i></a>
                                <input type="radio" name="rating" value="2">
                            </li>
                            <li style="padding-left: 20px;">
                                <a><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></a>
                                <input type="radio" name="rating" value="3"> 
                            </li>
                            <li style="padding-left: 20px;">
                                <a><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></a>
                                <input type="radio" name="rating" value="4">
                            </li>
                            <li style="padding-left: 20px;">
                                <a><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></a>
                                <input type="radio" name="rating" value="5">
                            </li>
                          </ul>
                          <div class="form-group">
                            <textarea class="form-control" name="review" id="message"  rows="1" placeholder="Silahkan login terlebih dahulu untuk menambahkan rating dan review" readonly style="height: 100px;"></textarea>
                          </div>
                      </div>
                    </form>
                  </div>
                  </div>
                    <?php } ?>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
</section>
<!-- Product Details Section End -->



