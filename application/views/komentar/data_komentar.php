<div class="content mt-3">
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
              <strong class="card-title">Komentar Produk</strong>
          </div>
          <div class="card-body">
            <a href="<?=site_url('Cproduk1')?>">
               <button type="button" class="btn btn-primary btn-sm" style="margin-top: 10px""><i class="fa fa-reply-all"></i>&nbsp; Kembali</button>
            </a>
          </div>     
          <div class="card-body">
            <div class="table-responsive">
              <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>No </th>
                    <th>Username</th>
                    <th>Tanggal</th>
                    <th>Komentar</th>
                    <th>Aksi </th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no=1; 
                   foreach ($row->result() as $key => $data) {
                    ?>  
                    <tr> 
                      <td><?=$no++?>.</td>
                      <td><?=$data->username?></td>
                      <td width="90px"><?=date('d-m-Y', strtotime($data->tanggal))?></td>
                      <td><?=$data->komentar?></td>  
                      <td class="text-center" width="180px">
                        <a href="<?=site_url('ckomentar/hapus_komentar/'. $data->id_komentar)?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus?')" class="btn btn-danger btn-sm"><i class="fa fa-trash-o "> Hapus</i></button></a>
                      </td>
                    </tr>
                    <?php 
                      }
                    ?>                         
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div><!-- .animated -->
</div><!-- .content -->