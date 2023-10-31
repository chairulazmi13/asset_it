<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

function __construct(){
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

function view($page = 'dashboard') {
    if ( ! file_exists(APPPATH.'views/admin/'.$page.'.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }

				$data['mUser'] = $this->mUser->getAll();
				$data['level'] = $this->level->getAll()->result();
				// Tabel Status
				$data['status'] = $this->mStatus->getAll()->result();
				$data['statusByDigunakan'] = $this->mStatus->getByDigunakan();
				$data['statusByArsipAndPending'] = $this->mStatus->getByArsipAndPending();

				// Tabel Model
				$data['modelDetail'] = $this->mModel->joinWithKategori();
				$data['model'] = $this->mModel->getAll();
				
				// Tabel kategori
				$data['kategori'] = $this->mKategori->getAll()->result();

				// Tabel Departement
				$data['departement'] = $this->mDepartement->getAll()->result();

				// Data All asset
				$data['allAsset'] = $this->mAsset->detailAssetByNotArsip();

				// Data All asset Siap Digunakan
				$data['ReadyAsset'] = $this->mAsset->detailAssetBySiapDigunakan();

				// Data All asset Digunakan
				$data['DeployAsset'] = $this->mAsset->detailAssetByDigunakan();

				// Data All asset Pending
				$data['PendingAsset'] = $this->mAsset->detailAssetByPending();

				// Data All asset Arsip
				$data['ArsipAsset'] = $this->mAsset->detailAssetByArsip();

        		$this->load->view('template/header');
        		$this->load->view('admin/'.$page, $data);
        		$this->load->view('template/footer');
			}

function logout(){
			$this->session->sess_destroy();
			redirect(base_url('index.php/welcome'));
		}

}
