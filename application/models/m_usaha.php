<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_usaha extends CI_Model {

	public function tampil_usaha($id_pengguna = null)
	{
		if($id_pengguna == null)
		{
			if (isset($_GET['filter'])) {
				$klasifikasi  = $_GET['klasifikasi'];
				$kategori = $_GET['kategori'];
				$kecamatan = $_GET['kecamatan'];
				$kelurahan = $_GET['kelurahan'];
				$awal = $_GET['awal'];
				$akhir= $_GET['akhir'];
				if( $awal != '' && $akhir != '')
				{
					$awal = $_GET['awal'];
					$akhir = $_GET['akhir'];
					return $this->db->query("SELECT tb_usaha.*, tb_pengguna.*, tb_kategori.id_kategori, tb_kategori.nama_kategori, tb_kecamatan.id_kecamatan,tb_kelurahan.nama_kelurahan, tb_kelurahan.kode_pos, tb_kecamatan.nama_kecamatan FROM tb_pengguna JOIN tb_usaha ON tb_pengguna.id_pengguna = tb_usaha.id_pengguna JOIN tb_kategori ON tb_kategori.id_kategori = tb_usaha.id_kategori JOIN tb_kelurahan ON tb_kelurahan.id_kelurahan = tb_usaha.id_kecamatan JOIN tb_kecamatan ON tb_kecamatan.id_kecamatan = tb_kelurahan.id_kecamatan WHERE tb_usaha.status = 'diterima' AND tb_usaha.bergabung BETWEEN '$awal' AND '$akhir'");
				}
				
				else if($klasifikasi != '') 
				{
					$klasifikasi = $_GET['klasifikasi'];
					return $this->db->query("SELECT tb_usaha.*, tb_pengguna.*, tb_kategori.id_kategori, tb_kategori.nama_kategori, tb_kecamatan.id_kecamatan,tb_kelurahan.nama_kelurahan, tb_kelurahan.kode_pos, tb_kecamatan.nama_kecamatan FROM tb_pengguna JOIN tb_usaha ON tb_pengguna.id_pengguna = tb_usaha.id_pengguna JOIN tb_kategori ON tb_kategori.id_kategori = tb_usaha.id_kategori JOIN tb_kelurahan ON tb_kelurahan.id_kelurahan = tb_usaha.id_kecamatan JOIN tb_kecamatan ON tb_kecamatan.id_kecamatan = tb_kelurahan.id_kecamatan WHERE tb_usaha.status = 'diterima' AND tb_usaha.kelas = '$klasifikasi'");
				}

				else if($kategori !='')
				{
					$kategori = $_GET['kategori'];
					return $this->db->query("SELECT tb_usaha.*, tb_pengguna.*, tb_kategori.id_kategori, tb_kategori.nama_kategori, tb_kecamatan.id_kecamatan,tb_kelurahan.nama_kelurahan, tb_kelurahan.kode_pos, tb_kecamatan.nama_kecamatan FROM tb_pengguna JOIN tb_usaha ON tb_pengguna.id_pengguna = tb_usaha.id_pengguna JOIN tb_kategori ON tb_kategori.id_kategori = tb_usaha.id_kategori JOIN tb_kelurahan ON tb_kelurahan.id_kelurahan = tb_usaha.id_kecamatan JOIN tb_kecamatan ON tb_kecamatan.id_kecamatan = tb_kelurahan.id_kecamatan WHERE tb_usaha.status = 'diterima' AND tb_kategori.id_kategori = '$kategori'");
				}

				else if($kecamatan !='')
				{
					$kecamatan = $_GET['kecamatan'];
					return $this->db->query("SELECT tb_usaha.*, tb_pengguna.*, tb_kategori.id_kategori, tb_kategori.nama_kategori, tb_kecamatan.id_kecamatan,tb_kelurahan.nama_kelurahan, tb_kelurahan.kode_pos, tb_kecamatan.nama_kecamatan FROM tb_pengguna JOIN tb_usaha ON tb_pengguna.id_pengguna = tb_usaha.id_pengguna JOIN tb_kategori ON tb_kategori.id_kategori = tb_usaha.id_kategori JOIN tb_kelurahan ON tb_kelurahan.id_kelurahan = tb_usaha.id_kecamatan JOIN tb_kecamatan ON tb_kecamatan.id_kecamatan = tb_kelurahan.id_kecamatan WHERE tb_usaha.status = 'diterima' AND tb_kelurahan.id_kecamatan = '$kecamatan'");
				}

				else if($kelurahan !='')
				{
					$kelurahan = $_GET['kelurahan'];
					return $this->db->query("SELECT tb_usaha.*, tb_pengguna.*, tb_kategori.id_kategori, tb_kategori.nama_kategori, tb_kecamatan.id_kecamatan,tb_kelurahan.nama_kelurahan, tb_kelurahan.kode_pos, tb_kecamatan.nama_kecamatan FROM tb_pengguna JOIN tb_usaha ON tb_pengguna.id_pengguna = tb_usaha.id_pengguna JOIN tb_kategori ON tb_kategori.id_kategori = tb_usaha.id_kategori JOIN tb_kelurahan ON tb_kelurahan.id_kelurahan = tb_usaha.id_kecamatan JOIN tb_kecamatan ON tb_kecamatan.id_kecamatan = tb_kelurahan.id_kecamatan WHERE tb_usaha.status = 'diterima' AND tb_usaha.id_kecamatan = '$kelurahan'");
				}

				else
				{
					return $this->db->query("SELECT tb_usaha.*, tb_pengguna.*, tb_kategori.id_kategori, tb_kategori.nama_kategori, tb_kecamatan.id_kecamatan,tb_kelurahan.nama_kelurahan, tb_kelurahan.kode_pos, tb_kecamatan.nama_kecamatan FROM tb_pengguna JOIN tb_usaha ON tb_pengguna.id_pengguna = tb_usaha.id_pengguna JOIN tb_kategori ON tb_kategori.id_kategori = tb_usaha.id_kategori JOIN tb_kelurahan ON tb_kelurahan.id_kelurahan = tb_usaha.id_kecamatan JOIN tb_kecamatan ON tb_kecamatan.id_kecamatan = tb_kelurahan.id_kecamatan WHERE tb_usaha.status = 'diterima' ORDER BY tb_usaha.id_usaha DESC");
				}
			} else {
				return $this->db->query("SELECT tb_usaha.*, tb_pengguna.*, tb_kategori.id_kategori, tb_kategori.nama_kategori, tb_kecamatan.id_kecamatan,tb_kelurahan.nama_kelurahan, tb_kelurahan.kode_pos, tb_kecamatan.nama_kecamatan FROM tb_pengguna JOIN tb_usaha ON tb_pengguna.id_pengguna = tb_usaha.id_pengguna JOIN tb_kategori ON tb_kategori.id_kategori = tb_usaha.id_kategori JOIN tb_kelurahan ON tb_kelurahan.id_kelurahan = tb_usaha.id_kecamatan JOIN tb_kecamatan ON tb_kecamatan.id_kecamatan = tb_kelurahan.id_kecamatan WHERE tb_usaha.status = 'diterima' ORDER BY tb_usaha.id_usaha DESC");# code...
			}
			
		}
		else
		{
			/*$id_pengguna=$this->session->userdata('id_pengguna');*/
			return $this->db->query("SELECT tb_usaha.*, tb_pengguna.*, tb_kategori.id_kategori, tb_kategori.nama_kategori, tb_kecamatan.id_kecamatan,tb_kelurahan.nama_kelurahan, tb_kelurahan.kode_pos, tb_kecamatan.nama_kecamatan FROM tb_pengguna JOIN tb_usaha ON tb_pengguna.id_pengguna = tb_usaha.id_pengguna JOIN tb_kategori ON tb_kategori.id_kategori = tb_usaha.id_kategori JOIN tb_kelurahan ON tb_kelurahan.id_kelurahan = tb_usaha.id_kecamatan JOIN tb_kecamatan ON tb_kecamatan.id_kecamatan = tb_kelurahan.id_kecamatan WHERE tb_usaha.status= 'diterima'AND tb_pengguna.id_pengguna = '$id_pengguna'");
		}		
	}

	public function cetak_usaha($awal,$akhir)
	{
		return $this->db->query("SELECT tb_usaha.*, tb_pengguna.*, tb_kategori.id_kategori, tb_kategori.nama_kategori, tb_kecamatan.id_kecamatan,tb_kelurahan.nama_kelurahan, tb_kelurahan.kode_pos, tb_kecamatan.nama_kecamatan FROM tb_pengguna JOIN tb_usaha ON tb_pengguna.id_pengguna = tb_usaha.id_pengguna JOIN tb_kategori ON tb_kategori.id_kategori = tb_usaha.id_kategori JOIN tb_kelurahan ON tb_kelurahan.id_kelurahan = tb_usaha.id_kecamatan JOIN tb_kecamatan ON tb_kecamatan.id_kecamatan = tb_kelurahan.id_kecamatan WHERE tb_usaha.status = 'diterima' AND tb_usaha.bergabung BETWEEN '$awal' AND '$akhir'");
	}

	public function cetak_klasifikasi($klasifikasi)
	{
		return $this->db->query("SELECT tb_usaha.*, tb_pengguna.*, tb_kategori.id_kategori, tb_kategori.nama_kategori, tb_kecamatan.id_kecamatan,tb_kelurahan.nama_kelurahan, tb_kelurahan.kode_pos, tb_kecamatan.nama_kecamatan FROM tb_pengguna JOIN tb_usaha ON tb_pengguna.id_pengguna = tb_usaha.id_pengguna JOIN tb_kategori ON tb_kategori.id_kategori = tb_usaha.id_kategori JOIN tb_kelurahan ON tb_kelurahan.id_kelurahan = tb_usaha.id_kecamatan JOIN tb_kecamatan ON tb_kecamatan.id_kecamatan = tb_kelurahan.id_kecamatan WHERE tb_usaha.status = 'diterima' AND tb_usaha.kelas = '$klasifikasi'");
	}

	public function cetak_kategori($kategori)
	{
		return $this->db->query("SELECT tb_usaha.*, tb_pengguna.*, tb_kategori.id_kategori, tb_kategori.nama_kategori, tb_kecamatan.id_kecamatan,tb_kelurahan.nama_kelurahan, tb_kelurahan.kode_pos, tb_kecamatan.nama_kecamatan FROM tb_pengguna JOIN tb_usaha ON tb_pengguna.id_pengguna = tb_usaha.id_pengguna JOIN tb_kategori ON tb_kategori.id_kategori = tb_usaha.id_kategori JOIN tb_kelurahan ON tb_kelurahan.id_kelurahan = tb_usaha.id_kecamatan JOIN tb_kecamatan ON tb_kecamatan.id_kecamatan = tb_kelurahan.id_kecamatan WHERE tb_usaha.status = 'diterima' AND tb_kategori.id_kategori = '$kategori'");
	}

	public function cetak_kecamatan($kecamatan)
	{
		return $this->db->query("SELECT tb_usaha.*, tb_pengguna.*, tb_kategori.id_kategori, tb_kategori.nama_kategori, tb_kecamatan.id_kecamatan,tb_kelurahan.nama_kelurahan, tb_kelurahan.kode_pos, tb_kecamatan.nama_kecamatan FROM tb_pengguna JOIN tb_usaha ON tb_pengguna.id_pengguna = tb_usaha.id_pengguna JOIN tb_kategori ON tb_kategori.id_kategori = tb_usaha.id_kategori JOIN tb_kelurahan ON tb_kelurahan.id_kelurahan = tb_usaha.id_kecamatan JOIN tb_kecamatan ON tb_kecamatan.id_kecamatan = tb_kelurahan.id_kecamatan WHERE tb_usaha.status = 'diterima' AND tb_kelurahan.id_kecamatan = '$kecamatan'");
	}

	public function cetak_kelurahan($kelurahan)
	{
		return $this->db->query("SELECT tb_usaha.*, tb_pengguna.*, tb_kategori.id_kategori, tb_kategori.nama_kategori, tb_kecamatan.id_kecamatan,tb_kelurahan.nama_kelurahan, tb_kelurahan.kode_pos, tb_kecamatan.nama_kecamatan FROM tb_pengguna JOIN tb_usaha ON tb_pengguna.id_pengguna = tb_usaha.id_pengguna JOIN tb_kategori ON tb_kategori.id_kategori = tb_usaha.id_kategori JOIN tb_kelurahan ON tb_kelurahan.id_kelurahan = tb_usaha.id_kecamatan JOIN tb_kecamatan ON tb_kecamatan.id_kecamatan = tb_kelurahan.id_kecamatan WHERE tb_usaha.status = 'diterima' AND tb_usaha.id_kecamatan = '$kelurahan'");
	}


	public function getusaha($id_usaha)
	{
		return $this->db->query("SELECT tb_usaha.*, tb_pengguna.*, tb_kategori.id_kategori, tb_kategori.nama_kategori, tb_kecamatan.id_kecamatan,tb_kelurahan.id_kelurahan, tb_kelurahan.nama_kelurahan, tb_kelurahan.kode_pos, tb_kecamatan.nama_kecamatan FROM tb_pengguna JOIN tb_usaha ON tb_pengguna.id_pengguna = tb_usaha.id_pengguna JOIN tb_kategori ON tb_kategori.id_kategori = tb_usaha.id_kategori JOIN tb_kelurahan ON tb_kelurahan.id_kelurahan = tb_usaha.id_kecamatan JOIN tb_kecamatan ON tb_kecamatan.id_kecamatan = tb_kelurahan.id_kecamatan WHERE tb_usaha.id_usaha = '$id_usaha'");
	}
 
	public function tambah_usaha($post)
	{
		$usaha = [
			'id_usaha' => $post['id_usaha'],
			'nama_usaha' => $post['nama_usaha'],
			'id_pengguna' => $post['pengguna'],
			'asset' => $post['asset'],
			'omzet' => $post['omzet'],
			'kelas' => $post['kelas'],
			'id_kategori' => $post['kategori'],
			'deskripsi' => $post['deskripsi'],
			'alamat' => $post['alamat'],
			'id_kecamatan' => $post['kelurahan'],
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
			'asset' => $post['asset'],
			'omzet' => $post['omzet'],
			'kelas' => $post['kelas'],
			'id_kategori' => $post['kategori'],
			'deskripsi' => $post['deskripsi'],
			'alamat' => $post['alamat'],
			'id_kecamatan' => $post['kelurahan'],
			'jam_operasional' => $post['jam_operasional'],
			'telepon' => $post['telepon'],
			'status' => $post['status'],
			/*'bergabung' => $post['bergabung'],*/
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
			
			return $this->db->query("SELECT tb_usaha.*, tb_pengguna.id_pengguna, tb_pengguna.nama_lengkap, tb_kategori.nama_kategori, tb_kecamatan.nama_kecamatan FROM tb_pengguna JOIN tb_usaha ON tb_pengguna.id_pengguna = tb_usaha.id_pengguna JOIN tb_kategori ON tb_kategori.id_kategori = tb_usaha.id_kategori JOIN tb_kelurahan ON tb_kelurahan.id_kelurahan = tb_usaha.id_kecamatan JOIN tb_kecamatan ON tb_kecamatan.id_kecamatan = tb_kelurahan.id_kecamatan WHERE tb_usaha.status = 'diterima' ORDER BY tb_usaha.id_usaha DESC");
			
		}
		else
		{
			/*$id_pengguna=$this->session->userdata('id_pengguna');*/
			return $this->db->query("SELECT tb_usaha.*, tb_pengguna.id_pengguna, tb_pengguna.nama_lengkap, tb_kategori.nama_kategori, tb_kecamatan.nama_kecamatan FROM tb_pengguna JOIN tb_usaha ON tb_pengguna.id_pengguna = tb_usaha.id_pengguna JOIN tb_kategori ON tb_kategori.id_kategori = tb_usaha.id_kategori JOIN tb_kelurahan ON tb_kelurahan.id_kelurahan = tb_usaha.id_kecamatan JOIN tb_kecamatan ON tb_kecamatan.id_kecamatan = tb_kelurahan.id_kecamatan WHERE tb_pengguna.id_pengguna = '$id_pengguna' AND tb_usaha.status = 'diterima'");
		}		
	}
	public function konfir_usaha($id_pengguna = null)
	{
		if($id_pengguna == null)
		{
			return $this->db->query("SELECT tb_usaha.*, tb_pengguna.id_pengguna, tb_pengguna.nama_lengkap, tb_pengguna.email, tb_kategori.nama_kategori, tb_kecamatan.nama_kecamatan FROM tb_pengguna JOIN tb_usaha ON tb_pengguna.id_pengguna = tb_usaha.id_pengguna JOIN tb_kategori ON tb_kategori.id_kategori = tb_usaha.id_kategori JOIN tb_kelurahan ON tb_kelurahan.id_kelurahan = tb_usaha.id_kecamatan join tb_kecamatan on tb_kecamatan.id_kecamatan=tb_kelurahan.id_kecamatan  WHERE tb_usaha.status != 'diterima' ORDER BY tb_usaha.id_usaha DESC");
		}
		else
		{
			/*$id_pengguna=$this->session->userdata('id_pengguna');*/
			return $this->db->query("SELECT tb_usaha.*, tb_pengguna.id_pengguna, tb_pengguna.nama_lengkap, tb_kategori.nama_kategori, tb_kecamatan.nama_kecamatan FROM tb_pengguna JOIN tb_usaha ON tb_pengguna.id_pengguna = tb_usaha.id_pengguna JOIN tb_kategori ON tb_kategori.id_kategori = tb_usaha.id_kategori JOIN tb_kelurahan ON tb_kelurahan.id_kelurahan = tb_usaha.id_kecamatan join tb_kecamatan on tb_kecamatan.id_kecamatan=tb_kelurahan.id_kecamatan WHERE tb_pengguna.id_pengguna = '$id_pengguna' ORDER BY tb_usaha.id_usaha DESC");
		}		
	}

	function status($id_usaha,$status)
    {
        $hasil=$this->db->query("UPDATE tb_usaha SET status='$status' WHERE id_usaha='$id_usaha'");
        return $hasil;
    }

    public function data_kecamatan($id)
    {
    	$query = $this->db->query("SELECT * FROM tb_kelurahan WHERE id_kecamatan = '$id' order by nama_kelurahan asc");
    	$data = $query->result_array();

    	$kecamatan = '<option value="" title="Pilih Kelurahan">Pilih Kelurahan</option>';

    	foreach ($data as $dt) {
    		$kecamatan.='<option value="'.$dt['id_kelurahan'].'" title="Pilih Kelurahan">'.$dt['nama_kelurahan'].'</option>';

    	}
    	return $kecamatan;
    }

    public function data_pos($id)
    {
    	$query = $this->db->query("SELECT * FROM tb_kelurahan WHERE id_kelurahan = '$id' order by nama_kelurahan asc");
    	$data = $query->row_array();
    	return $kodepos = $data['kode_pos'];
    }
}