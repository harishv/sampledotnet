<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_status {

	var $CI;

	/**
	 * Constructor
	 */
	function __construct()
	{
		// Obtain a reference to the ci super object
		$this->CI =& get_instance();
		
		$this->CI->load->library('session');
		
	}
	
	function is_signed_in() {
		
		return $this->CI->session->userdata('user') ? TRUE : FALSE;
		
	}

}


/* End of file User_status.php */
/* Location: ./application/libraries/User_status.php */