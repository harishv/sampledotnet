<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct()
	{
		parent::__construct();

		// Load the necessary stuff...
		// $this->lang->load('general');
		// $this->load->library('user_status');
		$this->load->model('Admin_Login_Model');

		// Check if admin user is Logged In and redirect to admin-index page
		if( $this->user_status->admin_is_signed_in() ){
			redirect(ADMINFOLDER . '/index');
		}
	}

	public function index($error = 0) {
		$data = array();

		if ($error == 1) {
			$data["errors"] = "Please Login as admininstrator to access this feature.";
		}

		if ($this->session->userdata("errors")) {
			$data["errors"] = $this->session->userdata("errors");

			$newdata = array( 'errors'  => "" );

			$this->session->set_userdata($newdata);
		}

		$this->load->view("template/admin_header");
		$this->load->view("admin_login", $data);
		$this->load->view("template/admin_footer");
	}

	public function login_process() {
		$user_access = $this->Admin_Login_Model->check_login();

		if (!$user_access) {

			$newdata = array( 'errors'  => "Invalid Login-ID or Password." );

			$this->session->set_userdata($newdata);

			redirect(ADMINFOLDER . "/login", "refresh");

		} else {
			$newdata = array( 'admin_user'  => $user_access );

			$this->session->set_userdata($newdata);

			redirect(ADMINFOLDER, "refresh");

		}

	}
}

/* End of file login.php */
/* Location: ./application/controllers/backoffice/login.php */