<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
               <?php $this->view('messages') ?>
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Saran Pengguna</strong>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th>No </th>
                                <th>Nama</th>
                                <th>Saran</th>
                                <th>Tanggal</th>
                                <th>Aksi </th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php $no=1; 
                              foreach ($row->result_array() as $data):
                                  $id_saran=$data['id_saran'];
                                  $nama=$data['nama'];
                                  $saran=$data['saran'];
                                  $tanggal=$data['tanggal'];
                              ?>
                             
                              <tr> 
                                <td><?=$no++?>.</td>
                                <td><?php echo $nama;?></td>
                                <!-- <td><?php echo $saran;?></td> -->
                                <td width="300px">
                                  <?php {
                                      $num_char = 50;
                                  ?>
                                  <?php echo substr($saran, 0, $num_char) . '...'; ?>
                                  <?php } ?>
                                </td>
                                <td><?php echo date('d-m-Y', strtotime($tanggal))?></td>
                                <td class="text-center" width="150px">
                                  <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#staticModal<?php echo $id_saran?>"><i class="fa fa-eye"> Detail</i></button>    
                                  <a href="<?=site_url('csaran/hapus_saran/'. $id_saran)?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus?')" class="btn btn-danger btn-sm"><i class="fa fa-trash-o "> Hapus</i></button></a> 
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

<?php $no=1; 
  foreach ($row->result_array() as $data):
    $id_saran=$data['id_saran'];
    $saran=$data['saran'];
?>
<div class="modal fade" id="staticModal<?php echo $id_saran?>" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="staticModalLabel">Detail Saran</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
             <input type="hidden" name="id_saran" value="<?php echo $id_saran;?>" readonly="readonly">
              <p>
                  <?php echo $saran ?>
              </p>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          </div>
      </div>
  </div>
</div>
<?php endforeach;?>