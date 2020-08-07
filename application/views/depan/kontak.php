<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="<?=base_url()?>/assets1/img/b3.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Kontak Kami</h2>
                    <div class="breadcrumb__option">
                        <span>Home - Kontak</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- ================ contact section start ================= -->
<section class="section_gap">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2 class="contact-title">Berikan Saran Anda</h2>
      </div>
      <div class="col-lg-8 mb-4 mb-lg-0">
        <form class="form-contact contact_form" action="<?php echo base_url('Chome/prosessaran')?>" method="post" id="contactForm">
          <div class="row">
              <div class="col-12">
                  <div class="form-group">
                    <input class="form-control" name="nama" type="text" placeholder="masukkan nama lengkap" required oninvalid="this.setCustomValidity('Kolom Masih Kosong, Silahkan Diisi')" oninput="setCustomValidity('')">
                  </div>
                </div>
              <div class="col-12">
                  <div class="form-group">
                    <textarea class="form-control w-100" name="saran" cols="30" rows="9" placeholder="masukkan saran Anda" required oninvalid="this.setCustomValidity('Kolom Masih Kosong, Silahkan Diisi')" oninput="setCustomValidity('')"></textarea>
                  </div>
              </div>
          </div>
          <div class="form-group mt-lg-3">
            <button type="submit" class="main_btn">Kirim Saran</button>
          </div>
        </form>
      </div>
      <div class="col-lg-4">
        <div class="media contact-info">
          <span class="contact-info__icon"><i class="ti-home"></i></span>
          <div class="media-body">
            <h3>Dinas Koperasi, Usaha Kecil dan Perdagangan Kab. Tanah Laut</h3>
            <p>Jl. Datu Insad, Pelaihari</p>
          </div>
        </div>
        <div class="media contact-info">
          <span class="contact-info__icon"><i class="ti-tablet"></i></span>
          <div class="media-body">
            <h3>0512-21873</h3>
            <p>Senin s/d Jumat (08.00-16.00)</p>
          </div>
        </div>
        <div class="media contact-info">
          <span class="contact-info__icon"><i class="ti-email"></i></span>
          <div class="media-body">
            <h3>siaciltala@gmail.com</h3>
            <p>Send us your query anytime!</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>