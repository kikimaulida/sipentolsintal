<div class="row">
    <div class="col-lg-3"></div>
    <div class="col-md-6" style="margin-bottom: 50px;">
        <div class="card">
            <div class="card-header">
                <strong class="card-title mb-3">Profile Pengguna</strong>
            </div>
            <div class="card-body">
                <?php
                    foreach ($rowp->result() as $key => $data) {
                  ?>
                              
                          
                <div class="mx-auto d-block">
                    <img class="rounded-circle mx-auto d-block" src="<?=base_url('uploads/pengguna/'.$data->foto_pengguna)?>" alt="Card image cap" style="width: 155px; height: 155px;">
                    
                    <div align="center" style="margin-top: 10px;">
                        <button type="button" data-toggle="modal" data-target="#ubahfoto" data-whatever="@getbootstrap" class="btn btn-primary btn-sm" style="width: 50px" title="Ubah Foto"><i class="fa fa-picture-o"></i>&nbsp; </button>
                        <button type="button" data-toggle="modal" data-target="#ubahdata" data-whatever="@getbootstrap" class="btn btn-success btn-sm" style="width: 50px" title="Ubah Data"><i class="fa fa-pencil-square-o"></i>&nbsp;</button>
                    </div>
                </div>
                <hr>
                <div class="row form-group">
                    <div class="col-md-3"><label class=" form-control-label">Nama Pengguna</label></div>
                    <div class="col-12 col-md-9"><input type="text" name="nama_lengkap" value="<?=$data->nama_lengkap?>" class="form-control" disabled></div>
                </div>

                <div class="row form-group">
                    <div class="col-md-3"><label class=" form-control-label">Email</label></div>
                    <div class="col-12 col-md-9"><input type="text" name="email" value="<?=$data->email?>" class="form-control" disabled></div>
                </div>

                <div class="row form-group">
                    <div class="col-md-3"><label class=" form-control-label">Username</label></div>
                    <div class="col-12 col-md-9"><input type="text" name="username" value="<?=$data->username?>" class="form-control" disabled></div>
                </div>

                <div class="row form-group">
                    <div class="col-md-3"><label class=" form-control-label">Password</label></div>
                    <div class="col-12 col-md-9"><input type="password" name="password" value="<?=$data->password?>" class="form-control" disabled></div>
                </div>

               <!--  <button type="button" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap" class="btn btn-success btn-sm" style="margin-top: 5px; width: 130px"> Ubah Data</button> -->
                
                <?php }
                  ?>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="ubahfoto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel"><b style="color: black;">Ubah Foto</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo base_url('Cakun/ubah_foto')?>" enctype="multipart/form-data">
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


<?php
  foreach ($rowp->result_array() as $data):
      $id_pengguna=$data['id_pengguna'];
      $nama_lengkap=$data['nama_lengkap'];
      $email=$data['email'];
      $username=$data['username'];
      $password=$data['password'];
?>

<div class="modal fade" id="ubahdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel"><b style="color: black;">Ubah Data</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo base_url('Cakun/ubah_data')?>" enctype="multipart/form-data">
          <div class="row form-group">
            <div class="col-md-3"><label class=" form-control-label">Nama</label></div>
            <div class="col-12 col-md-9"><input type="text" name="nama_lengkap" value="<?php echo $nama_lengkap;?>" class="form-control">
            <input type="hidden" class="form-control" value="<?php echo $this->session->userdata('id_pengguna')?>" id="recipient-name"></div>
        </div>

         <div class="row form-group">
            <div class="col-md-3"><label class=" form-control-label">Email</label></div>
            <div class="col-12 col-md-9"><input type="text" name="email" value="<?php echo $email;?>" class="form-control" readonly></div>
        </div>

        <div class="row form-group">
            <div class="col-md-3"><label class=" form-control-label">Username</label></div>
            <div class="col-12 col-md-9"><input type="text" name="username" value="<?php echo $username;?>" class="form-control"></div>
        </div>

        <div class="row form-group">
            <div class="col-md-3"><label class=" form-control-label">Password</label></div>
            <div class="col-12 col-md-9"><input type="password" name="password" value="<?php echo $password;?>" class="form-control"></div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
      </div>
      </form>
    </div>
  </div>
</div>
<?php endforeach;?>