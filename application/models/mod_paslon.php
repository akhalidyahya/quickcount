<?php
/**
 * 
 */
class mod_paslon extends CI_Model
{
	
	function getData(){
		$this->db->select('*');
		$this->db->from('paslons'); //paslons adalah nama dbnya
		return $this->db->get();
	}

	function saveData($data){
		$this->db->insert('paslons',$data);
	}

	function update($id, $data){
		$this->db->where('id',$id);
		return $this->db->update('paslons',$data);
	}

	function edit($id){
		$this->db->where('id',$id);
		return $this->db->get('paslons');
	}

	function delete($id){
		$this->db->where('id',$id);
		$this->db->delete('paslons');
	}

	function deleteAll(){
		$this->db->truncte('paslons');
	}
}