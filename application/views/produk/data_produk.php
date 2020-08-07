<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
              <?php $this->view('messages') ?>
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Data Produk</strong>
                    </div>
                    <div class="card-body">
                        <a href="<?=site_url('Cproduk/tambah')?>">
                            <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>&nbsp; Tambah Data</button>
                        </a>
                    </div>
                    
                    <div class="card-body">
                      <div class="table-responsive">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th>No </th>
                                <!-- <th>ID produk</th> -->
                                <th>Nama Produk</th>
                                <th>Nama Usaha</th>
                                <!-- <th>Deskripsi</th>
                                <th>Harga</th>
                                <th>Foto produk</th> -->
                                <th>Status</th>
                                 <th>Tanggal Unggah</th>
                                <th>Aksi </th>

                              </tr>
                            </thead>
                            <tbody>
                              <?php $no=1; 
                                foreach ($row->result() as $key => $data) {
                                ?>  
                                <tr> 
                                  <td><?=$no++?>.</td>
                                 <!--  <td><?=$data->id_produk?></td> -->
                                  <td><?=$data->nama_produk?></td>
                                  <td><?=$data->nama_usaha?></td>
                                 <!--  <td><?=$data->deskripsi?></td>
                                  <td><?=$data->harga?></td>
                                  <td align="center">
                                    <?php if ($data->foto_produk != null ) { ?> 
                                      <img src="<?=base_url('uploads/produk/'.$data->foto_produk)?>" style="width: 100px;">
                                      <?php 
                                    }
                                    ?>
                                    
                                  </td> -->
                                  <td><?=$data->status?></td>
                                  <td><?=date('d-m-Y', strtotime($data->tgl_unggah))?></td>
                                  
                                  <td class="text-center" width="230px">
                                    <a href="<?=site_url('Cproduk/detail_produk/'. $data->id_produk)?>" class="btn btn-info btn-sm"><i class="fa fa-eye"> Detail</i></button></a>
                                    <a href="<?=site_url('Cproduk/ubah/'. $data->id_produk)?>" class="btn btn-success btn-sm"><i class="fa fa-pencil"> Ubah</i></button></a>
                                    <a href="<?=site_url('Cproduk/hapus_produk/'. $data->id_produk)?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus?')" class="btn btn-danger btn-sm"><i class="fa fa-trash-o "> Hapus</i></button></a>
                                    
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