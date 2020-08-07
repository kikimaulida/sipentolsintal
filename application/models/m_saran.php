<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_saran extends CI_Model {

	public function tampil_saran()
	{
		return $this->db->query("SELECT * FROM tb_saran");
	}

	public function tambah_saran()
	{
		$saran = [
			
			'id_saran' => $this->input->post('id_saran'),
			'nama' => $this->input->post('nama'),
			'saran' => $this->input->post('saran'),
			'tanggal' => date('Y-m-d'),
		];
		$this->db->insert('tb_saran', $saran);
	}

	public function hapus_saran($id_saran)
	{
		$this->db->where('id_saran', $id_saran);
		$this->db->delete('tb_saran'); //nama tabel database
	}
}