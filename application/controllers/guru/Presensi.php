<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Presensi extends CI_Controller {
	var $hak_akses= "guru";
	var $judul='Presensi';
	var $link='presensi';
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		if(empty($this->session->userdata('username')) && $this->session->userdata('hak_akses')!=$this->hak_akses){
			redirect('auth');
		}
		$id_guru=$this->session->userdata('id');
		$this->data['menu_wali']=$this->M_Kelas_Tahunan->getWaliKelas($id_guru);
		$this->data['menu_mapel']=$this->M_Guru_Mapel->getGuruMapel($id_guru);
	}

	public function index($id)
	{
		$this->data['judul_tab']='Data '.$this->judul;
		$this->data['title']='Data '.$this->judul;
		$this->data['satuan']=$this->M_Kelas_Tahunan->getID($id);
			$this->data['all']=$this->M_Presensi->getTampilSiswa($id);
		if(!empty($this->input->post('cek'))){
			$this->data['tanggal']=$this->input->post('tanggal');
			$this->data['semester']=$this->input->post('semester');
			$this->data['all']=$this->M_Presensi->getTampilSiswa($id,$this->input->post('tanggal'));
		}else if(!empty($this->input->post('simpan'))){	
			$semester	= $this->input->post('semester');
			$data	= array('tanggal'=>$this->input->post('tanggal'),'semester'=>$this->input->post('semester'),'presensi'=>$this->input->post('presensi'));
			if($this->M_Presensi->inputan($data)){
				$this->session->set_flashdata('message', 'Berhasil tambah data');
			}
		}
		$this->data['form'] = $this->load->view($this->link.'/form',$this->data,TRUE);
		$this->data['isi'] = $this->load->view($this->link.'/index',$this->data,TRUE);

		$this->load->view('template/v_layout_utama',$this->data);
	}
	public function kelas($id)
	{
		$this->data['judul_tab']='Data '.$this->judul;
		$this->data['title']='Data '.$this->judul;
		$this->data['satuan']=$this->M_Kelas_Tahunan->getID($id);
		$this->data['all']=$this->M_Presensi->getHasilperKelas($id);
		$this->data['form'] = $this->load->view($this->link.'/form',$this->data,TRUE);
		$this->data['isi'] = $this->load->view($this->link.'/index_guru_wali',$this->data,TRUE);

		$this->load->view('template/v_layout_utama',$this->data);
	}

	public function input()
	{
		$id_kelas	= $this->input->post('id_kelas');
		$data	= array('tanggal'=>$this->input->post('tanggal'),'presensi'=>$this->input->post('presensi'));
		if($this->M_Presensi->inputan($data)){
			$this->session->set_flashdata('message', 'Berhasil tambah data');
		}
		redirect($this->hak_akses.'/'.$this->link.'/index/'.$id_kelas);
	}

	public function hapus($id)
	{
		$this->M_Presensi->delete($id);
		redirect($this->hak_akses.'/'.$this->link.'/index/0');
	}

}