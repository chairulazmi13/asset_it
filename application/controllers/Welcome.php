<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') == "login") {
			redirect(base_url('index.php/admin/view'));
		}
		$this->load->helper('form');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->load->view('login');
	}

	function login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$where = array(
			'username' => $username,
			'password' => md5($password)
		);

		$this->load->model('mUser');
		$cek = $this->mUser->cek_user("user", $where);

		// Cek username apakah ada

		if ($cek->num_rows() === 0) {
			$this->session->set_flashdata(
				'login_gagal',
				'<div class="alert alert-danger alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<h4><i class="icon fa fa-ban"></i> Gagal Login!</h4>
			Username atau Password salah </div>'
			);
			redirect('welcome');
			return;
		}

		$data = $cek->row_array();

		$this->session->set_userdata('status', 'login');

		if ($data['level'] == 1) {
			$this->session->set_userdata('id', $data['id']);
			$this->session->set_userdata('username', $data['username']);
			$this->session->set_userdata('nama', $data['nama']);
			$this->session->set_userdata('alamat', $data['alamat']);
			$this->session->set_userdata('nik', $data['nik']);
			$this->session->set_userdata('id_departement', $data['id_departement']);
			redirect('Admin/view');
			return;
		}

		$this->session->set_userdata('status', '');
		$this->session->set_flashdata(
			'login_gagal',
			'<div class="alert alert-warning alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4><i class="icon fa fa-ban"></i> Gagal Login!</h4>
				Anda bukan sebagai admin</div>'
		);
		redirect('welcome');
	}
}
