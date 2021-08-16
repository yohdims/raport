<?php
class M_Presensi extends CI_Model {
	// var $session_expire	= 7200;
	var $table='presensi';
	var $pk='id_presensi';

	public function getAll ()
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->order_by($this->pk, 'DESC');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getHasilperKelas ($id_kelas_tahunan)
	{
		$this->db->select("*,IF(p.keterangan='H',COUNT(id_presensi),'0') as hadir,IF(p.keterangan='S',COUNT(id_presensi),'0') as sakit,IF(p.keterangan='I',COUNT(id_presensi),'0') as ijin,IF(p.keterangan='A',COUNT(id_presensi),'0') as alpha");
		$this->db->from($this->table. " p");
		$this->db->join('anggota_kelas ak','ak.id_anggota_kelas=p.id_anggota_kelas');
		$this->db->join('siswa s','s.id_siswa=ak.id_siswa');
		$this->db->order_by('nis', 'DESC');
		$this->db->group_by('s.id_siswa');
		$this->db->where('ak.id_kelas_tahunan', $id_kelas_tahunan);

		// $this->db->where('n.id_jenis_nilai', $id_jenis_nilai);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getTampilSiswa ($id_kelas_tahunan,$tgl='kosong')
	{
		$this->db->select("*");
		$this->db->from("siswa s");
		$this->db->join('anggota_kelas ak','ak.id_siswa=s.id_siswa');
		$this->db->order_by('nis', 'DESC');
		// $this->db->group_by('nis');
		$this->db->where('ak.id_kelas_tahunan', $id_kelas_tahunan);
		if($tgl!='kosong'){
			$this->db->join('presensi p','p.id_anggota_kelas=ak.id_anggota_kelas');
			$this->db->where('tanggal', $tgl);
			$this->db->or_where('tanggal is null');

		}

		
		// $this->db->where('n.id_jenis_nilai', $id_jenis_nilai);
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
	
	public function getBySiswa ($id_anggota_kelas="",$id_siswa="")
	{
		$this->db->select("*, IF(p.keterangan='H',COUNT(id_presensi),'0') as hadir,IF(p.keterangan='S',COUNT(id_presensi),'0') as sakit,IF(p.keterangan='I',COUNT(id_presensi),'0') as ijin,IF(p.keterangan='A',COUNT(id_presensi),'0') as alpha");
		$this->db->from("presensi p");
		$this->db->group_by('p.id_anggota_kelas');
		if(!empty($id_anggota_kelas)){
			$this->db->where('p.id_anggota_kelas', $id_anggota_kelas);
		}if(!empty($id_siswa)){
			$this->db->join('anggota_kelas ak','p.id_anggota_kelas=ak.id_anggota_kelas');
			$this->db->join('kelas_tahunan kt','kt.id_kelas_tahunan=ak.id_kelas_tahunan');
			$this->db->join('kelas k','k.id_kelas=kt.id_kelas');
			$this->db->where('ak.id_siswa', $id_siswa);
		}
		
		// $this->db->where('n.id_jenis_nilai', $id_jenis_nilai);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function inputan($data){
		foreach ($data['presensi'] as $id_anggota_kelas=>$keterangan) {
			$insert = array(
				'tanggal'=>$data['tanggal'],
				'semester'=>$data['semester'],
				'id_anggota_kelas'=>$id_anggota_kelas);
			if($this->db->where($insert)->delete($this->table)){
				$insert +=array('keterangan'=>$keterangan);
				$id = $this->db->insert($this->table, $insert);
			}else{
				$insert +=array('keterangan'=>$keterangan);
				$id=$this->db->update($this->table, $insert);
			}
		}
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