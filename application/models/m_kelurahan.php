<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_kelurahan extends CI_Model {

	public function tampil_kelurahan($id_kelurahan = null)
	{
		$this->db->select('tb_kelurahan.*, tb_kecamatan.nama_kecamatan as kec');
		$this->db->from('tb_kelurahan');
		$this->db->join('tb_kecamatan', 'tb_kecamatan.id_kecamatan = tb_kelurahan.id_kecamatan');
		if($id_kelurahan != null)
		{
			$this->db->where('id_kelurahan', $id_kelurahan);

		}
		$this->db->order_by('id_kecamatan', 'ASC');
		$query = $this->db->get();
		return $query;
	}

	public function get_kelurahan($nama_kecamatan)
	{
		return $this->db->query("SELECT tb_kelurahan.*, tb_kecamatan.nama_kecamatan FROM tb_kelurahan JOIN tb_kecamatan ON tb_kecamatan.id_kecamatan = tb_kelurahan.id_kecamatan WHERE tb_kecamatan.nama_kecamatan = '$nama_kecamatan'");
	}
 
	public function tambah_kelurahan($post)
	{
		$kelurahan = [
			'id_kelurahan' => $post['id_kelurahan'],
			'id_kecamatan' => $post['kecamatan'],
			'nama_kelurahan' => $post[ 'nama_kelurahan'],
			'kode_pos' => $post[ 'kode_pos'],
		];
		$this->db->insert('tb_kelurahan', $kelurahan);
	}

	public function ubah_kelurahan($post)
	{
		$kelurahan = [
			'id_kelurahan' => $post['id_kelurahan'],
			'id_kecamatan' => $post['kecamatan'],
			'nama_kelurahan' => $post[ 'nama_kelurahan'],
			'kode_pos' => $post[ 'kode_pos'],
		];
		$this->db->where('id_kelurahan', $post['id_kelurahan']);
		$this->db->update('tb_kelurahan', $kelurahan);
	}

	public function hapus_kelurahan($id_kelurahan)
	{
		$this->db->where('id_kelurahan', $id_kelurahan);
		$this->db->delete('tb_kelurahan'); //nama tabel database
	}

	function check_nama($nama_kelurahan)
	{
		$this->db->from('tb_kelurahan');
		$this->db->where('nama_kelurahan', $nama_kelurahan);
		$query = $this->db->get();
		return $query;
	}
}