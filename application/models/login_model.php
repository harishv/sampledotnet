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
	public function active_status($user_id){

		//$error = '';
		/*$query = $this->db->query("select status from KP_User where user_id=".$user_id);
	
		if($query->num_rows > 0){
			$result = $query->result_array();

		}
		
		if($result[0]['status'] == 1 ){
				$error .= $this->config->item('e_1045');
			return $error;

		}else{*/
			$data['status_id'] = 1;
			$this->db->where('user_id',$user_id);
			$this->db->update('users',$data);
			
			$result=$this->db->affected_rows();

			/*$this->db->where('parent_id',$user_id);
			$this->db->update('KP_User',$data);
			
			$result_kids = $this->db->affected_rows();*/
			if($result)
				return true;
			return false;
		//}
	}
}