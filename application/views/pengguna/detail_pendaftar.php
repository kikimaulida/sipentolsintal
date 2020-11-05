<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                      <strong class="card-title">Detail Pendaftar</strong>
                    </div>
                    <div class="card-body" align="center">
                      <a href="<?=site_url('ckonfirakun')?>">
                          <button type="button" class="btn btn-secondary btn-sm" style="margin-top: 10px""><i class="fa fa-reply-all"></i>&nbsp; Kembali</button>
                      </a>
                    </div>
                    
                    <div class="card-body">
                      <div class="table-responsive">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">

                              <?php $no=1; 
                                foreach ($row->result() as $key => $data) {
                                ?> 
                                <tr>
                                  <td width="15%"><b>NIK</b></td>
                                  <td><?=$data->nik?></td>
                                </tr> 
                                <tr>
                                  <td width="15%"><b>Nama Lengkap</b></td>
                                  <td><?=$data->nama_lengkap?></td>
                                </tr>
                                <tr>
                                  <td width="15%"><b>Email</b></td>
                                  <td><?=$data->email?></td>
                                </tr>
                                <tr>
                                  <td width="15%"><b>username</b></td>
                                  <td><?=$data->username?></td>
                                </tr>

                                 <tr>
                                  <td width="15%"><b>No. SKU</b></td>
                                  <td><?=$data->no_sku?></td>
                                </tr>

                                <tr>
                                  <td width="15%"><b>Foto SKU</b></td>  
                                  <td>
                                    <?php if ($data->foto_sku!= null ) { ?> 
                                      <img src="<?=base_url('uploads/pengguna/'.$data->foto_sku)?>" style="width: 300px;">
                                      <?php 
                                    }
                                    ?>                           
                                  </td>
                                </tr>

                                <tr>
                                  <td width="15%"><b>Foto KTP</b></td>  
                                  <td>
                                    <?php if ($data->foto_ktp!= null ) { ?> 
                                      <img src="<?=base_url('uploads/pengguna/'.$data->foto_ktp)?>" style="width: 300px;">
                                      <?php 
                                    }
                                    ?>                           
                                  </td>
                                </tr>
                                
                                <tr>
                                  <td width="15%"><b>Foto Pengguna</b></td>  
                                  <td>
                                    <?php if ($data->foto_pengguna != null ) { ?> 
                                      <img src="<?=base_url('uploads/pengguna/'.$data->foto_pengguna)?>" style="width: 150px;">
                                      <?php 
                                    }
                                    ?>                           
                                  </td>
                                </tr>
                                <tr>
                                  <td width="15%"><b>Level</b></td>
                                  <td><?=$data->level?></td>
                                </tr>
                                <tr>
                                  <td width="15%"><b>Status</b></td>
                                  <td><?=$data->status?></td>
                                </tr>
                                
                                <?php 
                                  }
                                ?>                         
                            </tbody>
                        </table>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->