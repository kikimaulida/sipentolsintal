<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_dashboard extends CI_Model {

	function jumlahusaha(){
    	$jumlah_usaha = $this->db->get('tb_usaha')->num_rows();
    	return $jumlah_usaha;
    }

    function jumlahpelakuusaha(){
    	$this->db->where('level', 'pelaku usaha');
    	$jumlah_pelakuusaha = $this->db->get('tb_pengguna')->num_rows();
    	return $jumlah_pelakuusaha;
    }

    function jumlahuser(){
        $this->db->where('level', 'user');
        $jumlah_user = $this->db->get('tb_pengguna')->num_rows();
        return $jumlah_user;
    }

    function jumlahproduk(){
    	$jumlahproduk = $this->db->get('tb_produk')->num_rows();
    	return $jumlahproduk;
    }

    function produkpengguna(){
        $id_pengguna= $this->session->userdata('id_pengguna');
        $this->db->where('id_pengguna', $id_pengguna);
        $produkpengguna = $this->db->get('tb_produk')->num_rows();
        return $produkpengguna;
    }

    function usahapengguna(){
        $id_pengguna= $this->session->userdata('id_pengguna');
        $this->db->where('id_pengguna', $id_pengguna);
        $this->db->where('status', 'diterima');
        $usahapengguna = $this->db->get('tb_usaha')->num_rows();
        return $usahapengguna;
    }

    function hitungkategori()
    {/*
        SELECT COUNT(*) FROM tb_usaha GROUP BY id_kategori;*/

        $hitungkategori=$this->db->query("SELECT tb_kategori.nama_kategori, COUNT(tb_usaha.id_kategori) AS jumlah FROM tb_kategori JOIN tb_usaha ON tb_kategori.id_kategori=tb_usaha.id_kategori GROUP BY tb_kategori.id_kategori ")->result_array();
        return $hitungkategori;
    }

    function hitungkecamatan()
    {
        
        $hitungkecamatan=$this->db->query("SELECT tb_kecamatan.nama_kecamatan, COUNT(tb_usaha.id_kecamatan) AS jumlah FROM tb_kecamatan JOIN tb_kelurahan ON tb_kecamatan.id_kecamatan = tb_kelurahan.id_kecamatan JOIN tb_usaha ON tb_kelurahan.id_kelurahan = tb_usaha.id_kecamatan WHERE tb_usaha.status = 'diterima' GROUP BY tb_kecamatan.id_kecamatan")->result_array();
        return $hitungkecamatan;

        /*SELECT tb_kecamatan.nama_kecamatan, COUNT(tb_usaha.id_kecamatan) AS jumlah FROM tb_kecamatan JOIN tb_usaha ON tb_kecamatan.id_kecamatan=tb_usaha.id_kecamatan GROUP BY tb_kecamatan.id_kecamatan*/
    }

}