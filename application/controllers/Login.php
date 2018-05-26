<?php
defined ('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mod_login');
	}

	public function index()
	{
		$this->load->view('pages/login');
	}

	public function aksi_login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$where = array(
			'email' => $email,
			'password' => md5($password)
		);
		$cek = $this->mod_login->cek_login("users", $where)->num_rows();
		if ($cek > 0) {
			$data_session = array(
				'email' => $email,
				'status' => "login"
			);
			$this->session->set_userdata($data_session);
			echo "Selamat Anda berhasil login";
			redirect('dashboard');
		}
		else {
			echo "Email dan password salah!";
		}
	}

	public function logut()
	{
		$this->session->sess_destron();
		redirect(base_url('login'));
	}



}
