<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas_Siswa extends CI_Controller {
	var $hak_akses= "guru";
	var $judul='Kelas Siswa';
	var $link='kelas_siswa';
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		if(empty($this->session->userdata('username')) && $this->session->userdata('hak_akses')!=$this->hak_akses){
			redirect('auth');
		}
		$id=$this->session->userdata('id');
		$this->data['menu']=$this->M_Guru->getKelas($id);
	}

	public function index($id)
	{
		$this->data['judul_tab']='Data '.$this->judul;
		$this->data['title']='Data '.$this->judul;
		$this->data['satuan']=$this->M_Kelas_Siswa->getID($id);
		$this->data['all']=$this->M_Kelas_Siswa->getAllperKelas($id);
		
		$this->data['form'] = $this->load->view($this->link.'/form',$this->data,TRUE);
		$this->data['isi'] = $this->load->view($this->link.'/index_guru',$this->data,TRUE);

		$this->load->view('template/v_layout_utama',$this->data);
	}

	public function input()
	{

		$id	= $this->input->post('id_'.$this->link);
		$data	= $this->input->post();
		if($id==0){	
			if($this->M_Kelas_Siswa->insert($data)){
				$this->session->set_flashdata('message', 'Berhasil tambah data');
			}
		}elseif ($this->M_Kelas_Siswa->update($data)) {// success
			$this->session->set_flashdata('message', 'Berhasil Edit data');
		}
		redirect($this->hak_akses.'/'.$this->link.'/index/0');
	}

	public function hapus($id)
	{
		$this->M_Kelas_Siswa->delete($id);
		redirect($this->hak_akses.'/'.$this->link.'/index/0');
	}

}