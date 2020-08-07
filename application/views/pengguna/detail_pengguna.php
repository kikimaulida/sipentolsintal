<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                      <strong class="card-title">Detail Pengguna</strong>
                    </div>
                    <div class="card-body" align="center">
                      <?php $no=1; 
                        foreach ($row->result() as $key => $data) {
                        ?> 
                          <a href="<?=site_url('cpengguna')?>">
                              <button type="button" class="btn btn-secondary btn-sm" style="margin-top: 10px""><i class="fa fa-reply-all"></i>&nbsp; Kembali</button>
                          </a>
        
                          <a href="<?=site_url('cpengguna/ubah/'. $data->id_pengguna)?>"> <button class="btn btn-success btn-sm" style="margin-left: 10px; margin-top: 10px"><i class="fa fa-pencil"></i>&nbsp; Ubah</button></a>
                          <a href="<?=site_url('cpengguna/hapus_produk/'. $data->id_pengguna)?>"> <button onclick="return confirm('Apakah Anda Yakin Ingin Menghapus?')" class="btn btn-danger btn-sm" style="margin-left: 10px; margin-top: 10px""><i class="fa fa-trash-o "></i>&nbsp; Hapus</button></a>
                        <?php 
                        }
                      ?> 
                    </div>
                    
                    <div class="card-body">
                      <div class="table-responsive">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">

                              <?php $no=1; 
                                foreach ($row->result() as $key => $data) {
                                ?>  
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
                                <!-- <tr>
                                  <td width="15%"><b>password</b></td>
                                  <td><?=$data->password?></td>
                                </tr> -->

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