<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota_Kelas extends CI_Controller {
	var $hak_akses= "admin";
	var $judul='Anggota Kelas';
	var $link='anggota_kelas';
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		if(empty($this->session->userdata('username')) && $this->session->userdata('hak_akses')!=$this->hak_akses){
			redirect('auth');
		}
	}

	public function index($id)
	{
		$this->data['judul_tab']='Data '.$this->judul;
		$this->data['title']='Data '.$this->judul;
		$this->data['all']=$this->M_Anggota_Kelas->getAll($id);
		$this->data['kelas_tahunan']=$this->M_Kelas_Tahunan->getID($id);
		$this->data['siswa']=$this->M_Siswa->getLeftJoinKelas();
		if($id==0){	
			$this->data['title2']='Tambah Data '.$this->judul;
		}else{
			$this->data['title2']='Edit Data '.$this->judul;
		}
		$this->data['form'] = $this->load->view($this->link.'/form',$this->data,TRUE);
		$this->data['isi'] = $this->load->view($this->link.'/index',$this->data,TRUE);

		$this->load->view('template/v_layout_utama',$this->data);
	}

	public function input()
	{

		$id	= $this->input->post('id_'.$this->link);
		$id_kelas_tahunan	= $this->input->post('id_kelas_tahunan');
		$data	= $this->input->post();
		if($id==0){	
			if($this->M_Anggota_Kelas->insert($data)){
				$this->session->set_flashdata('message', 'Berhasil tambah data');
			}
		}elseif ($this->M_Anggota_Kelas->update($data)) {// success
			$this->session->set_flashdata('message', 'Berhasil Edit data');
		}
		redirect($this->hak_akses.'/'.$this->link.'/index/'.$id_kelas_tahunan);
	}

	public function hapus($id,$id_kelas_tahunan)
	{
		$this->M_Anggota_Kelas->delete($id);
		redirect($this->hak_akses.'/'.$this->link.'/index/'.$id_kelas_tahunan);
	}

}