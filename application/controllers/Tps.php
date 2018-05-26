<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tps extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->load->model('mod_user');
		$this->load->model('mod_tps');
		if ($this->session->userdata('status') != 'login' && $this->session->userdata('role') != 'Admin')
		{
			redirect('login');
		}
	}

	public function index()
	{
		$tps = $this->mod_tps->getData()->result();
		$data['title'] = "TPS";
		$data['header'] = $this->load->view('layout/header','',true);
		$data['sidebar'] = $this->load->view('layout/sidebar','',true);
		$data['content'] = $this->load->view('pages/tps',array('tps'=>$tps),true);
		$this->load->view('layout/master',array('template'=>$data));
	}

	public function tambahTps(){
		$tps = $this->mod_tps->getData()->result();
		$data['title'] = "Tambah TPS";
		$data['header'] = $this->load->view('layout/header','',true);
		$data['sidebar'] = $this->load->view('layout/sidebar','',true);
		$data['content'] = $this->load->view('form/form_add_tps',array(
			'action'=>'tambah',
			'tps'=>$tps
		),true);
		$this->load->view('layout/master',array('template'=>$data));
	}

	public function editTps($id){
		$tps = $this->mod_tps->edit($id)->result();
		// $tps = $this->mod_tps->getData()->result();
		$data['title'] = "Edit TPS";
		$data['header'] = $this->load->view('layout/header','',true);
		$data['sidebar'] = $this->load->view('layout/sidebar','',true);
		$data['content'] = $this->load->view('form/form_edit_tps',array(
			'action'=>'edit',
			'tps'=>$tps,
			'id_tps'=>$id
		),true);
		$this->load->view('layout/master',array('template'=>$data));
	}

	public function saveData(){
		$action = $this->input->post('action');
		$nama_tps = $this->input->post('nama_tps');
		$tempat = $this->input->post('tempat_tps');
		$data = array(
      		'nama_tps' => $nama_tps,
      		'tempat_tps' => $tempat
    	);
    	if($action == 'tambah') {
    		$this->mod_tps->saveData($data);
    	} else {
    		$id = $this->input->post('id');
	      	$this->mod_tps->update($id,$data);
    	}

    	redirect('tps');
	}

	public function deleteTps($id){
		$this->mod_tps->delete($id);
		redirect('tps');
	}
}
