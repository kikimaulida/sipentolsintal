<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_rating extends CI_Model {

	public function tampil_rating($id_produk)
	{
		$this->db->select('tb_rating_produk.*, tb_produk.id_produk, tb_pengguna.id_pengguna, tb_pengguna.username, tb_pengguna.foto_pengguna');
		$this->db->from('tb_produk');
		$this->db->join('tb_rating_produk', 'tb_produk.id_produk = tb_rating_produk.id_produk');
		$this->db->join('tb_pengguna', 'tb_pengguna.id_pengguna = tb_rating_produk.id_pengguna');
		$this->db->where('tb_produk.id_produk', $id_produk);

		$this->db->order_by('id_rating', 'DESC');
		$query = $this->db->get();
		return $query;
	}

	public function tambah_rating()
	{
		$rating = [
			
			'rating' => $this->input->post('rating'),
			'review' => $this->input->post('review'),
			'id_produk' => $this->input->post('id_produk'),
			'id_pengguna' => $this->input->post('id_pengguna'),
			'tanggal' => date('Y-m-d'),
		];
		$this->db->insert('tb_rating_produk', $rating);
	}

	function jumlahreview($id_produk){
        $this->db->where('id_produk', $id_produk);
        $jumlah_review = $this->db->get('tb_rating_produk')->num_rows();
        return $jumlah_review;
    }

    function jumlahrating($id_produk)
    {
     	$this->db->select_avg('rating');
     	$this->db->where('id_produk', $id_produk);
	   	$query = $this->db->get('tb_rating_produk');
	   	if($query->num_rows()>0)
	   	{
	    	return $query->row()->rating;
	   	}
	   	else
	   	{
	    	return 0;
	   	}
    }
}