<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quickcount extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mod_paslon');
		$this->load->model('mod_tps');
		$this->load->model('mod_suara');
	}

	public function index()
	{
		$jumlah_tps = $this->mod_tps->getData()->num_rows();
		$tps = $this->mod_tps->getData()->result();
		$paslon = $this->mod_paslon->getData()->result();
		$suara = $this->mod_suara->getSuaraConcat()->result();

		$data = array(
			'paslon' => $paslon,
			'suara' => $suara,
			'tps' => $tps,
			'jumlah_tps' => $jumlah_tps,
		);
		$this->load->view('pages/quickcount',$data);
	}
}
