    <div class="col-lg-12">
        <?php $this->view('messages') ?>
        <div class="card">
            <div class="card-header">
                <strong>Form <?=ucfirst($page)?> Kategori</strong>
            </div>
            <div class="card-body card-block">
                <?php echo form_open_multipart('ckategori/proses') ?>
                <form action="<?=site_url('Ckategori/proses')?>" method="post" class="form-horizontal">
                    <div class="row form-group"> 
                        <div class="col-12 col-md-9">
                            <input type="hidden" name="id_kategori" value="<?=$row->id_kategori?>" class="form-control">
                        </div>
                    </div>

                <div class="row form-group">
                    <div class="col-md-3">
                        <label class=" form-control-label">Nama Kategori</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" name="nama_kategori" value="<?=$row->nama_kategori?>" class="form-control" required oninvalid="this.setCustomValidity('Kolom Masih Kosong, Silahkan Diisi')" oninput="setCustomValidity('')">
                    </div>
                </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="file-input" class=" form-control-label">Icon</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <?php if($page == 'ubah') {
                                if($row->icon != null){ ?>
                                    <div style="margin-bottom: 5px">
                                        <img src="<?=base_url('uploads/kategori/'.$row->icon)?>" style="width: 20%">
                                    </div>
                                <?php
                                }
                            } ?>

                             <?php if($page == 'tambah') { ?>
                                <input type="file" id="file-input" name="icon" class="form-control-file" required>
                             <?php } 
                            else { ?>
                                <input type="file" id="file-input" name="icon" class="form-control-file">
                            <?php } ?>
                        </div>
                    </div>
                    <hr>
                    <div align="center">
                        <button type="submit" name="<?=$page?>" class="btn btn-info">Simpan</button>
                        <a href="<?=site_url('ckategori')?>">
                            <button type="button" class="btn btn-warning">Batal</button>
                        </a>
                    </div>
                </form>    
                <?php echo form_close()?>
            </div>
        </div>
    </div>