<?php
	defined('BASEPATH') OR
	exit('No direct script access allowed');

	class Ckelas extends CI_Controller {
		function __construct()
		{
			parent::__construct();
			check_not_login();
			$this->load->model(['m_kelas', 'm_notif']);
		}

		public function index() 
		{
			$data['row'] = $this->m_kelas->tampil_kelas();
			$this->template->load('template', 'kelas/data_kelas', $data);
		}

		public function tambah()
		{
			$kelas = new stdClass();
			$kelas->id_kelas = null;
			$kelas->kelas = null;
			$data = array(
				'page' => 'tambah',
				'row' => $kelas
			);
			$this->template->load('template', 'kelas/form_kelas', $data);
		}

		public function proses()
		{
			$post = $this->input->post(null, TRUE);
			if(isset($_POST['tambah'])) 
			{
				if($this->m_kelas->check_nama($post['nama_kelas'])->num_rows() > 0 )
				{
					$this->session->set_flashdata('error', "Maaf, Nama kelas $post[nama_kelas] Sudah Ada.");
					redirect('Ckelas/tambah');
					
				}
				else
				{
					$this->m_kelas->tambah_kelas($post);
				}
				if ($this->db->affected_rows() > 0) 
				{
		          	$this->session->set_flashdata('success', "Data Berhasil Disimpan");
		        }
			} 
			else if(isset($_POST['ubah'])) 
			{			
				$this->m_kelas->ubah_kelas($post);
				if ($this->db->affected_rows() > 0) 
				{
		          	$this->session->set_flashdata('success', "Data Berhasil Diubah");
		        }
				/*if($this->m_kelas->check_nama($post['nama_kelas'])->num_rows() > 0 )
				{
					$this->session->set_flashdata('error', "Maaf, Nama kelas $post[nama_kelas] Sudah Ada.");
					redirect('Ckelas/ubah/'. $post['id_kelas']);
				}
				else
				{
				$this->m_kelas->ubah_kelas($post);
				}*/
			}

			
	           redirect('ckelas');
		}

		public function ubah($id_kelas)
		{
			$query = $this->m_kelas->tampil_kelas($id_kelas);
			if($query->num_rows() > 0)
			{
				$kelas = $query->row();
				$data = array(
					'page' => 'ubah',
					'row' => $kelas
				);
				$this->template->load('template', 'kelas/form_kelas', $data);
			}
			else
			{
				echo "<script>alert('Data tidak ditemukan');";
				echo "window.location='".site_url('ckelas')."';</script>";
			}
		}

		public function hapus_kelas($id_kelas)
		{
			$this->load->model('m_kelas');
			$this->m_kelas->hapus_kelas($id_kelas);
			if ($this->db->affected_rows() > 0) 
			{
	          	$this->session->set_flashdata('success', "Data Berhasil Dihapus");
	        }
	           redirect('ckelas');
		}
	}