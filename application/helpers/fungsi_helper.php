<?php
	/*function check_already_login()
	{
		$ci =& get_instance();
		$user_session = $ci->session->userdata('id_user');
		if($user_session)
		{
			redirect('dashboard');
		}
	}*/

	/*function check()
	{
		$ci =& get_instance();
		$user_session = $ci->session->userdata('');
		if(!$user_session)
		{
			redirect('home');
		}
	}*/

	function check_not_login()
	{
		$ci =& get_instance();
		$user_session = $ci->session->userdata('id_pengguna');
		if(!$user_session)
		{
			redirect('auth/login');
		}
	}

	function check_admin()
	{
		$ci =& get_instance();
		$ci->load->library('fungsi');
		if($ci->fungsi->pengguna_login()->level != "admin")
		{
			redirect('dashboard');
		}
	}