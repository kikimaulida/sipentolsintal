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
    
    <link rel="shortcut icon" href="<?=base_url()?>/assets/images/tala.png"">



    <link rel="stylesheet" href="<?=base_url()?>/assets/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="<?=base_url()?>/assets/assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>
<body class="bg-dark">
    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-form">
                    <div class="login-logo">
                        <img class="align-content" height="100px" src="<?=base_url()?>/assets/images/tala.png" alt="">
                        <h3>SIPENTOL SINTAL</h2>
                    </div>
                    <form action="<?=site_url('cdaftar/proses')?>" method="post">
                        <input type="hidden" name="id_pengguna"  class="form-control">
                        <div class="row form-group">
                            <div class="col col-md-12">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                    <input type="text" id="input1-group1" name="username" placeholder="Masukkan Nama Lengkap" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-12">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                    <input type="text" id="input1-group1" name="username" placeholder="Masukkan Username" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-12">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-lock"></i></div>
                                    <input type="password" id="input1-group1" name="password" placeholder="Masukkan Password" class="form-control">
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="level" value="<?php echo $level='user'?>" class="form-control">

                        <button type="submit" name="login" class="btn btn-success btn-flat m-b-30 m-t-30">Daftar</button> 

                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="<?=base_url()?>/assets/vendors/jquery/dist/jquery.min.js"></script>
    <script src="<?=base_url()?>/assets/vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?=base_url()?>/assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>/assets/assets/js/main.js"></script>


</body>

</html>
