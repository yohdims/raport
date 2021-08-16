<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kompetensi_Dasar extends CI_Controller {
	var $hak_akses= "guru";
	var $judul='Kompetensi Dasar';
	var $link='kompetensi_dasar';
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

	public function index($id_kelas,$id)
	{
		$this->data['judul_tab']='Data '.$this->judul;
		$this->data['title']='Data '.$this->judul;
		$this->data['all']=$this->M_Kompetensi_Dasar->getByKelas($id_kelas);
		$this->data['tahun_ajaran']=$this->M_Ta->getAll();
		$this->data['id_kelas']=$id_kelas;
		$this->data['guru_mapel']=$this->M_Guru_Mapel->getKelasGuru($this->session->userdata('id'),$id_kelas);
		$this->data['kompetensi_keahlian']=$this->M_Kompetensi_Keahlian->getAll();
		$this->data['mapel']=$this->M_Mapel->getAll();
		$this->data['kel_nilai_mapel']=$this->M_Kel_Nilai_Mapel->getAll();
		$this->data['kel_mapel']=$this->M_Kel_Mapel->getAll();
		if($id==0){	
			$this->data['title2']='Tambah Data '.$this->judul;
		}else{
			$this->data['title2']='Edit Data '.$this->judul;
			$this->data['satuan']=$this->M_Kompetensi_Dasar->getID($id);
		}
		$this->data['form'] = $this->load->view($this->link.'/form_guru',$this->data,TRUE);
		$this->data['isi'] = $this->load->view($this->link.'/index_guru',$this->data,TRUE);

		$this->load->view('template/v_layout_utama',$this->data);
	}

	public function input($id_kelas)
	{

		$id	= $this->input->post('id_'.$this->link);
		$data	= $this->input->post();
		if($id==0){	
			if($this->M_Kompetensi_Dasar->insert($data)){
				$this->session->set_flashdata('message', 'Berhasil tambah data');
			}
		}elseif ($this->M_Kompetensi_Dasar->update($data)) {// success
			$this->session->set_flashdata('message', 'Berhasil Edit data');
		}
		redirect($this->hak_akses.'/'.$this->link.'/index/'.$id_kelas.'/0');
	}

	public function hapus($id)
	{
		$this->M_Kompetensi_Dasar->delete($id);
		redirect($this->hak_akses.'/'.$this->link.'/index/0');
	}

}