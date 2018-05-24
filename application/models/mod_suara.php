<?php 
/**
* 
*/
class mod_suara extends CI_Model
{
	function getSuaraConcat()
	{
		$this->db->select('group_concat(jumlah_suara) as concat, paslons.nama_paslon,paslons.warna,sum(jumlah_suara) as jumlah');
		$this->db->from('jumlah_suaras');
		$this->db->join('tps','jumlah_suaras.tps_id=tps.id','left');
		$this->db->join('paslons','jumlah_suaras.paslon_id=paslons.id','left');
		$this->db->group_by('paslon_id');
    	return $this->db->get();
	}

	function getSuara()
	{
		$this->db->select('sum(jumlah_suara) as jumlah');
		$this->db->from('jumlah_suaras');
		return $this->db->get();
	}
}
 ?>