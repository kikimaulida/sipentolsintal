<?php
	defined('BASEPATH') OR
	exit('No direct script access allowed');

	class Ckonfirusaha extends CI_Controller {
		function __construct()
		{
			parent::__construct();
			check_not_login();
			$this->load->model(['m_usaha', 'm_pengguna', 'm_kategori', 'm_kecamatan', 'm_notif']);
		}

		public function index() 
		{
			
			$level = $this->session->userdata('level');
			if ($level == 'admin')
			{
				$id_pengguna = '';
			}
			else {
				$id_pengguna = $this->session->userdata('id_pengguna');
			}
			$data['row'] = $this->m_usaha->konfir_usaha($id_pengguna);
			/*var_dump($data);*/
			$this->template->load('template', 'usaha/konfir_usaha', $data);
		} 

		public function detail_usaha($id_usaha)
		{
			$data['row'] = $this->m_usaha->getusaha($id_usaha);
			$this->template->load('template', 'usaha/detail_konfir', $data);
		}

		function status()
	    {
	    	$email_kirim = $this->input->post('email');
	        $status=$this->input->post('status');
	        if ($status =='diterima') {
	        	$subject = "Konfirmasi Usaha Diterima";
	        	$pesan = "Silahkan Login dengan Klik link <a href='".base_url()."auth/login'> siaciltala</a> untuk mengelola Usaha Anda";
	        } else {
	        	$subject = "Konfirmasi Usaha Ditolak";
	        	$pesan = "Mohon maaf, usaha Anda ditolak dengan alasan ".$this->input->post('pesan');
	        }

	        $this->load->library('email');
	    	$mail_config['smtp_host'] = 'smtp.gmail.com';
			$mail_config['smtp_port'] = '587';
			$mail_config['smtp_user'] = 'siaciltala@gmail.com';
			$mail_config['_smtp_auth'] = TRUE;
			$mail_config['smtp_pass'] = '12juli1947';
			$mail_config['smtp_crypto'] = 'tls';
			$mail_config['protocol'] = 'smtp';
			$mail_config['mailtype'] = 'html';
			$mail_config['send_multipart'] = FALSE;
			$mail_config['charset'] = 'utf-8';
			$mail_config['wordwrap'] = TRUE;
			$this->email->initialize($mail_config);
			$this->email->set_newline("\r\n");
	        $this->email->from("siaciltala@gmail.com", 'SIACIL TALA'); 
	        $this->email->to($email_kirim);
	        $this->email->subject($subject); 
	        $this->email->message($pesan);  
	       
	        if($this->email->send())
	        {
	                echo "Success"; 
	        }
	        else 
	        {   
	         	$error = $this->email->print_debugger(array('headers'));
	         	 echo $error;
	        }
	        $id_usaha=$this->input->post('id_usaha');
	        $status=$this->input->post('status');
	        $this->m_usaha->status($id_usaha,$status);
	        redirect('Ckonfirusaha');        
	    }
	}