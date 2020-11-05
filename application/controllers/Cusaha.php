<?php
	defined('BASEPATH') OR
	exit('No direct script access allowed');

	class Cusaha extends CI_Controller {
		function __construct()
		{
			parent::__construct();
			check_not_login();
			$this->load->model(['m_usaha', 'm_pengguna', 'm_kategori', 'm_kecamatan', 'm_kelurahan', 'm_notif']);
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
			$data['row'] = $this->m_usaha->tampil_usaha($id_pengguna);
			/*var_dump($data);*/
			$this->template->load('template', 'usaha/data_usaha', $data);
		} 

		public function tambah()
		{
			$usaha = new stdClass();
			$usaha->id_usaha = null;
			$usaha->nama_usaha = null;
			$usaha->asset = null;
			$usaha->omzet = null;
			$usaha->kelas = null;
			$usaha->deskripsi = null;
			$usaha->alamat = null;
			$usaha->kode_pos = null;
			$usaha->jam_operasional = null;
			$usaha->telepon = null;
			$usaha->foto_usaha = null;
			$usaha->status = null;
			$usaha->bergabung = null;

			$level = $this->session->userdata('level');
			$id_pengguna = $this->session->userdata('id_pengguna');
			$query_pengguna = $this->m_pengguna->pemilik_usaha();
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

			$query_kategori = $this->m_kategori->tampil_kategori();
			$kategori[null] = '- Pilih Kategori -';
			foreach ($query_kategori->result() as $ktgr) {
				$kategori[$ktgr->id_kategori] = $ktgr->nama_kategori;
			}

			$kecamatan = $this->m_kecamatan->tampil_kecamatan()->result();
			
 
			$query_kelurahan = $this->m_kelurahan->tampil_kelurahan();
			$kelurahan[null] = '- Pilih Kelurahan-';
			foreach ($query_kelurahan->result() as $klrhn) {
				$kelurahan[$klrhn->id_kelurahan] = $klrhn->nama_kelurahan;
			}

			$data = array(
				'page' => 'tambah',
				'row' => $usaha,
				'pengguna' => $pengguna, 'selectedpengguna' => null,
				'kategori' => $kategori, 'selectedkategori' => null,
				'kecamatan' => $kecamatan, 'selectedkecamatan' => null,
				'kelurahan' => $kelurahan, 'selectedkelurahan' => null,
			);
			$this->template->load('template', 'usaha/form_usaha', $data);
		}

		public function proses()
		{
			$config['upload_path']		= './uploads/usaha/';
			$config['allowed_types']	= 'jpg|png|jpeg';
			$config['max_size']			= 2048;
			$config['file_name']		= 'usaha-'.date('ymd').'-'.substr(md5(rand()),0,10);
		
			$this->load->library('upload', $config);
			
			$post = $this->input->post(null, TRUE);
			if(isset($_POST['tambah'])) 
			{
				if($this->m_usaha->check_usaha($post['nama_usaha'])->num_rows() > 0 )
				{
					$this->session->set_flashdata('error', "Maaf, Nama usaha $post[nama_usaha] sudah digunakan.");
					redirect('Cusaha/tambah');
				}

				if(@$_FILES['foto_usaha']['name'] != null)
				{
					if ($this->upload->do_upload('foto_usaha'))
					{
						$post['foto_usaha'] = $this->upload->data('file_name');
						$this->m_usaha->tambah_usaha($post);
						if($this->db->affected_rows() > 0)
						{
							$this->session->set_flashdata('success', "Data Berhasil Disimpan");
						}
							redirect('cusaha');

					}
					else
					{
						$error = $this->upload->display_errors();
						redirect('cusaha/tambah');
					}
				}
				else 
				{
					$post['foto_usaha'] = null;
					$this->m_usaha->tambah_usaha($post);
					if($this->db->affected_rows() > 0)
					{
						$this->session->set_flashdata('success', "Data Berhasil Disimpan");
					}
						redirect('cusaha');
				}
			} 
			else if(isset($_POST['ubah'])) 
			{
				if(@$_FILES['foto_usaha']['name'] != null)
				{
					if ($this->upload->do_upload('foto_usaha'))
					{
						$usaha = $this->m_usaha->tampil_usaha($post['id_usaha'])->row();
						if($usaha->foto_usaha != null)
						{
							$target_file = './uploads/usaha/'.$usaha->foto_usaha;
							unlink($target_file);
						}
						$post['foto_usaha'] = $this->upload->data('file_name');
						$this->m_usaha->ubah_usaha($post);
						if($this->db->affected_rows() > 0)
						{ 
							$this->session->set_flashdata('success', "Data Berhasil Diubah");
						}
							redirect('cusaha');
					}
					else
					{
						$error = $this->upload->display_errors();
						redirect('cusaha/tambah');
					}
				}
				else 
				{
					$post['foto_usaha'] = null;
					$this->m_usaha->ubah_usaha($post);
					if($this->db->affected_rows() > 0)
					{
						$this->session->set_flashdata('success', "Data Berhasil Diubah");
					}
						redirect('cusaha');
				}
			}

		}

		public function ubah($id_usaha)
		{
			$query = $this->m_usaha->getusaha($id_usaha);
			if($query->num_rows() > 0)
			{
				$usaha = $query->row();
				$level = $this->session->userdata('level');
				$id_pengguna = $this->session->userdata('id_pengguna');
				$query_pengguna = $this->m_pengguna->pemilik_usaha();
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

				$query_kategori = $this->m_kategori->tampil_kategori();
				$kategori[null] = '- Pilih Kategori -';
				foreach ($query_kategori->result() as $ktgr) {
					$kategori[$ktgr->id_kategori] = $ktgr->nama_kategori;
				}

				/*$query_kecamatan = $this->m_kecamatan->tampil_kecamatan();
				$kecamatan[null] = '- Pilih Kecamatan-';
				foreach ($query_kecamatan->result() as $kcmtn) {
					$kecamatan[$kcmtn->id_kecamatan] = $kcmtn->nama_kecamatan;
				}*/

				$kecamatan = $this->m_kecamatan->tampil_kecamatan()->result();

				$data = array(
					'page' => 'ubah',
					'row' => $usaha,
					'pengguna' => $pengguna, 'selectedpengguna' => $usaha->id_pengguna,
					'kategori' => $kategori, 'selectedkategori' => $usaha->id_kategori,
					'kecamatan' => $kecamatan, 'selectedkecamatan' => $usaha->id_kecamatan,
				);
				$this->template->load('template', 'usaha/form_usaha', $data);
			}
			else
			{
				echo "<script>alert('Data tidak ditemukan');";
				echo "window.location='".site_url('cusaha')."';</script>";
			}
		}

		public function hapus_usaha($id_usaha)
		{
			$this->load->model('m_usaha');
			$this->m_usaha->hapus_usaha($id_usaha);
			if ($this->db->affected_rows() > 0 )
			{
				$this->session->set_flashdata('success', "Data Berhasil Dihapus");
			}
				redirect('cusaha');
		}

		public function detail_usaha($id_usaha)
		{
			$data['row'] = $this->m_usaha->getusaha($id_usaha);
			$this->template->load('template', 'usaha/detail_usaha', $data);
		}

		function status()
	    {
	        $id_usaha=$this->input->post('id_usaha');
	        $status=$this->input->post('status');
	        $this->m_usaha->status($id_usaha,$status);
	        redirect('Cusaha');        
	    }
 
	    function ambil_data()
	    {
	    	$modul = $this->input->post('modul');
	    	$id = $this->input->post('id');

	    	if ($modul == 'Kecamatan'){
	    		echo $this ->m_usaha->data_kecamatan($id);
	    	}
	    	else if ($modul == 'Kelurahan'){
	    		echo $this->m_usaha->data_pos($id);
	    	}
	    }
	}