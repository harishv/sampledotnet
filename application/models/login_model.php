<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_Model extends CI_Model {

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();

	}

	function check_user_login(){


		$username = $this->input->post('email_address'); 
		$password = $this->input->post('password');
		
		$query = "select * from users WHERE email = ? AND password = ? AND status_id = ?";
		$variables = array ($username, md5($password), 1);

		$result = $this->db->query($query, $variables);
		
		$row = $result->row_array();

		return $row;
	}
}