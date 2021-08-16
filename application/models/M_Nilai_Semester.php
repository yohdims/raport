<?php
class M_Nilai_Semester extends CI_Model {
	// var $session_expire	= 7200;
	var $table='nilai_semester';
	var $pk='id_nilai_semester';

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
	public function getAllperKelas ($id_guru_mapel,$semester)
	{
		$this->db->select("*");
		$this->db->from($this->table. " ns");
		$this->db->join('anggota_kelas ak','ak.id_anggota_kelas=ns.id_anggota_kelas');
		$this->db->join('siswa s','s.id_siswa=ak.id_siswa');
		$this->db->join('guru_mapel gm','gm.id_guru_mapel=ns.id_guru_mapel');
		$this->db->where('ns.id_guru_mapel', $id_guru_mapel);
		$this->db->where('ns.semester', $semester);
		$this->db->order_by('ns.id_anggota_kelas');

		// $this->db->where('n.id_jenis_nilai', $id_jenis_nilai);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getBySiswa ($id_anggota_kelas,$semester)
	{
		$this->db->select("*");
		$this->db->from($this->table. " ns");
		$this->db->join('anggota_kelas ak','ak.id_anggota_kelas=ns.id_anggota_kelas');
		$this->db->join('siswa s','s.id_siswa=ak.id_siswa');
		$this->db->join('guru_mapel gm','gm.id_guru_mapel=ns.id_guru_mapel');
		$this->db->join('mapel m','m.id_mapel=gm.id_mapel');
		$this->db->where('ns.id_anggota_kelas', $id_anggota_kelas);
		$this->db->where('ns.semester', $semester);
		$this->db->order_by('ns.id_guru_mapel');

		// $this->db->where('n.id_jenis_nilai', $id_jenis_nilai);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function inputan($data){
		foreach ($data['nilai_pengetahuan'] as $id_anggota_kelas=>$nilai) {
			$insert = array(
				'semester'=>$data['semester'],
				'id_anggota_kelas'=>$id_anggota_kelas,
				'id_guru_mapel'=>$data['id_guru_mapel']);

			$nilai_pengetahuan=$data['nilai_pengetahuan'][$id_anggota_kelas];
			$nilai_keterampilan=$data['nilai_keterampilan'][$id_anggota_kelas];
			$deskripsi=$data['deskripsi'][$id_anggota_kelas];

			$nilai_akhir=(30/100*$nilai_pengetahuan)+(70/100*$nilai_keterampilan);
			if($nilai_akhir>90 && $nilai_akhir<=100){
				$predikat="A";
			}elseif($nilai_akhir>80 && $nilai_akhir<=90){
				$predikat="B";
			}elseif($nilai_akhir>70 && $nilai_akhir<=80){
				$predikat="C";
			}elseif($nilai_akhir>50 && $nilai_akhir<=70){
				$predikat="D";
			}else{
				$predikat="E";
			}
			$tambah = array(
					'id_anggota_kelas'=>$id_anggota_kelas,
					'nilai_pengetahuan'=>$nilai_pengetahuan,
					'nilai_keterampilan'=>$nilai_keterampilan,
					'nilai_akhir'=>$nilai_akhir,
					'predikat'=>$predikat,
					'deskripsi'=>$deskripsi,
				);
			if($this->db->where($insert)){
				$insert += $tambah;
				$id=$this->db->update($this->table, $insert);
			}else{
				$insert += $tambah;
				$id = $this->db->insert($this->table, $insert);
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