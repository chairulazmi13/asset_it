<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Laporan Asset</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body onload="window.print();">
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <i class="fa fa-globe"></i> PT. BORWITA CITRA PRIMA
          <small class="pull-right">Laporan Asset Digunakan</small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-12 table-responsive">
        <table class="table table-striped">
          <thead>
          <tr>
            <th>No</th>
            <th>Asset</th>
            <th>Harga Asset</th>
            <th>Asal Asset</th>
            <th>keterangan</th>
            <th>status</th>
            <th>Lokasi Departement</th>
            <th>Tgl Pinjam</th>
          </tr>
          </thead>
          <tbody>
          <?php $no = 1; foreach ($ReadyAsset as $value): ?>
          <tr>
            <td><?=$no++;?></td>
            <td>
              <b>Nama Asset :</b> <?=$value->nama_asset;?> <br>
              <b>Serial :</b> <?=$value->serial;?><br>
              <b>Model :</b> <?=$value->nama_model;?> - <?=$value->nomor_model;?><br>
              <b>Brand :</b> <?=$value->brand;?><br>
              <b>Kategori :</b> <?=$value->nama_kategori;?><br>
            </td>
            <td>
              <?php
                $harga = $value->harga;

                echo "Rp. ". number_format($harga, 0, ".", ".");
              ?>
            </td>
            <td><?php echo $value->asal_asset; ?></td>
            <td><?php  echo $value->nama_status;  ?></td>
            <td>
                 <?php
                    $tipe = $value->tipe_status;
                    $user = $value->id_user;

                    if ($tipe == "pending") {
                      echo "Pending ";
                      echo $value->nama;
                    } elseif ($tipe == "digunakan" & $user == 0 or $user == '') {
                      echo "Siap Digunakan ";
                      echo $value->nama;
                    } elseif ($tipe == "digunakan") {
                      echo "Digunakan ";
                      echo $value->nama;
                    }
                  ?>
            </td>
            <td><?=$value->nama_departement;?></td>
            <?php if ($value->tipe_status == 'pending'){ ?>
            <td></td>
            <?php } else{
            if ( $value->id_user > 0){ ?>
            <td><?=$value->tanggal_pinjam;?></td>
            <?php } else { ?>
            <td></td>
            <?php }}?>
          </tr>
          <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>

    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
