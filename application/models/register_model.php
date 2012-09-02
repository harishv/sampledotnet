<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register_Model extends CI_Model {

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();

	}

	public function register_new_user()
	{

		
		

		$email = $this->input->post('email_add');
		$password = $this->input->post('pass');
		$re_password = $this->input->post('re_pass');
		

		$current_date = date('Y-m-d H:i:s');
		$ip = $_SERVER['REMOTE_ADDR'];



			

		$user_information = array ( 
									'email' => $email,
									'password' => md5($password),
									'status_id' => 1,
									'created_at' => $current_date,
									'created_from' => $ip,
									'created_by' => 0,
									'modified_at' => $current_date,
									'modified_from' => $ip,
									'modified_by' => 0,
									
		);

		$this->db->insert('users', $user_information);
		$affected_rows = $this->db->affected_rows();
		if($affected_rows > 0)
			return true;
	}
	public function check_email_address_availability($email,$status='1') {

		//$member_type = 1;
		$email = urldecode($email);

		$query = "SELECT * FROM users WHERE email = ? AND  status_id =".$status;
		//$variables = array ($email, 3); // 3 is delete state in db at present
		$variables = array ($email);

		$result = $this->db->query($query, $variables);
		if($result->num_rows() > 0)
			return $result->row();
		else
			return false;
	}
}
