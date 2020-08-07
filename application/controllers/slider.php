

<?php
	defined('BASEPATH') OR
	exit('No direct script access allowed');

	class slider extends CI_Controller {
		function __construct()
		{
			parent::__construct();
			$this->load->model('model_slider');
		}

		 public function index(){
   $data['row'] = $this->model_slider->get_slider();
                       $this->load->view('bg_slider',$data);  
}

		
	}