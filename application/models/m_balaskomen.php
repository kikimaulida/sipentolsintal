<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_balaskomen extends CI_Model {

	public function tampil_balasan($id_produk)
	{
		return $this->db->query("SELECT tb_balas_komentar.id_balaskomen, tb_balas_komentar.balasan, tb_balas_komentar.tanggal, tb_produk.id_produk, tb_pengguna.id_pengguna, tb_pengguna.username, tb_pengguna.foto_pengguna, tb_komentar_produk.id_komentar FROM tb_produk JOIN tb_balas_komentar ON tb_balas_komentar.id_produk = tb_produk.id_produk JOIN tb_pengguna ON tb_balas_komentar.id_pengguna = tb_pengguna.id_pengguna JOIN tb_komentar_produk ON tb_komentar_produk.id_komentar = tb_balas_komentar.id_komentar where tb_produk.id_produk='$id_produk'");
	}

	public function balas_komentar()
	{
		$balasan = [
			
			'status' => $this->input->post('id'),
			'komentar' => $this->input->post('komentar'),
			'id_produk' => $this->input->post('id_produk'),
			'id_pengguna' => $this->input->post('id_pengguna'),
			'tanggal' => date('Y-m-d'),
		];
		$this->db->insert('tb_komentar_produk', $balasan);
	}

	public function hapus_komentar($id_komentar)
	{
		$this->db->where('id_komentar', $id_komentar);
		$this->db->delete('tb_komentar_produk'); //nama tabel database
	}
}

/*SELECT tb_balas_komentar.id_balaskomen, tb_balas_komentar.balasan, tb_balas_komentar.tanggal, tb_produk.id_produk, tb_pengguna.id_pengguna, tb_komentar_produk.id_komentar FROM tb_produk JOIN tb_balas_komentar ON tb_balas_komentar.id_produk = tb_produk.id_produk JOIN tb_pengguna ON tb_balas_komentar.id_pengguna = tb_pengguna.id_pengguna JOIN tb_komentar_produk ON tb_komentar_produk.id_komentar = tb_balas_komentar.id_komentar where tb_produk.id_produk='2' AND tb_komentar_produk.id_komentar = '6'*/