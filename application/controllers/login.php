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

		$data['errors'] = '';

		$user_access = $this->login_model->check_user_login();
		
		//echo $this->input->post('rememberme');exit;
		if( count($user_access) > 0 )
		{
			
			$newdata = array( 'name'  => 'userlogin',
							  'user'  => $user_access,
			);
			$this->session->set_userdata($newdata);
			$return_json['sucuss'] ='sucuss';

		} else {
			
			$return_json['sucuss'] ='failure';
		}

		echo json_encode($return_json);
	}

	function active_account(){
		$user_id = base64_decode($this->uri->segment(3));

		$status['status'] = $this->login_model->active_status($user_id);

		if(is_bool($status['status'])){

			
			$succuss = $status['status'];

			$newdata = array( 'login_errors'  => $succuss );

			$this->session->set_userdata($newdata);
			redirect(base_url());

		}
	}

	public function forget_password_action(){

		$return_json= array('status' => "error");
		$data = array();
		$data['errors'] = "";

		$email = $this->login_model->forgot_password_email();

		if (count($email) > 0) {

			$email_result = $this->login_model->forgot_password_send_email($email);

			if(is_string($email_result)){
				
				$return_json['status'] = "failure";
				$return_json['data'] = $email_result;
			}else if(is_bool($email_result)){
				$return_json['status'] = "sucuss";
				$return_json['data'] = "Email has Send Succussfully";
			}
		}else{

			$return_json['status'] = "failure";
			$return_json['data'] = "Enter Email id not exists";

				
		}

		echo json_encode($return_json);


	}


	function change_password($id, $pw_encrypt) {
		
		$user_id = base64_decode($id);

		$result = $this->login_model->check_password_change_authentication($user_id, $pw_encrypt);




		$data['errors'] = '';

		$this->load->view('template/prod_header');
		if( count($result) > 0 ){
			$data['user_id'] = $result['user_id'];
			$this->load->view('change_password', $data);
		} else {
			$data['link_errors'] = "Email Link has been Expired";
			$this->load->view('forgot_password', $data);
		}
		$this->load->view('template/prod_footer');
	}

	function change_password_action() {
		$data['errors'] = "";
		
		$user_details = $this->login_model->change_password();

		$this->load->view('template/prod_header');

		if( is_string($user_details) )
		{
			$data['pass_errors'] = $user_details;

			$this->load->view('change_password', $data);
		} else {
			//$data['success'] = "***Password Change Succesfull***";

			$this->load->view('change_password_confirm', $data);
		}

		$this->load->view('template/prod_footer');


	}
	



	function logout(){

		$this->session->unset_userdata('user');
		redirect(base_url(),'refresh');
		
	}


}
