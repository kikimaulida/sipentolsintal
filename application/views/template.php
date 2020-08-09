<?php 
    $jml_usaha = $this->m_notif->total_rows();
    $jml_daftar = $this->m_notif->total_daftar();
?>


<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistem Informasi Usaha Kecil</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="apple-touch-icon" href="<?=base_url()?>/assets/apple-icon.png"> -->
    <link rel="shortcut icon" href="<?=base_url()?>/assets/images/tala.png"">

    <link rel="stylesheet" href="<?=base_url()?>/assets/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/vendors/jqvmap/dist/jqvmap.min.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/assets/css/style.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>


    <link rel="stylesheet" href="<?=base_url()?>/assets/vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/vendors/chosen/chosen.min.css">

    <script>
       function autofill()
       {
            alert('sasa');
       }
    </script>

</head>

<body>


    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href=""><img height="55px" src="<?=base_url()?>/assets/images/logo2.png" alt="Logo">  </a>
                <a class="navbar-brand hidden" href=""><img src="<?=base_url()?>/assets/images/tala.png" alt="Logo"></a> <br>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">

                <ul class="nav navbar-nav">
                    <!-- <img src="<?=base_url()?>/assets/images/admin.jpg" class="rounded-circle mx-auto d-block" width="80px"></a> -->
                    <?php 
                        $id_pengguna = $this->session->userdata('id_pengguna');
                    $a = $this->db->query("SELECT foto_pengguna FROM tb_pengguna WHERE id_pengguna = '$id_pengguna'")->row_array()?>
                    <img src="<?=base_url('uploads/pengguna/'.$a['foto_pengguna'])?>" class="rounded-circle mx-auto d-block" style="width: 100px; height: 100px;" />

                    
                    <h5 class="menu-title" align="center" style="color: white; padding-top: 0" ><?=ucfirst($this->fungsi->pengguna_login()->nama_lengkap)?></h5> <br>
                    <li <?=$this->uri->segment(1) == 'Dashboard' || $this->uri->segment(1) == '' ? 'class="active"' : ''?>>
                        <a href="<?=site_url('Dashboard')?>">
                        <i class="menu-icon fa fa-tachometer"></i> Beranda</a>
                    </li>

                    <li>
                        <a href="<?=site_url('Chome')?>"> <i class="menu-icon fa fa-home"></i> Halaman Depan</a>
                    </li>

                    <li <?=$this->uri->segment(1) == 'Ckonfirusaha' ? 'class="active"' : ''?>>
                        <a href="<?=site_url('Ckonfirusaha')?>"> <i class="menu-icon fa fa-bell"></i>Konfirmasi Usaha<span class="count bg-danger"><?=$jml_usaha ?></span></a>

                    <li <?=$this->uri->segment(1) == 'Ckonfirakun' ? 'class="active"' : ''?>>
                        <a href="<?=site_url('Ckonfirakun')?>"> <i class="menu-icon fa fa-bell"></i>Konfirmasi Akun<span class="count bg-danger"><?=$jml_daftar ?></span></a>
                            
                    </li>
                    <h3 class="menu-title">Kelola Data</h3>
                    <?php if($this->session->userdata('level') == 'admin') { ?>
                    <li class="menu-item-has-children dropdown <?=$this->uri->segment(1) == 'Cusaha' || $this->uri->segment(1) == 'Cproduk1' || $this->uri->segment(1) == 'Ckategori' ? 'active' : ''?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cube"></i>Data Usaha Kecil</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li <?=$this->uri->segment(1) == 'Cusaha' ? 'class="active"' : ''?>>
                                <a href="<?=site_url('Cusaha')?>">
                                <i class="fa fa-shopping-cart"></i> Data Usaha</a>
                            </li>
                            <li <?=$this->uri->segment(1) == 'Cproduk1' ? 'class="active"' : ''?>>
                                <a href="<?=site_url('Cproduk1')?>">
                                <i class="fa fa-tag"></i> Data Produk</a>
                            </li>
                            <li <?=$this->uri->segment(1) == 'Ckategori' ? 'class="active"' : ''?>>
                                <a href="<?=site_url('Ckategori')?>">
                                <i class="fa fa-database"></i> Data Kategori</span></a>
                            </li>
                        </ul>
                    </li>

                    <li <?=$this->uri->segment(1) == 'Cbanner' ? 'class="active"' : ''?>>
                        <a href="<?=site_url('Cbanner')?>"> <i class="menu-icon fa fa-image"></i> Data Banner</a>
                    </li>

                    <li <?=$this->uri->segment(1) == 'Ckecamatan' ? 'class="active"' : ''?>>
                        <a href="<?=site_url('Ckecamatan')?>"> <i class="menu-icon fa fa-flag"></i> Data Kecamatan</a>
                    </li>

                    <li <?=$this->uri->segment(1) == 'Ckelurahan' ? 'class="active"' : ''?>>
                        <a href="<?=site_url('Ckelurahan')?>"> <i class="menu-icon fa fa-flag"></i> Data Kelurahan</a>
                    </li>

                    <li <?=$this->uri->segment(1) == 'Cpengguna' ? 'class="active"' : ''?>>
                        <a href="<?=site_url('Cpengguna')?>"> <i class="menu-icon fa fa-users"></i> Data Pengguna</a>
                    </li>

                    <li <?=$this->uri->segment(1) == 'Csaran' ? 'class="active"' : ''?>>
                        <a href="<?=site_url('Csaran')?>"> <i class="menu-icon fa fa-inbox"></i> Saran Pengguna</a>
                    </li>
                    <?php } ?>

                    <?php if($this->session->userdata('level') == 'pelaku usaha') { ?>
                    <li <?=$this->uri->segment(1) == 'Cusaha' ? 'class="active"' : ''?>>
                        <a href="<?=site_url('Cusaha')?>"> <i class="menu-icon fa fa-shopping-cart"></i> Usaha Saya</a>
                    </li>

                    <li <?=$this->uri->segment(1) == 'Cproduk1' ? 'class="active"' : ''?>>
                        <a href="<?=site_url('Cproduk1')?>"><i class=" menu-icon fa fa-tag"></i> Produk Saya</a>
                    </li>
                    <?php } ?>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <div class="header-menu">
                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="<?=base_url()?>/assets/#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="<?=base_url('uploads/pengguna/'.$a['foto_pengguna'])?>" alt="User Avatar" style="width: 30px; height: 30px;">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a href="<?=site_url('cprofile/profile_pengguna/'. $this->session->userdata('id_pengguna'))?>" class="nav-link"><i class="fa fa-user"></i> My Profile</a>
                            
                            <a class="nav-link" href="<?=site_url('auth/logout')?>" onclick="return confirm('Apakah Anda Yakin Ingin Logout?')"><i class="fa fa-power-off"></i> Logout</a>
                        </div>
                    </div>
                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->

        <div class="contents">

            <?php echo $contents ?>

        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script src="<?=base_url()?>/assets/vendors/jquery/dist/jquery.min.js"></script>
    <script src="<?=base_url()?>/assets/vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?=base_url()?>/assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>/assets/assets/js/main.js"></script>


    <script src="<?=base_url()?>/assets/vendors/chart.js/dist/Chart.bundle.min.js"></script>
    <script src="<?=base_url()?>/assets/assets/js/dashboard.js"></script>
    <script src="<?=base_url()?>/assets/assets/js/widgets.js"></script>
    <script src="<?=base_url()?>/assets/vendors/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="<?=base_url()?>/assets/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <script src="<?=base_url()?>/assets/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>


    <script src="<?=base_url()?>/assets/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?=base_url()?>/assets/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?=base_url()?>/assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?=base_url()?>/assets/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="<?=base_url()?>/assets/vendors/jszip/dist/jszip.min.js"></script>
    <script src="<?=base_url()?>/assets/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="<?=base_url()?>/assets/vendors/pdfmake/build/vfs_fonts.js"></script>
    <script src="<?=base_url()?>/assets/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?=base_url()?>/assets/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?=base_url()?>/assets/vendors/datatables.net-buttons/js/buttons.colVis.min.js"></script>
    <script src="<?=base_url()?>/assets/assets/js/init-scripts/data-table/datatables-init.js"></script>


    <script>
        (function($) {
            "use strict";

            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        })(jQuery);
    </script>

    <!--  Chart js -->
    <script src="<?=base_url()?>/assets/assets/js/init-scripts/chart-js/chartjs-init.js"></script>

    <!--  Chart js -->
    <script src="<?=base_url()?>/assets/vendors/chart.js/dist/Chart.bundle.min.js"></script>
    <script src="<?=base_url()?>/assets/assets/js/init-scripts/chart-js/chartjs-init.js"></script>

    <script src="<?=base_url()?>/assets/vendors/chosen/chosen.jquery.min.js"></script>
    <script>
        jQuery(document).ready(function() {
            jQuery(".standardSelect").chosen({
                disable_search_threshold: 10,
                no_results_text: "Maaf, data tidak ditemukan!",
                width: "100%"
            });
        });
    </script>

</body>

</html>
