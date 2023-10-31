<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Departement extends CI_Controller {

  function __construct(){
  	parent::__construct();

  	if($this->session->userdata('status') != "login"){
  		redirect(base_url('index.php/welcome'));
  	}

    $this->load->model('mDepartement');
  }

  function insert()
  {
    $nama = $this->input->post('nama');

    $data = array(
    'nama_departement' => $nama,
    );

    $this->mDepartement->insert($data);
    $this->session->set_flashdata('simpan_sukses',
    '<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
    departement ditambahkan
    </div>');
    redirect('admin/view/all_departement');

  }

  function edit()
  {
          $nama = $this->input->post('nama');

            $data = array(
                'nama_departement'=> $nama,
            );
            $where = array('id' => $id);

            $this->mDepartement->update($where,$data);

            $this->session->set_flashdata('edit_sukses',
            '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
            Kategoti terupdate
            </div>');
            redirect('admin/view/all_departement');
    }

  function delete($id)
  {
    $this->mDepartement->delete($id);
    $this->session->set_flashdata('hapus_sukses',
    '<div class="alert alert-warning alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
    Satu kategori di hapus
    </div>');
    redirect('admin/view/all_departement');
  }

}
