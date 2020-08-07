<?php
	defined('BASEPATH') OR
	exit('No direct script access allowed');

	class Cprofile extends CI_Controller {
		function __construct()
		{
			parent::__construct();
			check_not_login();
			$this->load->model(['m_pengguna', 'm_notif']);
		}

		public function index() 
		{
			$id_pengguna = $this->session->userdata('id_pengguna');
			$data['row'] = $this->m_pengguna->tampil_pengguna($id_pengguna);
			$this->template->load('template', 'pengguna/profile_pengguna', $data);
		} 

		public function proses()
		{
			$config['upload_path']		= './uploads/pengguna/';
			$config['allowed_types']	= 'jpg|png|jpeg';
			$config['max_size']			= 2048;
			$config['file_name']		= 'pengguna-'.date('dmy').'-'.substr(md5(rand()),0,10);
		
			$this->load->library('upload', $config);
			
			$post = $this->input->post(null, TRUE); 
			if(isset($_POST['ubah'])) 
			{
				
				if(@$_FILES['foto_pengguna']['name'] != null)
				{
					if ($this->upload->do_upload('foto_pengguna'))
					{
						//replace
						/*$pengguna = $this->m_pengguna->tampil_pengguna($post['id_pengguna'])->row();
						if($pengguna->foto_pengguna != null)
						{
							$target_file = './uploads/pengguna/'.$pengguna->foto_pengguna;
							unlink($target_file);
						}*/
						//end replace
 
						$post['foto_pengguna'] = $this->upload->data('file_name');
						$this->m_pengguna->ubah_pengguna($post);
						if ($this->db->affected_rows() > 0) 
						{
				          	$this->session->set_flashdata('success', "Data Berhasil Diubah");
				        }
							redirect('cprofile');

					}
					else
					{
						$error = $this->upload->display_errors();
						redirect('cprofile/tambah');
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
						redirect('cprofile');
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
				$this->template->load('template', 'pengguna/form_profile', $data);
			}
			else
			{
				echo "<script>alert('Data tidak ditemukan');";
				echo "window.location='".site_url('cprofile')."';</script>";
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
				redirect('cprofile');
		}

		public function profile_pengguna($id_pengguna)
		{
			
			$data['row'] = $this->m_pengguna->tampil_pengguna($id_pengguna);
			$this->template->load('template', 'pengguna/profile_pengguna', $data);
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
				//replace
				/*$pengguna = $this->m_pengguna->tampil_pengguna($post['id_pengguna'])->row();
				if($pengguna->foto_pengguna != null)
				{
					$target_file = './uploads/pengguna/'.$pengguna->foto_pengguna;
					unlink($target_file);
				}*/
				// end replace
				$result =$this->upload->data();
				$foto = $result['file_name'];
			}

			$data = array('foto_pengguna' => $foto);
			$id_pengguna = $this->session->userdata('id_pengguna');
			$this->m_pengguna->ubah_foto($data, $id_pengguna);
			redirect('Cprofile');
		}

	
	}