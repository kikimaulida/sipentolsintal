<?php

Class Fungsi {
	protected $ci;

	function __construct()
	{
		$this->ci =& get_instance();
	}

	function pengguna_login()
	{
		$this->ci->load->model('m_pengguna');
		$id_pengguna= $this->ci->session->userdata('id_pengguna');
		$data_pengguna= $this->ci->m_pengguna->tampil_pengguna($id_pengguna)->row();
		return $data_pengguna;
	}
}