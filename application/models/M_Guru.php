<?php
class M_Guru extends CI_Model {
	// var $session_expire	= 7200;
	var $table='guru';
	var $pk='id_guru';

	public function getAll ()
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->order_by($this->pk, 'DESC');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getID($id)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where($this->pk, $id);

		$query = $this->db->get();
		// if ($query->num_rows() > 0){
			return $query->row();
		// }else{
		// 	return false;
		// }
	}
	public function getKelas($id_guru)
	{
		$this->db->select('*');
		$this->db->from($this->table." g");
		$this->db->join('guru_mapel gm','g.id_guru=gm.id_guru');
		$this->db->join('kelas k','k.id_kelas=gm.id_kelas');
		$this->db->join('mapel m','m.id_mapel=gm.id_mapel');
		$this->db->where('gm.id_guru',$id_guru);
		$query = $this->db->get();
		// if ($query->num_rows() > 0){
			return $query->result_array();
		// }else{
			// return false;
		// }
	}
	public function login($data)
	{
		$this->db->select('*');
		$this->db->from($this->table." g");
		// $this->db->join('guru_mapel gm','g.id_guru=gm.id_guru');
		$this->db->where($data);
		$query = $this->db->get();
		// if ($query->num_rows() > 0){
			return $query->row();
		// }else{
			// return false;
		// }
	}
	
	public function insert($data){
		$id = $this->db->insert($this->table, $data);
		//$this->db->insert_id();
		return $id;
	}
	
	public function update($data){
		$this->db->where($this->pk, $data[$this->pk]);
		$id = $this->db->update($this->table, $data);
		return $id;
	}

	public function cek_login($where){		
		return $this->db->get_where($this->table,$where);
	}
	public function delete($id){
		$id = $this->db->where($this->pk,$id)->delete($this->table);
		return $id;
	}	
}