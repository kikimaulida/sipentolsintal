<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
               <?php $this->view('messages') ?>
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Data Pengguna</strong>
                    </div>
                    <div class="card-body">
                        <a href="<?=site_url('Cpengguna/tambah')?>">
                            <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>&nbsp; Tambah Data</button>
                        </a>
                    </div>
                    
                    <div class="card-body">
                      <div class="table-responsive">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th>No </th>
                                <th>Nama Lengkap</th>
                                <th>Username</th>
                                <th>Level</th>
                                <th>Status</th>
                                <th>Aksi </th>

                              </tr>
                            </thead>

                            <tbody>
                            <?php $no=1; 
                            foreach ($row->result_array() as $data):
                              
                                $id_pengguna=$data['id_pengguna'];
                                $nama_lengkap=$data['nama_lengkap'];
                                $username=$data['username'];
                                $level=$data['level'];
                                $status=$data['status'];
                            ?>
                           
                            <tr> 
                              <td><?=$no++?>.</td>
                              <td><?php echo $nama_lengkap;?></td>
                              <td><?php echo $username;?></td>
                              <td><?php echo $level;?></td>
                              <td><?php echo $status;?></td>

                              <td class="text-center" width="270px">
                                <a href="<?=site_url('cpengguna/detail_pengguna/'. $id_pengguna)?>" class="btn btn-info btn-sm"><i class="fa fa-eye"> Detail</i></button></a>
                                  <a href="<?=site_url('cpengguna/ubah/'. $id_pengguna)?>" class="btn btn-success btn-sm"><i class="fa fa-pencil"> Ubah</i></button></a>
                                  <a href="<?=site_url('cpengguna/hapus_pengguna/'. $id_pengguna)?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus?')" class="btn btn-danger btn-sm"><i class="fa fa-trash-o "> Hapus</i></button></a>
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

