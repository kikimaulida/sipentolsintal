<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sipentol Sintal</title>
    <link rel="shortcut icon" href="<?=base_url()?>/assets/images/tala.png">
    <!-- Google Font -->
    <link href="<?=base_url()?>/assets1/https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    <!-- Css Styles -->
    <link rel="stylesheet" href="<?=base_url()?>/assets1/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?=base_url()?>/assets1/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="<?=base_url()?>/assets1/css/elegant-icons.css" type="text/css">
    <!-- <link rel="stylesheet" href="<?=base_url()?>/assets1/css/nice-select.css" type="text/css"> -->
    <link rel="stylesheet" href="<?=base_url()?>/assets1/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="<?=base_url()?>/assets1/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="<?=base_url()?>/assets1/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="<?=base_url()?>/assets1/css/style.css" type="text/css">

     <!-- Css Styles assets 2 -->
     <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="icon" href="img/favicon.png" type="image/png" />
      
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?=base_url()?>assets2/css/bootstrap.css" />
    <link rel="stylesheet" href="<?=base_url()?>assets2/vendors/linericon/style.css" />
    <link rel="stylesheet" href="<?=base_url()?>assets2/css/font-awesome.min.css" />
    <link rel="stylesheet" href="<?=base_url()?>assets2/css/themify-icons.css" />
    <link rel="stylesheet" href="<?=base_url()?>assets2/css/flaticon.css" />
    <link rel="stylesheet" href="<?=base_url()?>assets2/vendors/owl-carousel/owl.carousel.min.css" />
    <link rel="stylesheet" href="<?=base_url()?>assets2/vendors/lightbox/simpleLightbox.css" />
    <link rel="stylesheet" href="<?=base_url()?>assets2/vendors/nice-select/css/nice-select.css" />
    <link rel="stylesheet" href="<?=base_url()?>assets2/vendors/animate-css/animate.css" />
    <link rel="stylesheet" href="<?=base_url()?>assets2/vendors/jquery-ui/jquery-ui.css" />
    <!-- main css -->
    <link rel="stylesheet" href="<?=base_url()?>assets2/css/style.css" />
    <link rel="stylesheet" href="<?=base_url()?>assets2/css/responsive.css" />
    <link href="<?=base_url()?>/bxslider/dist/jquery.bxslider.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?=base_url()?>/assets/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/vendors/flag-icon-css/css/flag-icon.min.css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    <!-- Humberger Begin -->
    <?php
        if($this->session->userdata('id_pengguna')){
    ?>
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="<?=base_url()?>/assets1/#"><img src="<?=base_url()?>/assets1/img/logo.png" alt=""></a>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li><a href="<?=site_url('Chome')?>">Home</a></li>
                <li><a href="<?=site_url('chome/tampilusaha')?>">Usaha</a></li>
                <li><a href="<?=site_url('chome/tampilproduk')?>">Produk</a></li>
                <li><a href="<?=site_url('chome/kontak')?>">Kontak</a></li>
                <li><a href="<?=site_url('chome/tentang')?>">Tentang</a></li>
                <?php if($this->session->userdata('level') != 'user') { ?>
                    <li><a href="<?=site_url('Dashboard')?>"> Beranda</a></li> 
                <?php } ?>
                <li><a href="<?=site_url('cakun/profile_pengguna/'. $this->session->userdata('id_pengguna'))?>">Profil Saya</a></li>
                <li><a href="<?=site_url('Auth/logout')?>">Logout</a></li>

            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-phone"></i> 0512-21873</li>
                <li>Dapatkan Produk-produk Unggulan dan Berkualitas Disini</li>
            </ul>
        </div>
    </div>
    <?php }
    else
    { ?>
        <div class="humberger__menu__overlay"></div>
        <div class="humberger__menu__wrapper">
            <div class="humberger__menu__logo">
                <a href="<?=base_url()?>/assets1/#"><img src="<?=base_url()?>/assets1/img/logo.png" alt=""></a>
            </div>
            <nav class="humberger__menu__nav mobile-menu">
                <ul>
                    <li><a href="<?=site_url('Chome')?>">Home</a></li>
                    <li><a href="<?=site_url('Chome/tampilusaha')?>">Usaha</a></li>
                    <li><a href="<?=site_url('Chome/tampilproduk')?>">Produk</a></li>
                    <li><a href="<?=site_url('chome/kontak')?>">Kontak</a></li>
                    <li><a href="<?=site_url('chome/tentang')?>">Tentang</a></li>
                    <li><a href="<?=site_url('Auth/login')?>">Login</a></li>
                    <li><a href="<?=site_url('Chome/daftar')?>">Daftar</a></li>
                </ul>
            </nav>
            <div id="mobile-menu-wrap"></div>
            <div class="humberger__menu__contact">
                <ul>
                    <li><i class="fa fa-phone"></i> 0512-21873</li>
                    <li>Dapatkan Produk-produk Unggulan dan Berkualitas Disini</li>
                </ul>
            </div>
        </div>
    <?php } ?>
    <!-- Humberger End -->

    <!-- web -->
    <header class="header_area">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__left">
                        <ul>
                            <li><i class="fa fa-phone"></i> 0512-21873</li>
                            <li>Dapatkan Produk-produk Unggulan dan Berkualitas Disini</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__right">
                        <?php
                            if($this->session->userdata('id_pengguna')){
                        ?>
                        <div class="header__top__right__language">
                            <img src="img/language.png" alt=""><i class="fa fa-user" style="color: black;"></i>&nbsp; 
                            <div style="color: black;"><?=ucfirst($this->fungsi->pengguna_login()->nama_lengkap)?></div>
                            <span class="arrow_carrot-down"></span>
                            <ul style="background: grey; width: 130%;">
                                <?php if($this->session->userdata('level') != 'user') { ?>
                                <li><a href="<?=site_url('Dashboard')?>"> Beranda</a></li> 

                                <?php } ?>
                                <li><a href="<?=site_url('cakun/profile_pengguna/'. $this->session->userdata('id_pengguna'))?>">Profil Saya</a></li>
                                <li><a href="<?=site_url('Auth/logout')?>">Logout</a></li>
                            </ul>
                        </div>
                        <?php } 
                        else{ ?>
                        <div class="header__top__right__social">
                            <a href="<?=site_url('Auth/login')?>"><i class="fa fa-user"></i>&nbsp; Login</a>
                        </div>
                         <div class="header__top__right__auth"> 
                            <a href="<?=site_url('chome/daftar')?>"><i class="fa fa-user"></i>Daftar</a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main_menu" style="background-color: black; margin-bottom: 15px;">
       <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="<?=base_url()?>/assets1/./index.html" ><img src="<?=base_url()?>/assets/images/sipentol.png" style="height: 60px;" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-8">
                    <nav class="header__menu">
                        <ul>
                            <li <?=$this->uri->segment(1) == 'Chome' || $this->uri->segment(1) == '' ? 'class="active"' : ''?>><a href="<?=site_url('Chome')?>">Home</a></li>
                            <li <?=$this->uri->segment(2) == 'tampilusaha' || $this->uri->segment(2) == 'detailusaha' ? 'class="active"' : ''?>><a href="<?=site_url('chome/tampilusaha')?>">Usaha</a></li>
                            <li <?=$this->uri->segment(2) == 'tampilproduk' || $this->uri->segment(2) == 'detail_produk' ? 'class="active"' : ''?>><a href="<?=site_url('chome/tampilproduk')?>">Produk</a></li>
                            <li <?=$this->uri->segment(2) == 'kontak' ? 'class="active"' : ''?>><a href="<?=site_url('chome/kontak')?>">Kontak</a></li>
                            <li <?=$this->uri->segment(2) == 'tentang' ? 'class="active"' : ''?>><a href="<?=site_url('chome/tentang')?>">Tentang</a></li>
                        </ul>
                    </nav>
                </div> 
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </div>
  </header>
    <!-- Header Section End -->

    <div class="contents">
            <?php echo $contents ?>
    </div>

    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text">
                            <p>
                                <!-- Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="<?=base_url()?>/assets1/https://colorlib.com" target="_blank">Colorlib</a> -->
                                Copyright &copy;<script>document.write(new Date().getFullYear());</script> | Sipentol Sintal

                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="<?=base_url()?>/assets1/js/jquery-3.3.1.min.js"></script>
    <script src="<?=base_url()?>/assets1/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>/assets1/js/jquery.nice-select.min.js"></script>
    <script src="<?=base_url()?>/assets1/js/jquery-ui.min.js"></script>
    <script src="<?=base_url()?>/assets1/js/jquery.slicknav.js"></script>
    <script src="<?=base_url()?>/assets1/js/mixitup.min.js"></script>
    <script src="<?=base_url()?>/assets1/js/owl.carousel.min.js"></script>
    <script src="<?=base_url()?>/assets1/js/main.js"></script>

    <!-- Js Plugins Assets 2-->
    <script src="<?=base_url()?>assets2/js/jquery-3.2.1.min.js"></script>
    <script src="<?=base_url()?>assets2/js/popper.js"></script>
    <script src="<?=base_url()?>assets2/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>assets2/js/stellar.js"></script>
    <script src="<?=base_url()?>assets2/vendors/lightbox/simpleLightbox.min.js"></script>
    <script src="<?=base_url()?>assets2/vendors/nice-select/js/jquery.nice-select.min.js"></script>
    <script src="<?=base_url()?>assets2/vendors/isotope/imagesloaded.pkgd.min.js"></script>
    <script src="<?=base_url()?>assets2/vendors/isotope/isotope-min.js"></script>
    <script src="<?=base_url()?>assets2/vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="<?=base_url()?>assets2/js/jquery.ajaxchimp.min.js"></script>
    <script src="<?=base_url()?>assets2/vendors/counter-up/jquery.waypoints.min.js"></script>
    <script src="<?=base_url()?>assets2/vendors/counter-up/jquery.counterup.js"></script>
    <script src="<?=base_url()?>assets2/js/mail-script.js"></script>
    <script src="<?=base_url()?>assets2/js/theme.js"></script>
    <script src="<?=base_url()?>assets2/vendors/jquery-ui/jquery-ui.js"></script>

    <!-- jQuery library -->
    <script src="<?=base_url()?>/bxslider/dist/jquery-3.1.1.min.js"></script>
    <!-- bxSlider Javascript file -->
    <script src="<?=base_url()?>/bxslider/dist/jquery.bxslider.js"></script>
    <script>
      $(document).ready(function(){
        $('.bxslider').bxSlider({
          mode: 'horizontal',
          moveSlides: 1,
          slideMargin: 40,
          infiniteLoop: true,
          slideWidth: 1000,

          minSlides: 1,
          maxSlides: 1,
          speed: 800,
          auto: true,

        });
      });
    </script>

    
</body>
</html>