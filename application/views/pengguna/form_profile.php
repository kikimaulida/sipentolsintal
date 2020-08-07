<div class="col-lg-12">
    <?php $this->view('messages') ?>
    <div class="card">
        <div class="card-header">
            <strong>Form <?=ucfirst($page)?> Pengguna</strong>
        </div>
        <div class="card-body card-block">
            <?php echo form_open_multipart('cprofile/proses') ?>
            <form action="<?=site_url('Cpengguna/proses')?>" method="post" class="form-horizontal">
                <div class="row form-group"> 
                    <div class="col-12 col-md-9">
                        <input type="hidden" name="id_pengguna" value="<?=$row->id_pengguna?>" class="form-control">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-3"><label class=" form-control-label">Nama Pengguna</label></div>
                    <div class="col-12 col-md-9"><input type="text" name="nama_lengkap" value="<?=$row->nama_lengkap?>" class="form-control"></div>
                </div>

                <div class="row form-group">
                    <div class="col-md-3"><label class=" form-control-label">Username</label></div>
                    <div class="col-12 col-md-9"><input type="text" name="username" value="<?=$row->username?>" class="form-control"></div>
                </div>

                <div class="row form-group">
                    <div class="col-md-3"><label class=" form-control-label">Password</label></div>
                    <div class="col-12 col-md-9"><input type="password" name="password" value="<?=$row->password?>" class="form-control"></div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="file-input" class=" form-control-label">Foto pengguna</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <?php if($page == 'ubah') {
                            if($row->foto_pengguna != null){ ?>
                                <div style="margin-bottom: 5px">
                                    <img src="<?=base_url('uploads/pengguna/'.$row->foto_pengguna)?>" style="width: 20%">
                                </div>
                            <?php
                            }
                        } ?>

                        <input type="file" id="file-input" name="foto_pengguna" value="<?=$row->foto_pengguna?>"  class="form-control-file">
                    </div>
                </div>

                <?php if($this->session->userdata('level') == 'admin') { ?>
                    <div class="row form-group">
                        <div class="col-12 col-md-9"><input type="hidden" name="level" value="admin" class="form-control" readonly=""></div>
                    </div>
                <?php } ?>

                <?php if($this->session->userdata('level') == 'pelaku usaha') { ?>
                    <div class="row form-group">
                        <div class="col-12 col-md-9"><input type="hidden" name="level" value="pelaku usaha" class="form-control" readonly=""></div>
                    </div>
                <?php } ?>
                
                <hr>
                <div align="center">
                    <button type="submit" name="<?=$page?>" class="btn btn-info">Simpan</button>
                    <!-- <a href="<?=site_url('cpengguna')?>">
                        <button type="button" class="btn btn-warning">Batal</button>
                    </a> -->

                    <?php if($this->session->userdata('level') == 'admin') { ?>
                    <a href="<?=site_url('dashboard')?>">
                        <button type="button" class="btn btn-warning">Batal</button>
                    </a>
                    <?php } ?>

                    <?php if($this->session->userdata('level') == 'pelaku usaha') { ?>
                    <a href="<?=site_url('dashboard')?>">
                        <button type="button" class="btn btn-warning">Batal</button>
                    </a>
                    <?php } ?>
                </div>
            </form>
            <?php echo form_close()?>
        </div>
    </div>
</div>