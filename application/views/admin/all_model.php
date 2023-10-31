<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      MODEL ASSET
      <small>Master Model atau Tipe,Versi sebuah produk </small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Kategori</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content container-fluid">
    <div class="row">
      <div class="col-md-3">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Buat Baru</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" action="<?php echo base_url(). 'index.php/model/insert'; ?>">
                  <div class="box-body">
                    <div class="form-group">
                      <label>Nama Model</label>
                      <input type="text" class="form-control" id="nama" placeholder="nama kategori" name="namaModel" required>
                    </div>
                    <div class="form-group">
                      <label>Nomor Model</label>
                      <input type="text" class="form-control" id="nomor" placeholder="nomor kategori" name="nomorModel" required>
                      <p class="help-block">Nomor model atau Tipe dari asset</p>
                    </div>
                    <div class="form-group">
                      <label>Brand</label>
                      <input type="text" class="form-control" id="brand" placeholder="Brand" name="brand" required>
                      <p class="help-block">Brand atau Merk dari asset</p>
                    </div>
                    <div class="form-group">
                      <label for="">kategori</label>
                      <select class="form-control" name="Kategori">
                        <option selected>- Pilih Kategori -</option>
                        <?php foreach ($kategori as $key): ?>
                          <option value="<?php echo $key->id ?>"><?php echo $key->nama_kategori ?></option>
                        <?php endforeach; ?>
                      </select>
                      <p class="help-block">Kategori asset seperti Laptop, Printer DLL</p>
                    </div>
                    <input type="submit" class="btn btn-success" value="Simpan">
                  </div>
                  <!-- /.box-body -->
                </form>
        </div>
      </div>
      <div class="col-md-9">
        <div class="box-primary">
          <!-- modal edit -->
          <?php foreach ($modelDetail as $key): ?>
          <div class="modal fade" id="modal-edit<?=$key->id_model;?>">
           <div class="modal-dialog">
             <div class="modal-content">
               <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title">Edit <b><?=$key->nama_model;?></b></h4>
               </div>
               <!-- form start -->
               <form role="form" action="<?php echo site_url('model/edit'); ?>" method="post">
               <div class="modal-body">
                   <div class="box-body">
                     <div class="form-group">

                       <input type="hidden" readonly value="<?=$key->id_model;?>" class="form-control" name="id">

                       <label for="exampleInputEmail1">Nama</label>
                       <input type="text" class="form-control" id="nama" placeholder="nama kategori" value="<?=$key->nama_model;?>" name="namaModel">
                     </div>
                     <div class="form-group">
                       <label>Nomor Model</label>
                       <input type="text" class="form-control" id="nomor" placeholder="nomor kategori" value="<?=$key->nomor_model;?>" name="nomorModel" required>
                       <p class="help-block">Nomor model atau Tipe dari asset</p>
                     </div>
                     <div class="form-group">
                       <label>Brand</label>
                       <input type="text" class="form-control" id="brand" placeholder="Brand" value="<?=$key->brand;?>" name="brand" required>
                       <p class="help-block">Brand atau Merk dari asset</p>
                     </div>
                     <div class="form-group">
                       <label for="">kategori</label>
                       <select class="form-control" name="Kategori">
                         <option selected value="<?=$key->id_kategori;?>"><?=$key->nama_kategori;?> - default</option>
                         <?php foreach ($kategori as $key): ?>
                           <option value="<?php echo $key->id ?>"><?php echo $key->nama_kategori ?></option>
                         <?php endforeach; ?>
                       </select>
                       <p class="help-block">Kategori asset seperti Laptop, Printer DLL</p>
                     </div>
                   </div>
               </div>
               <div class="modal-footer">
                 <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                 <button href="#" type="submit" class="btn btn-primary" >Simpan</button>
               </div>
               </form>
             </div>
           </div>
          </div>
          <?php endforeach; ?>
        </div>
          <!-- /.modal -->

        <div class="box-footer">
          <?= $this->session->flashdata('simpan_sukses')?>
          <?= $this->session->flashdata('edit_sukses')?>
          <?= $this->session->flashdata('hapus_sukses')?>
          <div class="box-header">
            <h3 class="box-title">Daftar Model Asset</h3>
            <div class="box-tools">
              <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" id="cari" name="Cari" class="form-control pull-right" placeholder="Cari">
              </div>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th># Kategori</th>
                  <th>Keterangan</th>
                  <th>Jumlah</th>
                  <th>Dipakai</th>
                  <th>Pending</th>
                  <th>Arsip</th>
                  <th>Sisa</th>
                  <th></th>
                </tr>
              </thead>
              <tbody id="tKategori">
              <?php $no=1; foreach ($modelDetail as $row): ?>
              <tr>
                <td>
                <?php
                  echo $no++.".";
                  echo $row->nama_kategori;
                  ?>
                </td>
                <td>
                <?php
                  echo "<b>Brand   : </b>".$row->brand;;
                  echo "<br>";
                  echo "<b>Nama       : </b>".$row->nama_model;
                  echo "<br>";
                  echo "<b>Tipe/Model : </b>".$row->nomor_model;
                  ?>
                </td>
                <td align="center">
                <?php
                  $id = $row->id_model;
                  $jumlahAsset = $this->mModel->countAssetByModel($id);

                  if (isset($jumlahAsset)) {
                    echo $jumlahAsset;
                  }
                 ?>
                </td>
                <td align="center">
                  <?php
                    $id = $row->id_model;
                    $where = array (
                      'tipe_status' => 'digunakan',
                      'id_user >' => '0'
                    );
                    $jumlahDipakai = $this->mAsset->countAssetByModel($id,$where);

                    if (isset($jumlahDipakai)) {
                      echo $jumlahDipakai;
                    }
                    ?>
                </td>
                <td align="center">
                  <?php
                      $id = $row->id_model;
                      $where = array (
                        'tipe_status' => 'pending'
                      );
                      $jumlahPending = $this->mAsset->countAssetByModel($id,$where);

                      if (isset($jumlahPending)) {
                        echo $jumlahPending;
                      }
                      ?>
                </td>
                <td align="center">
                  <?php
                        $id = $row->id_model;
                        $where = array (
                          'tipe_status' => 'arsip'
                        );
                        $jumlahArsip = $this->mAsset->countAssetByModel($id,$where);

                        if (isset($jumlahArsip)) {
                          echo $jumlahArsip;
                        }
                        ?>
                </td>
                <td align="center">
                  <?php
                      $id = $row->id_model;
                      $where = array (
                        'tipe_status' => 'digunakan',
                        'id_user' => '0'
                      );
                      $sisa = $this->mAsset->countAssetByModel($id,$where);

                      if (isset($sisa)) {
                        echo $sisa;
                      }
                      ?>
                </td>
                <td >
                  <div class="btn-group">
                    <a type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-edit<?=$row->id_model;?>">
                      <i class="fa fa-edit"></i>
                    </a>
                    <?php if ($jumlahAsset > 0 or $jumlahDipakai > 0 or $jumlahPending > 0 or $jumlahArsip > 0 or $sisa > 0): ?>
                      <button class="btn btn-danger" disabled>
                        <i class="fa fa-trash"></i>
                      </button>
                    <?php else: ?>
                      <a href="<?php echo base_url('index.php/model/delete/'.$row->id_model); ?>" class="btn btn-danger" onclick="return confirm('Hapus Data?')">
                        <i class="fa fa-trash"></i>
                      </a>
                    <?php endif; ?>
                  </div>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
          </div>
          <!-- /.box-body -->
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script>
$(document).ready(function(){
 $("#cari").on("keyup", function() {
   var value = $(this).val().toLowerCase();
   $("#tKategori tr").filter(function() {
     $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
   });
 });
});
</script>
