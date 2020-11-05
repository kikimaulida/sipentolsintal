<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class m_produkd extends CI_Model {
	public function tampil_produk()
	{
		if (isset($_POST['nama_kecamatan']) AND isset($_POST['nama_kategori']))
		{
			$jml = count($_POST['nama_kategori']);
			$data1 =[];
			for ($i=0; $i < $jml ; $i++) { 
				array_push($data1,"'".$_POST['nama_kategori'][$i]."'");
			}
			$array1 = implode(',',$data1);
			$jml = count($_POST['nama_kecamatan']);
			$data =[];
			for ($i=0; $i < $jml ; $i++) { 
				array_push($data,"'".$_POST['nama_kecamatan'][$i]."'");
			}
			$array = implode(',',$data);
			$dt = $this->db->query("SELECT tb_produk.*, tb_usaha.id_kecamatan, tb_usaha.id_kategori, tb_kecamatan.nama_kecamatan, tb_kategori.nama_kategori FROM tb_produk JOIN tb_usaha ON tb_usaha.id_usaha = tb_produk.id_usaha JOIN tb_kelurahan ON tb_kelurahan.id_kelurahan = tb_usaha.id_kecamatan JOIN tb_kecamatan ON tb_kecamatan.id_kecamatan = tb_kelurahan.id_kecamatan JOIN tb_kategori ON tb_usaha.id_kategori = tb_kategori.id_kategori WHERE tb_kecamatan.nama_kecamatan in($array) and tb_kategori.nama_kategori in($array1)")->result();
			return $dt;
		}

		else if(isset ($_POST['nama_kecamatan']))
		{
			$jml = count($_POST['nama_kecamatan']);
			$data =[];
			for ($i=0; $i < $jml ; $i++) { 
				array_push($data,"'".$_POST['nama_kecamatan'][$i]."'");
			}
			$array = implode(',',$data);
			$dt = $this->db->query("SELECT tb_produk.*, tb_usaha.id_kecamatan, tb_kecamatan.nama_kecamatan FROM tb_produk JOIN tb_usaha ON tb_usaha.id_usaha = tb_produk.id_usaha JOIN tb_kelurahan ON tb_kelurahan.id_kelurahan = tb_usaha.id_kecamatan JOIN tb_kecamatan ON tb_kecamatan.id_kecamatan = tb_kelurahan.id_kecamatan  WHERE tb_kecamatan.nama_kecamatan in($array)")->result();
			return $dt;
		}
		
		else if (isset ($_POST['nama_kategori'])) 
		{
			$jml = count($_POST['nama_kategori']);
			$data =[];
			for ($i=0; $i < $jml ; $i++) { 
				array_push($data,"'".$_POST['nama_kategori'][$i]."'");
			}
			$array = implode(',',$data);
			$dt = $this->db->query("SELECT tb_produk.*, tb_usaha.id_kecamatan, tb_kecamatan.nama_kecamatan, tb_usaha.id_kategori, tb_kategori.nama_kategori FROM tb_produk JOIN tb_usaha ON tb_usaha.id_usaha = tb_produk.id_usaha JOIN tb_kelurahan ON tb_kelurahan.id_kelurahan = tb_usaha.id_kecamatan JOIN tb_kecamatan ON tb_kecamatan.id_kecamatan = tb_kelurahan.id_kecamatan JOIN tb_kategori ON tb_usaha.id_kategori = tb_kategori.id_kategori  WHERE tb_kategori.nama_kategori in($array)")->result();
			return $dt;
		}
		
		else
		{
			return $this->db->query("SELECT tb_produk.*, tb_usaha.id_kecamatan, tb_kecamatan.nama_kecamatan FROM tb_produk JOIN tb_usaha ON tb_usaha.id_usaha = tb_produk.id_usaha JOIN tb_kelurahan ON tb_kelurahan.id_kelurahan = tb_usaha.id_kecamatan JOIN tb_kecamatan ON tb_kecamatan.id_kecamatan = tb_kelurahan.id_kecamatan")->result();
		}		
	}
}
