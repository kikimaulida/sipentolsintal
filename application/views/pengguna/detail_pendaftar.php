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
                    
                   <!--  <div class="card-body">
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
                    </div> -->
                    <div class="card-body card-block">
                    <form  method="get" class="form-horizontal">
                      <?php $no=1; 
                        foreach ($row->result() as $key => $data) {
                      ?>  
                      <div class="row form-group">
                        <div class="col-md-0"></div>
                        <div class="col-md-2">
                            <label class=" form-control-label">NIK</label>
                        </div>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" value="<?=$data->nik?>" disabled>
                        </div>

                        <div class="col-md-1"></div>
                        <div class="col-md-2">
                            <label class=" form-control-label">Level</label>
                        </div>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" value="<?=$data->level?>" disabled>
                        </div>
                      </div>

                      <div class="row form-group">
                        <div class="col-md-0"></div>
                        <div class="col-md-2">
                            <label class=" form-control-label">Nama Lengkap</label>
                        </div>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" value="<?=$data->nama_lengkap?>" disabled>
                        </div>

                        <div class="col-md-1"></div>
                        <div class="col-md-2">
                            <label class=" form-control-label">Status</label>
                        </div>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" value="<?=$data->status?>" disabled>
                        </div>
                      </div>

                      <div class="row form-group">
                        <div class="col-md-0"></div>
                        <div class="col-md-2">
                            <label class=" form-control-label">Email</label>
                        </div>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" value="<?=$data->email?>" disabled>
                        </div>

                        <div class="col-md-1"></div>
                        <div class="col-md-2">
                            <label class=" form-control-label">Username</label>
                        </div>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" value="<?=$data->username?>" disabled>
                        </div>
                      </div>

                      <div class="row form-group">
                        <div class="col-md-0"></div>
                        <div class="col-md-2">
                            <label class=" form-control-label">No SKU</label>
                        </div>
                        <div class="col-sm-3">
                            <input type="" class="form-control" value="<?=$data->no_sku?>" disabled>
                        </div>

                        <div class="col-md-1"></div>
                        <div class="col-md-2">
                            <label class=" form-control-label">Foto SKU</label>
                        </div>
                        <div class="col-sm-3">
                          <?php if ($data->foto_sku == null ) { ?> 
                            <input type="" class="form-control" value="<?=$data->foto_sku?>" disabled>
                            
                          <?php } 
                          elseif ($data->foto_sku != null ) { ?> 
                            <img src="<?=base_url('uploads/pengguna/'.$data->foto_sku)?>" style="width: 150px;">
                          <?php } ?>  
                        </div>
                      </div>

                      <div class="row form-group">
                        <div class="col-md-0"></div>
                        <div class="col-md-2">
                            <label class=" form-control-label">Foto KTP</label>
                        </div>
                        <div class="col-sm-3">
                          <?php if ($data->foto_ktp != null ) { ?> 
                            <img src="<?=base_url('uploads/pengguna/'.$data->foto_ktp)?>" style="width: 150px;">
                          <?php } ?>  
                        </div>

                        <div class="col-md-1"></div>
                        <div class="col-md-2">
                            <label class=" form-control-label">Foto Pengguna</label>
                        </div>
                        <div class="col-sm-3">
                          <?php if ($data->foto_pengguna != null ) { ?> 
                            <img src="<?=base_url('uploads/pengguna/'.$data->foto_pengguna)?>" style="width: 150px;">
                          <?php } ?>  
                        </div>
                      </div>
                    <?php } ?> 
                    </form>
                  </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->