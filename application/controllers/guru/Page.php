<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {
	var $hak_akses='guru_wali';
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
	public function index()
	{
		// $data['barang']= $this->Model_Barang->getAllBarang();
		$this->data['judul_tab']='Sistem Informasi';
		$this->data['title']='Dashboard';
		$this->data['isi'] = $this->load->view('template/dashboard',$this->data,TRUE);

		$this->load->view('template/v_layout_utama',$this->data);
	}
	public function profil()
	{
		$this->data['judul_tab']='Data Profil';
		$this->data['title']='Data Profil';
		$this->data['all']=$this->M_Guru->getAll();
			$this->data['satuan']=$this->M_Guru->getID($this->session->userdata('id'));
		$this->data['isi'] = $this->load->view('guru/form_guru',$this->data,TRUE);

		$this->load->view('template/v_layout_utama',$this->data);
	}

	public function input()
	{
		$id	= $this->input->post('id_'.$this->link);
		$data	= $this->input->post();
		if($id==0){	
			if($this->M_Guru->insert($data)){
				$this->session->set_flashdata('message', 'Berhasil tambah data');
			}
		}elseif ($this->M_Guru->update($data)) {// success
			$this->session->set_flashdata('message', 'Berhasil Edit data');
		}
		redirect($this->hak_akses.'/'.$this->link.'/index/0');
	}
}