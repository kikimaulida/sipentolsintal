<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_pengguna extends CI_Model {

	public function login($post)
	{
		$this->db->select('*');
		$this->db->from('tb_pengguna');
		$this->db->where('username', $post['username']);
		$this->db->where('password', $post['password']);
		$query = $this->db->get();
		return $query;

	}

	public function tampil_pengguna($id_pengguna = null)
	{
		$this->db->from('tb_pengguna');
		if($id_pengguna != null)
		{
			$this->db->where('id_pengguna', $id_pengguna);
		}
		$this->db->where('status', 'diterima');
		$this->db->order_by('id_pengguna', 'DESC');
		$query = $this->db->get();
		return $query;
	}

	public function konfir_akun($id_pengguna = null)
	{
		$this->db->from('tb_pengguna');
		if($id_pengguna != null)
		{
			$this->db->where('id_pengguna', $id_pengguna);
		}
		$this->db->where('status !=','diterima');
		$this->db->order_by('id_pengguna', 'DESC');
		$query = $this->db->get();
		return $query;
	}

	public function pemilik_usaha()
	{
		return $this->db->query("SELECT * FROM tb_pengguna WHERE level = 'pelaku usaha' AND status = 'diterima'");
	}
 
	public function tambah_pengguna($post)
	{
		$pengguna = [
			'id_pengguna' => $post['id_pengguna'],
			'nama_lengkap' => $post['nama_lengkap'],
			'email' => $post['email'],
			'username' => $post['username'],
			'password' => $post['password'],
			'no_sku' => $post['no_sku'],
			'foto_sku' => $post['foto_sku'],
			'foto_ktp' => $post['foto_ktp'],
			'foto_pengguna' => $post['foto_pengguna'],
			'level' => $post['level'],
			'status' => $post['status'],
		];
		$this->db->insert('tb_pengguna', $pengguna);
	}

	public function ubah_pengguna($post)
	{
		$pengguna = [
			'id_pengguna' => $post['id_pengguna'],
			'nama_lengkap' => $post['nama_lengkap'],
			'email' => $post['email'],
			'username' => $post['username'],
			'password' => $post['password'],
			/*'level' => $post['level'],*/
			/*'status' => $post['status'],*/
		];
		if($post['foto_ktp'] != null)
		{
			$pengguna['foto_ktp'] = $post['foto_ktp'];
		}

		if($post['foto_pengguna'] != null)
		{
			$pengguna['foto_pengguna'] = $post['foto_pengguna'];
		}
		$this->db->where('id_pengguna', $post['id_pengguna']);
		$this->db->update('tb_pengguna', $pengguna);
	}

	public function hapus_pengguna($id_pengguna)
	{
		$this->db->where('id_pengguna', $id_pengguna);
		$this->db->delete('tb_pengguna'); //nama tabel database
	}

	function check_username($username)
	{
		$this->db->from('tb_pengguna');
		$this->db->where('username', $username);
		$query = $this->db->get();
		return $query;
	}

	public function ubah_data($data, $id_pengguna)
	{
		$this->db->where('id_pengguna', $id_pengguna);
		$this->db->update('tb_pengguna', $data);
	}

	public function ubah_foto($data, $id_pengguna)
	{
		if($result['foto_pengguna'] != null)
		{
			$data['foto_pengguna'] = $result['foto_pengguna'];
		}
		$this->db->where('id_pengguna', $id_pengguna);
		$this->db->update('tb_pengguna', $data);
	}

	function status_daftar($id_pengguna,$status)
    {
        $hasil=$this->db->query("UPDATE tb_pengguna SET status='$status' WHERE id_pengguna='$id_pengguna'");
        return $hasil;
    }
}