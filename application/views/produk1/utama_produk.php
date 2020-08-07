<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
               <?php $this->view('messages') ?>
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">List Usaha</strong>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th>No </th>
                               <!--  <th>Nama Pemilik</th> -->
                                <th>Nama usaha</th>
                                <th>Aksi</th>

                              </tr>
                            </thead>
                            <tbody>
                              <?php $no=1; 
                                foreach ($row->result() as $key => $data) {
                                ?>  
                                <tr> 
                                  <td><?=$no++?>.</td>
                                  <!-- <td><?=$data->nama_lengkap?></td> -->
                                  <td><?=$data->nama_usaha?></td>
                                  <td class="text-center" width="250px">
                                    <a href="<?=site_url('cproduk1/tampil_produk/'. $data->id_usaha. '/'.$data->id_pengguna)?>" class="btn btn-info btn-sm"><i class="fa fa-eye"> Lihat Produk</i></button></a>
                                    </button></a>
                                    
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