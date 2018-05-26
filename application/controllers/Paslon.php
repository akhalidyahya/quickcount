<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paslon extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mod_paslon');
		if ($this->session->userdata('status') != 'login' && $this->session->userdata('role') != 'Admin')
		{
			redirect('login');
		}
	}

	public function index()
	{
		$paslon = $this->mod_paslon->getData()->result();
		$data['title'] = "PASLON";
		$data['header'] = $this->load->view('layout/header','',true);
		$data['sidebar'] = $this->load->view('layout/sidebar','',true);
		$data['content'] = $this->load->view('pages/paslon',array('paslon'=>$paslon),true);
		$this->load->view('layout/master',array('template'=>$data));
	}

	public function tambahPaslon(){
		$paslon = $this->mod_paslon->getData()->result();
		$data['title'] = "Tambah Pasangan Calon";
		$data['header'] = $this->load->view('layout/header','',true);
		$data['sidebar'] = $this->load->view('layout/sidebar','',true);
		$data['content'] = $this->load->view('form/form_add_paslon',array(
			'action'=>'tambah',
			'paslon'=>$paslon
		),true);
		$this->load->view('layout/master',array('template'=>$data));
	}

	public function editPaslon($id)
	{
		$paslon = $this->mod_paslon->edit($id)->result();
		$data['title'] = "Edit Pasangan Calon";
		$data['header'] = $this->load->view('layout/header','',true);
		$data['sidebar'] = $this->load->view('layout/sidebar','',true);
		$data['content'] = $this->load->view('form/form_edit_paslon',array(
			'action'=>'edit',
			'paslon'=>$paslon,
			'id_paslon'=>$id
		), true);
		$this->load->view('layout/master', array('template'=>$data));
	}
	public function saveData(){
		$action = $this->input->post('action');
		$no_urut = $this->input->post('no_urut_paslon');
		$nama_paslon = $this->input->post('nama_paslon');
		$warna = $this->input->post('warna_paslon');
		$data = array(
			// 'nama_kolom => $variabel'
			'no_urut' => $no_urut,
			'nama_paslon' => $nama_paslon,
			'warna' => $warna
		);
		if ($action == 'tambah') {
			$this->mod_paslon->saveData($data);
		}else{
			$id = $this->input->post('id');
			$this->mod_paslon->update($id,$data);
		}
		redirect('paslon');
	}
	public function deletePaslon($id){
		$this->mod_paslon->delete($id);
		redirect('paslon');
	}





}
