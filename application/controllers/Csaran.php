<?php
defined('BASEPATH') OR
exit('No direct script access allowed');

class Csaran extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model(['m_saran', 'm_notif']);
	}

	public function index() 
	{
		$data['row'] = $this->m_saran->tampil_saran();
		$this->template->load('template', 'saran/data_saran', $data);
	}

	public function hapus_saran($id_saran)
	{
		$this->m_saran->hapus_saran($id_saran);
		if ($this->db->affected_rows() > 0) 
		{
          	$this->session->set_flashdata('success', "Data Berhasil Dihapus");
        }
           redirect('csaran');
	}
}