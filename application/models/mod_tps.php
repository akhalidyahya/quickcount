<?php 
/**
* 
*/
class mod_tps extends CI_Model
{
	function getData(){
		$this->db->select('*');
		$this->db->from('tps');
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