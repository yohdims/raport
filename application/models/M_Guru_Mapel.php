<?php
class M_Guru_Mapel extends CI_Model {
	// var $session_expire	= 7200;
	var $table='guru_mapel';
	var $pk='id_guru_mapel';

	public function getAll ()
	{
		$this->db->select('*');
		$this->db->from($this->table." gm");
		$this->db->join('guru g','g.id_guru=gm.id_guru');
		$this->db->join('mapel m','m.id_mapel=gm.id_mapel');
		$this->db->join('kelas_tahunan kt','kt.id_kelas_tahunan=gm.id_kelas_tahunan');
		$this->db->join('kelas k','k.id_kelas=kt.id_kelas');
		$this->db->order_by($this->pk, 'DESC');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getGuruMapel ($id_guru)
	{
		$this->db->select('*');
		$this->db->from($this->table." gm");
		$this->db->join('guru g','g.id_guru=gm.id_guru');
		$this->db->join('mapel m','m.id_mapel=gm.id_mapel');
		$this->db->join('kelas_tahunan kt','kt.id_kelas_tahunan=gm.id_kelas_tahunan');
		$this->db->join('kelas k','k.id_kelas=kt.id_kelas');
		$this->db->where('g.id_guru', $id_guru);
		$this->db->order_by($this->pk, 'DESC');
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function getAllperKelas ($id_kelas_tahunan)
	{
		$this->db->select('*');
		$this->db->from($this->table." gm");
		$this->db->join('guru g','g.id_guru=gm.id_guru');
		$this->db->join('mapel m','m.id_mapel=gm.id_mapel');
		$this->db->where('gm.id_kelas_tahunan', $id_kelas_tahunan);
		$this->db->order_by($this->pk, 'DESC');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getID($id)
	{
		$this->db->select('*,kt.id_guru as guru_wali, gm.id_guru as id_guru');
		$this->db->from($this->table." gm");
		$this->db->join('guru g','g.id_guru=gm.id_guru');
		$this->db->join('mapel m','m.id_mapel=gm.id_mapel');
		$this->db->join('kelas_tahunan kt','kt.id_kelas_tahunan=gm.id_kelas_tahunan');
		$this->db->join('kelas k','k.id_kelas=kt.id_kelas');
		$this->db->where($this->pk, $id);

		$query = $this->db->get();
		// if ($query->num_rows() > 0){
			return $query->row();
		// }else{
		// 	return false;
		// }
	}
	public function getGuru ($id_guru)
	{
		$this->db->select('*');
		$this->db->from($this->table." gm");
		$this->db->join('ta t','t.id_ta=gm.id_ta');
		$this->db->join('guru g','g.id_guru=gm.id_guru');
		$this->db->join('mapel m','m.id_mapel=gm.id_mapel');
		$this->db->join('kelas k','k.id_kelas=gm.id_kelas');
		$this->db->where('gm.id_guru', $id_guru);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getKelasGuru ($id_kelas,$id_guru)
	{
		$this->db->select('*');
		$this->db->from($this->table." gm");
		$this->db->join('ta t','t.id_ta=gm.id_ta');
		$this->db->join('guru g','g.id_guru=gm.id_guru');
		$this->db->join('mapel m','m.id_mapel=gm.id_mapel');
		$this->db->where('id_kelas', $id_kelas);
		$this->db->where('gm.id_guru', $id_guru);
		$query = $this->db->get();
		return $query->result_array();
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