<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
              <?php $this->view('messages') ?>
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Data Kelurahan</strong>
                    </div>
                    <div class="card-body">
                        <a href="<?=site_url('Ckelurahan/tambah')?>">
                            <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>&nbsp; Tambah Data</button>
                        </a>
                    </div>
                    
                    <div class="card-body">
                      <div class="table-responsive">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th>No </th>
                                <th>Nama kelurahan</th>
                                <th>Kecamatan</th>
                                <th>Kode Pos</th>
                                <th>Aksi </th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php $no=1; 
                                foreach ($row->result() as $key => $data) {
                                ?>  
                                <tr> 
                                  <td><?=$no++?>.</td>
                                  <td><?=$data->nama_kelurahan?></td>   
                                  <td><?=$data->kec?></td>
                                  <td><?=$data->kode_pos?></td>
                                  
                                  <td class="text-center" width="180px">
                                      <a href="<?=site_url('ckelurahan/ubah/'. $data->id_kelurahan)?>" class="btn btn-success btn-sm"><i class="fa fa-pencil"> Ubah</i></button></a>
                                    <a href="<?=site_url('ckelurahan/hapus_kelurahan/'. $data->id_kelurahan)?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus?')" class="btn btn-danger btn-sm"><i class="fa fa-trash-o "> Hapus</i></button></a>
                                    
                                  </td>
                                </tr>
                                <?php 
                                  }
                                ?>            
                                <!-- <div class="row form-group">
                                  <div class="col col-md-3"><label for="select" class=" form-control-label">kelurahan</label></div>
                                  <div class="col-12 col-md-9">
                                      <select data-placeholder="Choose a Country..." class="standardSelect" tabindex="1">
                                          <option value=""></option>
                                          <?php foreach($row->result() as $data):?>
                                              <option value="<?php echo $data->id_kelurahan;?>"><?php echo $data->nama_kelurahan;?></option>
                                          <?php endforeach;?>
                                      </select>
                                  </div>
                                </div>  -->            
                            </tbody>
                        </table>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->