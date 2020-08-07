<div class="col-lg-12">
    <?php $this->view('messages') ?>
    <div class="card">
        <div class="card-header">
            <strong>Tambah Foto Produk</strong>
        </div>
        <div class="card-body card-block">
            <?php echo form_open_multipart('Cproduk1/uploadfoto/'.$this->uri->segment(3)) ?>
            <form action="<?=site_url('Cproduk1/uploadfoto/'.$this->uri->segment(3))?>" method="post" class="form-horizontal">
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="file-input" class=" form-control-label">Foto produk</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="file" id="file-input" name="gambar[]" class="form-control-file" multiple="multiple">
                    </div>
                </div>
                <hr>
                <div align="center">
                    <button type="submit" class="btn btn-info">Simpan</button>
                    <a href="<?=site_url('Cproduk1/detail_produk/'.$this->uri->segment(3))?>">
                        <button type="button" class="btn btn-warning">Batal</button>
                    </a>
                </div>
            </form>
            <?php echo form_close()?>
        </div>
    </div>
</div12