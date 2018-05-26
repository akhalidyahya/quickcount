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
			$hasil = $this->mod_login->cek_login("users", $where)->row();
			$data_session = array(
				'nama' => $hasil->nama,
				'email' => $hasil->email,
				'role' => $this->role,
				'status' => 'login'
			);
			$this->session->set_userdata($data_session);
			redirect('dashboard');
		}
		else {
			echo "Email dan password salah!";
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}



}
