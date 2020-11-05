<div class="content mt-3">
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-md-12">
        <?php $this->view('messages') ?>
        <div class="card">
          <div class="card-header">
            <strong class="card-title">Data Usaha</strong>
          </div>
            <?php if($this->session->userdata('level') == 'admin') { ?>
            <div class="card-body card-block">
              <form  method="get" class="form-horizontal">
                <div class="row form-group">
                  <div class="col-md-3"></div>
                  <div class="col-md-2">
                      <label class=" form-control-label">Tanggal Awal</label>
                  </div>
                  <div class="col-sm-3">
                      <input type="date" name="awal" placeholder="awal" class="form-control">
                  </div>

                  <!-- <div class="col-md-1"></div>
                  <div class="col-md-2">
                      <label class=" form-control-label">Tanggal Akhir</label>
                  </div>
                  <div class="col-sm-3">
                      <input type="date" name="akhir" placeholder="awal" class="form-control">
                  </div> -->
                </div>

                <form  method="get" class="form-horizontal">
                <div class="row form-group">
                  <div class="col-md-3"></div>
                  <div class="col-md-2">
                      <label class=" form-control-label">Tanggal Akhir</label>
                  </div>
                  <div class="col-sm-3">
                      <input type="date" name="akhir" placeholder="akhir" class="form-control">
                  </div>

                  <!-- <div class="col-md-1"></div>
                  <div class="col-md-2">
                      <label class=" form-control-label">Tanggal Akhir</label>
                  </div>
                  <div class="col-sm-3">
                      <input type="date" name="akhir" placeholder="awal" class="form-control">
                  </div> -->
                </div>

               <!--  <div class="row form-group">
                  <div class="col-md-0"></div>
                  <div class="col-md-2">
                      <label class=" form-control-label">Cari</label>
                  </div>
                  <div class="col-sm-3">
                      <input type="text" name="cari" placeholder="klasifikasi" class="form-control">
                  </div>

                  <div class="col-md-1"></div>
                  <div class="col-md-2">
                      <label class=" form-control-label">Kategori</label>
                  </div>
                  <div class="col-sm-3">
                      <input type="text" name="kategori" placeholder="kategori" class="form-control">
                  </div>
                </div> -->

                <!-- <div class="row form-group">
                  <div class="col-md-0"></div>
                  <div class="col-md-2">
                      <label class=" form-control-label">Kecamatan</label>
                  </div>
                  <div class="col-sm-3">
                      <input type="text" name="kecamatan" placeholder="kecamatan" class="form-control">
                  </div>

                  <div class="col-md-1"></div>
                  <div class="col-md-2">
                      <label class=" form-control-label">Kelurahan</label>
                  </div>
                  <div class="col-sm-3">
                      <input type="text" name="kelurahan" placeholder="kelurahan" class="form-control">
                  </div>
                </div> -->

                <div align="center">
                  <button type="submit" class="btn btn-info">Filter</button>
                  <a href="<?=site_url('cusaha')?>">
                    <button type="button" class="btn btn-info">Semua</button>
                  </a>
                </div>
                <hr>
              </form>
                 
              <?php 
                if(isset($_GET['awal']) && isset($_GET['akhir']))
                {
                  $awal = $_GET['awal'];
                  $akhir = $_GET['akhir'];
                }
                else
                {
                  $awal = date('Y-m-d');
                  $akhir = date('Y-m-d');
                }
              ?>
            </div>
            <?php } ?>
            <div class="card-body">
                <a href="<?=site_url('Cusaha/tambah')?>">
                    <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>&nbsp; Tambah Data</button>
                </a>
                <?php 
                if($this->session->userdata('level') == 'admin') 
                { ?> 
                  <?php
                    if(isset($_GET['awal']) && isset($_GET['akhir']))
                    { ?>
                      <a href="<?=site_url('Ccetak/cetak_usaha/'.$awal. '/'.$akhir)?>">
                        <button type="button" class="btn btn-danger btn-sm"> 
                          <span class= "fa fa-file-pdf-o"> Cetak Data</span>
                        </button>
                      </a> 
                      <a href="<?=site_url('Ccetak/export_usaha/'.$awal. '/'.$akhir)?>">
                      <button type="button" class="btn btn-success btn-sm"> 
                        <span class= "fa fa-file-excel-o"> Export Excel</span>
                      </button>
                    </a> 
                    <?php }
                    else { ?>
                    <a href="<?=site_url('Ccetak/cetak_allusaha')?>">
                      <button type="button" class="btn btn-danger btn-sm"> 
                        <span class= "fa fa-file-pdf-o"> Cetak Data</span>
                      </button>
                    </a> 

                    <a href="<?=site_url('Ccetak/export_allusaha')?>">
                      <button type="button" class="btn btn-success btn-sm"> 
                        <span class= "fa fa-file-excel-o"> Export Excel</span>
                      </button>
                    </a> 
                    <?php } ?>
               <?php } ?>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>No </th>
                      <th>Nama usaha</th>
                      <th>Nama Pemilik</th>
                      <th>Kecamatan</th>
                      <th>Status</th>
                      <th>Bergabung</th>
                      <th>Aksi </th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=1; 
                    foreach ($row->result_array() as $data):
                      
                        $id_usaha=$data['id_usaha'];
                        $nama_usaha=$data['nama_usaha'];
                        $nama_lengkap=$data['nama_lengkap'];
                        $nama_kecamatan=$data['nama_kecamatan'];
                        $status=$data['status'];
                        $bergabung=$data['bergabung'];
                    ?>
                   
                    <tr> 
                      <td><?=$no++?>.</td>
                      <td><?php echo $nama_usaha;?></td>
                      <td><?php echo $nama_lengkap;?></td>
                      <td><?php echo $nama_kecamatan;?></td>

                      <td>
                        <?php 
                          if ($status == 'menunggu konfirmasi') 
                          { ?>
                            <?php if($this->session->userdata('level') == 'pelaku usaha') { ?>
                              <button type="button" class="btn btn-warning btn-sm">Menunggu Konfirmasi</button>
                            <?php }
                            else { ?>
                              <button type="button" data-toggle="modal" data-whatever="@getbootstrap" data-target="#terima<?php echo $id_usaha;?>" class="btn btn-success btn-sm">Terima</button>
                              <button type="button" data-toggle="modal" data-whatever="@getbootstrap" data-target="#tolak<?php echo $id_usaha;?>" class="btn btn-danger btn-sm">Tolak</button>
                              <?php } ?>
                          <?php }
                          else if ($status == 'diterima') { ?>
                            <?php echo "Diterima"; ?>
                          <?php } 
                          else { ?>
                            <?php echo "Ditolak"; ?>
                          <?php } ?>
                      </td>

                      <td><?php echo date('d-m-Y', strtotime($bergabung));?></td>

                      <td class="text-center" width="270px">
                        <a href="<?=site_url('cusaha/detail_usaha/'. $id_usaha)?>" class="btn btn-info btn-sm"><i class="fa fa-eye"> Detail</i></button></a>
                          <a href="<?=site_url('cusaha/ubah/'. $id_usaha)?>" class="btn btn-success btn-sm"><i class="fa fa-pencil"> Ubah</i></button></a>
                          <a href="<?=site_url('cusaha/hapus_usaha/'. $id_usaha)?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus?')" class="btn btn-danger btn-sm"><i class="fa fa-trash-o "> Hapus</i></button></a>
                      </td>  
                      </tr>
                    <?php endforeach;?>                       
                  </tbody>
                  </table>
                </div>
              </div>
              </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->

