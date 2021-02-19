<?php
	defined('BASEPATH') OR
	exit('No direct script access allowed');

	use PHPMailer\PHPMailer\Exception;
	use PHPMailer\PHPMailer\PHPMailer;

	class Ckonfirakun extends CI_Controller {
		function __construct()
		{
			parent::__construct();
			check_not_login();
			$this->load->model(['m_pengguna', 'm_notif']);
		}

		public function index() 
		{
			$data['row'] = $this->m_pengguna->konfir_akun();
			$this->template->load('template', 'pengguna/konfir_akun', $data);
		} 


		public function hapus_pengguna($id_pengguna)
		{
			$this->load->model('m_pengguna');
			$this->m_pengguna->hapus_pengguna($id_pengguna);
			if ($this->db->affected_rows() > 0 )
			{
				$this->session->set_flashdata('success', "Data Berhasil Dihapus");
			}
				redirect('Ckonfirakun');
		}

		public function detail_pendaftar($id_pengguna)
		{
			
			$data['row'] = $this->m_pengguna->konfir_akun($id_pengguna);
			$this->template->load('template', 'pengguna/detail_pendaftar', $data);
		}


		function status_daftar()
	    {
	        
	        $email_kirim = $this->input->post('email');
	        $status=$this->input->post('status');
	        if ($status =='diterima') {
	        	$subject = "Konfirmasi Pendaftaran Akun Diterima";
	        	$pesan = "Silahkan Klik link <a href='".base_url()."auth/login'> sipentolsintal.tanahlautkab.go.id</a> untuk Login ke sistem";
	        } else {
	        	$subject = "Konfirmasi Pendaftaran Akun Ditolak";
	        	$pesan = "Mohon maaf, pendaftaran akun Anda ditolak dengan alasan ".$this->input->post('pesan');
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
	        $id_pengguna=$this->input->post('id_pengguna');
	        $status=$this->input->post('status');
	        $this->m_pengguna->status_daftar($id_pengguna,$status);
	        redirect('Ckonfirakun');        
	    }
	}