<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';
/**
 * 
 */
class ApiPaslon extends REST_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index_get()
	{
		$no = $this->get('no_urut');
        if ($no == '') {
            $paslon = $this->db->get('paslons')->result();
        } else {
            $this->db->where('no_urut', $no);
            $paslon = $this->db->get('paslons')->result();
        }
        $this->response($paslon, 200);
	}
}
 ?>