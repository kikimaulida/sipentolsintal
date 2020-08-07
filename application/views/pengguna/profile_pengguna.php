<div class="col-lg-12">
    <?php $this->view('messages') ?>
    <div class="card">
        <div class="card-header">
            <strong>Profile Pengguna</strong>
        </div>
        <div class="card-body card-block">
            <?php echo form_open_multipart('cprofile/proses') ?>
            <form action="<?=site_url('Cprofile/proses')?>" method="post" class="form-horizontal">
                <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <?php $no=1; 
                                    foreach ($row->result() as $key => $data) {
                                ?> 
                                <div class="mx-auto d-block">
                                   <img class="rounded-circle mx-auto d-block" src="<?=base_url('uploads/pengguna/'.$data->foto_pengguna)?>" alt="Card image cap" style="width: 155px; height: 155px;">
                                    <h5 class="text-sm-center mt-2 mb-1"><?=$data->username?></h5>
                                </div>
                                <hr style="margin: 10px">
                                <div class="card-text text-sm-center">
                                    <p style="font-size: 18px;"> OPSI</p>
                                    <a href="<?=site_url('cprofile/ubah/'. $data->id_pengguna)?>">
                                        <button type="button" class="btn btn-info btn-sm" style="width: 130px; margin-top: 0px"">Ubah Data</button>
                                    </a> <br> 

                                    
                                    <button type="button" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap" class="btn btn-success btn-sm" style="margin-top: 5px; width: 130px"> Ubah Foto</button>
                                    <br>
                                </div>
                                <?php 
                                }?> 
                            </div>
                        </div>
                    </div>
               

                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#">Profile</a>
                                    </li>
                                </ul>
                                <br>
                                 <?php $no=1; 
                                foreach ($row->result() as $key => $data) {
                                ?>  
                                <h6><i class="fa fa-user"></i>  Nama Lengkap</h6>
                                <p style="font-size: 14px; padding-top: 5px"><?=$data->nama_lengkap?></p>

                                <h6><i class="fa fa-database"></i>  Level</h6>
                                <p style="font-size: 14px; padding-top: 5px"><?=$data->level?></p>

                                <h6>@   Username</h6>
                                <p style="font-size: 14px; padding-top: 5px"><?=$data->username?></p>
                                <?php 
                                  }
                                ?> 
                                <hr>

                                <a href="<?=site_url('dashboard')?>">
                                    <button type="button" class="btn btn-secondary btn-sm" style="margin-top: 10px; width: 100px""><i class="fa fa-reply-all"></i>&nbsp; Kembali</button>
                                </a>                                
                            </div>
                        </div>
                    </div>
            </form>
            <?php echo form_close()?>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ubah Foto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo base_url('Cprofile/ubah_foto')?>" enctype="multipart/form-data">
          
          <div class="row form-group">
            <div class="col-md-3">
                <label for="file-input" class=" form-control-label">Pilih Foto</label>
            </div>
            <div class="col-12 col-md-9">
                <input type="file" id="file-input" name="foto"   class="form-control-file">
                <input type="hidden" class="form-control" value="<?php echo $this->session->userdata('id_pengguna')?>" id="recipient-name">
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Upload</button>
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
      </div>
      </form>
    </div>
  </div>
</div>