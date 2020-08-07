    <div class="col-lg-12">
        <?php $this->view('messages') ?>
        <div class="card">
            <div class="card-header">
                <strong>Form <?=ucfirst($page)?> Banner</strong>
            </div>
            <div class="card-body card-block">
                <?php echo form_open_multipart('cbanner/proses') ?>
                <form action="<?=site_url('Cbanner/proses')?>" method="post" class="form-horizontal">
                    <div class="row form-group"> 
                        <div class="col-12 col-md-9">
                            <input type="hidden" name="id_banner" value="<?=$row->id_banner?>" class="form-control">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="file-input" class=" form-control-label">Foto Banner</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <?php if($page == 'ubah') {
                                if($row->foto_banner != null){ ?>
                                    <div style="margin-bottom: 5px">
                                        <img src="<?=base_url('uploads/banner/'.$row->foto_banner)?>" style="width: 20%">
                                    </div>
                                <?php
                                }
                            } ?>

                            <?php if($page == 'tambah') { ?>
                                <input type="file" id="file-input" name="foto_banner" class="form-control-file" required>
                             <?php } 
                            else { ?>
                                <input type="file" id="file-input" name="foto_banner" class="form-control-file">
                            <?php } ?>
                        </div>
                    </div>

                    <input type="hidden" name="pengguna" value="<?php echo $this->session->userdata('id_pengguna');?>" class="form-control">
                    <input type="hidden" value="<?php echo $this->session->userdata('nama_lengkap');?>" class="form-control" readonly>

                    <!--   Input tanggal otomatis -->
                    <input type="hidden" name="tgl_unggah" value="<?php echo $tgl_unggah = date("Y-m-d")?>" readonly="readonly" class="form-control">
                    <!--   end Input tanggal otomatis -->

                    <hr>
                    <div align="center">
                        <button type="submit" name="<?=$page?>" class="btn btn-info">Simpan</button>
                        <a href="<?=site_url('cbanner')?>">
                            <button type="button" class="btn btn-warning">Batal</button>
                        </a>
                    </div>
                </form>    
                <?php echo form_close()?>
            </div>
        </div>
    </div>