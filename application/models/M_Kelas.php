<?php
class M_Kelas extends CI_Model {
	// var $session_expire	= 7200;
	var $table='kelas';
	var $pk='id_kelas';

	public function getAll ()
	{
		$this->db->select('*');
		$this->db->from($this->table." k");
		$this->db->join('program_keahlian p','p.id_program_keahlian=k.id_program_keahlian');
		$this->db->order_by('k.'.$this->pk, 'DESC');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getKelasSiswa ()
	{
		$this->db->select('*');
		$this->db->from($this->table." k");
		$this->db->join('program_keahlian p','p.id_program_keahlian=k.id_program_keahlian');
		$this->db->join('kelas_siswa ks','ks.id_kelas=k.id_kelas');
		$this->db->group_by('k.'.$this->pk);
		$this->db->order_by('k.'.$this->pk, 'DESC');
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
	public function delete($id){
		$id = $this->db->where($this->pk,$id)->delete($this->table);
		return $id;
	}	
}