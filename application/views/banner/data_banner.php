<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
               <?php $this->view('messages') ?>
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Data Banner</strong>
                    </div>
                    <div class="card-body">
                        <a href="<?=site_url('Cbanner/tambah')?>">
                            <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>&nbsp; Tambah Data</button>
                        </a>
                    </div>
                    
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th>No </th>
                                <th>Nama Pengunggah</th>
                                <th>Tanggal Unggah</th>
                                <th>Foto Banner</th>
                                <th>Aksi </th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php $no=1; 
                                foreach ($row->result() as $key => $data) {
                                ?>  
                                <tr> 
                                  <td><?=$no++?>.</td>
                                  <td><?=$data->nama?></td>
                                  <td><?=date('d-m-Y', strtotime($data->tgl_unggah))?></td>
                                  <td align="center">
                                    <?php if ($data->foto_banner != null ) { ?> 
                                      <img src="<?=base_url('uploads/banner/'.$data->foto_banner)?>" style="width: 100px;">
                                      <?php 
                                    }
                                    ?>
                                    
                                  </td>
                                  <td class="text-center" width="180px">
                                      <a href="<?=site_url('cbanner/ubah/'. $data->id_banner)?>" class="btn btn-success btn-sm"><i class="fa fa-pencil"> Ubah</i></button></a>
                                    <a href="<?=site_url('cbanner/hapus_banner/'. $data->id_banner)?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus?')" class="btn btn-danger btn-sm"><i class="fa fa-trash-o "> Hapus</i></button></a>
                                    
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
    </div><!-- .animated -->
</div><!-- .content -->