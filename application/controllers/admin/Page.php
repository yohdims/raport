<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {
	var $hak_akses='admin';
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
			$this->data['satuan']=$this->M_Admin->getID($this->session->userdata('id'));
		$this->data['isi'] = $this->load->view('admin/form_admin',$this->data,TRUE);

		$this->load->view('template/v_layout_utama',$this->data);
	}
}