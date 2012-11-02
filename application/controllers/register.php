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
		$email = $this->input->post('email_add');
		/*$password = $this->input->post('pass');
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
					//$return_json['data'] = "Thank you for your registration with Sampel.net.<br />Kindly check your email to complete the registration process.";
					$return_json['data'] = "Thank you for your registration with Sampel.net.<br /><br/>Message has been sent to ".$email.". Please check your inbox and follow the instructions in that message to activate your account.<br/><br/>

					If you DONT receive the activation email in 10 minutes, please check your JUNK/SPAM folder since GMAIL, YAHOO and HOTMAIL sometimes mark it as a junk mail.";
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
			return "Email Address <em>'" . urldecode($emailid) . "'</em> has already been registered.
					<br />Please try a different one or go to Login to access your account.";
		else
			return urldecode($emailid)." @@ active ";
	}

	public function user_profile(){


		$login_data = $this->session->userdata('user');

		$return_json= array('status' => "error");
		$data = array();
		$data['errors'] = "";

		$user_profile = $this->register_model->update_user_profile($login_data['user_id']);


		if(is_string($user_profile) ){
			$return_json['data'] =$user_profile;
		}
		else{
		$return_json['status'] = "success";
		$return_json['data'] = "Thank you for updating your profile.";
		}

		echo json_encode($return_json);



	}





}
