<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mod_paslon');
		$this->load->model('mod_user');
		$this->load->model('mod_tps');
		$this->load->model('mod_suara');
		if ($this->session->userdata('status') != 'login' && $this->session->userdata('role') != 'Admin')
		{
			redirect('login');
		}
	}

	public function index()
	{
		$jumlah_tps = $this->mod_tps->getData()->num_rows();
		$tps = $this->mod_tps->getData()->result();
		$jumlah_relawan = $this->mod_user->getRelawan()->num_rows();
		$paslon = $this->mod_paslon->getData()->result();
		// header('Content-Type: application/json');
		$suara = $this->mod_suara->getSuaraConcat()->result();
		// exit();
		$jumlah_suara = $this->mod_suara->getSuara()->result();

		$data['title'] = "Dashboard";
		$data['header'] = $this->load->view('layout/header','',true);
		$data['sidebar'] = $this->load->view('layout/sidebar','',true);
		$data['content'] = $this->load->view('pages/dashboard',array(
			'jumlah_tps' => $jumlah_tps,
			'jumlah_relawan' => $jumlah_relawan,
			'paslon' => $paslon,
			'tps' => $tps,
			'suara' => $suara,//json_encode($suara)
			'jumlah_suara' => $jumlah_suara
		),true);
		$this->load->view('layout/master',array('template'=>$data));
	}
}
