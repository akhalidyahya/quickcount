<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['title'] = "Dashboard";
		$data['header'] = $this->load->view('layout/header','',true);
		$data['sidebar'] = $this->load->view('layout/sidebar','',true);
		$data['content'] = $this->load->view('pages/dashboard','',true);
		$this->load->view('layout/master',array('template'=>$data));
	}
}
