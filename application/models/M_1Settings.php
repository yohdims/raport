<?php
class M_1Settings extends CI_Model {
	// var $session_expire	= 7200;
	public $localdir = 'database/';
	public $model_file = array();

	public function getAll ()
	{
		if ($dh = opendir($this->localdir)) {
			while (($file = readdir($dh)) !== FALSE) {
				if (pathinfo($file, PATHINFO_EXTENSION) === 'sql') {
					$this->model_file[] = $file;
				}
			}
			closedir($dh);

			if (!empty($this->model_file)) {
				$GLOBALS['status'] = array('info' => '.zip or .gz or .rar files found, ready for extraction');
			}
			else {
				$GLOBALS['status'] = array('info' => 'No .zip or .gz or rar files found. So only zipping functionality available.');
			}
		}
		// print_r($this->model_file);
	}
	public function getLogo()
	{
		$logo= base_url('assets/').'images/logo.jpeg';
		return $logo;
	}
	public function getGambar($gambar)
	{
		$ambil_gambar= base_url('assets/').'images/'.$gambar;
		return $ambil_gambar;
	}
	public function agama()
	{
		$agama= array(
			"Islam"=>"Islam",
			"Katolik"=>"Katolik",
			"Kristen"=>"Kristen",
			"Budha"=>"Budha",
			"Konghucu"=>"Konghucu",
			"Hindu"=>"Hindu",
		);
		return $agama;
	}
	public function kelas()
	{
		$pendidikan= array(
			"X","XI","XII"
		);
		return $pendidikan;
	}
	public function pendidikan()
	{
		$pendidikan= array(
			"S3"=>"S3",
			"S2"=>"S2",
			"D4/S1"=>"D4/S1",
			"D3"=>"D3",
			"SMA/SMK"=>"SMA/SMK",
			"SMP"=>"SMP",
			"SD"=>"SD",
		);
		return $pendidikan;
	}
	public function jk($jenis_kelamin="kosong")
	{
		if($jenis_kelamin=="kosong"){
			$jk= array(
				"L"=>"Laki-laki",
				"P"=>"Perempuan",
			);
		}else{
			$jk=$jenis_kelamin=="L"?"Laki-laki":"Perempuan";
		}
		return $jk;
	}
	public function jabatan($jabatan="kosong")
	{
		if($jabatan=="kosong"){
			$jab= array(
				"Wali_Kelas"=>"Wali Kelas",
				"Guru_Mapel"=>"Guru Mapel",
			);
		}else{
			$jab=$jabatan=="Wali Kelas"?"Wali Kelas":"Guru Mapel";
		}
		return $jab;
	}
	
	public function presensi($presensi="kosong")
	{
		if($presensi=="kosong"){
			$pre= array(
				"H"=>"Hadir",
				"S"=>"Sakit",
				"I"=>"Ijin",
				"A"=>"Alpha",
			);
		}else{
			$pre=$presensi=="Wali Kelas"?"Wali Kelas":"Guru Mapel";
		}
		return $pre;
	}
}
?>