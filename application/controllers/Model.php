<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model extends CI_Controller {

  function __construct(){
  	parent::__construct();

  	if($this->session->userdata('status') != "login"){
  		redirect(base_url('index.php/welcome'));
  	}

    $this->load->model('mModel');
  }

  function insert()
  {
    $namaModel = $this->input->post('namaModel');
    $nomorModel = $this->input->post('nomorModel');
    $brand = $this->input->post('brand');
    $kategori = $this->input->post('Kategori');

    $data = array(
    'nama_model' => $namaModel,
    'nomor_model' => $nomorModel,
    'brand' => $brand,
    'id_kategori' => $kategori,
    );

    $this->mModel->insert($data);
    $this->session->set_flashdata('simpan_sukses',
    '<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
    Model ditambahkan
    </div>');
    redirect('admin/view/all_model');

  }

  function edit()
  {
          $id = $this->input->post('id');
          $namaModel = $this->input->post('namaModel');
          $nomorModel = $this->input->post('nomorModel');
          $brand = $this->input->post('brand');
          $kategori = $this->input->post('Kategori');

          $data = array(
            'nama_model' => $namaModel,
            'nomor_model' => $nomorModel,
            'brand' => $brand,
            'id_kategori' => $kategori,
          );

            $where = array('id' => $id);

            $this->mModel->update($where,$data);

            $this->session->set_flashdata('edit_sukses',
            '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
            Model terupdate
            </div>');
            redirect('admin/view/all_model');
    }

  function delete($id)
  {
    $this->mKategori->delete($id);
    $this->session->set_flashdata('hapus_sukses',
    '<div class="alert alert-warning alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
    Satu kategori di hapus
    </div>');
    redirect('admin/view/all_kategori');
  }

}
