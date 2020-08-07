<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                      <strong class="card-title">Detail Usaha</strong>
                    </div>
                    <div class="card-body" align="center">
                      <?php $no=1; 
                        foreach ($row->result() as $key => $data) {
                        ?> 
                          <a href="<?=site_url('Cusaha')?>">
                              <button type="button" class="btn btn-secondary btn-sm" style="margin-top: 10px""><i class="fa fa-reply-all"></i>&nbsp; Kembali</button>
                          </a>
                         <!--  <a href="<?=site_url('Ckomentar')?>">
                              <button type="button" class="btn btn-info btn-sm" style="margin-left: 10px; margin-top: 10px""><i class="fa fa-comments-o"></i>&nbsp; Lihat Komentar</button>
                          </a> -->
                          <a href="<?=site_url('cusaha/ubah/'. $data->id_usaha)?>"> <button class="btn btn-success btn-sm" style="margin-left: 10px; margin-top: 10px"><i class="fa fa-pencil"></i>&nbsp; Ubah</button></a>
                          <a href="<?=site_url('cusaha/hapus_usaha/'. $data->id_usaha)?>"> <button onclick="return confirm('Apakah Anda Yakin Ingin Menghapus?')" class="btn btn-danger btn-sm" style="margin-left: 10px; margin-top: 10px""><i class="fa fa-trash-o "></i>&nbsp; Hapus</button></a>
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
                                <!-- <tr> 
                                  <td width="15%"><b>ID Usaha</b></td>
                                  <td><?=$data->id_usaha?></td>
                                </tr> -->
                                <tr>
                                  <td width="15%"><b>Nama Usaha</b></td>
                                  <td><?=$data->nama_usaha?></td>
                                </tr>
                                <tr>
                                  <td width="15%"><b>Nama Pemilik</b></td>
                                  <td><?=$data->nama_lengkap?></td>
                                </tr>
                                <tr>
                                  <td width="15%"><b>Asset</b></td>
                                  <td><?=$data->asset?></td>
                                </tr>
                                <tr>
                                  <td width="15%"><b>Omzet</b></td>
                                  <td><?=$data->omzet?></td>
                                </tr>
                                <tr>
                                  <td width="15%"><b>Kategori</b></td>
                                  <td><?=$data->nama_kategori?></td>
                                </tr>
                                <tr>
                                  <td width="15%"><b>Deskripsi</b></td>
                                  <td><?=$data->deskripsi?></td>
                                </tr>
                                <tr>
                                  <td width="15%"><b>Alamat</b></td>
                                  <td><?=$data->alamat?></td>
                                </tr>
                                <tr>
                                  <td width="15%"><b>Kecamatan</b></td>
                                  <td><?=$data->nama_kecamatan?></td>
                                </tr>
                                <tr>
                                  <td width="15%"><b>Jam Operasional</b></td>
                                  <td><?=$data->jam_operasional?></td>
                                </tr>
                                <tr>
                                  <td width="15%"><b>Telepon</b></td>
                                  <td><?=$data->telepon?></td>
                                </tr>
                                <tr>
                                  <td width="15%"><b>Foto Usaha</b></td>  
                                  <td>
                                    <?php if ($data->foto_usaha != null ) { ?> 
                                      <img src="<?=base_url('uploads/usaha/'.$data->foto_usaha)?>" style="width: 150px;">
                                      <?php 
                                    }
                                    ?>                           
                                  </td>
                                </tr>

                                <tr>
                                  <td width="15%"><b>Foto SKU</b></td>  
                                  <td>
                                    <?php if ($data->foto_sku != null ) { ?> 
                                      <img src="<?=base_url('uploads/pengguna/'.$data->foto_sku)?>" style="width: 150px;">
                                      <?php 
                                    }
                                    ?>                           
                                  </td>
                                </tr>
                                <tr>
                                  <td width="15%"><b>Status</b></td>
                                  <td><?=$data->status?></td>
                                </tr>
                                <tr>
                                  <td width="15%"><b>Bergabung</b></td>
                                  <td><?=date('d-m-Y', strtotime($data->bergabung))?></td>
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