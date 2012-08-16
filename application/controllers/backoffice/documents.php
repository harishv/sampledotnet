<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Documents extends CI_Controller {

   public function __construct()
   {
		parent::__construct();

		// Load necessary stuff..
		$this->load->model('Admin_Documents_Model');
		$this->load->model('Common_Model');

		// Check if admin is Logged In - Else redirect to admin-login page
		if(!$this->user_status->admin_is_signed_in()){
			redirect(ADMINFOLDER . '/login/index/1', 'refresh');
		}
	}

	public function index()
	{
		$this->load->view("template/admin_header");
		$this->load->view("admin_documents_index_view");
		$this->load->view("template/admin_footer");
	}

	public function documents_list()
	{
		$data["documents"] = $this->Admin_Documents_Model->get_documents();
		$this->load->view("template/admin_header");
		$this->load->view("admin_documents_list_view", $data);
		$this->load->view("template/admin_footer");
	}

	public function documents_manage($id = false)
	{
		$data["categories"] = $this->Admin_Documents_Model->get_category();
		$data["countries"] = $this->Common_Model->get_countries();
		$this->load->view("template/admin_header");
		$this->load->view("admin_documents_manage_view", $data);
		$this->load->view("template/admin_footer");
	}

	public function documents_manage_action($type = "add")
	{
		echo "<pre>";
		print_r($this->input->post());
		print_r($_FILES);
		echo "</pre>";
	}

}

/* End of file products.php */
/* Location: ./application/controllers/backoffice/products.php */