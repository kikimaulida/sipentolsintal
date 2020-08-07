<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function login()
	{
		$this->load->view('login');
	}

	public function proses_login()
	{
		$post = $this->input->post(null, TRUE);
		if(isset($post['login'])) {
			$this->load->model('m_pengguna');
			$query = $this->m_pengguna->login($post);
			if($query->num_rows() > 0)
			{
				$row = $query->row();
				$dt =  $this->m_pengguna->login($post)->row();
				if($dt->status=='diterima'){
					$params = array(
						'id_pengguna' => $row->id_pengguna,
						'nama_lengkap' => $row->nama_lengkap,
						'level' => $row->level,
						'foto_pengguna' => $row->foto_pengguna,
						/*'status' => $row->status,*/
					);
					$this->session->set_userdata($params);
					$ci =& get_instance();
					$ci->load->library('fungsi');
					if ($ci->fungsi->pengguna_login()->level == "user") {
					 	redirect('Chome');
					}elseif ($ci->fungsi->pengguna_login()->level == "admin" || "pelaku usaha") {
						echo "<script>
						alert('Selamat, login berhasil');
						window.location='".site_url("Dashboard")."' </script>";
					}
				}
				elseif ($dt->status=='ditolak') {
					$this->session->set_flashdata('error', "Maaf, Anda Tidak Diizinkan Masuk!");
						redirect('auth/login');
				}else {
					$this->session->set_flashdata('error', "Maaf, tunggu verifikasi dari SIACIL TALA");
						redirect('auth/login');
				}	
			}
			else 
			{
				$this->session->set_flashdata('error', "Login gagal, username atau password salah!");
					redirect('auth/login');
			}
		}
	}

	public function logout()
	{
		$params = array('id_pengguna', 'level');
		$this->session->unset_userdata($params);
		redirect('Chome');
	}
}
