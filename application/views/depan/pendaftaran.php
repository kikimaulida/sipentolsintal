<div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8" style="margin-bottom: 50px;">
        <div class="card">
            <?php $this->view('messages') ?>
            <div class="card-header">
                <h4>Pendaftaran Akun</h4>
            </div>
            <div class="card-body">
                <div class="default-tab">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Pengunjung/Pembeli</a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Pelaku Usaha/Penjual</a>
                        </div>
                    </nav>
                    <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="card-body card-block">
                                <?php echo form_open_multipart('chome/proses') ?>
                                <form action="<?=site_url('Cpengguna/proses')?>" method="post" class="form-horizontal">
                                    <div class="row form-group"> 
                                        <div class="col-12 col-md-9">
                                            <input type="hidden" name="id_pengguna" value="<?=$row->id_pengguna?>" class="form-control">
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col-md-3"><label class=" form-control-label" style="color: black;">NIK</label></div>
                                        <div class="col-12 col-md-9"><input type="number" name="nik" class="form-control" required oninvalid="this.setCustomValidity('Silahkan Diisi')" oninput="setCustomValidity('')"></div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3"><label class=" form-control-label" style="color: black;">Upload Foto/Scan KTP</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input style="color: black;" type="file" id="file-input" name="foto_ktp" class="form-control-file" required oninvalid="this.setCustomValidity('Silahkan upload foto/scan KTP')" oninput="setCustomValidity('')">
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col-md-3"><label class=" form-control-label" style="color: black;">Nama Lengkap</label></div>
                                        <div class="col-12 col-md-9"><input type="text" name="nama_lengkap" value="<?=$row->nama_lengkap?>" class="form-control" required oninvalid="this.setCustomValidity('Silahkan Diisi')" oninput="setCustomValidity('')"></div>
                                    </div>


                                    <div class="row form-group">
                                        <div class="col-md-3"><label class=" form-control-label" style="color: black;">Email</label></div>
                                        <div class="col-12 col-md-9"><input type="text" name="email" value="<?=$row->email?>" class="form-control" required oninvalid="this.setCustomValidity('Silahkan Diisi')" oninput="setCustomValidity('')"></div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col-md-3"><label class=" form-control-label" style="color: black;">Username</label></div>
                                        <div class="col-12 col-md-9"><input type="text" name="username" value="<?=$row->username?>" class="form-control" required oninvalid="this.setCustomValidity('Silahkan Diisi')" oninput="setCustomValidity('')"></div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col-md-3"><label class=" form-control-label" style="color: black;">Password</label></div>
                                        <div class="col-12 col-md-9"><input type="password" name="password" value="<?=$row->password?>" class="form-control" required oninvalid="this.setCustomValidity('Silahkan Diisi')" oninput="setCustomValidity('')"></div>
                                    </div>

                                    <div class="row form-group">
                                        <!-- <div class="col-md-3"><label class=" form-control-label" style="color: black;">Nomor SKU</label></div> -->
                                        <div class="col-12 col-md-9"><input type="hidden" name="no_sku" value="null" class="form-control" ></div>
                                    </div>

                                    <div class="row form-group">
                                        <!-- <div class="col col-md-3"><label class=" form-control-label" style="color: black;">Upload foto/scan SKU</label>
                                        </div> -->
                                        <div class="col-12 col-md-9">
                                            <input type="hidden" name="foto_sku" class="form-control-file" value="null">
                                        </div>
                                    </div>

                                    <input type="hidden" name="level" value="<?php echo $level='user'?>" class="form-control">

                                    <input type="hidden" name="status" value="<?php echo $status='menunggu konfirmasi'?>" class="form-control" readonly="readonly" required>

                                    <hr>
                                    <div align="center">
                                        <button type="submit" name="<?=$page?>" class="btn btn-info">Daftar</button>

                                    </div>
                                </form>
                                <?php echo form_close()?>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <div class="card-body card-block">
                                <?php echo form_open_multipart('chome/proses') ?>
                                <form action="<?=site_url('Cpengguna/proses')?>" method="post" class="form-horizontal">
                                    <div class="row form-group"> 
                                        <div class="col-12 col-md-9">
                                            <input type="hidden" name="id_pengguna" value="<?=$row->id_pengguna?>" class="form-control">
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col-md-3"><label class=" form-control-label" style="color: black;">NIK</label></div>
                                        <div class="col-12 col-md-9"><input type="text" name="nik" value="<?=$row->nik?>" class="form-control" required oninvalid="this.setCustomValidity('Silahkan Diisi')" oninput="setCustomValidity('')"></div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3"><label class=" form-control-label" style="color: black;">Upload Foto/Scan KTP</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input style="color: black;" type="file" id="file-input" name="foto_ktp" class="form-control-file" required oninvalid="this.setCustomValidity('Silahkan upload foto/scan KTP')" oninput="setCustomValidity('')">
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col-md-3"><label class=" form-control-label" style="color: black;">Nama Lengkap</label></div>
                                        <div class="col-12 col-md-9"><input type="text" name="nama_lengkap" value="<?=$row->nama_lengkap?>" class="form-control" required oninvalid="this.setCustomValidity('Silahkan Diisi')" oninput="setCustomValidity('')"></div>
                                    </div>


                                    <div class="row form-group">
                                        <div class="col-md-3"><label class=" form-control-label" style="color: black;">Email</label></div>
                                        <div class="col-12 col-md-9"><input type="text" name="email" value="<?=$row->email?>" class="form-control" required oninvalid="this.setCustomValidity('Silahkan Diisi')" oninput="setCustomValidity('')"></div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col-md-3"><label class=" form-control-label" style="color: black;">Username</label></div>
                                        <div class="col-12 col-md-9"><input type="text" name="username" value="<?=$row->username?>" class="form-control" required oninvalid="this.setCustomValidity('Silahkan Diisi')" oninput="setCustomValidity('')"></div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col-md-3"><label class=" form-control-label" style="color: black;">Password</label></div>
                                        <div class="col-12 col-md-9"><input type="password" name="password" value="<?=$row->password?>" class="form-control" required oninvalid="this.setCustomValidity('Silahkan Diisi')" oninput="setCustomValidity('')"></div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col-md-3"><label class=" form-control-label" style="color: black;">Nomor SKU</label></div>
                                        <div class="col-12 col-md-9"><input type="text" name="no_sku" value="<?=$row->no_sku?>" class="form-control" required oninvalid="this.setCustomValidity('Silahkan Diisi')" oninput="setCustomValidity('')"></div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3"><label class=" form-control-label" style="color: black;">Upload foto/scan SKU</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input style="color: black;" type="file" id="file-input" name="foto_sku" class="form-control-file" required oninvalid="this.setCustomValidity('Silahkan upload foto/scan SKU')" oninput="setCustomValidity('')">
                                        </div>
                                    </div>

                                    <input type="hidden" name="level" value="<?php echo $level='pelaku usaha'?>" class="form-control">

                                    <input type="hidden" name="status" value="<?php echo $status='menunggu konfirmasi'?>" class="form-control" readonly="readonly" required>

                                    <hr>
                                    <div align="center">
                                        <button type="submit" name="<?=$page?>" class="btn btn-info">Daftar</button>

                                    </div>
                                </form>
                                <?php echo form_close()?>
                                <p style="font-size: 12px;"> Keterangan*<br>
                                SKU = Surat Keterangan Usaha <br> KTP = Kartu Tanda Penduduk</p>
                                <p style="font-size: 12px; color: blue"> Catatan*<br>
                                Jika Akun Anda Sudah Aktif, Silahkan Login Untuk Mengelola Usaha Anda</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- /# column -->
</div>