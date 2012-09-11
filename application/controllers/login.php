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
			return true;

		} else {
			//redirect('login/login_failed/123');
			return false;
		}
	}

	function logout(){

		$this->session->unset_userdata('user');
		redirect(base_url(),'refresh');
		
	}


}