<?php
  foreach ($row->result_array() as $data):
      $id_usaha=$data['id_usaha'];
      $nama_usaha=$data['nama_usaha'];
      $status=$data['status'];
?>
<div class="modal fade" id="terima<?php echo $id_usaha?>" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h6 class="modal-title" id="staticModalLabel">Konfirmasi</h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <form class="form-horizontal" method="post" action="<?=site_url('Cusaha/status')?>">
            <div class="modal-body">
              <center><p>Terima Usaha <b><?php echo $nama_usaha;?></b> ?</p></center> 
              <input type="hidden" name="id_usaha" value="<?php echo $id_usaha;?>" readonly="readonly">
              <input type="hidden" name="status" value="diterima" readonly="readonly" class="form-control col-md-7 col-xs-12">
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-info">OK</button>
            </div>
          </form>
      </div>
  </div>
</div>
<?php endforeach;?>

<?php
  foreach ($row->result_array() as $data):
      $id_usaha=$data['id_usaha'];
      $nama_usaha=$data['nama_usaha'];
      $status=$data['status'];
?>
<div class="modal fade" id="tolak<?php echo $id_usaha?>" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h6 class="modal-title" id="staticModalLabel">Konfirmasi</h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <form class="form-horizontal" method="post" action="<?=site_url('Cusaha/status')?>">
            <div class="modal-body">
              <center><p>Tolak Usaha <b><?php echo $nama_usaha;?></b> ?</p></center> 
              <input type="hidden" name="id_usaha" value="<?php echo $id_usaha;?>" readonly="readonly">
              <input type="hidden" name="status" value="ditolak" readonly="readonly" class="form-control col-md-7 col-xs-12">
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-info">OK</button>
            </div>
          </form>
      </div>
  </div>
</div>
<?php endforeach;?>

