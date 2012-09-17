<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {

	function __construct () {
		parent::__construct();

		// Load the necessary stuff...
		$this->load->model('register_model');
		$this->load->library('pagination');
		$this->load->library('user_validations');
		$this->load->helper('url');

	}

	public function register_user() {
		
		//set default status
		$return_json= array('status' => "error");
		$data = array();
		$data['errors'] = "";
		/*$email = $this->input->post('email_add');
		$password = $this->input->post('pass');
		$re_password = $this->input->post('re_pass');*/
		
		
		$current_date = date('Y-m-d H:i:s');
		$ip = $_SERVER['REMOTE_ADDR'];

		/*if($errors != ""){

			$return_json['data'] = $errors;

		}
		else
		{
			*///check email availabuilty
			$check_status = $this->check_email_address_availability($this->input->post('email_add'));

			if($check_status === false)
			{
				$user_details = $this->register_model->register_new_user();
				
				if(is_string($user_details) )
				{
					$return_json['data'] =$user_details;
					//echo  
				}
				else //success
				{
					//echo '1';
					$return_json['status'] = "success";
					$return_json['data'] = "Thank you for signing up";
				}
			}
			else
			{
				$return_json['data'] = $check_status;
			}

		//}
		echo json_encode($return_json);
	}

	public function check_email_address_availability($emailid) {

		$result = $this->register_model->check_email_address_availability($emailid);

		if(!$result)
			return false;
		else if(trim($result->status_id) != "1")
			return "Email Address '".urldecode($emailid)."'has already been registered. Please try a different one or go to Login to access your account. ";
		else
			return urldecode($emailid)." @@ active ";
	}


	public function user_profile(){

		$return_json= array('status' => "error");
		$data = array();
		$data['errors'] = "";
		$user_profile = $this->register_model->update_user_profile();

		
		if(is_string($user_profile) ){
			$return_json['data'] =$user_profile;
		}
		else{
		$return_json['status'] = "success";
		$return_json['data'] = "Thank you for signing up";
		}

		echo json_encode($return_json);
		


	}


	


}