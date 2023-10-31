<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      USER Profile
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
      <li class="active">User</li>
      <li class="active">Profile</li>
    </ol>
  </section>
  <!-- Main content -->
  <?php foreach ($user as $key) : ?>
    <section class="content container-fluid">
      <div class="row">
        <div class="col-md-3">
          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url(); ?>assets/dist/img/avatar5.png" alt="User profile picture">
              <h3 class="profile-username text-center"><?php echo $key->nama; ?></h3>
              <p class="text-muted text-center">
                <?php
                $id = $key->id_departement;
                $query = $this->db->query('select*from departement where id =' . $id);
                $d = $query->row();
                if (isset($d)) {
                  echo $d->nama_departement;
                }
                ?>
              </p>
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Total Asset terpinjam</b> <a class="pull-right">
                    <?php
                    $id = $key->id;
                    echo $this->mAsset->countAssetByUser($id);
                    ?>
                  </a>
                </li>
              </ul>
              <a href="<?php echo base_url('index.php/user/edit/' . $key->username); ?>" type="button" class="btn btn-default btn-block"><b>Edit Data User</b></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Me</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> NIK</strong>
              <p class="text-muted">
                <?php echo $key->nik; ?>
              </p>
              <hr>
              <strong><i class="fa fa-map-marker margin-r-5"></i> Alamat</strong>
              <p class="text-muted"><?php echo $key->alamat; ?></p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs pull-right">
              <li class=""><a href="#tab_1-1" data-toggle="tab" aria-expanded="false">Riwayat</a></li>
              <li class=""><a href="#tab_2-2" data-toggle="tab" aria-expanded="false">Asset</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_2-2">
                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">Asset yang digunakan</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body no-padding">
                    <table class="table table-condensed">
                      <tbody>
                        <tr>
                          <th style="width: 10px">#</th>
                          <th>Nama Asset</th>
                          <th>Serial</th>
                          <th>Tipe</th>
                          <th>Kategori</th>
                        </tr>
                        <?php
                        $no = 1;
                        $id = $key->id;
                        $data = $this->mAsset->detailAssetByUser($id);
                        foreach ($data as $key) : ?>
                          <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $key->nama_asset; ?></td>
                            <td><?php echo $key->serial; ?></td>
                            <td><?php
                                echo $key->nama_model;
                                echo " - ";
                                echo $key->nomor_model;
                                ?></td>
                            <td><?php echo $key->nama_kategori; ?></td>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
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
  <?php endforeach; ?>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->