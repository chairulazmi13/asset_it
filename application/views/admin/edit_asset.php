<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Edit ASSET
    </h1>
    </ol>
  </section>
<!-- Main content -->
<section class="content container-fluid">
  <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-7">
      <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Edit</h3>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
              <form role="form" method="post" action="<?php echo base_url('index.php/asset/saveEdit'); ?>">
                <?php foreach ($asset as $value): ?>
                <div class="box-body">
                  <div class="form-group">
                    <label>Nama Asset</label>
                    <input type="hidden" class="form-control" name="id" readonly value="<?php echo $value->id_asset; ?>">
                    <input type="text" class="form-control" placeholder="nama_asset" name="nama_asset" required value="<?php echo $value->nama_asset; ?>">
                  </div>
                  <div class="form-group">
                    <label for="serial">Serial</label>
                    <span id="pesanSerial"></span>
                    <input id="serial" type="text" class="form-control" placeholder="Serial" name="serial" required value="<?php echo $value->serial; ?>">

                  </div>
                  <div class="form-group">
                    <label>Model</label>
                    <select class="form-control" name="model">
                      <option value="<?php echo $value->id_model; ?>"  disabled>
                        <?php
                          $id = $value->id_model;
                          $query = $this->db->query('select*from model where id ='.$id);
                          $d = $query->row();
                          if (isset($d)) {

                              $kategori = $d->id_kategori;
                              $query2 = $this->db->query('select*from kategori where id ='.$kategori);
                              $e = $query2->row();
                              if (isset($e)) {
                                echo $e->nama_kategori;
                                echo " - ";
                              }

                            echo $d->nama_model;
                            echo " ";
                            echo $d->nomor_model;
                          }
                        ?>
                      <i> - default</i>
                      </option>
                      <?php foreach ($model as $x) { ?>
                      <option value="<?php echo $x->id_model; ?>" >
                        <?php
                          echo $x->nama_kategori;
                          echo " - ";
                          echo $x->nama_model;
                          echo " ";
                          echo $x->nomor_model;
                        ?>
                      </option>
                    <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Harga</label>
                    <input type="text" class="form-control"  placeholder="Masukan Harga" name="harga" value="<?php echo $value->harga ?>" required>
                  </div>
                  <div class="form-group">
                  <label>Tannggal Pengadaan</label>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" id="datepicker" name="tanggalPengadaan" value="<?=$value->tanggal_pengadaan?>">
                    </div>
                    <!-- /.input group -->
                  </div>
                  <div class="form-group">
                    <label>Asal Aset</label>
                    <input type="text" class="form-control"  placeholder="Asal Aset" name="asal_asset" value="<?php echo $value->asal_asset ?>" required>
                  </div>
                  <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="status">

                    <option value="<?php echo $value->status; ?>">
                      <?php
                        $id = $value->status;
                        $query = $this->db->query('select*from status where id ='.$id);
                        $d = $query->row();
                        if (isset($d)) { ?>
                          <?php echo $d->nama_status; ?>
                      <?php
                        }
                       ?>
                       <i> - default</i>
                    </option>

                    <?php foreach ($status as $x) { ?>
                          <option value="<?php echo $x->id; ?>" >
                            <?php  echo $x->nama_status; ?>
                          </option>
                    <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Departement</label>
                    <select class="form-control" name="departement">

                      <option value="<?php echo $value->id_departement; ?>" >
                        <?php
                          $id = $value->id_departement;
                          $query = $this->db->query('select*from departement where id ='.$id);
                          $d = $query->row();
                          if (isset($d)) { ?>
                            <?php echo $d->nama_departement; ?>
                        <?php
                          }
                         ?>
                         <i> - default</i>
                      </option>

                      <?php foreach ($departement as $x) { ?>
                      <option value="<?php echo $x->id; ?>" >
                        <?php echo $x->nama_departement; ?>
                      </option>
                    <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Catatan</label>
                    <textarea class="form-control" rows="3" placeholder="Enter ..." name="catatan"><?php echo $value->catatan ?></textarea>
                  </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                  <div class="modal fade" id="modal-default">
                   <div class="modal-dialog">
                     <div class="modal-content">
                       <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span></button>
                         <h4 class="modal-title">Anda yakin akan menyimpan Perubahan ?</h4>
                       </div>
                       <div class="modal-body">
                         <p>Semua data perubahan akan disimpan</p>
                       </div>
                       <div class="modal-footer">
                         <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                         <input type="submit" class="btn btn-primary" value="Simpan">
                       </div>
                     </div>
                     <!-- /.modal-content -->

                   </div>
                   <!-- /.modal-dialog -->
                 </div>
                 <!-- /.modal -->
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                    Simpan
                  </button>
                </div>
                <?php endforeach; ?>
              </form>
      </div>
    </div>
    <div class="col-md-3">
      <div class="box box-warning">
        <div class="box-header with-border">
          <h3 class="box-title">Infromasi</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
          </div>
          <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body" style="">
          Keitka Aset baru dibuat, maka otomatis masuk ke <b>Aset Pending</b>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script type="text/javascript">
  $(document).ready(function(){
  $('#serial').blur(function(){
    $('#pesanSerial').html('<i class="fa fa-refresh fa-spin"></i>');
    var serial = $(this).val();

    $.ajax({
      type	: 'POST',
      url 	: '<?php echo base_url("index.php/asset/cekSerial"); ?>',
      data 	: 'serial='+serial,
      success	: function(data){
        $('#pesanSerial').html(data);
      }
    })

  });
  });
</script>
