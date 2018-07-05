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
				'id' => $hasil->id,
				'tps_id' => $hasil->tps_id,
				'nama' => $hasil->nama,
				'email' => $hasil->email,
				'role' => $hasil->role,
				'status_akun' => $hasil->status,
				'status' => 'login'
			);
			$this->session->set_userdata($data_session);
			if ($hasil->role == 'Admin') {
				redirect(base_url('dashboard'));
			} else {
				redirect(base_url('suara'));
			}
			
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
