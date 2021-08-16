<?php
class M_Nilai extends CI_Model {
	// var $session_expire	= 7200;
	var $table='nilai';
	var $pk='id_nilai';

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
	public function getKelasSiswa ($id_kelas_siswa)
	{
		$this->db->select('*, AVG(nilai) as nilai_total');
		$this->db->from("kelas_siswa ks");
		// $this->db->join('siswa s','s.id_siswa=ks.id_siswa');
		$this->db->join('nilai n','n.id_kelas_siswa=ks.id_kelas_siswa');
		$this->db->join('kelas k','ks.id_kelas=k.id_kelas');
		$this->db->join('kompetensi_dasar kd','kd.id_kompetensi_dasar=n.id_kompetensi_dasar');
		$this->db->join('mapel m','m.id_mapel=kd.id_mapel');
		$this->db->group_by('m.id_mapel');
		$this->db->where('ks.id_kelas_siswa', $id_kelas_siswa);
		// $this->db->where('n.id_jenis_nilai', $id_jenis_nilai);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function inputan($data){
		foreach ($data['nilai'] as $id_kelas_siswa=>$nilai) {
			$insert = array(
				'id_kompetensi_dasar'=>$data['id_kompetensi_dasar'],
				'id_jenis_nilai'=>$data['id_jenis_nilai'],
				'id_kelas_siswa'=>$id_kelas_siswa);
			if($this->db->where($insert)->delete($this->table)){
				$insert +=array('nilai'=>$nilai);
				$id = $this->db->insert($this->table, $insert);
				
			}else{
				$insert +=array('nilai'=>$nilai);
				$id =$this->db->update($this->table, $insert);
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