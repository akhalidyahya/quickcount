<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Api extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('mod_user');
		$this->load->model('mod_login');
	}

	public function user()
	{
		header('Content-Type: application/json');
		echo json_encode($this->mod_user->getData()->result());
	}

	public function login()
	{
		header('Content-Type: application/json');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$where = array(
			'email' => $email,
			'password' => md5($password),
			'role' => 'Admin'
		);
		$cek = $this->mod_login->cek_login("users", $where)->result_array();
		echo json_encode($cek);
	}
}
 ?>