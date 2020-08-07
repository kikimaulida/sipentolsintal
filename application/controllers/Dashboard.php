<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
        parent::__construct();  
        check_not_login();  
        $this->load->model(['m_dashboard', 'm_notif']);
    }

	public function index()
	{
		$data['hitungkategori']   = $this->m_dashboard->hitungkategori();
		$data['jumlah_usaha']   = $this->m_dashboard->jumlahusaha();
		$data['jumlah_pelakuusaha']   = $this->m_dashboard->jumlahpelakuusaha();
		$data['jumlah_user']   = $this->m_dashboard->jumlahuser();
		$data['jumlahproduk']   = $this->m_dashboard->jumlahproduk();
		$data['produkpengguna']   = $this->m_dashboard->produkpengguna();
		$data['usahapengguna']   = $this->m_dashboard->usahapengguna();
		$data['hitungkecamatan']   = $this->m_dashboard->hitungkecamatan();
		$this->template->load('template', 'dashboard', $data);
	}
}
