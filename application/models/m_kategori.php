<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_kategori extends CI_Model {

	public function tampil_kategori($id_kategori = null)
	{
		$this->db->from('tb_kategori');
		if($id_kategori != null)
		{
			$this->db->where('id_kategori', $id_kategori);
		}
		$this->db->order_by('id_kategori', 'ASC');
		$query = $this->db->get();
		return $query;
	}
 
	public function tambah_kategori($post)
	{
		$kategori = [
			'id_kategori' => $post['id_kategori'],
			'nama_kategori' => $post[ 'nama_kategori'],
			'icon' => $post[ 'icon'],
		];
		$this->db->insert('tb_kategori', $kategori);
	}

	public function ubah_kategori($post)
	{
		$kategori = [
			'id_kategori' => $post['id_kategori'],
			'nama_kategori' => $post[ 'nama_kategori'],
		];
		if($post['icon'] != null)
		{
			$kategori['icon'] = $post['icon'];
		}
		$this->db->where('id_kategori', $post['id_kategori']);
		$this->db->update('tb_kategori', $kategori);
	}

	public function hapus_kategori($id_kategori)
	{
		$this->db->where('id_kategori', $id_kategori);
		$this->db->delete('tb_kategori'); //nama tabel database
	}

	function check_kategori($nama_kategori)
	{
		$this->db->from('tb_kategori');
		$this->db->where('nama_kategori', $nama_kategori);
		$query = $this->db->get();
		return $query;
	}
}