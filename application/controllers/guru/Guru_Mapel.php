<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru_Mapel extends CI_Controller {
	var $hak_akses= "guru";
	var $judul='Guru Mapel';
	var $link='guru_mapel';
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
		$id_guru=$this->session->userdata('id');
		$this->data['judul_tab']='Data '.$this->judul;
		$this->data['title']='Data '.$this->judul;
		$this->data['all']=$this->M_Guru_Mapel->getGuruMapel($id_guru);
		$this->data['mapel']=$this->M_Mapel->getAll();
		$this->data['kelas_tahunan']=$this->M_Kelas_Tahunan->getAll();
		$this->data['guru']=$this->M_Guru->getID($id_guru);
		if($id==0){	
			$this->data['title2']='Tambah Data '.$this->judul;
		}else{
			$this->data['title2']='Edit Data '.$this->judul;
			$this->data['satuan']=$this->M_Guru_Mapel->getID($id);
		}
		$this->data['form'] = $this->load->view($this->link.'/form_guru',$this->data,TRUE);
		$this->data['isi'] = $this->load->view($this->link.'/index_guru',$this->data,TRUE);

		$this->load->view('template/v_layout_utama',$this->data);
	}

	public function input()
	{
		$id	= $this->input->post('id_'.$this->link);
		$data	= $this->input->post();
		$data	+= array('id_guru'=>$this->session->userdata('id'));
		if($id==0){	
			if($this->M_Guru_Mapel->insert($data)){
				$this->session->set_flashdata('message', 'Berhasil tambah data');
			}
		}elseif ($this->M_Guru_Mapel->update($data)) {// success
			$this->session->set_flashdata('message', 'Berhasil Edit data');
		}
		redirect($this->hak_akses.'/'.$this->link.'/index/0');
	}

	public function hapus($id)
	{
		$this->M_Guru_Mapel->delete($id);
		redirect($this->hak_akses.'/'.$this->link.'/index/0');
	}

}