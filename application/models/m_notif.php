<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_notif extends CI_Model {

    
   /* public $table1 = 'tb_usaha';
    public $id_pengguna = 'id_pengguna';*/
   /* public $order = 'DESC';*/

   /* function __construct()
    {
        parent::__construct();
    }*/

    // get total rows
    function total_rows($q = NULL) 
    {
        $this->db->like('id_usaha', $q);
        $this->db->where('status', 'menunggu konfirmasi');
    	$this->db->from('tb_usaha');
        $this->db->order_by('id_usaha', 'DESC');
        return $this->db->count_all_results();
    }	

    function total_daftar($x = NULL) 
    {
        $this->db->like('id_pengguna', $x);
        $this->db->where('status', 'menunggu konfirmasi');
        $this->db->from('tb_pengguna');
        $this->db->order_by('id_pengguna', 'DESC');
        return $this->db->count_all_results();
    }
}

	