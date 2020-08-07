<?php
defined('BASEPATH') OR
exit('No direct script access allowed');

class Cakun extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_pengguna');
	}

	public function index() 
	{
		$id_pengguna = $this->session->userdata('id_pengguna');
		$data['rowp'] = $this->m_pengguna->tampil_pengguna($id_pengguna);
		$this->template1->load('template1', 'depan/profil_pengguna', $data);
	} 

	public function profile_pengguna($id_pengguna)
	{
		
		$data['rowp'] = $this->m_pengguna->tampil_pengguna($id_pengguna);
		$this->template1->load('template1', 'depan/profil_pengguna', $data);
	}

	function ubah_data()
    {
		$nama_lengkap= $this->input->post('nama_lengkap');
		$username= $this->input->post('username');
		$password= $this->input->post('password');

		$data = array(
			'nama_lengkap' => $nama_lengkap,
			'username' => $username,
			'password' => $password, );
		$id_pengguna = $this->session->userdata('id_pengguna');
		$this->m_pengguna->ubah_data($data, $id_pengguna);
		redirect('Cakun');       
    }

	public function ubah_foto()
	{
		$config = array (
			'upload_path' => './uploads/pengguna/',
			'allowed_types' => 'jpg|png|jpeg',
			'file_name' =>'pengguna-'.date('dmy').'-'.substr(md5(rand()),0,10)
		);

		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('foto'))
		{
			$foto = 'Tidak Ada';
		}

		else
		{
			$result =$this->upload->data();
			$foto = $result['file_name'];
		}

		$data = array('foto_pengguna' => $foto);
		$id_pengguna = $this->session->userdata('id_pengguna');
		$this->m_pengguna->ubah_foto($data, $id_pengguna);
		redirect('Cakun');
	}
}