<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	var $data;
	var $hak_akses="admin";
	function __construct() {
		parent::__construct();
	}
	public function index()
	{
		
		$this->data['judul_tab'] = 'Login';

		$this->load->view('login', $this->data);
	}

	public function login(){
		$username			= $this->input->post('username');
		$password			= $this->input->post('password');
		$data_siswa = array(
			'nis' => $username,
			'password' => $password
		);
		$data_ortu = array(
			'nis' => $username,
			'password_ortu' => $password
		);
		$data_guru = array(
			'nip' => $username,
			'password' => $password
		);
		$data_admin = array(
			'username' => $username,
			'password' => $password
		);
		$ortu=$this->M_Siswa->login($data_ortu);
		$siswa=$this->M_Siswa->login($data_siswa);
		$guru=$this->M_Guru->login($data_guru);
		$admin=$this->M_Admin->login($data_admin);
		if(!empty($siswa) || !empty($ortu)){
	 		$begin = date('Y-m-d');
          	$end = date('Y-m-d', strtotime('+1 weeks'));
			$data_session = array(
				'id' => $siswa->id_siswa,
				'username' => $siswa->nis,
				'nama_user' => $siswa->nama_siswa,
				'tgl_sekarang' => $begin,
				'tgl_batas' => $end ,
				'hak_akses' => "siswa",
				'status' => "login"
				);
			if(!empty($ortu)){
				$data_session['id']=$ortu->id_siswa;
				$data_session['username']=$ortu->nis;
				$data_session['nama_user']= "Wali ".$ortu->nama_siswa;
			}
			$this->session->set_userdata($data_session);
			
			redirect(base_url("siswa/"));
		}else if(!empty($guru)){
	 		$begin = date('Y-m-d');
          	$end = date('Y-m-d', strtotime('+1 weeks'));
			$data_session = array(
				'id' => $guru->id_guru,
				'username' => $guru->nip,
				'nama_user' => $guru->nama_guru,
				'tgl_sekarang' => $begin,
				'tgl_batas' => $end ,
				'hak_akses' => 'guru',
				'status' => "login"
				);

			$this->session->set_userdata($data_session);
			
			redirect(base_url('guru/'));
		}elseif(!empty($admin)){
	 		$begin = date('Y-m-d');
          	$end = date('Y-m-d', strtotime('+1 weeks'));
			$data_session = array(
				'id' => $admin->id_admin,
				'username' => $admin->username,
				'nama_user' => $admin->nama_admin,
				'tgl_sekarang' => $begin,
				'tgl_batas' => $end ,
				'hak_akses' => "admin",
				'status' => "login"
				);

			$this->session->set_userdata($data_session);
			
			redirect(base_url("admin"));
		}else{
			redirect(base_url('page/login'));
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('auth'));
	}
}