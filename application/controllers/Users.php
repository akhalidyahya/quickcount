<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mod_user');
		$this->load->model('mod_tps');
	}

	public function index()
	{
		$relawan = $this->mod_user->getData()->result();
		$data['title'] = "Relawan";
		$data['header'] = $this->load->view('layout/header','',true);
		$data['sidebar'] = $this->load->view('layout/sidebar','',true);
		$data['content'] = $this->load->view('pages/user',array('relawan'=>$relawan),true);
		$this->load->view('layout/master',array('template'=>$data));
	}

	public function tambahRelawan(){
		$tps = $this->mod_tps->getData()->result();
		$data['title'] = "Tambah Relawan";
		$data['header'] = $this->load->view('layout/header','',true);
		$data['sidebar'] = $this->load->view('layout/sidebar','',true);
		$data['content'] = $this->load->view('form/form_add_user',array(
			'action'=>'tambah',
			'tps'=>$tps
		),true);
		$this->load->view('layout/master',array('template'=>$data));
	}

	public function editRelawan($id){
		$relawan = $this->mod_user->edit($id)->result();
		$tps = $this->mod_tps->getData()->result();
		$data['title'] = "Edit Relawan";
		$data['header'] = $this->load->view('layout/header','',true);
		$data['sidebar'] = $this->load->view('layout/sidebar','',true);
		$data['content'] = $this->load->view('form/form_edit_user',array(
			'action'=>'edit',
			'relawan'=>$relawan,
			'tps'=>$tps,
			'id_relawan'=>$id
		),true);
		$this->load->view('layout/master',array('template'=>$data));
	}

	public function saveData(){
		$action = $this->input->post('action');
		$nama = $this->input->post('name');
		$email = $this->input->post('email');
		$password = md5($this->input->post('password'));
		$role = $this->input->post('role');
		$tps = $this->input->post('tps');
		$data = array(
      		'nama' => $nama,
      		'email' => $email,
      		'role' => $role,
      		'tps_id' => $tps
    	);
    	if($action == 'tambah') {
    		if($this->input->post('password') != NULL) {
    			$data['password'] = $password;
    		}
    		$this->mod_user->saveData($data);
    	} else {
    		$id = $this->input->post('id');
    		if ($this->input->post('password') != NULL) {
    			$data['password'] = $password;
    		}
	      	$this->mod_user->update($id,$data);
    	}

    	redirect('users');
	}

	public function deleteRelawan($id){
		$this->mod_user->delete($id);
		redirect('users');
	}
}
