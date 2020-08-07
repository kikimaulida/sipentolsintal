<?php
	defined('BASEPATH') OR
	exit('No direct script access allowed');

	class Ckategori extends CI_Controller {
		function __construct()
		{
			parent::__construct();
			check_not_login();
			$this->load->model(['m_kategori', 'm_notif']);
		}

		public function index() 
		{
			$data['row'] = $this->m_kategori->tampil_kategori();
			$this->template->load('template', 'kategori/data_kategori', $data);
		}

		public function tambah()
		{
			$kategori = new stdClass();
			$kategori->id_kategori = null;
			$kategori->nama_kategori = null;
			$kategori->icon = null;
			$data = array(
				'page' => 'tambah',
				'row' => $kategori
			);
			$this->template->load('template', 'kategori/form_kategori', $data);
		}

		public function proses()
		{
			$config['upload_path']		= './uploads/kategori/';
			$config['allowed_types']	= 'jpg|png|jpeg';
			$config['max_size']			= 2048;
			$config['file_name']		= 'kategori-'.date('ymd').'-'.substr(md5(rand()),0,10);
		
			$this->load->library('upload', $config);
			
			$post = $this->input->post(null, TRUE);
			if(isset($_POST['tambah'])) 
			{
				if($this->m_kategori->check_kategori($post['nama_kategori'])->num_rows() > 0 )
				{
					$this->session->set_flashdata('error', "Maaf, Kategori $post[nama_kategori] Sudah Ada.");
					redirect('Ckategori/tambah');
				}

				if(@$_FILES['icon']['name'] != null)
				{
					
					if ($this->upload->do_upload('icon'))
					{
						$post['icon'] = $this->upload->data('file_name');
						$this->m_kategori->tambah_kategori($post);
						if($this->db->affected_rows() > 0)
						{
							$this->session->set_flashdata('success', "Data Berhasil Disimpan");
						}
							redirect('ckategori');

					}
					else
					{
						$error = $this->upload->display_errors();
						redirect('ckategori/tambah');
					}
				}
				else 
				{
					$post['icon'] = null;
					$this->m_kategori->tambah_kategori($post);
					if($this->db->affected_rows() > 0)
					{
						$this->session->set_flashdata('success', "Data Berhasil Disimpan");
					}
						redirect('ckategori');
				}
			} 
			else if(isset($_POST['ubah'])) 
			{
				if(@$_FILES['icon']['name'] != null)
				{
					if ($this->upload->do_upload('icon'))
					{

						$kategori = $this->m_kategori->tampil_kategori($post['id_kategori'])->row();
						if($kategori->icon != null)
						{ 
							$target_file = './uploads/kategori/'.$kategori->icon; //
							unlink($target_file);
						}
							$post['icon'] = $this->upload->data('file_name');
							$this->m_kategori->ubah_kategori($post);
							if($this->db->affected_rows() > 0)
							{
								$this->session->set_flashdata('success', "Data Berhasil Diubah");
							}
								redirect('ckategori');

					}
					else
					{
						$error = $this->upload->display_errors();
						redirect('ckategori/ubah');
					}
				}
				else 
				{
					$post['icon'] = null;
					$this->m_kategori->ubah_kategori($post);
					if($this->db->affected_rows() > 0)
					{
						$this->session->set_flashdata('success', "Data Berhasil Diubah");
					}
						redirect('ckategori');
				}
			}

		}

		public function ubah($id_kategori)
		{
			$query = $this->m_kategori->tampil_kategori($id_kategori);
			if($query->num_rows() > 0)
			{
				$kategori = $query->row();
				$data = array(
					'page' => 'ubah',
					'row' => $kategori
				);
				$this->template->load('template', 'kategori/form_kategori', $data);
			}
			else
			{
				echo "<script>alert('Data tidak ditemukan');";
				echo "window.location='".site_url('ckategori')."';</script>";
			}
		}

		public function hapus_kategori($id_kategori)
		{
			$this->load->model('m_kategori');
			$this->m_kategori->hapus_kategori($id_kategori);
			if ($this->db->affected_rows() > 0 )
			{
				$this->session->set_flashdata('success', "Data Berhasil Dihapus");
			}
				redirect('ckategori');
		}
	}