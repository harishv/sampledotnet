<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {

   public function __construct()
   {
		parent::__construct();

		// Load necessary stuff..
		$this->load->model('Admin_Products_Model');
		$this->load->model('Common_Model');

		// Check if admin is Logged In - Else redirect to admin-login page
		if(!$this->user_status->admin_is_signed_in()){
			redirect(ADMINFOLDER . '/login/index/1', 'refresh');
		}
   }

	public function index()
	{
		$this->load->view("template/admin_header");
		$this->load->view("admin_products_index_view");
		$this->load->view("template/admin_footer");
	}

	public function products_list()
	{
		$data["products"] = $this->Admin_Products_Model->get_products();
		$this->load->view("template/admin_header");
		$this->load->view("admin_products_list_view", $data);
		$this->load->view("template/admin_footer");
	}

	public function products_manage($id = false)
	{
		$data["categories"] = $this->Admin_Products_Model->get_category();
		$data["countries"] = $this->Common_Model->get_countries();
		$this->load->view("template/admin_header");
		$this->load->view("admin_products_manage_view", $data);
		$this->load->view("template/admin_footer");
	}

	public function products_manage_action($type = "add")
	{
		print_r($this->input->post());
	}


}

/* End of file products.php */
/* Location: ./application/controllers/backoffice/products.php */
