<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai_Semester extends CI_Controller {
	var $hak_akses= "guru";
	var $judul='Nilai Semester';
	var $link='nilai_semester';
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
		$this->data['title2']='Data '.$this->judul;
		$kelas=$this->M_Guru_Mapel->getID($id);
		$this->data['kelas']=$kelas;
		$this->data['all']=$this->M_Anggota_Kelas->getAllperKelas($kelas->id_kelas_tahunan);
		if(!empty($this->input->post('cek'))){
			$this->data['semester']= $semester=$this->input->post('semester');
			$this->data['all']=$this->M_Nilai_Semester->getAllperKelas($id,$semester);
		}else if(!empty($this->input->post('simpan'))){	
			$semester	= $this->input->post('semester');
			$data	= array(
				'id_guru_mapel'=>$id,
				'semester'=>$semester,
				'nilai_pengetahuan'=>$this->input->post('nilai_pengetahuan'),
				'nilai_keterampilan'=>$this->input->post('nilai_keterampilan'),
				'deskripsi'=>$this->input->post('deskripsi')
			);
			if($this->M_Nilai_Semester->inputan($data)){
				$this->session->set_flashdata('message', 'Berhasil tambah data');
			}
		}
		

		$this->data['form'] = $this->load->view($this->link.'/form',$this->data,TRUE);
		$this->data['isi'] = $this->load->view($this->link.'/index',$this->data,TRUE);

		$this->load->view('template/v_layout_utama',$this->data);
	}
	public function guru($id)
	{
		$this->data['judul_tab']='Data '.$this->judul;
		$this->data['title']='Data '.$this->judul;
		$this->data['satuan']=$this->M_Kelas_Tahunan->getID($id);
		$this->data['all']=$this->M_Guru_Mapel->getAllperKelas($id);

		$this->data['isi'] = $this->load->view($this->link.'/index_guru_wali',$this->data,TRUE);

		$this->load->view('template/v_layout_utama',$this->data);
	}
	public function kelas($id_guru_mapel,$semester)
	{
		$this->data['judul_tab']='Data '.$this->judul;
		$this->data['title']='Data '.$this->judul.' '.$semester;
		$this->data['satuan']=$this->M_Guru_Mapel->getID($id_guru_mapel);
		$this->data['all']=$this->M_Nilai_Semester->getAllperKelas($id_guru_mapel,$semester);

		$this->data['isi'] = $this->load->view($this->link.'/index_per_kelas',$this->data,TRUE);

		$this->load->view('template/v_layout_utama',$this->data);
	}

	public function input()
	{

		$id	= $this->input->post('id_'.$this->link);
		$data	= $this->input->post();
		if($id==0){	
			if($this->M_Nilai->insert($data)){
				$this->session->set_flashdata('message', 'Berhasil tambah data');
			}
		}elseif ($this->M_Nilai->update($data)) {// success
			$this->session->set_flashdata('message', 'Berhasil Edit data');
		}
		redirect($this->hak_akses.'/'.$this->link.'/index/0');
	}

	public function hapus($id)
	{
		$this->M_Nilai->delete($id);
		redirect($this->hak_akses.'/'.$this->link.'/index/0');
	}

}