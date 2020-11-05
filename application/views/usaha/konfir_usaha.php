<div class="content mt-3">
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-md-12">
        <?php $this->view('messages') ?>
        <div class="card">
          <div class="card-header">
            <strong class="card-title">Konfirmasi Usaha</strong>
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

                      <td class="text-center" width="150px">
                        <a href="<?=site_url('ckonfirusaha/detail_usaha/'. $id_usaha)?>" class="btn btn-info btn-sm"><i class="fa fa-eye"> Detail</i></button></a>
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
          <form class="form-horizontal" method="post" action="<?=site_url('ckonfirusaha/status')?>">
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
          <form class="form-horizontal" method="post" action="<?=site_url('ckonfirusaha/status')?>">
            <div class="modal-body">
              <center><p>Tolak Usaha <b><?php echo $nama_usaha;?></b> ?</p></center> 
              <input type="hidden" name="id_usaha" value="<?php echo $id_usaha;?>" readonly="readonly">
              <input type="hidden" name="status" value="ditolak" readonly="readonly" class="form-control col-md-7 col-xs-12">

              <div class="row form-group">
                <div class="col-12 col-md-12"><textarea name="pesan" rows="3" class="form-control" placeholder="Masukkan alasan penolakan"></textarea></div>
              </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-info">OK</button>
            </div>
          </form>
      </div>
  </div>
</div>
<?php endforeach;?>

