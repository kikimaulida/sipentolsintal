<?php
	defined('BASEPATH') OR
	exit('No direct script access allowed');

	class Ckomentar extends CI_Controller {
		function __construct()
		{
			parent::__construct();
			check_not_login();
			$this->load->model(['m_komentar', 'm_produk', 'm_pengguna', 'm_notif']);
		}

		public function index() 
		{
			$data['row'] = $this->m_komentar->get_komentar();
			$this->template->load('template', 'komentar/data_komentar', $data);
		}


		public function hapus_komentar($id_komentar)
		{
			$this->load->model('m_komentar');
			$this->m_komentar->hapus_komentar($id_komentar);
			if ($this->db->affected_rows() > 0) 
			{
	          	$this->session->set_flashdata('success', "Data Berhasil Dihapus");
	        }
	           redirect('ckomentar');
		}

	}