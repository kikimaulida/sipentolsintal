<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
              <?php $this->view('messages') ?>
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Data Kelas Usaha</strong>
                    </div>
                    <div class="card-body">
                        <a href="<?=site_url('Ckelas/tambah')?>">
                            <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>&nbsp; Tambah Data</button>
                        </a>
                    </div>
                    
                    <div class="card-body">
                      <div class="table-responsive">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th>No </th>
                                <th>Kelas Usaha</th>
                                <th>Aksi </th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php $no=1; 
                                foreach ($row->result() as $key => $data) {
                                ?>  
                                <tr> 
                                  <td><?=$no++?>.</td>
                                  <!-- <td><?=$data->id_kelas?></td> -->
                                  <td><?=$data->kelas?></td>   
                                  
                                  <td class="text-center" width="180px">
                                      <a href="<?=site_url('ckelas/ubah/'. $data->id_kelas)?>" class="btn btn-success btn-sm"><i class="fa fa-pencil"> Ubah</i></button></a>
                                    <a href="<?=site_url('ckelas/hapus_kelas/'. $data->id_kelas)?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus?')" class="btn btn-danger btn-sm"><i class="fa fa-trash-o "> Hapus</i></button></a>
                                    
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