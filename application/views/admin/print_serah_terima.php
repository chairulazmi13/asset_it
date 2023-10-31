<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dokument Serah Terima</title>
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
          <small class="pull-right">Serah Terima Asset IT</small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <?php foreach ($asset as $value): ?>
    <div class="row invoice-info">
      <div class="col-sm-12">
        <p>
        Kami yang bertanda tangan dibawah ini, pada tanggal <?=$value->tanggal_pinjam;?> </p>
        <table class="table table-no-border">
          <tr>
            <td>Nama</td>
            <td>:</td>
            <td><?php echo $this->session->userdata('nama') ?></td>
          </tr>
          <tr>
            <td>NIK</td>
            <td>:</td>
            <td><?=$this->session->userdata("nik");?></td>
          </tr>
          <tr>
            <td>Departement</td>
            <td>:</td>
            <td>
            <?php
              $id = $this->session->userdata("id");

              $data = $this->mUser->detailUserById($id);

             foreach ($data as $key) {
                  echo $key->nama_departement;
              }
              ?>
            </td>
          </tr>
          <tr>
            <td>Alamat</td>
            <td>:</td>
            <td><?=$this->session->userdata("alamat");?></td>
          </tr>
        </table>
        <p>Selanjutnya disebut PIHAK PERTAMA </p><br>
        <table class="table table-no-border">
          <tr>
            <td>Nama</td>
            <td>:</td>
            <td><?=$value->nama;?></td>
          </tr>
          <tr>
            <td>NIK</td>
            <td>:</td>
            <td><?=$value->nik;?></td>
          </tr>
          <tr>
            <td>Departement</td>
            <td>:</td>
            <td><?=$value->nama_departement;?></td>
          </tr>
          <tr>
            <td>Alamat</td>
            <td>:</td>
            <td><?=$value->alamat;?></td>
          </tr>
        </table>
        <p>
        Selanjutnya disebut PIHAK KEDUA<br><br>
        PIHAK PERTAMA menyerahkan barang kepada PIHAK KEDUA, dan PIHAK KEDUA menyatakan telah menerima barang dari PIHAK PERTAMA berupa daftar terlampir : <br>
        </p>
      <div class="col-sm-12 table-responsive">
        <table class="table table-striped">
          <thead>
          <tr>
            <th>Asset</th>
            <th>Asal Asset</th>
            <th>Kategori</th>
            <th>Departement</th>
            <th>Harga Asset</th>
          </tr>
          </thead>
          <tbody>
          <tr>
            <td>
              <b>Nama Asset :</b> <?=$value->nama_asset;?> <br>
              <b>Serial :</b> <?=$value->serial;?><br>
              <b>Model :</b> <?=$value->nomor_model;?><br>
              <b>Brand :</b> <?=$value->brand;?><br>
            </td>
            <td><?=$value->asal_asset;?></td>
            <td><?=$value->nama_kategori;?></td>
            <td><?=$value->nama_departement;?></td>
            <td>
              <?php 
                $harga = $value->harga;

                echo "Rp. ". number_format($harga, 0, ".", ".");
              ?>
            </td>
          </tr>
          </tbody>
        </table>
      </div>
      <!-- /.col -->

      <!-- accepted payments column -->
      <div class="col-sm-12" style="margin-top: 5px;" align="justify">
        <p>    Demikianlah berita acara serah terima barang ini di perbuat oleh kedua belah pihak, adapun barang-barang
           tersebut dalam keadaan baik dan cukup, sejak penandatanganan berita acara ini, maka barang tersebut,
           menjadi tanggung jawab PIHAK KEDUA, memlihara / merawat dengan baik serta dipergunakan untuk keperluan (tempat dimana barang itu dibutuhkan).</p>
           <br><br>
      </div>
      <div class="row invoice-info">
      <div class="col-sm-4 invoice-col" align="center">
        <p>Yang Menyerahkan<br>
        PIHAK PERTAMA<br><br><br>
        
        <b><?=$this->session->userdata('nama')?></b>
        </p>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">

      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col" align="center">
        <p>Yang Menerima<br>
        PIHAK KEDUA<br><br><br>
        
        <b><?=$value->nama;?></b></p>
      </div>
      <!-- /.col -->
    </div>
    </div>
    <?php endforeach; ?>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
