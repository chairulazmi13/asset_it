<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      User Baru
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
              <form role="form" method="post" action="<?php echo base_url(). 'index.php/user/insert'; ?>">

                <div class="box-body">
                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" id="username" placeholder="username" name="username" required>
                  </div>
                  <div class="form-group">
                    <label>Level</label>
                    <select class="form-control" name="level">
                      <?php foreach ($level as $x) { ?>
                      <option value="<?php echo $x->id; ?>" >
                        <?php echo $x->nama_level; ?>
                      </option>
                    <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" id="Nama" placeholder="Masukan Nama" name="nama">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">NIK</label>
                    <input type="text" class="form-control" id="NIK" placeholder="Masukan Model" name="nik">
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
                    <label>Alamat</label>
                    <textarea class="form-control" rows="3" placeholder="Enter ..." name="alamat"></textarea>
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
          Ketika user baru dibuat maka password akan tergenerate otomatis <b>123456</b>, user bisa menggantinya sendiri di Profil user
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
