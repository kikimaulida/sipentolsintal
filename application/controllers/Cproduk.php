<?php
	defined('BASEPATH') OR
	exit('No direct script access allowed');

	class Cproduk extends CI_Controller {
		function __construct()
		{
			parent::__construct();
			check_not_login();
			$this->load->model(['m_produk', 'm_usaha', 'm_pengguna', 'm_komentar']);
		}

		public function index() 
		{
			
			/*$data['row'] = $this->m_produk->tampil_produk();
			$this->template->load('template', 'produk/data_produk', $data);*/
			$level = $this->session->userdata('level');
			if ($level == 'admin')
			{
				$id_pengguna = '';
			}
			else {
				$id_pengguna = $this->session->userdata('id_pengguna');
			}
			$data['row'] = $this->m_produk->tampil_produk($id_pengguna);
			/*var_dump($data);*/
			$this->template->load('template', 'produk/data_produk', $data);
		} 

		public function tambah()
		{
			$produk = new stdClass();
			$produk->id_produk = null;
			$produk->nama_produk = null;
			$produk->deskripsi = null;
			$produk->harga = null;
			$produk->foto_produk = null;
			$produk->status = null;
			$produk->tgl_unggah = null;

			/*$query_pengguna = $this->m_pengguna->tampil_pengguna();
			$pengguna[null] = '- Pilih Nama Pemilik -';
			foreach ($query_pengguna->result() as $pgn) {
				$pengguna[$pgn->id_pengguna] = $pgn->username;
			}*/

			$level = $this->session->userdata('level');
				$id_pengguna = $this->session->userdata('id_pengguna');
				$query_pengguna = $this->m_pengguna->tampil_pengguna();
				$pengguna[null] = '- Pilih Pemilik Usaha -';
				foreach ($query_pengguna->result() as $pgn) {
					if($level == 'admin')
					{
						$pengguna[$pgn->id_pengguna] = $pgn->nama_lengkap;
					}
					else
					{
						if($pgn->id_pengguna == $id_pengguna)
						{
							$pengguna[$pgn->id_pengguna] = $pgn->nama_lengkap;
						}
					}
					
				}

			$query_usaha = $this->m_usaha->tampil_usaha($id_pengguna);
			$usaha[null] = '- Pilih Nama Usaha -';
			foreach ($query_usaha->result() as $ush) {
				$usaha[$ush->id_usaha] = $ush->nama_usaha;
			}

			$data = array(
				'page' => 'tambah',
				'row' => $produk,
				'usaha' => $usaha, 'selectedusaha' => null,
				'pengguna' => $pengguna, 'selectedpengguna' => null,
			);
			$this->template->load('template', 'produk/form_produk', $data);
		}

		public function proses()
		{
			$config['upload_path']		= './uploads/produk/';
			$config['allowed_types']	= 'jpg|png|jpeg';
			$config['max_size']			= 2048;
			$config['file_name']		= 'produk-'.date('ymd').'-'.substr(md5(rand()),0,10);
		
			$this->load->library('upload', $config);
			
			$post = $this->input->post(null, TRUE);
			if(isset($_POST['tambah'])) 
			{
				if(@$_FILES['foto_produk']['name'] != null)
				{
					if ($this->upload->do_upload('foto_produk'))
					{
						$post['foto_produk'] = $this->upload->data('file_name');
						$this->m_produk->tambah_produk($post);
						if($this->db->affected_rows() > 0)
						{
							$this->session->set_flashdata('success', "Data Berhasil Disimpan");
						}
							redirect('cproduk');

					}
					else
					{
						$error = $this->upload->display_errors();
						redirect('cproduk/tambah');
					}
				}
				else 
				{
					$post['foto_produk'] = null;
					$this->m_produk->tambah_produk($post);
					if($this->db->affected_rows() > 0)
					{
						$this->session->set_flashdata('success', "Data Berhasil Disimpan");
					}
						redirect('cproduk');
				}
			} 
			else if(isset($_POST['ubah'])) 
			{
				
				if(@$_FILES['foto_produk']['name'] != null)
				{
					if ($this->upload->do_upload('foto_produk'))
					{
						$produk = $this->m_produk->tampil_produk($post['id_produk'])->row();
						if($produk->foto_produk != null)
						{
							$target_file = './uploads/produk/'.$produk->foto_produk;
							unlink($target_file);
						}
 
						$post['foto_produk'] = $this->upload->data('file_name');
						$this->m_produk->ubah_produk($post);
						if($this->db->affected_rows() > 0)
						{ 
							$this->session->set_flashdata('success', "Data Berhasil Diubah");
						}
							redirect('cproduk');

					}
					else
					{
						$error = $this->upload->display_errors();
						redirect('cproduk/tambah');
					}
				}
				else 
				{
					$post['foto_produk'] = null;
					$this->m_produk->ubah_produk($post);
					if($this->db->affected_rows() > 0)
					{
						$this->session->set_flashdata('success', "Data Berhasil Diubah");
					}
						redirect('cproduk');
				}
			}

		}

		public function ubah($id_produk)
		{
			$query = $this->m_produk->getproduk($id_produk);
			if($query->num_rows() > 0)
			{
				$produk = $query->row();
				
				/*$query_pengguna = $this->m_pengguna->tampil_pengguna();
				$pengguna[null] = '- Pilih Nama Pemilik -';
				foreach ($query_pengguna->result() as $pgn) {
					$pengguna[$pgn->id_pengguna] = $pgn->username;
				}*/

				$level = $this->session->userdata('level');
				$id_pengguna = $this->session->userdata('id_pengguna');
				$query_pengguna = $this->m_pengguna->tampil_pengguna();
				$pengguna[null] = '- Pilih Pemilik Usaha -';
				foreach ($query_pengguna->result() as $pgn) {
					if($level == 'admin')
					{
						$pengguna[$pgn->id_pengguna] = $pgn->nama_lengkap;
					}
					else
					{
						if($pgn->id_pengguna == $id_pengguna)
						{
							$pengguna[$pgn->id_pengguna] = $pgn->nama_lengkap;
						}
					}
					
				}
				
				$query_usaha = $this->m_usaha->tampil_usaha();
				$usaha[null] = '- Pilih Nama Usaha -';
				foreach ($query_usaha->result() as $ush) {
					$usaha[$ush->id_usaha] = $ush->nama_usaha;
				}

				$data = array(
					'page' => 'ubah',
					'row' => $produk,
					'usaha' => $usaha, 'selectedusaha' => $produk->id_usaha,
					'pengguna' => $pengguna, 'selectedpengguna' => $produk->id_pengguna,
				);
				$this->template->load('template', 'produk/form_produk', $data);
			}
			else
			{
				echo "<script>alert('Data tidak ditemukan');";
				echo "window.location='".site_url('cproduk')."';</script>";
			}
		}

		public function hapus_produk($id_produk)
		{
			$this->load->model('m_produk');
			$this->m_produk->hapus_produk($id_produk);
			if ($this->db->affected_rows() > 0) 
			{
	          	$this->session->set_flashdata('success', "Data Berhasil Dihapus");
	        }
	           redirect('cproduk');
		}

		public function detail_produk($id_produk)
		{
			$data['row'] = $this->m_produk->getproduk($id_produk);
			$this->template->load('template', 'produk/detail_produk', $data);
		}

		public function tampil_komentar($id_produk)
		{
			$data['id_produk'] = $id_produk;
			$data['row'] = $this->m_komentar->tampil_komentar($id_produk);
			$this->template->load('template', 'komentar/data_komentar', $data);
		}
	}