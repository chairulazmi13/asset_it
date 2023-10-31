<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Detail Asset
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
      <li class="active">Det</li>
      <li class="active">Profile</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs pull-right">
            <li class=""><a href="#tab_1-1" data-toggle="tab" aria-expanded="false">Riwayat</a></li>
            <li class=""><a href="#tab_2-2" data-toggle="tab" aria-expanded="false">Asset</a></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane" id="tab_1-1">
              <b>How to use:</b>
              <p>Exactly like the original bootstrap tabs except you should use
                the custom wrapper <code>.nav-tabs-custom</code> to achieve this style.</p>
              A wonderful serenity has taken possession of my entire soul,
              like these sweet mornings of spring which I enjoy with my whole heart.
              I am alone, and feel the charm of existence in this spot,
              which was created for the bliss of souls like mine. I am so happy,
              my dear friend, so absorbed in the exquisite sense of mere tranquil existence,
              that I neglect my talents. I should be incapable of drawing a single stroke
              at the present moment; and yet I feel that I never was a greater artist than now.
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane active" id="tab_2-2">
              <div class="box">
          <!-- /.box-header -->
              <div class="box-body no-padding">
                <table class="table table-condensed">
                  <div class="tab-pane fade in active" id="details">
            <div class="row">
              <div class="col-md-8">
                <div class="table-responsive" style="margin-top: 10px;">
                  <table class="table">
                    <tbody>
                      <?php foreach ($asset as $value): ?>
                        <tr>
                        <td>Status</td>
                        <td>
                          <?php
                            $tipe = $value->tipe_status;
                            $user = $value->id_user;

                            if ($tipe == "pending") {
                              echo $value->nama_status;
                              echo "<span class='label label-warning'>Pending</span>";
                            } elseif ($tipe == "digunakan" & $user == 0 or $user == '') {
                              echo $value->nama_status;
                              echo " <span class='label label-primary'>Siap Digunakan</span>";
                            } elseif ($tipe == "digunakan") {
                              echo $value->nama_status;
                              echo " <span class='label label-success'>Digunakan</span>";
                            }

                           if ( $value->id_user == 0 or $value->id_user == ''){ ?>
                              <?php echo "" ?>
                            <?php } else {
                              echo " <i class='fa fa-long-arrow-right' aria-hidden='true'></i>";
                              echo " <i class='fa fa-user'></i> ";
                              echo $value->nama;
                            }?>
                        </td>
                       </tr>
                       <tr>
                        <td>Nama Aset</td>
                        <td><?=$value->nama_asset;?></td>
                       </tr>
                       <tr>
                        <td>Serial</td>
                        <td><?=$value->serial;?></td>
                      </tr>
                      <tr>
                        <td>Model</td>
                        <td><?=$value->nama_model;?></td>
                      </tr>
                      <tr>
                        <td>Brand</td>
                        <td><?=$value->brand;?></td>
                      </tr>
                      <tr>
                        <td>Kategori</td>
                        <td><?=$value->nama_kategori;?></td>
                      </tr>
                      <tr>
                        <td>Harga</td>
                        <td><?=$value->harga;?></td>
                      </tr>
                      <tr>
                        <td>Asal Asset</td>
                        <td><?=$value->asal_asset;?></td>
                      </tr>
                      <tr>
                        <td>Departement</td>
                        <td><?=$value->nama_departement;?></td>
                      </tr>
                      <tr>
                        <td>Catatan</td>
                        <td><?=$value->catatan;?></td>
                      </tr>
                      <tr>
                        <td>Tanggal Pengadaan</td>
                        <td><?=$value->tanggal_pengadaan;?></td>
                      </tr>
                    <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
                <!-- /table-responsive -->
          <!-- /.box-body -->
        </div>
            </div>
            <!-- /.tab-pane -->
          </div>
          <!-- /.tab-content -->
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
