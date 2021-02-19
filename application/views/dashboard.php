<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Beranda</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Beranda</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body"></div>
                      <div class="row" style="margin-left: 5px; margin-right: 5px;">
                        <?php if($this->session->userdata('level') == 'admin') { ?>   
                        <div class="col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body bg-flat-color-1">
                                    <div class="stat-widget-one">
                                        <div class="h1 text-muted text-right mb-0">
                                            <i class="fa fa-shopping-cart text-light"></i>
                                        </div>
                                        <div class="h4 mb-0 text-light">
                                            <span class="count"><?php echo $jumlah_usaha?></span>
                                        </div>
                                        <small class="text-uppercase font-weight-bold text-light">Usaha Terdaftar</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body bg-flat-color-3">
                                    <div class="stat-widget-one">
                                        <div class="h1 text-muted text-right mb-0">
                                            <i class="fa fa-tag text-light"></i>
                                        </div>
                                        <div class="h4 mb-0 text-light">
                                            <span class="count"><?php echo $jumlahproduk?></span>
                                        </div>
                                        <small class="text-uppercase font-weight-bold text-light">Jumlah Produk</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body bg-flat-color-2">
                                    <div class="stat-widget-one">
                                        <div class="h1 text-muted text-right mb-0">
                                            <i class="fa fa-users text-light"></i>
                                        </div>
                                        <div class="h4 mb-0 text-light">
                                            <span class="count"><?php echo $jumlah_pelakuusaha?></span>
                                        </div>
                                        <small class="text-uppercase font-weight-bold text-light">Jumlah Pelaku Usaha</small>
                                    </div>
                                </div>
                            </div>
                        </div>
            

                        <div class="col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body bg-flat-color-4">
                                    <div class="stat-widget-one">
                                        <div class="h1 text-muted text-right mb-0">
                                            <i class="fa fa-users text-light"></i>
                                        </div>
                                        <div class="h4 mb-0 text-light">
                                            <span class="count"><?php echo $jumlah_user?></span>
                                        </div>
                                        <small class="text-uppercase font-weight-bold text-light">Jumlah User</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <html>
                          <head>
                            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                            <script type="text/javascript">
                                google.charts.load('current', {'packages':['corechart']});
                                google.charts.setOnLoadCallback(drawChart);
                                function drawChart() {
                                    var data = google.visualization.arrayToDataTable([
                                        ['Task', 'Hours per Day'],
                                        <?php
                                            foreach ($hitungkategori as $key ):
                                        ?>
                                        ['<?php echo $key['nama_kategori'] ?>',  <?php echo $key['jumlah'] ?>],
                                        <?php endforeach; ?>
                                    ]);
                                    var options = {
                                        title: 'Kategori Usaha Kecil'
                                    };
                                    var chart = new google.visualization.PieChart(document.getElementById('kategori'));
                                    chart.draw(data, options);
                                }
                            </script>
                             <script type="text/javascript">
                                google.charts.load('current', {'packages':['corechart']});
                                google.charts.setOnLoadCallback(drawChart);
                                function drawChart() {
                                    var data = google.visualization.arrayToDataTable([
                                        ['Task', 'Hours per Day'],
                                        <?php
                                            foreach ($hitungkecamatan as $key ):
                                        ?>
                                        ['<?php echo $key['nama_kecamatan'] ?>',  <?php echo $key['jumlah'] ?>],
                                        <?php endforeach; ?>
                                    ]);
                                    var options = {
                                        title: 'Persentase Usaha Kecil Tiap Kecamatan '
                                    };
                                    var chart = new google.visualization.PieChart(document.getElementById('kecamatan'));
                                    chart.draw(data, options);
                                }
                            </script>
                          </head>
                          <body>
                            <div id="kategori" style="width: 600px; height: 350px;"></div>
                            <div id="kecamatan" style="width: 600px; height: 350px;"></div>
                          </body>
                        </html>

                       <!--  <html>
                        <head>
                            
                            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                            <div id="chart_div" style="width: 50%;"></div>
                            <script type="text/javascript">
                                google.charts.load('current', {packages: ['corechart', 'bar']});
                                google.charts.setOnLoadCallback(drawBasic);

                                function drawBasic() {
                                    var data = google.visualization.arrayToDataTable([
                                        ['Element', 'Jumlah', { role: 'style' }], 
                                        <?php
                                            foreach ($hitungkecamatan as $key ):
                                        ?>
                                        ['<?php echo $key['nama_kecamatan'] ?>', <?php echo $key['jumlah'] ?>, 'blue'],  // RGB value
                                        <?php endforeach; ?>
                                    ]);
                                    var options = {
                                        title: 'Jumlah Usaha Kecil Pada Kecamatan',
                                        hAxis: {
                                            title: 'Kecamatan',
                                            format: 'h:mm a',
                                            viewWindow: {
                                                min: [7, 30, 0],
                                                max: [17, 30, 0]
                                            }
                                        },
                                        vAxis: {
                                            title: 'Skala of 1-10'
                                        }
                                    };
                                    var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
                                    chart.draw(data, options);
                                    }
                            </script>
                        </head>
                        <body>
                        </body>
                    </html> -->
                    <?php } ?>

                    <?php if($this->session->userdata('level') == 'pelaku usaha') { ?>
                    <div class="col-lg-6 col-md-12">
                        <div class="card">
                            <div class="card-body bg-flat-color-1"">
                                <div class="stat-widget-one">
                                    <div class="h1 text-muted text-right mb-0">
                                        <i class="fa fa-shopping-cart text-light"></i>
                                    </div>
                                    <div class="h4 mb-0 text-light">
                                        <span class="count"><?php echo $usahapengguna?></span>
                                    </div>
                                    <small class="text-uppercase font-weight-bold text-light">Jumlah Usaha</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="card">
                            <div class="card-body bg-flat-color-5"">
                                <div class="stat-widget-one">
                                    <div class="h1 text-muted text-right mb-0">
                                        <i class="fa fa-tag text-light"></i>
                                    </div>
                                    <div class="h4 mb-0 text-light">
                                        <span class="count"><?php echo $produkpengguna?></span>
                                    </div>
                                    <small class="text-uppercase font-weight-bold text-light">Jumlah Produk</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body bg-flat-color-5"">
                                <div class="stat-widget-one">
                                    <div class="h1 text-muted text-right mb-0">
                                        <i class="fa fa-comments text-light"></i>
                                    </div>
                                    <div class="h4 mb-0 text-light">
                                        <span class="count">0</span>
                                    </div>
                                    <small class="text-uppercase font-weight-bold text-light">Komentar Produk</small>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!--  ADMIN -->
<!-- <?php if($this->session->userdata('level') == 'admin') { ?>   
<div class="col-lg-3 col-md-6">
    <div class="card">
        <div class="card-body bg-flat-color-2"">
            <div class="stat-widget-one">
                <div class="h1 text-muted text-right mb-0">
                    <i class="fa fa-shopping-cart text-light"></i>
                </div>
                <div class="h4 mb-0 text-light">
                    <span class="count"><?php echo $jumlah_usaha?></span>
                </div>
                <small class="text-uppercase font-weight-bold text-light">Usaha Terdaftar</small>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-3 col-md-6">
    <div class="card">
        <div class="card-body bg-flat-color-3"">
            <div class="stat-widget-one">
                <div class="h1 text-muted text-right mb-0">
                    <i class="fa fa-users text-light"></i>
                </div>
                <div class="h4 mb-0 text-light">
                    <span class="count"><?php echo $jumlah_pelakuusaha?></span>
                </div>
                <small class="text-uppercase font-weight-bold text-light">Jumlah Pelaku Usaha</small>
            </div>
        </div>
    </div>
</div>


<div class="col-lg-3 col-md-6">
    <div class="card">
        <div class="card-body bg-flat-color-4"">
            <div class="stat-widget-one">
                <div class="h1 text-muted text-right mb-0">
                    <i class="fa fa-users text-light"></i>
                </div>
                <div class="h4 mb-0 text-light">
                    <span class="count">0</span>
                </div>
                <small class="text-uppercase font-weight-bold text-light">Jumlah User</small>
            </div>
        </div>
    </div>
</div>
<?php } ?> -->

<!--  PEMILIK USAHA -->
<!-- <?php if($this->session->userdata('level') == 'pelaku usaha') { ?>
<div class="col-lg-6 col-md-12">
    <div class="card">
        <div class="card-body bg-flat-color-5"">
            <div class="stat-widget-one">
                <div class="h1 text-muted text-right mb-0">
                    <i class="fa fa-tag text-light"></i>
                </div>
                <div class="h4 mb-0 text-light">
                    <span class="count">87500</span>
                </div>
                <small class="text-uppercase font-weight-bold text-light">Jumlah Produk</small>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-6 col-md-12">
    <div class="card">
        <div class="card-body bg-flat-color-1"">
            <div class="stat-widget-one">
                <div class="h1 text-muted text-right mb-0">
                    <i class="fa fa-comments text-light"></i>
                </div>
                <div class="h4 mb-0 text-light">
                    <span class="count">0</span>
                </div>
                <small class="text-uppercase font-weight-bold text-light">Komentar Produk</small>
            </div>
        </div>
    </div>
</div>
<?php } ?> -->