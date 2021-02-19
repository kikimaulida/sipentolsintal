<div class="col-lg-12">
    <?php $this->view('messages') ?>
    <div class="card">
        <div class="card-header">
            <strong>Form <?=ucfirst($page)?> Pengguna</strong>
        </div>
        <div class="card-body card-block">
            <?php echo form_open_multipart('cpengguna/proses') ?>
            <form action="<?=site_url('Cpengguna/proses')?>" method="post" class="form-horizontal">
                <div class="row form-group"> 
                    <div class="col-12 col-md-9">
                        <input type="hidden" name="id_pengguna" value="<?=$row->id_pengguna?>" class="form-control">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-3"><label class=" form-control-label">NIK</label></div>
                    <div class="col-12 col-md-9"><input type="text" name="nik" minlength="16" maxlength="16" value="<?=$row->nik?>" class="form-control" required oninvalid="this.setCustomValidity('Silahkan isi dan lengkapi')" oninput="setCustomValidity('')"></div>
                </div>

                <div class="row form-group">
                    <div class="col-md-3"><label class=" form-control-label">Nama Pengguna</label></div>
                    <div class="col-12 col-md-9"><input type="text" name="nama_lengkap" value="<?=$row->nama_lengkap?>" class="form-control" required oninvalid="this.setCustomValidity('Silahkan Diisi')" oninput="setCustomValidity('')"></div>
                </div>

                <div class="row form-group">
                    <div class="col-md-3"><label class=" form-control-label">Email</label></div>
                    <div class="col-12 col-md-9"><input type="text" name="email" value="<?=$row->email?>" class="form-control" required oninvalid="this.setCustomValidity('Silahkan Diisi')" oninput="setCustomValidity('')"></div>
                </div>

                <div class="row form-group">
                    <div class="col-md-3"><label class=" form-control-label">Username</label></div>
                    <div class="col-12 col-md-9"><input type="text" name="username" value="<?=$row->username?>" class="form-control" required oninvalid="this.setCustomValidity('Silahkan Diisi')" oninput="setCustomValidity('')"></div>
                </div>

                <div class="row form-group">
                    <div class="col-md-3"><label class=" form-control-label">Password</label></div>
                    <div class="col-12 col-md-9"><input type="password" name="password" value="<?=$row->password?>" class="form-control" required oninvalid="this.setCustomValidity('Silahkan Diisi')" oninput="setCustomValidity('')"></div>
                </div>

                 <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="file-input" class=" form-control-label">Foto KTP</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <?php if($page == 'ubah') {
                            if($row->foto_ktp != null){ ?>
                                <div style="margin-bottom: 5px">
                                    <img src="<?=base_url('uploads/pengguna/'.$row->foto_ktp)?>" style="width: 20%">
                                </div>
                            <?php
                            }
                        } ?>

                        <?php if($page == 'tambah') { ?>
                            <input type="file" id="file-input" name="foto_ktp" class="form-control-file" required>
                         <?php } 
                        else { ?>
                            <input type="file" id="file-input" name="foto_ktp" class="form-control-file">
                        <?php } ?>

                       <!--  <input type="file" id="file-input" name="foto_pengguna" value="<?=$row->foto_pengguna?>"  class="form-control-file"> -->
                    </div>
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

                        <?php if($page == 'tambah') { ?>
                            <input type="file" id="file-input" name="foto_pengguna" class="form-control-file">
                         <?php } 
                        else { ?>
                            <input type="file" id="file-input" name="foto_pengguna" class="form-control-file">
                        <?php } ?>

                       <!--  <input type="file" id="file-input" name="foto_pengguna" value="<?=$row->foto_pengguna?>"  class="form-control-file"> -->
                    </div>
                </div>

                <!-- PAGE TAMBAH -->
                <?php if($page == 'tambah') { ?>
                <div class="row form-group">
                    <div class="col-md-3"><label class=" form-control-label">Level</label></div>
                    <div class="col-12 col-md-9"> 
                        <select name="level" class="form-control" required>
                            <option value="">- Pilih -</option>
                            <option value="admin" <?=set_value('level') == "admin" ? "selected" : null?>>Admin</option>
                            <option value="pelaku usaha" <?=set_value('level') == "pelaku usaha" ? "selected" : null?>>Pelaku Usaha</option>
                            <option value="user" <?=set_value('level') == "user" ? "selected" : null?>>User</option>
                         </select>
                    </div>
                </div>
                <?php } ?>

                <!-- PAGE UBAH -->
               <!--  <?php if($page == 'ubah') { ?>
                <div class="row form-group">
                    <div class="col-md-3"><label class=" form-control-label">Level</label></div>
                    <div class="col-12 col-md-9">
                        <select name="level" class="form-control" disabled>
                            <?php $level = $this->input->post('level') ? $this->input->post('level') : $row->level ?>
                            <option value="admin" <?=set_value('level') == "admin" ? "selected" : null?>>Admin</option>
                            <option value="pelaku usaha" <?=$level == "pelaku usaha" ? 'selected' : null?>>Pelaku Usaha</option>
                             <option value="user" <?=$level == "user" ? 'selected' : null?>>User</option>
                         </select>
                    </div>
                </div>
                <?php } ?> -->

                 <!-- PAGE TAMBAH -->
                <?php if($page == 'tambah') { ?>
                    <input type="hidden" name="status" value="<?php echo $status='menunggu konfirmasi'?>" class="form-control" readonly="readonly" required>
                <?php } ?>

                <!-- PAGE UBAH -->
                <!-- <?php if($this->session->userdata('level') == 'admin') { ?>
                    <?php if($page == 'ubah') { ?>
                    <div class="row form-group">
                        <div class="col-md-3"><label class=" form-control-label">Status</label></div>
                        <div class="col-12 col-md-9">
                            <select name="status" class="form-control" disabled>
                                <?php $status = $this->input->post('status') ? $this->input->post('status') : $row->status ?>
                                <option value="diterima" <?=set_value('status') == "diterima" ? "selected" : null?>>Diterima</option>
                                <option value="ditolak" <?=$status == "ditolak" ? 'selected' : null?>>Ditolak</option>
                             </select>
                        </div>
                    </div>
                    <?php } ?> 
                <?php } ?>

                <?php if($this->session->userdata('level') == 'pelaku usaha') { ?>
                    <?php if($page == 'ubah') { ?>
                        <input type="hidden" name="status" value="<?=$row->status?>" class="form-control" readonly="readonly" required>
                    <?php } ?> 
                <?php } ?> -->
                
                <hr>
                <div align="center">
                    <button type="submit" name="<?=$page?>" class="btn btn-info">Simpan</button>

                    <?php if($this->session->userdata('level') == 'admin') { ?>
                    <a href="<?=site_url('Cpengguna')?>">
                        <button type="button" class="btn btn-warning">Batal</button>
                    </a>
                    <?php } ?>
                </div>
            </form>
            <?php echo form_close()?>
        </div>
    </div>
</div>