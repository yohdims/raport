<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai extends CI_Controller {
	var $hak_akses= "siswa";
	var $judul='Nilai';
	var $link='nilai';
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
		$this->data['all']=$this->M_Presensi->getBySiswa($this->session->userdata('id'));

		$this->data['isi'] = $this->load->view($this->link.'/index_siswa',$this->data,TRUE);

		$this->load->view('template/v_layout_utama',$this->data);
	}
	public function kelas_siswa($id_kelas_siswa)
	{
		$this->data['judul_tab']='Data '.$this->judul;
		$this->data['title']='Data '.$this->judul;
		$this->data['all']=$this->M_Nilai->getKelasSiswa($id_kelas_siswa);
		$this->data['satuan']=$this->M_Kelas_Siswa->getID($id_kelas_siswa);
		$this->data['title2']='Nilai';

		$this->data['isi'] = $this->load->view($this->link.'/list_mapel',$this->data,TRUE);

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