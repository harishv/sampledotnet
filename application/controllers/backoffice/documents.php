<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Documents extends CI_Controller {

   public function __construct()
   {
		parent::__construct();

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

}

/* End of file documents.php */
/* Location: ./application/controllers/backoffice/documents.php */
