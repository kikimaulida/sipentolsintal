<div class="col-lg-12">
    <?php $this->view('messages') ?>
    <div class="card">
        <div class="card-header">
            <strong>Form <?=ucfirst($page)?> Usaha</strong>
        </div>
        <div class="card-body card-block">
            <?php echo form_open_multipart('cusaha/proses') ?>
            <form action="<?=site_url('Cusaha/proses')?>" method="post" class="form-horizontal">
                <div class="row form-group"> 
                    <div class="col-12 col-md-9">
                        <input type="hidden" name="id_usaha" value="<?=$row->id_usaha?>" class="form-control">
                    </div>
                </div>

                <?php 
                    $level = $this->session->userdata('level');
                    if($level=='admin')
                    {?>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="select" class=" form-control-label">Nama Pemilik</label></div>
                        <div class="col-12 col-md-9">
                             <?php echo form_dropdown('pengguna', $pengguna, $selectedpengguna,['class' => 'standardSelect',
                        'required' => 'required'])?>
                        </div>
                    </div>
                <?php } 
                    else{
                ?>   
                    <div class="row form-group">
                        <div class="col-md-3"><label class=" form-control-label">Nama Pemilik</label></div>
                        <div class="col-12 col-md-9"><input type="hidden" name="pengguna" value="<?php echo $this->session->userdata('id_pengguna');?>" class="form-control">
                        <input type="text" value="<?php echo $this->session->userdata('nama_lengkap');?>" class="form-control" readonly>
                        </div>
                    </div>
                <?php } ?> 

                <div class="row form-group">
                    <div class="col-md-3"><label class=" form-control-label">Nama usaha</label></div>
                    <div class="col-12 col-md-9"><input type="text" name="nama_usaha" value="<?=$row->nama_usaha?>" class="form-control" required></div>
                </div>   

                <div class="row form-group">
                    <div class="col-md-3"><label class=" form-control-label">Asset</label></div>
                    <div class="col-12 col-md-9"><input type="text" name="asset" value="<?=$row->asset?>" class="form-control" required></div>
                </div>

                <div class="row form-group">
                    <div class="col-md-3"><label class=" form-control-label">Omzet</label></div>
                    <div class="col-12 col-md-9"><input type="text" name="omzet" value="<?=$row->omzet?>" class="form-control" required></div>
                </div> 

                <div class="row form-group">
                    <div class="col col-md-3"><label for="select" class=" form-control-label">Kategori</label></div>
                    <div class="col-12 col-md-9">
                         <?php echo form_dropdown('kategori', $kategori, $selectedkategori,['class' => 'form-control',
                    'required' => 'required'])?>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Deskripsi</label></div>
                    <div class="col-12 col-md-9"><textarea name="deskripsi" rows="9" class="form-control" required><?=$row->deskripsi?></textarea></div>
                </div>

                <div class="row form-group">
                    <div class="col-md-3"><label class=" form-control-label">Alamat</label></div>
                    <div class="col-12 col-md-9"><input type="text" name="alamat" value="<?=$row->alamat?>" class="form-control" required></div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="select" class=" form-control-label">Kecamatan</label></div>
                    <div class="col-12 col-md-9">
                         <?php echo form_dropdown('kecamatan', $kecamatan, $selectedkecamatan,['class' => 'standardSelect',
                    'required' => 'required'])?>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-3"><label class=" form-control-label">Jam Operasional</label></div>
                    <div class="col-12 col-md-9"><input type="text" name="jam_operasional" value="<?=$row->jam_operasional?>" class="form-control" required></div>
                </div>

                <div class="row form-group">
                    <div class="col-md-3"><label class=" form-control-label">Telepon</label></div>
                    <div class="col-12 col-md-9"><input type="text" name="telepon" value="<?=$row->telepon?>" class="form-control" required></div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="file-input" class=" form-control-label">Foto Usaha</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <?php if($page == 'ubah') {
                            if($row->foto_usaha != null){ ?>
                                <div style="margin-bottom: 5px">
                                    <img src="<?=base_url('uploads/usaha/'.$row->foto_usaha)?>" style="width: 20%">
                                </div>
                            <?php
                            }
                        } ?>

                        <?php if($page == 'tambah') { ?>
                            <input type="file" id="file-input" name="foto_usaha" class="form-control-file" required>
                        <?php } 
                        else { ?>
                            <input type="file" id="file-input" name="foto_usaha" class="form-control-file">
                        <?php } ?>

                        <!-- <input type="file" id="file-input" name="foto_usaha" value="<?=$row->foto_usaha?>"  class="form-control-file" required> -->
                    </div>
                </div>

                <!-- PAGE TAMBAH -->
                <?php if($page == 'tambah') { ?>
                    <input type="hidden" name="status" value="<?php echo $status='menunggu konfirmasi'?>" class="form-control" readonly="readonly" required>
                <?php } ?>

                <!-- PAGE UBAH -->
                <?php if($this->session->userdata('level') == 'admin') { ?>
                    <?php if($page == 'ubah') { ?>
                    <div class="row form-group">
                        <div class="col-md-3"><label class=" form-control-label">Status</label></div>
                        <div class="col-12 col-md-9">
                            <select name="status" class="form-control">
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
                <?php } ?>

                <?php if($page == 'tambah') { ?>
                <!-- Input tanggal otomatis -->
                <input type="hidden" name="bergabung" value="<?php echo $bergabung = date("Y-m-d")?>" readonly="readonly" class="form-control">
                <!-- end Input tanggal otomatis -->
                <?php } ?>
                <hr>
                <div align="center">
                    <button type="submit" name="<?=$page?>" class="btn btn-info">Simpan</button>
                    <a href="<?=site_url('Cusaha')?>">
                        <button type="button" class="btn btn-warning">Batal</button>
                    </a>
                </div>
            </form>
            <?php echo form_close()?>
        </div>
    </div>
</div>