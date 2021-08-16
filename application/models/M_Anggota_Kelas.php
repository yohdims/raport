<?php
class M_Anggota_Kelas extends CI_Model {
	// var $session_expire	= 7200;
	var $table='anggota_kelas';
	var $pk='id_anggota_kelas';

	public function getAll ()
	{
		$this->db->select('*');
		$this->db->from($this->table. " ak");
		$this->db->join('siswa s','s.id_siswa=ak.id_siswa');
		// $this->db->join('nilai n','n.id_kelas_siswa=ak.id_kelas_siswa','left');
		// $this->db->join('kelas k','ak.id_kelas=k.id_kelas');
		$this->db->order_by('ak.'.$this->pk, 'DESC');
		// $this->db->where('id_kelas', $id_kelas);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getAllperKelas ($id_kelas_tahunan)
	{
		$this->db->select("*");
		$this->db->from($this->table. " ak");
		$this->db->join('kelas_tahunan kt','ak.id_kelas_tahunan=kt.id_kelas_tahunan');
		$this->db->join('siswa s','s.id_siswa=ak.id_siswa');
		$this->db->order_by('ak.'.$this->pk, 'DESC');
		$this->db->where('ak.id_kelas_tahunan', $id_kelas_tahunan);
		
		// $this->db->where('n.id_jenis_nilai', $id_jenis_nilai);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getAllperKelasPresensi ($id_kelas,$tanggal='kosong')
	{
		$this->db->select("*");
		$this->db->from($this->table. " ak");
		$this->db->join('kelas k','ak.id_kelas=k.id_kelas');
		$this->db->join('siswa s','s.id_siswa=ak.id_siswa');
		
		$this->db->group_by('ak.id_kelas_siswa');
		$this->db->order_by('ak.'.$this->pk, 'DESC');
		if($tanggal!='kosong'){
			$this->db->where('p.tanggal', $tanggal);
			$this->db->join('presensi p','p.id_kelas_siswa=ak.id_kelas_siswa','left');
		}
		$this->db->where('ak.id_kelas', $id_kelas);
		// $this->db->where('n.id_jenis_nilai', $id_jenis_nilai);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getAllbyGuruMapel ($id_guru_mapel)
	{
		$this->db->select('*');
		$this->db->from($this->table. " ak");
		$this->db->join('siswa s','s.id_siswa=ak.id_siswa');
		$this->db->join('nilai_semester ns','ns.id_anggota_kelas=ak.id_anggota_kelas','left');
		$this->db->where('id_guru_mapel', $id_guru_mapel);
		
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getID($id)
	{
		$this->db->select('*');
		$this->db->from($this->table. " ak");
		$this->db->join('kelas_tahunan kt','ak.id_kelas_tahunan=kt.id_kelas_tahunan');
		$this->db->join('kelas k','k.id_kelas=kt.id_kelas');
		$this->db->join('siswa s','s.id_siswa=ak.id_siswa');
		$this->db->join('guru g','g.id_guru=kt.id_guru');
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