<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {

   public function __construct()
   {
		parent::__construct();

		// Load necessary stuff..
		$this->load->model('Admin_Products_Model');
		$this->load->model('Common_Model');
		$this->load->model('Validate');

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



	public function sample_list(){

		$data["sample_list"] = $this->Admin_Products_Model->get_samples();
		$this->load->view("template/admin_header");
		$this->load->view("admin_sample_list_view", $data);
		$this->load->view("template/admin_footer");
	}

	public function sample_manage($id = false)
	{
		// Load the error values(if any) while managing a product
		if ($id) {
			$data["sample_product"] = $this->Admin_Products_Model->get_sample_details($id);
		}

		$this->load->view("template/admin_header");
		$this->load->view("admin_products_manage_view", $data);
		$this->load->view("template/admin_footer");
	}

	public function sample_view($id= 'false'){

		if ($id) {
			$data["sample_view"] = $this->Admin_Products_Model->get_sample_view_details($id);
		}

		$this->load->view("template/admin_header");
		$this->load->view("admin_sample_view", $data);
		$this->load->view("template/admin_footer");

	}

	public function comment_manage($id='false'){


		if($id){
			$data['comment_data'] = $this->Admin_Products_Model->get_comment_details($id);
			$data['comment_status'] = $this->Admin_Products_Model->get_status();
		}
		
		$this->load->view("template/admin_header");
		$this->load->view("admin_products_comments_view", $data);
		$this->load->view("template/admin_footer");

	}

	public function comment_user_action(){

		$comment_details = $this->Admin_Products_Model->manage_comment();
		
		if (is_array($comment_details)) {
			$success = "Comment updated succesfully";

			$newdata = array( 'products_upload_success'  => $success );

			$this->session->set_userdata($newdata);

			redirect(ADMINFOLDER.'/products/products_list', 'refresh');
		}
		if( is_string($comment_details) ) {
			$errors = "Comment Add / Edit Failed for the following reasons:<br />" . $comment_details;

			$newdata = array( 'products_upload_errors'  => $errors );

			$this->session->set_userdata($newdata);

				redirect(ADMINFOLDER.'/products/comment_manage/' . $prod_id);
			}

	}


	public function product_change_status()
	{
		echo $this->Admin_Products_Model->change_status();
	}

	public function product_change_comment_status()
	{
		echo $this->Admin_Products_Model->change_comment_status();
	}

	public function category_change_status()
	{
		echo $this->Admin_Products_Model->change_category_status();
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
		// print_r($_POST);
		// echo "</pre>";
		// exit;

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

	function categories_list()
	{
		// Load the success or error values(if any)
		if($this->session->userdata('prod_cat_upload_errors')){
			$data['errors'] = $this->session->userdata('prod_cat_upload_errors');

			$newdata = array( 'prod_cat_upload_errors'  => "" );

			$this->session->set_userdata($newdata);
		}

		if($this->session->userdata('prod_cat_upload_success')){
			$data['success'] = $this->session->userdata('prod_cat_upload_success');

			$newdata = array( 'prod_cat_upload_success'  => "" );

			$this->session->set_userdata($newdata);
		}

		$data["categories"] = $this->Admin_Products_Model->get_categories(0, "modified_at", "desc", false, false, 'admin');
		// Parameters of get_categories are: parent_cat_id, order_column, order_type, active, child_flag, display{'drop_down', 'admin'}
		$this->load->view("template/admin_header");
		$this->load->view("admin_product_categories_list_view", $data);
		$this->load->view("template/admin_footer");
	}

	public function categories_manage($id = false)
	{

		// Load the error values(if any) while managing a product
		if($this->session->userdata('prod_cat_upload_errors')){
			$data['errors'] = $this->session->userdata('prod_cat_upload_errors');

			$newdata = array( 'prod_cat_upload_errors'  => "" );

			$this->session->set_userdata($newdata);
		}

		if ($id) {
			$data["category"] = $this->Admin_Products_Model->get_category_details($id);
		}

		$data["categories"] = $this->Admin_Products_Model->get_categories();

		$this->load->view("template/admin_header");
		$this->load->view("admin_product_categories_manage_view", $data);
		$this->load->view("template/admin_footer");
	}

	public function prod_cat_manage_action($type = "add")
	{
		// echo "<pre>";
		// print_r($this->input->post());
		// echo "</pre>";
		// exit();

		if ($type == "edit") {
			$prod_cat_id = $this->input->post('prod_cat_id');
		}

		$prod_cat_details = $this->Admin_Products_Model->manage_product_category($type);

		if (is_bool($prod_cat_details)) {
			$success = "Product's Category updated succesfully";

			$newdata = array( 'prod_cat_upload_success'  => $success );

			$this->session->set_userdata($newdata);

			redirect(ADMINFOLDER.'/products/categories_list', 'refresh');
		}
		if( is_string($prod_cat_details) ) {
			$errors = "Product's Category Add / Edit Failed for the following reasons:<br />" . $prod_cat_details;

			$newdata = array( 'prod_cat_upload_errors'  => $errors );

			$this->session->set_userdata($newdata);

			if($type == "add"){
				redirect(ADMINFOLDER.'/products/categories_manage');
			} else if($type == "edit"){
				redirect(ADMINFOLDER.'/products/categories_manage/' . $prod_cat_id);
			}

		} else if (is_array($prod_cat_details)) {
			$success = "Product's Category added succesfully";

			$newdata = array( 'prod_cat_upload_success'  => $success );

			$this->session->set_userdata($newdata);

			redirect(ADMINFOLDER.'/products/categories_list', 'refresh');
		}
	}

	function show_comments($prod_id)
	{
		// echo $prod_id;

		$data["comments_list"] = $this->Admin_Products_Model->get_comments($prod_id);
		$data["product"] = $this->Admin_Products_Model->get_product_details($prod_id);

		$this->load->view("template/admin_header");
		$this->load->view("admin_products_comments_list_view", $data);
		$this->load->view("template/admin_footer");
	}

}

/* End of file products.php */
/* Location: ./application/controllers/backoffice/products.php */
