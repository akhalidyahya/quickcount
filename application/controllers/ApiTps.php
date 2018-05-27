<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';
/**
 * 
 */
class ApiTps extends REST_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index_get()
	{
		$id = $this->get('id');
        if ($id == '') {
            $tps = $this->db->get('tps')->result();
        } else {
            $this->db->where('id', $id);
            $tps = $this->db->get('tps')->result();
        }
        $this->response($tps, 200);
	}
}
 ?>