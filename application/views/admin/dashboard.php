<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dashboard Page
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content container-fluid">

    <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3>
                    <?php
                      $where = array (
                        'tipe_status' => 'digunakan',
                        'id_user' => '0'
                      );
                      $jumlahSiapDipakai = $this->mAsset->countAssetByID($where);

                      if (isset($jumlahSiapDipakai)) {
                        echo $jumlahSiapDipakai;
                      }
                      ?>
                  </h3>
                  <p>Asset Siap Digunakan</p>
                </div>
                <div class="icon">
                  <i class="fa fa-cubes"></i>
                </div>
                <a href="<?php echo base_url('index.php/admin/view/ready_asset'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>
                    <?php
                      $where = array (
                        'tipe_status' => 'digunakan',
                        'id_user >' => '0'
                      );
                      $jumlahDipakai = $this->mAsset->countAssetByID($where);

                      if (isset($jumlahDipakai)) {
                        echo $jumlahDipakai;
                      }
                      ?>
                  </h3>
                  <p>Asset Digunakan</p>
                </div>
                <div class="icon">
                  <i class="fa fa-check"></i>
                </div>
                <a href="<?php echo base_url('index.php/admin/view/deploy_asset'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>
                    <?php
                        $where = array (
                          'tipe_status' => 'pending'
                        );
                        $jumlahPending = $this->mAsset->countAssetByID($where);

                        if (isset($jumlahPending)) {
                          echo $jumlahPending;
                        }
                        ?>
                  </h3>
                  <p>Asset Pending</p>
                </div>
                <div class="icon">
                  <i class="fa fa-circle-o"></i>
                </div>
                <a href="<?php echo base_url('index.php/admin/view/pending_asset'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?php
                        $where = array (
                          'tipe_status' => 'arsip'
                        );
                        $jumlahArsip = $this->mAsset->countAssetByID($where);

                        if (isset($jumlahArsip)) {
                          echo $jumlahArsip;
                        }
                        ?></h3>
                  <p>Asset diarsipkan</p>
                </div>
                <div class="icon">
                  <i class="fa fa-close"></i>
                </div>
                <a href="<?php echo base_url('index.php/admin/view/arsip_asset'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
          </div>

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
