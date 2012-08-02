<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {

	function __construct () {
		parent::__construct();

		// Load the necessary stuff...
		// $this->lang->load('general');

	}

	public function index () {
		$this->load->view("template/admin_header");
		$this->load->view("admin_index_view");
		$this->load->view("template/admin_footer");

	}
}

/* End of file index.php */
/* Location: ./application/controllers/backoffice/index.php */