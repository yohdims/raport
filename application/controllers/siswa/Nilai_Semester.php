<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai_Semester extends CI_Controller {
	var $hak_akses= "siswa";
	var $judul='Nilai Semester';
	var $link='nilai_semester';
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		if(empty($this->session->userdata('username')) && $this->session->userdata('hak_akses')!=$this->hak_akses){
			redirect('auth');
		}
	}

	public function index()
	{
		$this->data['judul_tab']='Data '.$this->judul;
		$this->data['title']='Data '.$this->judul;
		$this->data['all']=$this->M_Kelas_Tahunan->getBySiswa($this->session->userdata('id'));

		$this->data['isi'] = $this->load->view($this->link.'/index_siswa',$this->data,TRUE);

		$this->load->view('template/v_layout_utama',$this->data);
	}
	public function detail($id_anggota_kelas,$semester)
	{
		$this->data['judul_tab']='Data '.$this->judul;
		$this->data['title']='Data '.$this->judul;
		$this->data['all']=$this->M_Nilai_Semester->getBySiswa($id_anggota_kelas,$semester);
		$this->data['presensi']=$this->M_Presensi->getBySiswa($id_anggota_kelas);
		$this->data['satuan']=$this->M_Anggota_Kelas->getID($id_anggota_kelas);
		$this->data['title2']='Nilai';

		$this->data['isi'] = $this->load->view($this->link.'/detail_siswa',$this->data,TRUE);

		$this->load->view('template/v_layout_utama',$this->data);
	}

}