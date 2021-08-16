<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai extends CI_Controller {
	var $hak_akses= "admin";
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
		$this->data['all']=$this->M_Kelas->getKelasSiswa();

		$this->data['isi'] = $this->load->view($this->link.'/index_kelas',$this->data,TRUE);

		$this->load->view('template/v_layout_utama',$this->data);
	}
	public function kelas_siswa($id)
	{
		$this->data['judul_tab']='Data '.$this->judul;
		$this->data['title']='Data '.$this->judul;
		$this->data['kompetensi_dasar']=$this->M_Kompetensi_Dasar->getAll();
		$this->data['jenis_nilai']=$this->M_Jenis_Nilai->getAll();
		$this->data['title2']='Tambah Data '.$this->judul;
		if($this->input->post('id_kompetensi_dasar')){
			$id_kompetensi_dasar=$this->input->post('id_kompetensi_dasar');
			$id_jenis_nilai=$this->input->post('id_jenis_nilai');
			$satuan=array(
				'id_kompetensi_dasar'=>$id_kompetensi_dasar,
				'id_jenis_nilai'=>$id_jenis_nilai,
			);	
			$this->data['satuan']=$satuan;
			$this->data['all']=$this->M_Kelas_Siswa->getAllperKelas($id,$id_kompetensi_dasar,$id_jenis_nilai);
		}
		$this->data['form'] = $this->load->view($this->link.'/form',$this->data,TRUE);
		$this->data['isi'] = $this->load->view($this->link.'/index',$this->data,TRUE);

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