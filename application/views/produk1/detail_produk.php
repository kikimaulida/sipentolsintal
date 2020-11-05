<div class="content mt-3">
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <strong class="card-title">Detail Produk</strong>
          </div>
          <div class="card-body" align="center">
            <?php $no=1; 
              foreach ($row->result() as $key => $data) {
              ?> 
                <a href="<?=site_url('cproduk1/tampil_produk/'. $data->id_usaha. '/'. $data->id_pengguna)?>">
                    <button type="button" class="btn btn-secondary btn-sm" style="margin-top: 10px""><i class="fa fa-reply-all"></i>&nbsp; Kembali</button>
                </a>
                <a href="<?=site_url('cproduk1/tampil_komentar/'. $data->id_produk)?>">
                    <button type="button" class="btn btn-info btn-sm" style="margin-left: 10px; margin-top: 10px""><i class="fa fa-comments-o"></i>&nbsp; Lihat Komentar</button>
                </a>
              <?php 
              }
            ?> 
          </div>
                    
          <!-- <div class="card-body">
            <div class="table-responsive">
              <table id="bootstrap-data-table-export" class="table table-striped table-bordered">

                    <?php $no=1; 
                      foreach ($row->result() as $key => $data) {
                      ?>  
                      <tr>
                        <td width="15%"><b>Nama Usaha</b></td>
                        <td><?=$data->nama_usaha?></td>
                      </tr>
                      <tr>
                        <td width="15%"><b>Nama produk</b></td>
                        <td><?=$data->nama_produk?></td>
                      </tr>
                      <tr>
                        <td width="15%"><b>Deskripsi</b></td>
                        <td><?=$data->deskripsi_produk?></td>
                      </tr>
                      <tr>
                        <td width="15%"><b>Harga</b></td>
                        <td><?=$data->harga?></td>
                      </tr>
                      <tr>
                        <td width="15%"><b>Foto produk</b></td>  
                        <td>
                          <?php if ($data->foto_produk != null ) { ?> 
                            <img src="<?=base_url('uploads/produk/'.$data->foto_produk)?>" style="width: 150px;">
                            <?php 
                          }
                          ?>                           
                        </td>
                      </tr>
                      <tr>
                        <td width="15%"><b>Status</b></td>
                        <td><?=$data->status_produk?></td>
                      </tr>
                      <tr>
                        <td width="15%"><b>Tanggal Unggah</b></td>
                        <td><?=date('d-m-Y', strtotime($data->tgl_unggah))?></td>
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
                    <label class=" form-control-label">Nama Usaha</label>
                </div>
                <div class="col-sm-3">
                  <textarea name="deskripsi" rows="2" class="form-control" disabled><?=$data->nama_usaha?></textarea>
                </div>

                <div class="col-md-1"></div>
                <div class="col-md-2">
                    <label class=" form-control-label">Nama Produk</label>
                </div>
                <div class="col-sm-3">
                  <textarea name="deskripsi" rows="2" class="form-control" disabled><?=$data->nama_produk?></textarea>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-0"></div>
                <div class="col-md-2">
                    <label class=" form-control-label">Harga</label>
                </div>
                <div class="col-sm-3">
                  <input type="" class="form-control" value="<?=$data->harga?>" disabled>
                </div>

                <div class="col-md-1"></div>
                <div class="col-md-2">
                    <label class=" form-control-label">Status</label>
                </div>
                <div class="col-sm-3">
                  <input type="" class="form-control" value="<?=$data->status_produk?>" disabled>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-0"></div>
                <div class="col-md-2">
                    <label class=" form-control-label">Deskripsi</label>
                </div>
                <div class="col-sm-3">
                    <textarea name="deskripsi" rows="4" class="form-control" disabled><?=$data->deskripsi_produk?></textarea>
                </div>

                <div class="col-md-1"></div>
                <div class="col-md-2">
                    <label class=" form-control-label">Foto Produk</label>
                </div>
                <div class="col-sm-3">
                  <?php if ($data->foto_produk != null ) { ?> 
                    <img src="<?=base_url('uploads/produk/'.$data->foto_produk)?>" style="width: 150px;">
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

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
              <?php $this->view('messages') ?>
                <div class="card">
                    <div class="card-header">
                      <?php
                        foreach ($row->result() as $key => $data) {
                      ?>  
                        <strong class="card-title">Foto Produk "<?=$data->nama_produk?>" Lainnya</strong>
                      <?php } ?>
                    </div>
                    <div class="card-body">
                        <a href="<?=site_url('Cproduk1/tambah_foto/'.$this->uri->segment(3))?>">
                            <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>&nbsp; Tambah Foto</button>
                        </a>
                    </div>
                    
                    <div class="card-body">
                      <div class="table-responsive">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th>No </th>
                                <th>Foto Produk</th>
                                <th>Aksi </th>

                              </tr>
                            </thead>
                            <tbody>
                              <?php $no=1; 
                                foreach ($row1->result() as $key => $data) {
                                ?>  
                                <tr> 
                                  <td><?=$no++?>.</td>
                                  <td class="text-center"> 
                                    <?php if ($data->foto_produk != null ) { ?> 
                                      <img src="<?=base_url('uploads/produk/'.$data->foto_produk)?>" style="width: 100px;">
                                      <?php 
                                    }
                                    ?>    
                                  </td>
                                  <td class="text-center" width="230px">
                                    <a href="<?=site_url('cproduk1/hapus_foto/'. $data->id_foto)?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus?')" class="btn btn-danger btn-sm"><i class="fa fa-trash-o "> Hapus</i></button></a>
                                    
                                  </td>
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