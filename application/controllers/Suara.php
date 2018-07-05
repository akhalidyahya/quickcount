<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suara extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mod_suara');
		$this->load->model('mod_user');
		$this->load->model('mod_paslon');
		if ($this->session->userdata('status') != 'login' && $this->session->userdata('role') != 'Relawan')
		{
			redirect(base_url('login'));
		}
	}

	public function index()
	{
		$relawan = $this->mod_user->getSpesificRelawan($this->session->userdata('id'))->result();
		$paslon = $this->mod_paslon->getData()->result();

		foreach ($relawan as $hasil) {
			$dataRelawan = array();
			$dataRelawan[] = $hasil->nama_tps;
		}
		$data = array(
			'relawan' => $dataRelawan[0],
			'paslon' => $paslon, 
		);
		$this->load->view('pages/suara',$data);
	}

	public function saveData(){
		$paslon = $this->mod_paslon->getData()->result();
		foreach ($paslon as $hasil) {
			$data = array(
				'tps_id' => $this->session->userdata('tps_id'),
				'paslon_id' => $hasil->id,
				'jumlah_suara' => $this->input->post('paslon'.$hasil->id),
				'user_id' => $this->session->userdata('id'),
			);
			$aksi = $this->mod_suara->saveData($data);
			
		}
		$data = array('status' => 1, );
		$this->mod_user->update($this->session->userdata('id'),$data);
		$this->session->set_flashdata('action_status', 'success');
		$this->session->set_userdata('status_akun',1);
    	redirect(base_url('suara'));
	}

}
