<div class="col-lg-12">
    <?php $this->view('messages') ?>
    <div class="card">
        <div class="card-header">
            <strong>Form <?=ucfirst($page)?> Kecamatan</strong>
        </div>
        <div class="card-body card-block">
            <form action="<?=site_url('Ckecamatan/proses')?>" method="post" class="form-horizontal">
                <div class="row form-group"> 
                    <div class="col-12 col-md-9">
                        <input type="hidden" name="id_kecamatan" value="<?=$row->id_kecamatan?>" class="form-control">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-3">
                        <label class=" form-control-label">Nama Kecamatan</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" name="nama_kecamatan" value="<?=$row->nama_kecamatan?>" class="form-control">
                    </div>
                </div>
                <hr>
                <div align="center">
                    <button type="submit" name="<?=$page?>" class="btn btn-info">Simpan</button>
                    <a href="<?=site_url('ckecamatan')?>">
                        <button type="button" class="btn btn-warning">Batal</button>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div12