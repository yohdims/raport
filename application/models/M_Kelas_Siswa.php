<?php
class M_Kelas_Siswa extends CI_Model {
	// var $session_expire	= 7200;
	var $table='kelas_siswa';
	var $pk='id_kelas_siswa';

	public function getAll ()
	{
		$this->db->select('*');
		$this->db->from($this->table. " ks");
		$this->db->join('siswa s','s.id_siswa=ks.id_siswa');
		// $this->db->join('nilai n','n.id_kelas_siswa=ks.id_kelas_siswa','left');
		$this->db->join('kelas k','ks.id_kelas=k.id_kelas');
		$this->db->order_by('ks.'.$this->pk, 'DESC');
		// $this->db->where('id_kelas', $id_kelas);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getAllperKelas ($id_kelas)
	{
		$this->db->select("*, IF(p.keterangan='H',COUNT(id_presensi),'0') as hadir,IF(p.keterangan='S',COUNT(id_presensi),'0') as sakit,IF(p.keterangan='I',COUNT(id_presensi),'0') as ijin,IF(p.keterangan='A',COUNT(id_presensi),'0') as alpha");
		$this->db->from($this->table. " ks");
		$this->db->join('kelas k','ks.id_kelas=k.id_kelas');
		$this->db->join('siswa s','s.id_siswa=ks.id_siswa');
		$this->db->join('presensi p','p.id_kelas_siswa=ks.id_kelas_siswa','left');
		$this->db->group_by('ks.id_kelas_siswa');
		$this->db->order_by('ks.'.$this->pk, 'DESC');
		$this->db->where('ks.id_kelas', $id_kelas);
		
		// $this->db->where('n.id_jenis_nilai', $id_jenis_nilai);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getAllperKelasPresensi ($id_kelas,$tanggal='kosong')
	{
		$this->db->select("*");
		$this->db->from($this->table. " ks");
		$this->db->join('kelas k','ks.id_kelas=k.id_kelas');
		$this->db->join('siswa s','s.id_siswa=ks.id_siswa');
		
		$this->db->group_by('ks.id_kelas_siswa');
		$this->db->order_by('ks.'.$this->pk, 'DESC');
		if($tanggal!='kosong'){
			$this->db->where('p.tanggal', $tanggal);
			$this->db->join('presensi p','p.id_kelas_siswa=ks.id_kelas_siswa','left');
		}
		$this->db->where('ks.id_kelas', $id_kelas);
		// $this->db->where('n.id_jenis_nilai', $id_jenis_nilai);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getAllperKelasNilai ($id_kelas,$id_kompetensi_dasar,$id_jenis_nilai)
	{
		$this->db->select('* , (Select nilai from nilai where id_kompetensi_dasar='.$id_kompetensi_dasar.' and id_jenis_nilai='.$id_jenis_nilai.' and id_kelas_siswa=ks.id_kelas_siswa) as nilai, ks.id_kelas_siswa as id_ks');
		$this->db->from($this->table. " ks");
		$this->db->join('siswa s','s.id_siswa=ks.id_siswa');
		$this->db->join('nilai n','n.id_kelas_siswa=ks.id_kelas_siswa','left');
		// $this->db->join('kelas k','s.id_kelas=k.id_kelas');
		// $this->db->order_by('ks.'.$this->pk, 'DESC');
		$this->db->where('id_kelas', $id_kelas);
		// $this->db->where('n.id_jenis_nilai', $id_jenis_nilai);
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