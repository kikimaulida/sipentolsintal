<div class="col-lg-12">
    <?php $this->view('messages') ?>
    <div class="card">
        <div class="card-header">
            <strong>Form <?=ucfirst($page)?> Kelurahan</strong>
        </div>
        <div class="card-body card-block">
            <form action="<?=site_url('Ckelurahan/proses')?>" method="post" class="form-horizontal">
                <div class="row form-group"> 
                    <div class="col-12 col-md-9">
                        <input type="hidden" name="id_kelurahan" value="<?=$row->id_kelurahan?>" class="form-control">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-3">
                        <label class=" form-control-label">Nama kelurahan</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" name="nama_kelurahan" value="<?=$row->nama_kelurahan?>" class="form-control">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="select" class=" form-control-label">Kecamatan</label></div>
                    <div class="col-12 col-md-9">
                         <?php echo form_dropdown('kecamatan', $kecamatan, $selectedkecamatan,['class' => 'standardSelect',
                    'required' => 'required'])?>
                    </div>
                </div>

                 <div class="row form-group">
                    <div class="col-md-3">
                        <label class=" form-control-label">Kode Pos</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" name="kode_pos" value="<?=$row->kode_pos?>" class="form-control">
                    </div>
                </div>

                <hr>
                <div align="center">
                    <button type="submit" name="<?=$page?>" class="btn btn-info">Simpan</button>
                    <a href="<?=site_url('ckelurahan')?>">
                        <button type="button" class="btn btn-warning">Batal</button>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div12