<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct () {
		parent::__construct();


		$this->load->model('login_model');
		$this->load->library('pagination');
		$this->load->library('user_validations');
		$this->load->helper('url');

	}

	function login_check(){

		$get_user_info ='';
		$data['errors'] = '';

		$user_access = $this->login_model->check_user_login();
		//print_r($user_access);




		if(is_array($user_access))
		{

			$newdata = array( 'name'  => 'userlogin',
							  'user'  => $user_access[0],
			);
			$this->session->set_userdata($newdata);

			$login_data = $this->session->userdata('user');

			//$active_user_id = $this->session->userdata('active_user_id');
			if(isset($login_data['user_id']) && $login_data['user_id'] !=''){

			$get_user_info =  $this->login_model->get_userprofile_info($login_data['user_id']);

			}

			if(!$get_user_info)
				$this->session->set_userdata(array('header_action' => 'user_profile'));


			$return_json['sucuss'] ='sucuss';

		} else {
			$return_json['errors'] = 'failure';
			$return_json['data'] =$user_access;
		}

		echo json_encode($return_json);
	}


	function active_account(){
		$user_id = base64_decode($this->uri->segment(3));

		$status['status'] = $this->login_model->active_status($user_id);

		if(is_bool($status['status'])){

			$this->session->set_userdata (array('header_action' => 'user_login', 'succuss_message' => 'You Account has been Activated succesfully, please login.'));
			redirect(base_url());

		}
	}

	public function forget_password_action(){

		$return_json= array('status' => "error");
		$data = array();
		$data['errors'] = "";

		$email = $this->login_model->forgot_password_email();

		if(is_string($email)) {
			$return_json['status'] = "failure";
			$return_json['data'] = $email;
		}else{

			$email_result = $this->login_model->forgot_password_send_email($email);

			if(is_string($email_result)){

				$return_json['status'] = "failure";
				$return_json['data'] = $email_result;
			}else if(is_bool($email_result)){
				$return_json['status'] = "sucuss";
				$return_json['data'] = "<h3>Email sent successfully!</h3>Follow the link in the email to reset your password.";
			}


		}

		echo json_encode($return_json); exit;

	}


	function change_password($id, $pw_encrypt) {


		$user_id = base64_decode($id);

		$result = $this->login_model->check_password_change_authentication($user_id, $pw_encrypt);

		$data['errors'] = '';

		//$this->load->view('template/header');
		if( count($result) > 0 ){

			//$this->load->view('change_password', $data);
			$this->session->set_userdata ( array('header_action' => 'changepassword','change_user_id' => $user_id));
			redirect('index','refresh');
		} else {
			//$data['link_errors'] = "Email Link has been Expired";
			//$this->load->view('forgot_password', $data);
		}
		//$this->load->view('template/footer');
	}

	function change_password_action() {
		$data['errors'] = "";

		$user_details = $this->login_model->change_password();


		//$this->load->view('template/header');


		if(is_string($user_details) )
		{
			$return_json['status'] = "failure";
			$return_json['data'] = "Failure";
		} else if(is_array($user_details)) {
			//$data['success'] = "***Password Change Succesfull***";

			$return_json['status'] = "succuss";
			$return_json['data'] = "Password has been changed successfully";
		}

		echo json_encode($return_json);

	}

	function contactus(){


		$contact_details = $this->login_model->contact_us_details();
		if(is_bool($contact_details)){

			$newdata = array(  	'succuss_msg'  =>'Thanks for contacting sample.net.');
	 		$this->session->set_userdata($newdata);
			redirect(base_url().'contactus', 'refresh');
		}
		if(is_string($contact_details)){
			$newdata = array(  	'error_msg'  => $contact_details);
			$this->session->set_userdata($newdata);
			redirect(base_url().'contactus', 'refresh');
		}

		//echo json_encode($return_json);
	}

	function logout(){

		$this->session->unset_userdata('user');
		$this->session->unset_userdata('header_action');
		$this->session->unset_userdata('selected_country');

		$this->session->sess_destroy();
		redirect(base_url(),'refresh');

	}


}
