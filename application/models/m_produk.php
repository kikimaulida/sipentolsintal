<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_produk extends CI_Model {

	public function tampil_produk($id_pengguna = null)
	{
		if($id_pengguna == null)
		{
			return $this->db->query("SELECT tb_produk.*, tb_pengguna.id_pengguna, tb_pengguna.nama_lengkap, tb_usaha.id_usaha, tb_usaha.nama_usaha FROM tb_pengguna JOIN tb_produk ON tb_pengguna.id_pengguna = tb_produk.id_pengguna JOIN tb_usaha ON tb_usaha.id_usaha = tb_produk.id_usaha");
		}
		else
		{
			$id_pengguna=$this->session->userdata('id_pengguna');
			return $this->db->query("SELECT tb_produk.*, tb_pengguna.id_pengguna, tb_pengguna.nama_lengkap, tb_usaha.id_usaha, tb_usaha.nama_usaha FROM tb_pengguna JOIN tb_produk ON tb_pengguna.id_pengguna = tb_produk.id_pengguna JOIN tb_usaha ON tb_usaha.id_usaha = tb_produk.id_usaha WHERE tb_pengguna.id_pengguna = '$id_pengguna'");
		}		
	}

	public function getproduk($id_produk)
	{
		return $this->db->query("SELECT tb_produk.*, tb_pengguna.id_pengguna, tb_pengguna.nama_lengkap, tb_usaha.id_usaha, tb_usaha.nama_usaha FROM tb_pengguna JOIN tb_produk ON tb_pengguna.id_pengguna = tb_produk.id_pengguna JOIN tb_usaha ON tb_usaha.id_usaha = tb_produk.id_usaha WHERE tb_produk.id_produk = '$id_produk'");
	}

	public function getproduk1($id_usaha)
	{
		return $this->db->query("SELECT tb_produk.*, tb_pengguna.id_pengguna, tb_pengguna.nama_lengkap, tb_usaha.id_usaha, tb_usaha.nama_usaha, tb_kecamatan.nama_kecamatan FROM tb_pengguna JOIN tb_produk ON tb_pengguna.id_pengguna = tb_produk.id_pengguna JOIN tb_usaha ON tb_usaha.id_usaha = tb_produk.id_usaha JOIN tb_kecamatan ON tb_usaha.id_kecamatan = tb_kecamatan.id_kecamatan WHERE tb_usaha.id_usaha ='$id_usaha'");
	}

	public function detailproduk($id_produk)
	{
		/*return $this->db->query("SELECT tb_produk.nama_produk, tb_produk.status_produk, tb_produk.harga, tb_produk.deskripsi_produk, tb_foto_produk.foto_produk, tb_usaha.* FROM tb_produk JOIN tb_usaha ON tb_produk.id_usaha = tb_usaha.id_usaha JOIN tb_foto_produk ON tb_foto_produk.id_produk = tb_produk.id_produk WHERE tb_produk.id_produk = '$id_produk' AND tb_foto_produk.id_foto LIMIT 1");*/

		return $this->db->query("SELECT tb_produk.*, tb_usaha.* FROM tb_produk JOIN tb_usaha ON tb_produk.id_usaha = tb_usaha.id_usaha  WHERE tb_produk.id_produk = '$id_produk'");
	}

	public function fotoproduk($id_produk)
	{
		return $this->db->query("SELECT tb_foto_produk.* FROM tb_foto_produk JOIN tb_produk ON tb_produk.id_produk = tb_foto_produk.id_produk  WHERE tb_produk.id_produk = '$id_produk'");
	}
 
	public function tambah_produk($post)
	{
		$produk = [
			'id_produk' => $post['id_produk'],
			'id_pengguna' => $post['pengguna'],
			'id_usaha' => $post['usaha'],
			'nama_produk' => $post['nama_produk'],
			'deskripsi_produk' => $post['deskripsi_produk'],
			'harga' => $post['harga'],
			'foto_produk' => $post['foto_produk'],
			'status_produk' => $post['status_produk'],
			'tgl_unggah' => $post['tgl_unggah'],
		];
		$this->db->insert('tb_produk', $produk);
	}

	public function ubah_produk($post)
	{
		$produk = [
			'id_produk' => $post['id_produk'],
			'id_pengguna' => $post['pengguna'],
			'id_usaha' => $post['usaha'],
			'nama_produk' => $post['nama_produk'],
			'deskripsi_produk' => $post['deskripsi_produk'],
			'harga' => $post['harga'],
			'status_produk' => $post['status_produk'],
		];
		if($post['foto_produk'] != null)
		{
			$produk['foto_produk'] = $post['foto_produk'];
		}
		
		$this->db->where('id_produk', $post['id_produk']);
		$this->db->update('tb_produk', $produk);
	}
	
	public function hapus_produk($id_produk)
	{
		$this->db->where('id_produk', $id_produk);
		$this->db->delete('tb_produk'); //nama tabel database
	}

	function check_nama($nama_produk)
	{
		$this->db->from('tb_produk');
		$this->db->where('nama_produk', $nama_produk);
		$query = $this->db->get();
		return $query;
	}

	public function upload($data = array()){
        // Insert Ke Database dengan Banyak Data Sekaligus
        return $this->db->insert_batch('tb_foto_produk',$data);
    }

    public function get_foto($id_foto)
	{
		$query =$this->db->query("select * from tb_foto_produk where id_foto='$id_foto' ");
		return $query->row_array();
	}

    public function hapus_foto($id_foto)
	{
		$this->db->where('id_foto', $id_foto);
		$this->db->delete('tb_foto_produk');
	}
}
