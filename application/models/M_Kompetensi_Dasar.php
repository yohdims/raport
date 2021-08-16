<?php
class M_Kompetensi_Dasar extends CI_Model {
	// var $session_expire	= 7200;
	var $table='kompetensi_dasar';
	var $pk='id_kompetensi_dasar';

	public function getAll ()
	{
		$this->db->select('*');
		$this->db->from($this->table." kd");
		$this->db->join('ta t','t.id_ta=kd.id_ta');
		$this->db->join('guru_mapel gm','gm.id_guru_mapel=kd.id_guru_mapel');
		$this->db->join('kompetensi_keahlian kk','kk.id_kompetensi_keahlian=kd.id_kompetensi_keahlian');
		$this->db->join('mapel m','m.id_mapel=kd.id_mapel');
		$this->db->join('kel_nilai_mapel knm','knm.id_kel_nilai_mapel=kd.id_kel_nilai_mapel');
		$this->db->join('kel_mapel km','km.id_kel_mapel=kd.id_kel_mapel');
		$this->db->join('program_keahlian pk','pk.id_program_keahlian=kk.id_program_keahlian');
		$this->db->order_by($this->pk, 'DESC');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getByKelas ($id_kelas)
	{
		$this->db->select('*');
		$this->db->from($this->table." kd");
		$this->db->join('ta t','t.id_ta=kd.id_ta');
		$this->db->join('guru_mapel gm','gm.id_guru_mapel=kd.id_guru_mapel');
		$this->db->join('kompetensi_keahlian kk','kk.id_kompetensi_keahlian=kd.id_kompetensi_keahlian');
		$this->db->join('mapel m','m.id_mapel=kd.id_mapel');
		$this->db->join('kel_nilai_mapel knm','knm.id_kel_nilai_mapel=kd.id_kel_nilai_mapel');
		$this->db->join('kel_mapel km','km.id_kel_mapel=kd.id_kel_mapel');
		$this->db->join('program_keahlian pk','pk.id_program_keahlian=kk.id_program_keahlian');
		$this->db->where('id_kelas', $id_kelas);
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