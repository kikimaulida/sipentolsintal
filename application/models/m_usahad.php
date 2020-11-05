<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_usahad extends CI_Model {

	public function tampil_usaha($id_pengguna = null)
	{
		if($id_pengguna == null)
		{
			if(isset($_GET['cari']))
			{
				$cari = $_GET['cari'];
				return $this->db->query("SELECT tb_usaha.*, tb_pengguna.id_pengguna, tb_pengguna.nama_lengkap, tb_kategori.nama_kategori, tb_kecamatan.nama_kecamatan FROM tb_pengguna JOIN tb_usaha ON tb_pengguna.id_pengguna = tb_usaha.id_pengguna JOIN tb_kategori ON tb_kategori.id_kategori = tb_usaha.id_kategori JOIN tb_kelurahan ON tb_kelurahan.id_kelurahan = tb_usaha.id_kecamatan JOIN tb_kecamatan ON tb_kecamatan.id_kecamatan = tb_kelurahan.id_kecamatan WHERE tb_usaha.nama_usaha ='$cari'");
			}
			else
			{
				return $this->db->query("SELECT tb_usaha.*, tb_pengguna.id_pengguna, tb_pengguna.nama_lengkap, tb_kategori.nama_kategori, tb_kecamatan.nama_kecamatan FROM tb_pengguna JOIN tb_usaha ON tb_pengguna.id_pengguna = tb_usaha.id_pengguna JOIN tb_kategori ON tb_kategori.id_kategori = tb_usaha.id_kategori JOIN tb_kelurahan ON tb_kelurahan.id_kelurahan = tb_usaha.id_kecamatan JOIN tb_kecamatan ON tb_kecamatan.id_kecamatan = tb_kelurahan.id_kecamatan");
			}
		}
		else
		{
			/*$id_pengguna=$this->session->userdata('id_pengguna');*/
			return $this->db->query("SELECT tb_usaha.*, tb_pengguna.id_pengguna, tb_pengguna.nama_lengkap, tb_kategori.nama_kategori, tb_kecamatan.nama_kecamatan FROM tb_pengguna JOIN tb_usaha ON tb_pengguna.id_pengguna = tb_usaha.id_pengguna JOIN tb_kategori ON tb_kategori.id_kategori = tb_usaha.id_kategori JOIN tb_kelurahan ON tb_kelurahan.id_kelurahan = tb_usaha.id_kecamatan JOIN tb_kecamatan ON tb_kecamatan.id_kecamatan = tb_kelurahan.id_kecamatan WHERE tb_pengguna.id_pengguna = '$id_pengguna'");
		}		
	}
}