<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

   public function __construct()
   {
		parent::__construct();

		// Load necessary stuff..
		$this->load->model('Admin_Users_Model');
		$this->load->model('Common_Model');
		$this->load->model('Validate');

		// Check if admin is Logged In - Else redirect to admin-login page
		if(!$this->user_status->admin_is_signed_in()){
			redirect(ADMINFOLDER . '/login/index/1', 'refresh');
		}
	}

	public function index()
	{
		if($this->session->userdata('users_added_errors')){
			$data['errors'] = $this->session->userdata('users_added_errors');

			$newdata = array( 'users_added_errors'  => "" );

			$this->session->set_userdata($newdata);
		}

		if($this->session->userdata('users_added_success')){
			$data['success'] = $this->session->userdata('users_added_success');

			$newdata = array( 'products_upload_success'  => "" );

			$this->session->set_userdata($newdata);
		}

		$data["users_list"] = $this->Admin_Users_Model->get_users();
		

		$this->load->view("template/admin_header");
		$this->load->view("admin_users_list_view",$data);
		$this->load->view("template/admin_footer");
	}
	public function users_manage($id = false)
	{

		$data = array();
		// Load the error values(if any) while managing a product
		if($this->session->userdata('users_added_errors')){
			$data['errors'] = $this->session->userdata('users_added_errors');

			$newdata = array( 'users_added_errors'  => "" );

			$this->session->set_userdata($newdata);
		}

		if ($id) {

			$data["user_list"] = $this->Admin_Users_Model->get_user_details($id);

		}else{

			$data["userlist"] = $this->Admin_Users_Model->get_users();
		}
		
		$data["admintypes"] = $this->Admin_Users_Model->admin_types();

		$this->load->view("template/admin_header");
		$this->load->view("admin_users_manage_view", $data);
		$this->load->view("template/admin_footer");
	}

	public function admin_user_action($type = "add")
	{


		if ($type == "edit") {
			
			$user_id = $this->input->post('user_id');
			
		}
		$user_details = $this->Admin_Users_Model->manage_user($type);
		

		if (is_bool($user_details)) {
			$success = "User updated succesfully";

			$newdata = array( 'users_added_success'  => $success );

			$this->session->set_userdata($newdata);

			redirect(ADMINFOLDER.'/users', 'refresh');
		}
		if( is_string($user_details) ) {
			$errors = "User Add / Edit Failed for the following reasons:<br />" . $user_details;

			$newdata = array( 'users_added_errors'  => $errors );

			$this->session->set_userdata($newdata);

			if($type == "add"){
				redirect(ADMINFOLDER.'/users/users_manage');
			} else if($type == "edit"){
				redirect(ADMINFOLDER.'/users/users_manage/' . $user_id);
			}

		}

		else if (is_array($user_details)) {
			$success = "User added succesfully";

			$newdata = array( 'users_added_success'  => $success );

			$this->session->set_userdata($newdata);

			redirect(ADMINFOLDER.'/users', 'refresh');
		}
	}

	public function user_change_status()
	{
		echo $this->Admin_Users_Model->change_status();
	}

}