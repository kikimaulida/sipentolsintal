<?php
	defined('BASEPATH') OR
	exit('No direct script access allowed');

	class Ckelurahan extends CI_Controller {
		function __construct()
		{
			parent::__construct();
			check_not_login();
			$this->load->model(['m_kelurahan', 'm_kecamatan', 'm_notif']);
		}

		public function index() 
		{
			$data['row'] = $this->m_kelurahan->tampil_kelurahan();
			$this->template->load('template', 'kelurahan/data_kelurahan', $data);
		}

		public function tambah()
		{
			$kelurahan = new stdClass();
			$kelurahan->id_kelurahan = null;
			$kelurahan->nama_kelurahan = null;
			$kelurahan->kode_pos = null;

			$query_kecamatan = $this->m_kecamatan->tampil_kecamatan();
			$kecamatan[null] = '- Pilih Kecamatan-';
			foreach ($query_kecamatan->result() as $kcmtn) {
				$kecamatan[$kcmtn->id_kecamatan] = $kcmtn->nama_kecamatan;
			}

			$data = array(
				'page' => 'tambah',
				'row' => $kelurahan,
				'kecamatan' => $kecamatan, 'selectedkecamatan' => null,
			);
			$this->template->load('template', 'kelurahan/form_kelurahan', $data);
		}

		public function proses()
		{
			$post = $this->input->post(null, TRUE);
			if(isset($_POST['tambah'])) 
			{
				if($this->m_kelurahan->check_nama($post['nama_kelurahan'])->num_rows() > 0 )
				{
					$this->session->set_flashdata('error', "Maaf, Nama kelurahan $post[nama_kelurahan] Sudah Ada.");
					redirect('Ckelurahan/tambah');
					
				}
				else
				{
					$this->m_kelurahan->tambah_kelurahan($post);
				}
				if ($this->db->affected_rows() > 0) 
				{
		          	$this->session->set_flashdata('success', "Data Berhasil Disimpan");
		        }
			} 
			else if(isset($_POST['ubah'])) 
			{			
				$this->m_kelurahan->ubah_kelurahan($post);
				if ($this->db->affected_rows() > 0) 
				{
		          	$this->session->set_flashdata('success', "Data Berhasil Diubah");
		        }
			}
	           redirect('ckelurahan');
		}

		public function ubah($id_kelurahan)
		{
			$query = $this->m_kelurahan->tampil_kelurahan($id_kelurahan);
			if($query->num_rows() > 0)
			{
				$kelurahan = $query->row();

				$query_kecamatan = $this->m_kecamatan->tampil_kecamatan();
				$kecamatan[null] = '- Pilih Kecamatan-';
				foreach ($query_kecamatan->result() as $kcmtn) {
					$kecamatan[$kcmtn->id_kecamatan] = $kcmtn->nama_kecamatan;
				}
				$data = array(
					'page' => 'ubah',
					'row' => $kelurahan,
					'kecamatan' => $kecamatan, 'selectedkecamatan' => $kelurahan->id_kecamatan,
				);
				$this->template->load('template', 'kelurahan/form_kelurahan', $data);
			}
			else
			{
				echo "<script>alert('Data tidak ditemukan');";
				echo "window.location='".site_url('ckelurahan')."';</script>";
			}
		}

		public function hapus_kelurahan($id_kelurahan)
		{
			$this->load->model('m_kelurahan');
			$this->m_kelurahan->hapus_kelurahan($id_kelurahan);
			if ($this->db->affected_rows() > 0) 
			{
	          	$this->session->set_flashdata('success', "Data Berhasil Dihapus");
	        }
	           redirect('ckelurahan');
		}
	}