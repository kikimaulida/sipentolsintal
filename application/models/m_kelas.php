<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_kelas extends CI_Model {

	public function tampil_kelas($id_kelas = null)
	{
		$this->db->from('tb_kelas');
		if($id_kelas != null)
		{
			$this->db->where('id_kelas', $id_kelas);
		}
		$this->db->order_by('id_kelas', 'ASC');
		$query = $this->db->get();
		return $query;
	}
 
	public function tambah_kelas($post)
	{
		$kelas = [
			'id_kelas' => $post['id_kelas'],
			'kelas' => $post[ 'kelas'],
		];
		$this->db->insert('tb_kelas', $kelas);
	}

	public function ubah_kelas($post)
	{
		$kelas = [
			'id_kelas' => $post['id_kelas'],
			'kelas' => $post['kelas']
		];
		$this->db->where('id_kelas', $post['id_kelas']);
		$this->db->update('tb_kelas', $kelas);
	}

	public function hapus_kelas($id_kelas)
	{
		$this->db->where('id_kelas', $id_kelas);
		$this->db->delete('tb_kelas'); //nama tabel database
	}

	function check_nama($nama_kelas)
	{
		$this->db->from('tb_kelas');
		$this->db->where('kelas', $nama_kelas);
		$query = $this->db->get();
		return $query;
	}
}