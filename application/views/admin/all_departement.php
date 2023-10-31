<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Departement
      <small>Master Departement</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Departement</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content container-fluid">
    <div class="row">
      <div class="col-md-3">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Buat Baru</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" action="<?php echo base_url(). 'index.php/departement/insert'; ?>">
                  <div class="box-body">
                    <div class="form-group">
                      <label>Nama</label>
                      <input type="text" class="form-control" id="nama" placeholder="nama kategori" name="nama" required>
                    </div>
                    <input type="submit" class="btn btn-success" value="Simpan">
                  </div>
                  <!-- /.box-body -->
                </form>
        </div>
      </div>
      <div class="col-md-9">
        <div class="box-primary">

          <!-- modal edit -->
          <?php foreach ($departement as $key): ?>
          <div class="modal fade" id="modal-edit<?=$key->id;?>">
           <div class="modal-dialog">
             <div class="modal-content">
               <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title">Edit datalist</h4>
               </div>
               <!-- form start -->
               <form role="form" action="<?php echo site_url('departement/edit'); ?>" method="post">
               <div class="modal-body">
                   <div class="box-body">
                     <div class="form-group">

                       <input type="hidden" readonly value="<?=$key->id;?>" class="form-control" name="id">

                       <label for="exampleInputEmail1">Nama</label>
                       <input type="text" class="form-control" id="nama" placeholder="nama kategori" value="<?=$key->nama_departement;?>" name="nama">
                     </div>
                   </div>
               </div>
               <div class="modal-footer">
                 <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                 <button href="#" type="submit" class="btn btn-primary" >Simpan</button>
               </div>
               </form>
             </div>
           </div>
          </div>
          <?php endforeach; ?>
        </div>
          <!-- /.modal -->

        <div class="box-footer">
          <?= $this->session->flashdata('simpan_sukses')?>
          <?= $this->session->flashdata('edit_sukses')?>
          <?= $this->session->flashdata('hapus_sukses')?>
          <div class="box-header">
            <h3 class="box-title">Daftar Kategori Asset</h3>
            <div class="box-tools">
              <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                <div class="input-group-btn">
                  <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                </div>
              </div>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
              <tbody><tr>
                <th>#</th>
                <th>Nama</th>
                <th>User</th>
                <th>Aset</th>
                <th>Action</th>
              </tr>
              <?php $no=1; foreach ($departement as $row): ?>
              <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $row->nama_departement; ?></td>
                <td>
                  <?php
                    $id = $row->id;

                    $this->db->where('id_departement', $id);
                    $this->db->from('user');
                    echo $this->db->count_all_results();
                   ?>
               </td>
                <td>
                  <?php
                    $id = $row->id;

                    $this->db->where('id_departement', $id);
                    $this->db->from('asset');
                    echo $this->db->count_all_results();
                   ?>
                </td>
                <td>
                  <div class="btn-group">
                    <a type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-edit<?=$row->id;?>">
                      <i class="fa fa-pencil"></i>
                    </a>
                    <?php
                    $id = $row->id;
                    $where = array('id_departement' => $id, );

                    $cek = $this->mUser->cek_user('user',$where)->num_rows();
                    // cek jika departement ada usernya, tidak bisa dihapus
                    if ($cek > 0) {
                     ?>
                       <button href="#" class="btn btn-danger" disabled>
                       <i class="fa fa-trash"></i>
                       </button>
                    <?php } else { ?>
                      <a href="<?php echo base_url('index.php/departement/delete/'.$row->id); ?>" class="btn btn-danger" onclick="return confirm('Hapus Data?')">
                      <i class="fa fa-trash"></i>
                      </a>
                    <?php } ?>
                  </div>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody></table>
          </div>
          <!-- /.box-body -->
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
