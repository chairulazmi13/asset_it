<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      ASSET
      <small>Ready Asset</small>
    </h1>
  </section>

  <!-- Main content -->
  <section class="content container-fluid">
    <?= $this->session->flashdata('edit_sukses')?>
    <?= $this->session->flashdata('edit_gagal')?>
    <?= $this->session->flashdata('pinjam_sukses')?>
    <?= $this->session->flashdata('kembali_sukses')?>
    <?= $this->session->flashdata('hapus_sukses')?>
    <div class="box">
          <div class="box-header">
            <div class="row">
              <div class="col-md-10">
               <h3 class="box-title">Data Asset yang Siap digunakan</h3>
                <p>Data yang ditampilkan hanya yang berstatus Siap atau asset yang belum dipinjam </p>
              </div>
              <div class="col-md-2">
                <div class="btn-group">
                  <a href="<?php echo base_url('index.php/asset/PrintReadyAsset'); ?>" type="button" class="btn btn-default"><i class='fa fa-print'></i> Cetak</a>
                  <a href="<?php echo base_url('index.php/admin/view/create_asset'); ?>" type="button" class="btn btn-default"><i class='fa fa-pencil'></i> Buat baru</a>
                </div>
              </div>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body table-responsive">
            <table id="example1" class="table table-striped stable-responsive table-no-bordered">
              <thead>
              <tr>
                <th>Asset</th>
                <th>Model</th>
                <th>Kategori</th>
                <th>Asal Asset</th>
                <th>status</th>
                <th>Pinjam / kembali</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>
              <?php
              foreach ($ReadyAsset as $row) {
              ?>
              <tr>
                <td>
                  <b>Nama : </b><a data-toggle="modal" data-target="#modal-detail<?=$row->id_asset;?>"><?php echo $row->nama_asset; ?></a>
                  <br>
                  <b>Serial : </b><?php echo $row->serial; ?>
                </td>
                <td><?php echo $row->nama_model;?></td>
                <td><?php echo $row->nama_kategori;?></td>
                <td><?php echo $row->asal_asset; ?></td>
                <td>
                  <?php
                    $tipe = $row->tipe_status;
                    $user = $row->id_user;

                    if ($tipe == "pending") {
                      echo $row->nama_status;
                      echo "<span class='label label-warning'>Pending</span>";
                    } elseif ($tipe == "digunakan" & $user == 0 or $user == '') {
                      echo $row->nama_status;
                      echo " <span class='label label-primary'>Siap Digunakan</span>";
                    } elseif ($tipe == "digunakan") {
                      echo $row->nama_status;
                      echo " <span class='label label-success'>Digunakan</span>";
                    }
                  ?>
                </td>
              <td>
                <?php if ($row->tipe_status == 'pending'){ ?>
                  <input type="button" class="btn btn-success btn-flat btn-sm" data-toggle="modal" data-target="#modal-pinjam<?=$row->id_asset;?>" value="Pinjam" disabled>
                <?php } else{ ?>
                  <?php if ( $row->id_user > 0){ ?>
                    <a type="button" class="btn btn-primary btn-flat btn-sm" data-toggle="modal" data-target="#modal-kembali<?=$row->id_asset;?>">kembali</a>
                  <?php } else { ?>
                   <input type="button" class="btn btn-success btn-flat btn-sm" data-toggle="modal" data-target="#modal-pinjam<?=$row->id_asset;?>" value="Pinjam" >
                <?php }}?>
              </td>
                <td>
                  <div class="btn-group">
                    <a href="<?php echo base_url('index.php/asset/edit/').$row->id_asset; ?>" type="button" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                    <a href="<?php echo base_url('index.php/asset/delete/').$row->id_asset; ?>" type="button" class="btn btn-danger" onclick="return confirm('ingin menghapus <?=$row->nama_asset;?> ?')"><i class="fa fa-trash"></i></a>
                  </div>
                </td>
              </tr>
                <?php
              }
              ?>
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
          <!-- modal pinjam -->
          <?php foreach ($allAsset as $row): ?>
          <div class="modal fade" id="modal-pinjam<?=$row->id_asset;?>">
             <div class="modal-dialog">
               <div class="modal-content">
                 <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                   </button>
                   <h4 class="modal-title">Pinjamkan <?=$row->nama_asset;?></h4>
                </div>
                 <!-- form start -->
                 <form role="form" action="<?php echo site_url('asset/pinjam'); ?>" method="post">
                 <div class="modal-body">
                     <div class="box-body">

                      <div class="form-group">
                        <label>Tanggal Pinjam</label>
                          <div class="input-group date">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right pinjamKembali"  name="tanggalPinjam">
                          </div>
                          <!-- /.input group -->
                      </div>

                      <div class="form-group">

                         <input type="hidden" readonly value="<?=$row->id_asset;?>" class="form-control" name="id">

                          <label>Status Pinjam</label>
                            <select class="form-control select2 statusPinjam" id="statusPinjam" style="width: 100%;" name="status" required>
                              <option>- Pilih Status Pinjam -</option>
                              <?php foreach ($statusByDigunakan as $key): ?>
                              <option value="<?php echo $key->id;?>"><?php echo $key->nama_status;?></option>
                              <?php endforeach; ?>
                          </select>
                      </div>

                      <div class="form-group">
                          <label>Departement atau Ruangan</label>
                          <select class="form-control select2 departement" id="departement" style="width: 100%;" name="departement" required>
                            <option>- Pilih departement -</option>
                           <?php foreach ($departement as $key): ?>
                            <option value="<?php echo $key->id; ?>"><?php echo $key->nama_departement;?></option>
                           <?php endforeach; ?>
                          </select>
                      </div>

                      <div class="form-group">
                         <label>Nama Peminjam</label>
                         <select class="form-control select2 namaPeminjam" id="namaPeminjam" style="width: 100%;" name="user" required>
                           <option>- Pilih User -</option>
                          <?php foreach ($mUser as $key): ?>
                           <option value="<?php echo $key->id; ?>"><?php echo $key->nama;?> - <?php echo $key->nama_departement;?></option>
                          <?php endforeach; ?>
                         </select>
                      </div>

                    </div>
                 </div>
                 <div class="modal-footer">
                   <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                   <button href="#" type="submit" class="btn btn-success" >Pinjamkan</button>
                </div>
                 </form>
              </div>
            </div>
            </div>
          <!-- end modal pinjam -->
          <?php endforeach; ?>

          <!-- modal kembali -->
          <?php foreach ($allAsset as $row): ?>
          <div class="modal fade" id="modal-kembali<?=$row->id_asset;?>">
             <div class="modal-dialog">
               <div class="modal-content">
                 <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                   </button>
                   <h4 class="modal-title">Kembalikan <?=$row->nama_asset;?></h4>
                </div>
                 <!-- form start -->
                 <form role="form" action="<?php echo site_url('asset/kembali'); ?>" method="post">
                 <div class="modal-body">
                     <div class="box-body">

                     <div class="form-group">
                      <label>Tanggal Dikembalikan</label>
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" class="form-control pull-right pinjamKembali"  name="tanggalKembali">
                        </div>
                        <!-- /.input group -->
                      </div>
                    </div>
                       <div class="form-group">
                         <input type="hidden" readonly value="<?=$row->id_asset;?>" class="form-control" name="id">
                         <input type="hidden" readonly value="<?=$row->id_user;?>" class="form-control" name="id_user">
                          <label>Keadaan Asset</label>
                            <select class="form-control select2 statusPinjam" id="statusPinjam" style="width: 100%;" name="status" required>
                              <option>- Pilih Status -</option>
                              <?php foreach ($status as $key): ?>
                              <option value="<?php echo $key->id;?>"><?php echo $key->nama_status;?></option>
                              <?php endforeach; ?>
                          </select>
                      </div>
                        <div class="form-group">
                          <label>Lokasi di kembalikan</label>
                          <select class="form-control select2 departement" id="departement" style="width: 100%;" name="departement" required>
                            <option>- Pilih departement -</option>
                           <?php foreach ($departement as $key): ?>
                            <option value="<?php echo $key->id; ?>"><?php echo $key->nama_departement;?></option>
                           <?php endforeach; ?>
                          </select>
                      </div>
                 </div>
                 <div class="modal-footer">
                   <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                   <button href="#" type="submit" class="btn btn-primary" >Kembalikan</button>
                </div>
                 </form>
              </div>
            </div>
            </div>
          <!-- end modal kembali -->
          <?php endforeach; ?>

          <!-- modal detail -->
          <?php foreach ($allAsset as $row): ?>
          <div class="modal fade" id="modal-detail<?=$row->id_asset;?>">
             <div class="modal-dialog">
               <div class="modal-content">
                 <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                   </button>
                   <h4 class="modal-title">Detail <?=$row->nama_asset;?></h4>
                </div>
                 <!-- form start -->
                 <form role="form" action="<?php echo site_url('asset/cetak'); ?>" method="post">
                 <div class="modal-body">
                     <div class="box-body">
                       <div class="table-responsive" style="margin-top: 10px;">
                         <table class="table">
                           <tbody>
                               <tr>
                               <td>Status</td>
                               <td>
                                 <?php
                                   $tipe = $row->tipe_status;
                                   $user = $row->id_user;

                                   if ($tipe == "pending") {
                                     echo $row->nama_status;
                                     echo "<span class='label label-warning'>Pending</span>";
                                   } elseif ($tipe == "digunakan" & $user == 0 or $user == '') {
                                     echo $row->nama_status;
                                     echo " <span class='label label-primary'>Siap Digunakan</span>";
                                   } elseif ($tipe == "digunakan") {
                                     echo $row->nama_status;
                                     echo " <span class='label label-success'>Digunakan</span>";
                                   }

                                  if ( $row->id_user == 0 or $row->id_user == ''){ ?>
                                     <?php echo "" ?>
                                   <?php } else {
                                     echo " <i class='fa fa-long-arrow-right' aria-hidden='true'></i>";
                                     echo " <i class='fa fa-user'></i> ";
                                     echo $row->nama;
                                   }?>
                               </td>
                              </tr>
                              <tr>
                               <td>Nama Aset</td>
                               <td><?=$row->nama_asset;?></td>
                              </tr>
                              <tr>
                               <td>Serial</td>
                               <td><?=$row->serial;?></td>
                             </tr>
                             <tr>
                               <td>Model</td>
                               <td><?=$row->nama_model;?></td>
                             </tr>
                             <tr>
                               <td>Brand</td>
                               <td><?=$row->brand;?></td>
                             </tr>
                             <tr>
                               <td>Kategori</td>
                               <td><?=$row->nama_kategori;?></td>
                             </tr>
                             <tr>
                               <td>Harga</td>
                               <td>
                               <?php
                                  $harga = $row->harga;

                                  echo "Rp. ". number_format($harga, 0, ".", ".");
                                ?>
                               </td>
                             </tr>
                             <tr>
                               <td>Asal Asset</td>
                               <td><?=$row->asal_asset;?></td>
                             </tr>
                             <tr>
                               <td>Departement</td>
                               <td><?=$row->nama_departement;?></td>
                             </tr>
                             <tr>
                               <td>Catatan</td>
                               <td><?=$row->catatan;?></td>
                             </tr>
                             <tr>
                               <td>Tanggal Pengadaan</td>
                               <td><?=$row->tanggal_pengadaan;?></td>
                             </tr>
                             <tr>
                               <td>Tanggal Peminjaman</td>
                              <?php if ($row->tipe_status == 'pending'){ ?>
                                <td></td>
                              <?php } else{ ?>
                                <?php if ( $row->id_user > 0){ ?>
                                  <td><?=$row->tanggal_pinjam;?></td>
                                <?php } else { ?>
                                <td></td>
                              <?php }}?>
                             </tr>
                           </tbody>
                         </table>
                       </div>
                    </div>
                 </div>
                 <div class="modal-footer">
                   <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                   <?php

                     if ($tipe == "digunakan" & $user == 0 or $user == '') {
                       echo "";
                     } elseif ($tipe == "pending") {
                       echo "";
                     } elseif ($tipe == "digunakan") {
                       $cetak = base_url('index.php/asset/PrintSerahTerima/').$row->id_asset;

                       echo "<a href='".$cetak."' type='button' class='btn btn-default' target='_blank'><i class='fa fa-print'></i> Cetak serah terima</a>";
                     }
                   ?>
                </div>
                 </form>
              </div>
            </div>
            </div>
          <?php endforeach; ?>
          <!-- end modal kembali -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script type="text/javascript">
    $('.statusPinjam').select2({
    theme: 'classic',
    placeholder: 'Please Select',
    });
    $('.namaPeminjam').select2({
    theme: 'classic',
    placeholder: 'Please Select'
    });
    $('.departement').select2({
    theme: 'classic',
    placeholder: 'Please Select'
    });
</script>
