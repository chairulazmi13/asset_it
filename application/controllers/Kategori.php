<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

  function __construct(){
  	parent::__construct();

  	if($this->session->userdata('status') != "login"){
  		redirect(base_url('index.php/welcome'));
  	}

    $this->load->model('mKategori');
  }

  function insert()
  {
    $nama = $this->input->post('nama');
    $keterangan = $this->input->post('keterangan');

    $data = array(
    'nama_kategori' => $nama,
    'keterangan' => $keterangan,
    );

    $this->mKategori->insert($data);
    $this->session->set_flashdata('simpan_sukses',
    '<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
    Kategori ditambahkan
    </div>');
    redirect('admin/view/all_kategori');

  }

  function edit()
  {
          $id = $this->input->post('id');
          $nama = $this->input->post('nama');
          $keterangan = $this->input->post('keterangan');

            $data = array(
                'nama_kategori'=> $nama,
                'keterangan' => $keterangan,
            );
            $where = array('id' => $id);

            $this->mKategori->update($where,$data);

            $this->session->set_flashdata('edit_sukses',
            '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
            Kategoti terupdate
            </div>');
            redirect('admin/view/all_kategori');
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
