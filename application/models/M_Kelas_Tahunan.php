<?php
class M_Kelas_Tahunan extends CI_Model {
	// var $session_expire	= 7200;
	var $table='kelas_tahunan';
	var $pk='id_kelas_tahunan';

	public function getAll ()
	{
		$this->db->select('*');
		$this->db->from($this->table. " kt");
		$this->db->join('ta ta','ta.id_ta=kt.id_ta');
		$this->db->join('guru g','g.id_guru=kt.id_guru');
		$this->db->join('kelas k','kt.id_kelas=k.id_kelas');
		$this->db->order_by('kt.'.$this->pk, 'DESC');
		// $this->db->where('id_kelas', $id_kelas);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getWaliKelas ($id_guru)
	{
		$this->db->select('*');
		$this->db->from($this->table. " kt");
		$this->db->join('guru g','g.id_guru=kt.id_guru');
		$this->db->join('kelas k','kt.id_kelas=k.id_kelas');
		$this->db->order_by('kt.'.$this->pk, 'DESC');
		$this->db->where('g.id_guru', $id_guru);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getBySiswa ($id_siswa)
	{
		$this->db->select('*');
		$this->db->from($this->table. " kt");
		$this->db->join('anggota_kelas ak','ak.id_kelas_tahunan=kt.id_kelas_tahunan');
		$this->db->join('siswa s','s.id_siswa=ak.id_siswa');
		$this->db->join('kelas k','kt.id_kelas=k.id_kelas');
		$this->db->order_by('kt.'.$this->pk, 'DESC');
		$this->db->where('s.id_siswa', $id_siswa);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	
	
	public function getID($id)
	{
		$this->db->select('*');
		$this->db->from($this->table. " ks");
		$this->db->join('kelas k','ks.id_kelas=k.id_kelas');
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