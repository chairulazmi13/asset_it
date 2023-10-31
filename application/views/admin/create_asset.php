<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      ASSET Baru
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
                <h3 class="box-title">Buat Baru</h3>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
              <form role="form" method="post" action="<?php echo base_url(). 'index.php/asset/insert'; ?>">

                <div class="box-body">
                  <div class="form-group">
                    <label>Nama Asset</label>
                    <input type="text" class="form-control" id="username" placeholder="nama_asset" name="nama_asset" required>
                  </div>
                  <div class="form-group">
                    <label>Serial</label>
                    <input type="text" class="form-control" id="username" placeholder="Serial" name="serial" required>
                  </div>
                  <div class="form-group">
                    <label>Model</label>
                    <select class="form-control" name="model">
                      <?php foreach ($modelDetail as $x) { ?>
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
                    <input type="text" class="form-control"  placeholder="Masukan Harga" name="harga">
                  </div>
                  <div class="form-group">
                  <label>Tannggal Pengadaan</label>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" id="datepicker" name="tanggalPengadaan">
                    </div>
                    <!-- /.input group -->
                  </div>
                  <div class="form-group">
                    <label>Asal Aset</label>
                    <input type="text" class="form-control"  placeholder="Asal Aset" name="asal_asset" required>
                  </div>
                  <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="status">
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
                      <?php foreach ($departement as $x) { ?>
                      <option value="<?php echo $x->id; ?>" >
                        <?php echo $x->nama_departement; ?>
                      </option>
                    <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Catatan</label>
                    <textarea class="form-control" rows="3" placeholder="Enter ..." name="catatan"></textarea>
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
                         <h4 class="modal-title">Anda yakin akan menyimpan ?</h4>
                       </div>
                       <div class="modal-body">
                         <p>One fine body&hellip;</p>
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
              </form>
      </div>
    </div>
    <div class="col-md-3">
      <?= $this->session->flashdata('simpan_sukses')?>
      <?= $this->session->flashdata('simpan_gagal')?>
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
