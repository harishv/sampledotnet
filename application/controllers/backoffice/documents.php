<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Documents extends CI_Controller {

   public function __construct()
   {
		parent::__construct();
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
