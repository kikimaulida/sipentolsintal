
 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_slider extends CI_Model {
	function get_slider(){
  return $this->db->get('tb_banner');
 }

	
}