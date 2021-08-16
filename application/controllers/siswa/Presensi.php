<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Presensi extends CI_Controller {
	var $hak_akses= "siswa";
	var $judul='Presensi';
	var $link='presensi';
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
		$this->data['all']=$this->M_Presensi->getBySiswa("",$this->session->userdata('id'));

		$this->data['isi'] = $this->load->view($this->link.'/index_siswa',$this->data,TRUE);

		$this->load->view('template/v_layout_utama',$this->data);
	}


}