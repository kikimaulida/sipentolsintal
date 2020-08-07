<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_komentar extends CI_Model {

	public function tampil_komentar($id_produk)
	{
		$this->db->select('tb_komentar_produk.id_komentar, tb_komentar_produk.komentar, tb_komentar_produk.tanggal, tb_produk.id_produk, tb_produk.nama_produk, tb_pengguna.id_pengguna, tb_pengguna.username, tb_pengguna.foto_pengguna');
		$this->db->from('tb_produk');
		$this->db->join('tb_komentar_produk', 'tb_produk.id_produk = tb_komentar_produk.id_produk');
		$this->db->join('tb_pengguna', 'tb_pengguna.id_pengguna = tb_komentar_produk.id_pengguna');
		$this->db->where('tb_produk.id_produk', $id_produk);
		$this->db->where('tb_komentar_produk.status', 0);
		$this->db->order_by('id_komentar', 'DESC');
		$query = $this->db->get();
		return $query;
	}

	public function tambah_komentar()
	{
		$komentar = [
			
			'komentar' => $this->input->post('komentar'),
			'id_produk' => $this->input->post('id_produk'),
			'id_pengguna' => $this->input->post('id_pengguna'),
			'tanggal' => date('Y-m-d'),
		];
		$this->db->insert('tb_komentar_produk', $komentar);
	}

	public function hapus_komentar($id_komentar)
	{
		$this->db->where('id_komentar', $id_komentar);
		$this->db->delete('tb_komentar_produk'); //nama tabel database
	}
}