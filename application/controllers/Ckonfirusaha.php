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
	    	$id_usaha = $this->input->post('id_usaha');
	    	$sql = $this->db->query("SELECT tb_pengguna.email from tb_pengguna join tb_usaha on tb_pengguna.id_pengguna=tb_usaha.id_pengguna where tb_usaha.id_usaha='$id_usaha'")->row_array();
	    	$email_kirim = $sql['email'];
	    	
	        $status=$this->input->post('status');
	        if ($status =='diterima') {
	        	$subject = "Konfirmasi Usaha Diterima";
	        	$pesan = "Silahkan Login dengan Klik link <a href='".base_url()."auth/login'> sipentolsintal.tanahlautkab.go.id</a> untuk mengelola Usaha Anda";
	        } else {
	        	$subject = "Konfirmasi Usaha Ditolak";
	        	$pesan = "Mohon maaf, usaha Anda ditolak dengan alasan ".$this->input->post('pesan');
	        }

	        $this->load->library('email');
	    	$mail_config['smtp_host'] = 'smtp.gmail.com';
			$mail_config['smtp_port'] = '587';
			$mail_config['smtp_user'] = 'sipentolsintal@gmail.com';
			$mail_config['_smtp_auth'] = TRUE;
			$mail_config['smtp_pass'] = 's1p3nt0ls1nt4l21';
			$mail_config['smtp_crypto'] = 'tls';
			$mail_config['protocol'] = 'smtp';
			$mail_config['mailtype'] = 'html';
			$mail_config['send_multipart'] = FALSE;
			$mail_config['charset'] = 'utf-8';
			$mail_config['wordwrap'] = TRUE;
			$this->email->initialize($mail_config);
			$this->email->set_newline("\r\n");
	        $this->email->from("sipentolsintal@gmail.com", 'SIPENTOL SINTAL'); 
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