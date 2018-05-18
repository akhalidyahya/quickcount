<?php 
/**
* 
*/
class mod_user extends CI_Model
{
	function getData(){
		$this->db->select('users.id,users.nama,users.email,users.password,users.role,tps.nama_tps');
		$this->db->from('users');
		$this->db->join('tps','users.tps_id=tps.id');
    	return $this->db->get();
	}

	function saveData($data){
		 $this->db->insert('users',$data);
		 
	}

	function update($id,$data){
  		$this->db->where('id',$id);
  		return $this->db->update('users',$data);
	}

	function delete($id){
		$this->db->where('id',$id);
		$this->db->delete('users');
	}

	function deleteAll(){
		$this->db->truncate('users');
	}

	function edit($id){
    	$this->db->where('id',$id);
    	return $this->db->get('users');
  	}
}
 ?>