<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_usaha extends CI_Model {

	public function tampil_usaha($id_pengguna = null)
	{
		if($id_pengguna == null)
		{
			/*return $this->db->query("SELECT tb_usaha.id_usaha, tb_usaha.nama_usaha, tb_usaha.status, tb_usaha.bergabung, tb_pengguna.id_pengguna, tb_pengguna.nama_lengkap,  tb_kecamatan.nama_kecamatan FROM tb_pengguna JOIN tb_usaha ON tb_pengguna.id_pengguna = tb_usaha.id_pengguna JOIN tb_kecamatan ON tb_kecamatan.id_kecamatan = tb_usaha.id_kecamatan");*/
			if(isset($_GET['awal']) && isset($_GET['akhir']))
			{
				$awal = $_GET['awal'];
				$akhir = $_GET['akhir'];
				return $this->db->query("SELECT tb_usaha.*, tb_pengguna.id_pengguna, tb_pengguna.nama_lengkap, tb_kategori.nama_kategori, tb_kecamatan.nama_kecamatan FROM tb_pengguna JOIN tb_usaha ON tb_pengguna.id_pengguna = tb_usaha.id_pengguna JOIN tb_kategori ON tb_kategori.id_kategori = tb_usaha.id_kategori JOIN tb_kecamatan ON tb_kecamatan.id_kecamatan = tb_usaha.id_kecamatan WHERE tb_usaha.status= 'diterima' AND tb_usaha.bergabung BETWEEN '$awal' AND '$akhir'");
			}
			else
			{
				return $this->db->query("SELECT tb_usaha.*, tb_pengguna.id_pengguna, tb_pengguna.nama_lengkap, tb_kategori.nama_kategori, tb_kecamatan.nama_kecamatan FROM tb_pengguna JOIN tb_usaha ON tb_pengguna.id_pengguna = tb_usaha.id_pengguna JOIN tb_kategori ON tb_kategori.id_kategori = tb_usaha.id_kategori JOIN tb_kecamatan ON tb_kecamatan.id_kecamatan = tb_usaha.id_kecamatan WHERE tb_usaha.status= 'diterima' ORDER BY tb_usaha.id_usaha DESC");
			}
		}
		else
		{
			/*$id_pengguna=$this->session->userdata('id_pengguna');*/
			return $this->db->query("SELECT tb_usaha.*, tb_pengguna.id_pengguna, tb_pengguna.nama_lengkap, tb_kategori.nama_kategori, tb_kecamatan.nama_kecamatan FROM tb_pengguna JOIN tb_usaha ON tb_pengguna.id_pengguna = tb_usaha.id_pengguna JOIN tb_kategori ON tb_kategori.id_kategori = tb_usaha.id_kategori JOIN tb_kecamatan ON tb_kecamatan.id_kecamatan = tb_usaha.id_kecamatan WHERE tb_usaha.status= 'diterima' AND tb_pengguna.id_pengguna = '$id_pengguna'");
		}		
	}

	public function cetak_usaha($awal,$akhir)
	{
		return $this->db->query("SELECT tb_usaha.*, tb_pengguna.id_pengguna, tb_pengguna.nama_lengkap, tb_kategori.nama_kategori, tb_kecamatan.nama_kecamatan FROM tb_pengguna JOIN tb_usaha ON tb_pengguna.id_pengguna = tb_usaha.id_pengguna JOIN tb_kategori ON tb_kategori.id_kategori = tb_usaha.id_kategori JOIN tb_kecamatan ON tb_kecamatan.id_kecamatan = tb_usaha.id_kecamatan WHERE tb_usaha.status= 'diterima' AND tb_usaha.bergabung BETWEEN '$awal' AND '$akhir'");
	}

	public function getusaha($id_usaha)
	{
		return $this->db->query("SELECT tb_usaha.*, tb_pengguna.*, tb_kategori.id_kategori, tb_kategori.nama_kategori, tb_kecamatan.id_kecamatan, tb_kecamatan.nama_kecamatan FROM tb_pengguna JOIN tb_usaha ON tb_pengguna.id_pengguna = tb_usaha.id_pengguna JOIN tb_kategori ON tb_kategori.id_kategori = tb_usaha.id_kategori JOIN tb_kecamatan ON tb_kecamatan.id_kecamatan = tb_usaha.id_kecamatan WHERE tb_usaha.id_usaha = '$id_usaha'");
	}
 
	public function tambah_usaha($post)
	{
		$usaha = [
			'id_usaha' => $post['id_usaha'],
			'nama_usaha' => $post['nama_usaha'],
			'id_pengguna' => $post['pengguna'],
			'asset' => $post['asset'],
			'omzet' => $post['omzet'],
			'id_kategori' => $post['kategori'],
			'deskripsi' => $post['deskripsi'],
			'alamat' => $post['alamat'],
			'id_kecamatan' => $post['kecamatan'],
			'jam_operasional' => $post['jam_operasional'],
			'telepon' => $post['telepon'],
			'foto_usaha' => $post[ 'foto_usaha'],
			'status' => $post['status'],
			'bergabung' => $post['bergabung'],
		];
		$this->db->insert('tb_usaha', $usaha);
	}

	public function ubah_usaha($post)
	{
		$usaha = [
			'id_usaha' => $post['id_usaha'],
			'nama_usaha' => $post['nama_usaha'],
			'id_pengguna' => $post['pengguna'],
			'id_kategori' => $post['kategori'],
			'deskripsi' => $post['deskripsi'],
			'alamat' => $post['alamat'],
			'id_kecamatan' => $post['kecamatan'],
			'jam_operasional' => $post['jam_operasional'],
			'telepon' => $post['telepon'],
			'status' => $post['status'],
		];
		if($post['foto_usaha'] != null)
		{
			$usaha['foto_usaha'] = $post['foto_usaha'];
		}
		
		$this->db->where('id_usaha', $post['id_usaha']);
		$this->db->update('tb_usaha', $usaha);
	}

	public function hapus_usaha($id_usaha)
	{
		$this->db->where('id_usaha', $id_usaha);
		$this->db->delete('tb_usaha'); //nama tabel database
	}

	function check_usaha($nama_usaha)
	{
		$this->db->from('tb_usaha');
		$this->db->where('nama_usaha', $nama_usaha);
		$query = $this->db->get();
		return $query;
	}

	public function list_usaha($id_pengguna = null)
	{
		if($id_pengguna == null)
		{
			
			return $this->db->query("SELECT tb_usaha.*, tb_pengguna.id_pengguna, tb_pengguna.nama_lengkap, tb_kategori.nama_kategori, tb_kecamatan.nama_kecamatan FROM tb_pengguna JOIN tb_usaha ON tb_pengguna.id_pengguna = tb_usaha.id_pengguna JOIN tb_kategori ON tb_kategori.id_kategori = tb_usaha.id_kategori JOIN tb_kecamatan ON tb_kecamatan.id_kecamatan = tb_usaha.id_kecamatan WHERE tb_usaha.status = 'diterima' ORDER BY tb_usaha.id_usaha DESC");
			
		}
		else
		{
			/*$id_pengguna=$this->session->userdata('id_pengguna');*/
			return $this->db->query("SELECT tb_usaha.*, tb_pengguna.id_pengguna, tb_pengguna.nama_lengkap, tb_kategori.nama_kategori, tb_kecamatan.nama_kecamatan FROM tb_pengguna JOIN tb_usaha ON tb_pengguna.id_pengguna = tb_usaha.id_pengguna JOIN tb_kategori ON tb_kategori.id_kategori = tb_usaha.id_kategori JOIN tb_kecamatan ON tb_kecamatan.id_kecamatan = tb_usaha.id_kecamatan WHERE tb_pengguna.id_pengguna = '$id_pengguna' AND tb_usaha.status = 'diterima'");
		}		
	}
	public function konfir_usaha($id_pengguna = null)
	{
		if($id_pengguna == null)
		{
			return $this->db->query("SELECT tb_usaha.*, tb_pengguna.id_pengguna, tb_pengguna.nama_lengkap, tb_pengguna.email, tb_kategori.nama_kategori, tb_kecamatan.nama_kecamatan FROM tb_pengguna JOIN tb_usaha ON tb_pengguna.id_pengguna = tb_usaha.id_pengguna JOIN tb_kategori ON tb_kategori.id_kategori = tb_usaha.id_kategori JOIN tb_kecamatan ON tb_kecamatan.id_kecamatan = tb_usaha.id_kecamatan WHERE tb_usaha.status != 'diterima' ORDER BY tb_usaha.id_usaha DESC");
		}
		else
		{
			/*$id_pengguna=$this->session->userdata('id_pengguna');*/
			return $this->db->query("SELECT tb_usaha.*, tb_pengguna.id_pengguna, tb_pengguna.nama_lengkap, tb_kategori.nama_kategori, tb_kecamatan.nama_kecamatan FROM tb_pengguna JOIN tb_usaha ON tb_pengguna.id_pengguna = tb_usaha.id_pengguna JOIN tb_kategori ON tb_kategori.id_kategori = tb_usaha.id_kategori JOIN tb_kecamatan ON tb_kecamatan.id_kecamatan = tb_usaha.id_kecamatan WHERE tb_pengguna.id_pengguna = '$id_pengguna' ORDER BY tb_usaha.id_usaha DESC");
		}		
	}

	function status($id_usaha,$status)
    {
        $hasil=$this->db->query("UPDATE tb_usaha SET status='$status' WHERE id_usaha='$id_usaha'");
        return $hasil;
    }
}