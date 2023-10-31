<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      USER
      <small>Data para Pengguna</small>
    </h1>
    <ol class="breadcrumb">
      <a href="<?php echo base_url('index.php/admin/view/create_user'); ?>" type="button" class="btn btn-success">Buat baru</a>
      <br>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content container-fluid">

    <div class="box">
          <div class="box-header">
            <h3 class="box-title">Data Seluruh User</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <?= $this->session->flashdata('edit_sukses')?>
            <?= $this->session->flashdata('simpan_sukses')?>
            <?= $this->session->flashdata('simpan_gagal')?>
            <?= $this->session->flashdata('hapus_sukses')?>

            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Username</th>
                <th>Nama</th>
                <th>NIK</th>
                <th>Alamat</th>
                <th>Departement</th>
                <th>Asset</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>
              <?php foreach ($mUser as $row) { ?>

              <tr>
                <td><a href="<?php echo base_url('index.php/user/detail/'.$row->username); ?>"><?php echo $row->username; ?></a></td>
                <td><?php echo $row->nama; ?></td>
                <td><?php echo $row->nik; ?></td>
                <td><?php echo $row->alamat; ?></td>
                <td><?php echo $row->nama_departement; ?>
                </td>
                <td>
                  <?php
                    $id = $row->id;
                    $jumlahAsset = $this->mAsset->countAssetByUser($id);
                    if (isset($jumlahAsset)) {
                      echo $jumlahAsset;
                    }
                   ?>
                </td>
                <td>
                  <div class="btn-group">
                    <a href="<?php echo base_url('index.php/user/edit/'.$row->username); ?>" type="button" class="btn btn-primary">Edit</a>
                    <!-- <a type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-hapus"> -->
                    <?php if ($jumlahAsset > 0): ?>
                      <a class="btn btn-danger" type="button" disabled>
                        Delete
                      </a>
                    <?php else: ?>
                      <a href="<?php echo base_url('index.php/user/delete/'.$row->username); ?>" class="btn btn-danger" onclick="return confirm('Hapus Data?')">
                        Delete
                      </a>
                    <?php endif; ?>
                  </div>
                </td>
              </tr>
            <?php } ?>
              </tbody>
              <tfoot>
              <tr>
                <th>Nama Asset</th>
                <th>Serial</th>
                <th>Model</th>
                <th>Kategori</th>
                <th>Asal Asset</th>
                <th>status</th>
                <th>Action</th>
              </tfoot>
            </table>
          </div>
          <!-- /.box-body -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
