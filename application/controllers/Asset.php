<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asset extends CI_Controller{

  public function __construct()
  {
    parent::__construct();

    if($this->session->userdata('status') != "login"){
      redirect(base_url('index.php/welcome'));
    }

    $this->load->model('mUser');
  	$this->load->model('mDepartement');
  	$this->load->model('level');
  	$this->load->model('mStatus');
  	$this->load->model('mKategori');
  	$this->load->model('mAsset');
  	$this->load->model('mModel');
  }

  function insert()
  {
    $nama_asset = $this->input->post('nama_asset');
    $serial = $this->input->post('serial');
    $model = $this->input->post('model');
    $harga = $this->input->post('harga');
    $tanggalPengadaan = $this->input->post('tanggalPengadaan');
    $asal_asset = $this->input->post('asal_asset');
    $status = $this->input->post('status');
    $departement = $this->input->post('departement');
    $catatan = $this->input->post('catatan');

    $data = array(
    'nama_asset' => $nama_asset,
    'serial' => $serial,
    'id_model' => $model,
    'harga' => $harga,
    'tanggal_pengadaan' => $tanggalPengadaan,
    'asal_asset' => $asal_asset,
    'status' => $status,
    'id_departement' => $departement,
    'catatan' => $catatan
    );

    $where = array('serial' => $serial);

    $cek = $this->mAsset->getById($where)->num_rows();

    if ($cek > 0) {
      $this->session->set_flashdata('simpan_gagal',
      '<div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-ban"></i> Gagal di Simpan!</h4>
      Serial Number sudah terpakai, silahkan cek terlebih dahulu jika asset tersebut sudah di inputkan
      </div>');
      redirect('admin/view/create_asset');
    } else {
      $this->mAsset->insert($data,'asset');
      $this->session->set_flashdata('simpan_sukses',
      '<div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-check"></i> Berhasil di Simpan!</h4>
      </div>');
      redirect('admin/view/create_asset');
    }

  }

  function detailAsset($id)
  {
    $where = $id;

	  $data['asset'] = $this->mAsset->detailAssetById($where)  ;
    $data['departement'] = $this->mDepartement->getAll()->result();
    $data['model'] = $this->mModel->joinWithKategori();
    $data['status'] = $this->mStatus->getAll()->result();

    $this->load->view('template/header');
    $this->load->view('admin/detail_asset', $data);
    $this->load->view('template/footer');
  }

  function edit($id)
  {
    $where = array('id_asset' => $id);

	  $data['asset'] = $this->mAsset->getById($where)->result();
    $data['departement'] = $this->mDepartement->getAll()->result();
    $data['model'] = $this->mModel->joinWithKategori();
    $data['status'] = $this->mStatus->getAll()->result();

    $this->load->view('template/header');
    $this->load->view('admin/edit_asset', $data);
    $this->load->view('template/footer');
  }

  function saveEdit()
  {
    $nama_asset = $this->input->post('nama_asset');
    $serial = $this->input->post('serial');
    $id_asset = $this->input->post('id');
    $model = $this->input->post('model');
    $harga = $this->input->post('harga');
    $tanggalPengadaan = $this->input->post('tanggalPengadaan');
    $asal_asset = $this->input->post('asal_asset');
    $status = $this->input->post('status');
    $departement = $this->input->post('departement');
    $catatan = $this->input->post('catatan');

    $data = array(
      'nama_asset' => $nama_asset,
      'serial' => $serial,
      'id_model' => $model,
      'harga' => $harga,
      'tanggal_pengadaan' => $tanggalPengadaan,
      'asal_asset' => $asal_asset,
      'status' => $status,
      'id_departement' => $departement,
      'catatan' => $catatan
    );

    $where = array('id_asset' => $id_asset);

    $this->mAsset->update($where,$data);
    $this->session->set_flashdata('edit_sukses',
    '<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-check"></i> Berhasil di Edit!</h4>
    </div>');

    redirect('admin/view/all_asset');

  }

  function delete($id)
  {
    $this->mAsset->delete($id);
    $this->session->set_flashdata('hapus_sukses',
    '<div class="alert alert-warning alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
    Asset dihapus
    </div>');
    redirect('admin/view/all_asset');
  }

  function detail($id){
    $where = array('username' => $id);

    $data['user'] = $this->mUser->cek_user('user',$where)->result();
    $data['level'] = $this->level->getAll()->result();
    $data['departement'] = $this->mDepartement->getAll()->result();

    $this->load->view('template/header');
    $this->load->view('admin/detail_user', $data);
    $this->load->view('template/footer');
  }

  function cekSerial()
  {
    $serial = $this->input->post('serial');
    $where = array('serial' => $serial);

    $cek = $this->mAsset->getById($where)->num_rows();

    if ($cek > 0) {
      echo "<div class='callout callout-warning'>
                <p>Serial number sudah terpakai!</p>
            </div>";
    } else {
      echo "<div class='callout callout-success'>
                <p>Serial tersedia!</p>
            </div>";
    }

  }

  function pinjam()
  {
    $id_asset = $this->input->post('id');
    $status = $this->input->post('status');
    $departement = $this->input->post('departement');
    $tanggalPinjam = $this->input->post('tanggalPinjam');
    $user = $this->input->post('user');

    // // mendapatkan Nama Pengguna
    // $cekPengguna = $this->mUser->detailUserById($user);
    // foreach ($cekPengguna as $key) {
    //   $namaPengguna = $key->nama;
    // }

    // // mendapatkan Nama departement
    // $where1 = array('id' => $departement);
    // $cekDepartement = $this->mDepartement->getById($where1);
    // foreach ($cekDepartement as $key) {
    //   $namaDepartement = $key->nama_departement;
    // }


    $data = array(
      'status' => $status,
      'id_departement' => $departement,
      'tanggal_pinjam' => $tanggalPinjam,
      'id_user' => $user
    );


    // $histori = array(
    //   'id_asset' => $id_asset,
    //   'nama_pengguna' => $namaPengguna,
    //   'departement' => $namaDepartement,
    //   'tanggal' => $tanggalPinjam,
    //   'keterangan' => 'Meminjam'
    // );


    // update Status Pinjam
    $where = array('id_asset' => $id_asset);
    $this->mAsset->update($where,$data);
    // // insert Histori
    // $this->mAsset->insertHistori($histori);

    // var_dump($hasil);
    $this->session->set_flashdata('pinjam_sukses',
    '<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
    <p>Asset berhasil di pinjamkan</p>
    </div>');

    redirect('admin/view/all_asset');

  }

  function kembali()
  {
    $id_asset = $this->input->post('id');
    $status = $this->input->post('status');
    $departement = $this->input->post('departement');
    $tanggalKembali = $this->input->post('tanggalKembali');
    $id_user = $this->input->post('id_user');
    $user = 0;

    //     // mendapatkan Nama Pengguna
    // $cekPengguna = $this->mUser->detailUserById($id_user);
    // foreach ($cekPengguna as $key) {
    //   $namaPengguna = $key->nama;
    // }

    // // mendapatkan Nama departement
    // $where1 = array('id' => $departement);
    // $cekDepartement = $this->mDepartement->getById($where1);
    // foreach ($cekDepartement as $key) {
    //   $namaDepartement = $key->nama_departement;
    // }

    $data = array(
      'status' => $status,
      'id_departement' => $departement,
      'tanggal_kembali' => $tanggalKembali,
      'id_user' => $user
    );

    // $histori = array(
    //   'id_asset' => $id_asset,
    //   'nama_pengguna' => $namaPengguna,
    //   'departement' => $namaDepartement,
    //   'tanggal' => $tanggalKembali,
    //   'keterangan' => 'Mengembalikan'
    // );

    // // insert Histori
    // $this->mAsset->insertHistori($histori);

    // update status kembali
    $where = array('id_asset' => $id_asset);
    $this->mAsset->update($where,$data);


    // var_dump($hasil);
    $this->session->set_flashdata('kembali_sukses',
    '<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
    <p>Asset di kebalikan</p>
    </div>');

    redirect('admin/view/all_asset');

  }

  function PrintSerahTerima($id)
  {
    $where = $id;

	  $data['asset'] = $this->mAsset->detailAssetById($where)  ;
    $this->load->view('admin/print_serah_terima', $data);
  }

  function PrintAllAsset()
  {
    // Data All asset
    $data['allAsset'] = $this->mAsset->detailAssetByNotArsip();
    $this->load->view('admin/print_all_asset',$data);
  }

  function PrintDeployAsset()
  {
    // Data All asset Digunakan
    $data['DeployAsset'] = $this->mAsset->detailAssetByDigunakan();
    $this->load->view('admin/print_deploy_asset',$data);
  }

  function PrintReadyAsset()
  {
    // Data All asset Siap Digunakan
    $data['ReadyAsset'] = $this->mAsset->detailAssetBySiapDigunakan();
    $this->load->view('admin/print_ready_asset',$data);
  }

  function PrintPendingAsset()
  {
    // Data All asset Siap Digunakan
    $data['PendingAsset'] = $this->mAsset->detailAssetByPending();
    $this->load->view('admin/print_pending_asset',$data);
  }

  function PrintArsipAsset()
  {
    // Data All asset Siap Digunakan
    $data['ArsipAsset'] = $this->mAsset->detailAssetByArsip();
    $this->load->view('admin/print_arsip_asset',$data);
  }

}
