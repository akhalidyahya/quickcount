<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';
/**
 * 
 */
class ApiLogin extends REST_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('mod_login');
	}

	public function index_post()
	{
		// header('Content-Type: application/json');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$where = array(
			'email' => $email,
			'password' => md5($password),
			'role' => 'Relawan'
		);
		$cek = $this->mod_login->cek_login("users", $where)->result_array();
		$this->response($cek, 200);
	}
}
 ?>