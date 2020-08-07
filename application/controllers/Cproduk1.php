<?php
	defined('BASEPATH') OR
	exit('No direct script access allowed');

	class Cproduk1 extends CI_Controller 
	{
		function __construct()
		{
			parent::__construct();
			check_not_login();
			$this->load->model(['m_produk', 'm_usaha', 'm_pengguna', 'm_komentar', 'm_notif']);
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
			
			$data['row'] = $this->m_usaha->list_usaha($id_pengguna);
			$this->template->load('template', 'produk1/utama_produk', $data);
		} 

		public function tampil_produk($id_usaha, $id_pengguna) 
		{
			$data['id_usaha'] = $id_usaha;
			$data['id_pengguna'] = $id_pengguna;
			$data['row'] = $this->m_produk->getproduk1($id_usaha);
			$this->template->load('template', 'produk1/data_produk', $data);
		} 

		public function tambah($id_usaha, $id_pengguna)
		{
			$produk = new stdClass();
			$produk->id_produk = null;
			$produk->nama_produk = null;
			$produk->deskripsi_produk = null;
			$produk->harga = null;
			$produk->foto_produk = null;
			$produk->status_produk = null;
			$produk->tgl_unggah = null;

			$query_usaha = $this->m_usaha->getusaha($id_usaha)->row_array();
			$data = array(
				'page' => 'tambah',
				'row' => $produk,
				'usaha' => $query_usaha,
				/*'pengguna' => $pengguna,*/
			);
			$this->template->load('template', 'produk1/form_produk', $data);
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
				/*$jumlah = count($_FILES['foto_produk']['name']);
				for($x=0; $x<$jumlah; $x++){}*/
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
							redirect('Cproduk1/tampil_produk/'. $post['usaha']. '/'. $post['pengguna']);
					}
					else
					{
						$error = $this->upload->display_errors();
						redirect('Cproduk1/tambah');
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
						redirect('Cproduk1/tampil_produk/'. $post['usaha']. '/'. $post['pengguna']);
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
							redirect('Cproduk1/tampil_produk/'. $post['usaha']. '/'. $post['pengguna']);
					}
					else
					{
						$error = $this->upload->display_errors();
						redirect('Cproduk1/tambah');
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
						redirect('Cproduk1/tampil_produk/'. $post['usaha']. '/'. $post['pengguna']);
				}
			}
		}

		public function ubah($id_produk, $id_usaha)
		{
			$query = $this->m_produk->getproduk($id_produk);
			$data['id_usaha'] = $id_usaha;
			if($query->num_rows() > 0)
			{
				$produk = $query->row();
				$query_usaha = $this->m_usaha->getusaha($id_usaha)->row_array();

				$data = array(
					'page' => 'ubah',
					'row' => $produk,
					'usaha' => $query_usaha,
					
				);
				$this->template->load('template', 'produk1/form_produk', $data);
			}
			else
			{
				echo "<script>alert('Data tidak ditemukan');";
				echo "window.location='".site_url('Cproduk1')."';</script>";
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
	           redirect('Cproduk1');
		}

		public function detail_produk($id_produk)
		{
			$data['row'] = $this->m_produk->getproduk($id_produk);
			$data['row1'] = $this->m_produk->fotoproduk($id_produk);
			$this->template->load('template', 'produk1/detail_produk', $data);
		}

		public function tampil_komentar($id_produk)
		{
			$data['id_produk'] = $id_produk;
			$data['row'] = $this->m_komentar->tampil_komentar($id_produk);
			$this->template->load('template', 'komentar/data_komentar', $data);
		}

		public function tambah_foto() 
		{
			$this->template->load('template', 'produk1/tambah_foto');
		} 

		public function uploadfoto($id_produk)
		{
			$this->load->model('m_produk');
			echo $jumlahData = count($_FILES['gambar']['name']);
			$data = [];
			// Lakukan Perulangan dengan maksimal ulang Jumlah File yang dipilih
			for ($i=0; $i < $jumlahData ; $i++):
				// Inisialisasi Nama,Tipe,Dll.
				$_FILES['foto_produk']['name']     = $_FILES['gambar']['name'][$i];
				$_FILES['foto_produk']['type']     = $_FILES['gambar']['type'][$i];
				$foto_produk = $_FILES['gambar']['tmp_name'][$i];
				$_FILES['foto_produk']['size']     = $_FILES['gambar']['size'][$i];

				// Konfigurasi Upload
				$config['upload_path']      = './uploads/produk/';
				$config['allowed_types']    = 'jpg|png|jpeg';
				$config['file_name']		= 'produk-'.date('ymd').'-'.substr(md5(rand()),0,10);

				$nama=$_FILES['gambar']['name'][$i];
				move_uploaded_file($foto_produk, './uploads/produk/'.$nama);
				$array = array(
					'id_produk' => $id_produk ,
					'foto_produk' => $_FILES['foto_produk']['name'] 
				);
				array_push($data,$array);
			endfor; // Penutup For
			print_r($data);
			$insert = $this->m_produk->upload($data);
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Email is not registered! </div>');
				redirect('cproduk1/detail_produk/'.$this->uri->segment(3));
		}

		public function hapus_foto($id_foto)
		{
			$data = $this->m_produk->get_foto($id_foto);
			$id_produk =$data['id_produk'];
			$this->m_produk->hapus_foto($id_foto);
			redirect('cproduk1/detail_produk/'.$id_produk);

		} 
	}