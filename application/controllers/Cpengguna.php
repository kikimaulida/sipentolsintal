<?php
	defined('BASEPATH') OR
	exit('No direct script access allowed');

	use PHPMailer\PHPMailer\Exception;
	use PHPMailer\PHPMailer\PHPMailer;

	class Cpengguna extends CI_Controller {
		function __construct()
		{
			parent::__construct();
			check_not_login();
			$this->load->model(['m_pengguna', 'm_notif']);
		}

		public function index() 
		{
			$data['row'] = $this->m_pengguna->tampil_pengguna();
			$this->template->load('template', 'pengguna/data_pengguna', $data);
		} 

		public function tambah()
		{
			$pengguna = new stdClass();
			$pengguna->id_pengguna = null;
			$pengguna->nama_lengkap = null;
			$pengguna->email = null;
			$pengguna->username = null;
			$pengguna->password = null;
			$pengguna->foto_ktp = null;
			$pengguna->foto_pengguna = null;
			$pengguna->level= null;

			$data = array(
				'page' => 'tambah',
				'row' => $pengguna,
			);
			$this->template->load('template', 'pengguna/form_pengguna', $data);
		}

		public function proses()
		{
			$config['upload_path']		= './uploads/pengguna/';
			$config['allowed_types']	= 'jpg|png|jpeg';
			$config['max_size']			= 2048;
			$config['file_name']		= 'pengguna-'.date('dmy').'-'.substr(md5(rand()),0,10);
		
			$this->load->library('upload', $config);
			
			$post = $this->input->post(null, TRUE);
			if(isset($_POST['tambah'])) 
			{
				if($this->m_pengguna->check_username($post['username'])->num_rows() > 0 )
				{
					$this->session->set_flashdata('error', "Maaf, username  $post[username] sudah terdaftar/digunakan.");
					redirect('Cpengguna/tambah');
				}

				if(@$_FILES['foto_ktp']['name'] != null)
				{
					if ($this->upload->do_upload('foto_ktp'))
					{
						$post['foto_ktp'] = $this->upload->data('file_name');
					}
					else
					{
						$error = $this->upload->display_errors();
						redirect('cpengguna/tambah');
					}
				}
				
				if(@$_FILES['foto_pengguna']['name'] != null)
				{
					if ($this->upload->do_upload('foto_pengguna'))
					{
						$post['foto_pengguna'] = $this->upload->data('file_name');
						$this->m_pengguna->tambah_pengguna($post);
						if ($this->db->affected_rows() > 0) 
						{
				          	$this->session->set_flashdata('success', "Data Berhasil Disimpan");
				        }
							redirect('cpengguna');

					}
					else
					{
						$error = $this->upload->display_errors();
						redirect('cpengguna/tambah');
					}
				}
				else 
				{
					$post['foto_pengguna'] = 'default.png';
					$this->m_pengguna->tambah_pengguna($post);
					if ($this->db->affected_rows() > 0) 
					{
			          	$this->session->set_flashdata('success', "Data Berhasil Disimpan");
			        }
						redirect('cpengguna');
				}

				
			} 
			else if(isset($_POST['ubah'])) 
			{
				
				if(@$_FILES['foto_ktp']['name'] != null)
				{
					if ($this->upload->do_upload('foto_ktp'))
					{
						$post['foto_ktp'] = $this->upload->data('file_name');
					}
					else
					{
						$error = $this->upload->display_errors();
						redirect('cpengguna/tambah');
					}
				}

				if(@$_FILES['foto_pengguna']['name'] != null)
				{
					if ($this->upload->do_upload('foto_pengguna'))
					{
						$post['foto_pengguna'] = $this->upload->data('file_name');
						$this->m_pengguna->ubah_pengguna($post);
						if ($this->db->affected_rows() > 0) 
						{
				          	$this->session->set_flashdata('success', "Data Berhasil Diubah");
				        }
							redirect('cpengguna');

					}
					else
					{
						$error = $this->upload->display_errors();
						redirect('cpengguna/tambah');
					}
				}
				else 
				{
					$post['foto_pengguna'] = null;
					$this->m_pengguna->ubah_pengguna($post);
					if ($this->db->affected_rows() > 0) 
					{
			          	$this->session->set_flashdata('success', "Data Berhasil Diubah");
			        }
						redirect('cpengguna');
				}
			}

		}

		public function ubah($id_pengguna)
		{
			$query = $this->m_pengguna->tampil_pengguna($id_pengguna);
			if($query->num_rows() > 0)
			{
				$pengguna = $query->row();
				$data = array(
					'page' => 'ubah',
					'row' => $pengguna,
				);
				$this->template->load('template', 'pengguna/form_pengguna', $data);
			}
			else
			{
				echo "<script>alert('Data tidak ditemukan');";
				echo "window.location='".site_url('cpengguna')."';</script>";
			}
		}

		public function hapus_pengguna($id_pengguna)
		{
			$this->load->model('m_pengguna');
			$this->m_pengguna->hapus_pengguna($id_pengguna);
			if ($this->db->affected_rows() > 0 )
			{
				$this->session->set_flashdata('success', "Data Berhasil Dihapus");
			}
				redirect('cpengguna');
		}

		public function detail_pengguna($id_pengguna)
		{
			
			$data['row'] = $this->m_pengguna->tampil_pengguna($id_pengguna);
			$this->template->load('template', 'pengguna/detail_pengguna', $data);
		}

		public function ubah_foto()
		{
			$config = array (
				'upload_path' => './uploads/pengguna/',
				'allowed_types' => 'jpg|png|jpeg',
				'file_name' =>'pengguna-'.date('dmy').'-'.substr(md5(rand()),0,10)
			);

			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('foto'))
			{
				$foto = 'Tidak Ada';
			}

			else
			{
				$result =$this->upload->data();
				$foto = $result['file_name'];
			}

			$data = array('foto_pengguna' => $foto);
			$id_pengguna = $this->session->userdata('id_pengguna');
			$this->m_pengguna->ubah_foto($data, $id_pengguna);
			redirect('Cpengguna');
		}

		/*function status_daftar()
	    {
	        
	        $email_kirim = $this->input->post('email');
	        $status=$this->input->post('status');
	        if ($status =='diterima') {
	        	$subject = "Konfirmasi Pendaftaran Akun Diterima";
	        	$pesan = "Silahkan Klik link <a href='".base_url()."auth/login'> siaciltala</a> untuk Login ke sistem";
	        } else {
	        	$subject = "Konfirmasi Pendaftaran Akun Ditolak";
	        	$pesan = "Akun Anda Di tolak dengan alasan ".$this->input->post('pesan');
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
	        $id_pengguna=$this->input->post('id_pengguna');
	        $status=$this->input->post('status');
	        $this->m_pengguna->status_daftar($id_pengguna,$status);
	        redirect('Cpengguna');        
	    }*/
	}