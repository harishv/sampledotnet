<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Documents extends CI_Controller {

	public $scribd_api_key = "3awse6c8wfkgc2ssueqjf";
    public $scribd_secret = "sec-9q4z6vzohxq6rdyn2we2zuqht8";

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
		// Load the success or error values(if any)
		if($this->session->userdata('documents_upload_errors')){
			$data['errors'] = $this->session->userdata('documents_upload_errors');

			$newdata = array( 'documents_upload_errors'  => "" );

			$this->session->set_userdata($newdata);
		}

		if($this->session->userdata('documents_upload_success')){
			$data['success'] = $this->session->userdata('documents_upload_success');

			$newdata = array( 'documents_upload_success'  => "" );

			$this->session->set_userdata($newdata);
		}

		$data["documents"] = $this->Admin_Documents_Model->get_documents();
		$this->load->view("template/admin_header");
		$this->load->view("admin_documents_list_view", $data);
		$this->load->view("template/admin_footer");
	}

	public function documents_manage($id = false)
	{

		// Load the error values(if any) while managing a document
		if($this->session->userdata('documents_upload_errors')){
			$data['errors'] = $this->session->userdata('documents_upload_errors');

			$newdata = array( 'documents_upload_errors'  => "" );

			$this->session->set_userdata($newdata);
		}

		if ($id) {
			$data["document"] = $this->Admin_Documents_Model->get_document_details($id);
		}

		$data["categories"] = $this->Admin_Documents_Model->get_categories();
		$data["countries"] = $this->Common_Model->get_countries();

		$this->load->view("template/admin_header");
		$this->load->view("admin_documents_manage_view", $data);
		$this->load->view("template/admin_footer");
	}

	public function documents_manage_action($type = "add")
	{
		if ($type == "edit") {
			$doc_id = $this->input->post('doc_id');
		}

		$document_details = $this->Admin_Documents_Model->manage_document($type);

		if (is_bool($document_details)) {
			$success = "Document updated succesfully";

			$newdata = array( 'documents_upload_success'  => $success );

			$this->session->set_userdata($newdata);

			redirect(ADMINFOLDER.'/documents/documents_list', 'refresh');
		}
		if( is_string($document_details) ) {
			$errors = "Document Add / Edit Failed for the following reasons:<br />" . $document_details;

			$newdata = array( 'documents_upload_errors'  => $errors );

			$this->session->set_userdata($newdata);

			if($type == "add"){
				redirect(ADMINFOLDER.'/documents/documents_manage');
			} else if($type == "edit"){
				redirect(ADMINFOLDER.'/documents/documents_manage/' . $prod_id);
			}

		} else if (is_array($document_details)) {
			$success = "Document added succesfully";

			$newdata = array( 'documents_upload_success'  => $success );

			$this->session->set_userdata($newdata);

			redirect(ADMINFOLDER.'/documents/documents_list', 'refresh');
		}
	}

	function categories_list()
	{
		// Load the success or error values(if any)
		if($this->session->userdata('doc_cat_upload_errors')){
			$data['errors'] = $this->session->userdata('doc_cat_upload_errors');

			$newdata = array( 'doc_cat_upload_errors'  => "" );

			$this->session->set_userdata($newdata);
		}

		if($this->session->userdata('doc_cat_upload_success')){
			$data['success'] = $this->session->userdata('doc_cat_upload_success');

			$newdata = array( 'doc_cat_upload_success'  => "" );

			$this->session->set_userdata($newdata);
		}

		// Parameters of get_categories are: document_cat_id, order_column, order_type, active, child_flag, display{'drop_down', 'admin'}
		$data["categories"] = $this->Admin_Documents_Model->get_categories(0, "modified_at", "desc", false, false, 'admin');

		$this->load->view("template/admin_header");
		$this->load->view("admin_document_categories_list_view", $data);
		$this->load->view("template/admin_footer");
	}

	public function categories_manage($id = false)
	{

		// Load the error values(if any) while managing a document
		if($this->session->userdata('doc_cat_upload_errors')){
			$data['errors'] = $this->session->userdata('doc_cat_upload_errors');

			$newdata = array( 'doc_cat_upload_errors'  => "" );

			$this->session->set_userdata($newdata);
		}

		if ($id) {
			$data["category"] = $this->Admin_Documents_Model->get_category_details($id);
		}

		$data["categories"] = $this->Admin_Documents_Model->get_categories();

		$this->load->view("template/admin_header");
		$this->load->view("admin_document_categories_manage_view", $data);
		$this->load->view("template/admin_footer");
	}

	public function doc_cat_manage_action($type = "add")
	{
		if ($type == "edit") {
			$doc_cat_id = $this->input->post('doc_cat_id');
		}

		$doc_cat_details = $this->Admin_Documents_Model->manage_document_category($type);

		if (is_bool($doc_cat_details)) {
			$success = "Document's Category updated succesfully";

			$newdata = array( 'doc_cat_upload_success'  => $success );

			$this->session->set_userdata($newdata);

			redirect(ADMINFOLDER.'/documents/categories_list', 'refresh');
		}
		if( is_string($doc_cat_details) ) {
			$errors = "Document's Category Add / Edit Failed for the following reasons:<br />" . $doc_cat_details;

			$newdata = array( 'doc_cat_upload_errors'  => $errors );

			$this->session->set_userdata($newdata);

			if($type == "add"){
				redirect(ADMINFOLDER.'/documents/categories_manage');
			} else if($type == "edit"){
				redirect(ADMINFOLDER.'/documents/categories_manage/' . $doc_cat_id);
			}

		} else if (is_array($doc_cat_details)) {
			$success = "Document's Category added succesfully";

			$newdata = array( 'doc_cat_upload_success'  => $success );

			$this->session->set_userdata($newdata);

			redirect(ADMINFOLDER.'/documents/categories_list', 'refresh');
		}
	}

	public function sample_list(){

		echo "Page under construction."; exit();

		$data["sample_list"] = $this->Admin_Documents_Model->get_samples();
		$this->load->view("template/admin_header");
		$this->load->view("admin_sample_list_view", $data);
		$this->load->view("template/admin_footer");
	}

	public function document_change_status()
	{
		echo $this->Admin_Documents_Model->change_status();
	}

	public function category_change_status()
	{
		echo $this->Admin_Documents_Model->change_category_status();
	}

}

/* End of file documents.php */
/* Location: ./application/controllers/backoffice/documents.php */