<?php 
defined('BASEPATH') OR exit('No Direct Script Allowed!');
require APPPATH . 'libraries/REST_Controller.php';
/**
 * 
 */
class ApiSuara extends REST_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	function index_post()
	{
		$tps = $this->input->post('tps');
		$paslon = $this->input->post('paslon');
		$jumlah = $this->input->post('jumlah');
		$user = $this->input->post('user');
		$data = array(
			'tps_id' => $tps,
			'paslon_id' => $paslon,
			'jumlah_suara' => $jumlah,
			'user_id' => $user
		);
		$insert = $this->db->insert('jumlah_suaras',$data);
		if($insert){
			$this->response($data, 200);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}
}
 ?>