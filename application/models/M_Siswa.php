<?php
class M_Siswa extends CI_Model {
	// var $session_expire	= 7200;
	var $table='siswa';
	var $pk='id_siswa';

	public function getAll ()
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->order_by($this->pk, 'DESC');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getLeftJoinKelas ()
	{
		$this->db->select('nama_siswa, s.id_siswa,nis');
		$this->db->from($this->table." s");
		$this->db->join('anggota_kelas ak','ak.id_siswa=s.id_siswa','left');
		$this->db->where("id_kelas_tahunan is null");
		$this->db->order_by("s.".$this->pk, 'DESC');
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
	public function getID_Kelas($id_kelas_siswa)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('kelas_siswa ks','ks.id_siswa=siswa.id_siswa');
		$this->db->join('kelas k','ks.id_kelas=k.id_kelas');
		$this->db->join('guru_mapel gm','gm.id_kelas=k.id_kelas');
		$this->db->join('guru g','gm.id_guru=g.id_guru');
		$this->db->where('ks.id_kelas_siswa', $id_kelas_siswa);
		$this->db->where('jabatan', 'Wali Kelas');

		$query = $this->db->get();
		// if ($query->num_rows() > 0){
			return $query->row();
		// }else{
		// 	return false;
		// }
	}
	public function login($data)
	{
		$this->db->select('*');
		$this->db->from($this->table);
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