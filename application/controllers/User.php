<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->helper('form');
    $this->load->library('form_validation');

    $this->load->model('departement');
    $this->load->model('level');
    $this->load->model('mAsset');
    $this->load->Model('mUser');
  }

  function insert()
  {
    $username = $this->input->post('username');
    $password = md5('123456');
    $level = $this->input->post('level');
    $nama = $this->input->post('nama');
    $nik = $this->input->post('nik');
    $departement = $this->input->post('departement');
    $alamat = $this->input->post('alamat');

    $data = array(
    'username' => $username,
    'password' => $password,
    'level' => $level,
    'nama' => $nama,
    'nik' => $nik,
    'id_departement' => $departement,
    'alamat' => $alamat
    );

    $where = array('username' => $username);

    $cek = $this->mUser->cek_user("user",$where )->num_rows();

    if ($cek > 0) {
      $this->session->set_flashdata('simpan_gagal',
      '<div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-ban"></i> Gagal di Simpan!</h4>
      Username sudah terpakai
      </div>');
      redirect('admin/view/all_user');
    } else {
      $this->mUser->insert($data,'user');
      $this->session->set_flashdata('simpan_sukses',
      '<div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-check"></i> Berhasil di Simpan!</h4>
      </div>');
      redirect('admin/view/all_user');
    }

  }

  function edit($id)
  {
    $where = array('username' => $id);

	  $data['user'] = $this->mUser->cek_user('user',$where)->result();
    $data['level'] = $this->level->getAll()->result();
    $data['departement'] = $this->departement->getAll()->result();

    $this->load->view('template/header');
    $this->load->view('admin/edit_user', $data);
    $this->load->view('template/footer');
  }

  function saveEdit()
  {
    $username = $this->input->post('username');
    $level = $this->input->post('level');
    $nama = $this->input->post('nama');
    $nik = $this->input->post('nik');
    $departement = $this->input->post('departement');
    $alamat = $this->input->post('alamat');

    $data = array(
      'username' => $username,
      'level' => $level,
      'nama' => $nama,
      'nik' => $nik,
      'id_departement' => $departement,
      'alamat' => $alamat
    );

    $where = array(
      'username' => $username
    );

    $this->mUser->update($where,$data);
    $this->session->set_flashdata('edit_sukses',
    '<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-check"></i> Berhasil di Edit!</h4>
    </div>');
    redirect('admin/view/all_user');
  }

  function delete($id)
  {
    $this->mUser->delete($id);
    $this->session->set_flashdata('hapus_sukses',
    '<div class="alert alert-warning alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-check"></i> Berhasil di hapus!</h4>
    </div>');
    redirect('admin/view/all_user');
  }

  function detail($id){
    $where = array('username' => $id);

    $data['user'] = $this->mUser->cek_user('user',$where)->result();
    $data['level'] = $this->level->getAll()->result();
    $data['departement'] = $this->departement->getAll()->result();

    $this->load->view('template/header');
    $this->load->view('admin/detail_user', $data);
    $this->load->view('template/footer');
  }

}
