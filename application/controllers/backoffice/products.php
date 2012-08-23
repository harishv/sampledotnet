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
		// Load the success or error values(if any)
		if($this->session->userdata('products_upload_errors')){
			$data['errors'] = $this->session->userdata('products_upload_errors');

			$newdata = array( 'products_upload_errors'  => "" );

			$this->session->set_userdata($newdata);
		}

		if($this->session->userdata('products_upload_success')){
			$data['success'] = $this->session->userdata('products_upload_success');

			$newdata = array( 'products_upload_success'  => "" );

			$this->session->set_userdata($newdata);
		}

		$data["products"] = $this->Admin_Products_Model->get_products();
		$this->load->view("template/admin_header");
		$this->load->view("admin_products_list_view", $data);
		$this->load->view("template/admin_footer");
	}

	public function product_change_status()
	{
		echo $this->Admin_Products_Model->change_status();
	}

	public function products_manage($id = false)
	{

		// Load the error values(if any) while managing a product
		if($this->session->userdata('products_upload_errors')){
			$data['errors'] = $this->session->userdata('products_upload_errors');

			$newdata = array( 'products_upload_errors'  => "" );

			$this->session->set_userdata($newdata);
		}

		if ($id) {
			$data["product"] = $this->Admin_Products_Model->get_product_details($id);
		}

		$data["categories"] = $this->Admin_Products_Model->get_categories();
		$data["countries"] = $this->Common_Model->get_countries();

		$this->load->view("template/admin_header");
		$this->load->view("admin_products_manage_view", $data);
		$this->load->view("template/admin_footer");
	}

	public function products_manage_action($type = "add")
	{
		// echo "<pre>";
		// echo $type."<br />";
		// print_r($this->input->post());
		// print_r($_FILES);
		// echo "</pre>";
		// exit();

		if ($type == "edit") {
			$prod_id = $this->input->post('prod_id');
		}
		$product_details = $this->Admin_Products_Model->manage_product($type);

		if (is_bool($product_details)) {
			$success = "Product updated succesfully";

			$newdata = array( 'products_upload_success'  => $success );

			$this->session->set_userdata($newdata);

			redirect(ADMINFOLDER.'/products/products_list', 'refresh');
		}
		if( is_string($product_details) ) {
			$errors = "Product Add / Edit Failed for the following reasons:<br />" . $product_details;

			$newdata = array( 'products_upload_errors'  => $errors );

			$this->session->set_userdata($newdata);

			if($type == "add"){
				redirect(ADMINFOLDER.'/products/products_manage');
			} else if($type == "edit"){
				redirect(ADMINFOLDER.'/products/products_manage/' . $prod_id);
			}

		} else if (is_array($product_details)) {
			$success = "Product added succesfully";

			$newdata = array( 'products_upload_success'  => $success );

			$this->session->set_userdata($newdata);

			redirect(ADMINFOLDER.'/products/products_list', 'refresh');
		}
	}


}

/* End of file products.php */
/* Location: ./application/controllers/backoffice/products.php */
