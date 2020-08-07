<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_banner extends CI_Model {

	public function tampil_banner($id_banner = null)
	{
		$this->db->select('tb_banner.*, tb_pengguna.nama_lengkap as nama');
		$this->db->from('tb_banner');
		$this->db->join('tb_pengguna', 'tb_pengguna.id_pengguna = tb_banner.id_pengguna');
		if($id_banner != null)
		{
			$this->db->where('id_banner', $id_banner);

		}
		$this->db->order_by('id_banner', 'ASC');
		$query = $this->db->get();
		return $query;

	}
 
	public function tambah_banner($post)
	{
		$banner = [
			'id_banner' => $post['id_banner'],
			'foto_banner' => $post['foto_banner'],
			'tgl_unggah' => $post['tgl_unggah'],
			'id_pengguna' => $post['pengguna'],
		];
		$this->db->insert('tb_banner', $banner);
	}

	public function ubah_banner($post)
	{
		$banner = [
			'id_banner' => $post['id_banner'],
			'tgl_unggah' => $post[ 'tgl_unggah'],
			'id_pengguna' => $post['pengguna'],
		];
		if($post['foto_banner'] != null)
		{
			$banner['foto_banner'] = $post['foto_banner'];
		}
		$this->db->where('id_banner', $post['id_banner']);
		$this->db->update('tb_banner', $banner);
	}

	public function hapus_banner($id_banner)
	{
		$this->db->where('id_banner', $id_banner);
		$this->db->delete('tb_banner'); //nama tabel database
	}
}