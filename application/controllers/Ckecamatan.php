<?php
	defined('BASEPATH') OR
	exit('No direct script access allowed');

	class Ckecamatan extends CI_Controller {
		function __construct()
		{
			parent::__construct();
			check_not_login();
			$this->load->model(['m_kecamatan', 'm_notif']);
		}

		public function index() 
		{
			$data['row'] = $this->m_kecamatan->tampil_kecamatan();
			$this->template->load('template', 'kecamatan/data_kecamatan', $data);
		}

		public function tambah()
		{
			$kecamatan = new stdClass();
			$kecamatan->id_kecamatan = null;
			$kecamatan->nama_kecamatan = null;
			$data = array(
				'page' => 'tambah',
				'row' => $kecamatan
			);
			$this->template->load('template', 'kecamatan/form_kecamatan', $data);
		}

		public function proses()
		{
			$post = $this->input->post(null, TRUE);
			if(isset($_POST['tambah'])) 
			{
				if($this->m_kecamatan->check_nama($post['nama_kecamatan'])->num_rows() > 0 )
				{
					$this->session->set_flashdata('error', "Maaf, Nama Kecamatan $post[nama_kecamatan] Sudah Ada.");
					redirect('Ckecamatan/tambah');
					
				}
				else
				{
					$this->m_kecamatan->tambah_kecamatan($post);
				}
				if ($this->db->affected_rows() > 0) 
				{
		          	$this->session->set_flashdata('success', "Data Berhasil Disimpan");
		        }
			} 
			else if(isset($_POST['ubah'])) 
			{			
				$this->m_kecamatan->ubah_kecamatan($post);
				if ($this->db->affected_rows() > 0) 
				{
		          	$this->session->set_flashdata('success', "Data Berhasil Diubah");
		        }
				/*if($this->m_kecamatan->check_nama($post['nama_kecamatan'])->num_rows() > 0 )
				{
					$this->session->set_flashdata('error', "Maaf, Nama Kecamatan $post[nama_kecamatan] Sudah Ada.");
					redirect('Ckecamatan/ubah/'. $post['id_kecamatan']);
				}
				else
				{
				$this->m_kecamatan->ubah_kecamatan($post);
				}*/
			}

			
	           redirect('ckecamatan');
		}

		public function ubah($id_kecamatan)
		{
			$query = $this->m_kecamatan->tampil_kecamatan($id_kecamatan);
			if($query->num_rows() > 0)
			{
				$kecamatan = $query->row();
				$data = array(
					'page' => 'ubah',
					'row' => $kecamatan
				);
				$this->template->load('template', 'kecamatan/form_kecamatan', $data);
			}
			else
			{
				echo "<script>alert('Data tidak ditemukan');";
				echo "window.location='".site_url('ckecamatan')."';</script>";
			}
		}

		public function hapus_kecamatan($id_kecamatan)
		{
			$this->load->model('m_kecamatan');
			$this->m_kecamatan->hapus_kecamatan($id_kecamatan);
			if ($this->db->affected_rows() > 0) 
			{
	          	$this->session->set_flashdata('success', "Data Berhasil Dihapus");
	        }
	           redirect('ckecamatan');
		}
	}