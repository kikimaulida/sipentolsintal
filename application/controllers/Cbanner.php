<?php
	defined('BASEPATH') OR
	exit('No direct script access allowed');

	class Cbanner extends CI_Controller {
		function __construct()
		{
			parent::__construct();
			check_not_login();
			$this->load->model(['m_banner', 'm_pengguna', 'm_notif']);
		}

		public function index() 
		{
			$data['row'] = $this->m_banner->tampil_banner();
			$this->template->load('template', 'banner/data_banner', $data);
		}

		public function tambah()
		{
			$banner = new stdClass();
			$banner->id_banner = null;
			$banner->foto_banner = null;
			$banner->tgl_unggah = null;

			$id_pengguna = $this->session->userdata('id_pengguna');
			$query_pengguna = $this->m_pengguna->tampil_pengguna();
			$pengguna[null] = '- Pilih Nama Usaha -';
			foreach ($query_pengguna->result() as $pgn) {
				if($pgn->id_pengguna == $id_pengguna)
				{
					$pengguna[$pgn->id_pengguna] = $pgn->nama_lengkap;
				}
			}

			$data = array(
				'page' => 'tambah',
				'row' => $banner,
				'pengguna' => $pengguna, 'selectedpengguna' => null,
			);
			$this->template->load('template', 'banner/form_banner', $data);
		}

		public function proses()
		{
			$config['upload_path']		= './uploads/banner/';
			$config['allowed_types']	= 'jpg|png|jpeg';
			$config['max_size']			= 2048;
			$config['file_name']		= 'banner-'.date('ymd').'-'.substr(md5(rand()),0,10);
		
			$this->load->library('upload', $config);
			
			$post = $this->input->post(null, TRUE);
			if(isset($_POST['tambah'])) 
			{
				if(@$_FILES['foto_banner']['name'] != null)
				{
					if ($this->upload->do_upload('foto_banner'))
					{
						$post['foto_banner'] = $this->upload->data('file_name');
						$this->m_banner->tambah_banner($post);
						if($this->db->affected_rows() > 0)
						{
							$this->session->set_flashdata('success', "Data Berhasil Disimpan");
						}
							redirect('cbanner');

					}
					else
					{
						$error = $this->upload->display_errors();
						redirect('cbanner/tambah');
					}
				}
				else 
				{
					$post['foto_banner'] = null;
					$this->m_banner->tambah_banner($post);
					if($this->db->affected_rows() > 0)
					{
						$this->session->set_flashdata('success', "Data Berhasil Disimpan");
					}
						redirect('cbanner');
				}
			} 
			else if(isset($_POST['ubah'])) 
			{
				if(@$_FILES['foto_banner']['name'] != null)
				{
					if ($this->upload->do_upload('foto_banner'))
					{

						$banner = $this->m_banner->tampil_banner($post['id_banner'])->row();
						if($banner->foto_banner != null)
						{ 
							$target_file = './uploads/banner/'.$banner->foto_banner; //
							unlink($target_file);
						}
							$post['foto_banner'] = $this->upload->data('file_name');
							$this->m_banner->ubah_banner($post);
							if($this->db->affected_rows() > 0)
							{
								$this->session->set_flashdata('success', "Data Berhasil Diubah");
							}
								redirect('cbanner');

					}
					else
					{
						$error = $this->upload->display_errors();
						redirect('cbanner/ubah');
					}
				}
				else 
				{
					$post['foto_banner'] = null;
					$this->m_banner->ubah_banner($post);
					if($this->db->affected_rows() > 0)
					{
						$this->session->set_flashdata('success', "Data Berhasil Diubah");
					}
						redirect('cbanner');
				}
			}

		}

		public function ubah($id_banner)
		{
			$query = $this->m_banner->tampil_banner($id_banner);
			if($query->num_rows() > 0)
			{
				$id_pengguna = $this->session->userdata('id_pengguna');
				$query_pengguna = $this->m_pengguna->tampil_pengguna();
				$pengguna[null] = '- Pilih Nama Usaha -';
				foreach ($query_pengguna->result() as $pgn) {
					if($pgn->id_pengguna == $id_pengguna)
					{
						$pengguna[$pgn->id_pengguna] = $pgn->nama_lengkap;
					}
				}

				$banner = $query->row();
				$data = array(
					'page' => 'ubah',
					'row' => $banner,
					'pengguna' => $pengguna, 'selectedpengguna' => $banner->id_pengguna,
				);
				$this->template->load('template', 'banner/form_banner', $data);
			}
			else
			{
				echo "<script>alert('Data tidak ditemukan');";
				echo "window.location='".site_url('cbanner')."';</script>";
			}
		}

		public function hapus_banner($id_banner)
		{
			$this->load->model('m_banner');
			$this->m_banner->hapus_banner($id_banner);
			if ($this->db->affected_rows() > 0 )
			{
				$this->session->set_flashdata('success', "Data Berhasil Dihapus");
			}
				redirect('cbanner');
		}
	}