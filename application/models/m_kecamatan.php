<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_kecamatan extends CI_Model {

	public function tampil_kecamatan($id_kecamatan = null)
	{
		$this->db->from('tb_kecamatan');
		if($id_kecamatan != null)
		{
			$this->db->where('id_kecamatan', $id_kecamatan);
		}
		$this->db->order_by('id_kecamatan', 'ASC');
		$query = $this->db->get();
		return $query;
	}
 
	public function tambah_kecamatan($post)
	{
		$kecamatan = [
			'id_kecamatan' => $post['id_kecamatan'],
			'nama_kecamatan' => $post[ 'nama_kecamatan'],
		];
		$this->db->insert('tb_kecamatan', $kecamatan);
	}

	public function ubah_kecamatan($post)
	{
		$kecamatan = [
			'id_kecamatan' => $post['id_kecamatan'],
			'nama_kecamatan' => $post[ 'nama_kecamatan']
		];
		$this->db->where('id_kecamatan', $post['id_kecamatan']);
		$this->db->update('tb_kecamatan', $kecamatan);
	}

	public function hapus_kecamatan($id_kecamatan)
	{
		$this->db->where('id_kecamatan', $id_kecamatan);
		$this->db->delete('tb_kecamatan'); //nama tabel database
	}

	function check_nama($nama_kecamatan)
	{
		$this->db->from('tb_kecamatan');
		$this->db->where('nama_kecamatan', $nama_kecamatan);
		$query = $this->db->get();
		return $query;
	}
}