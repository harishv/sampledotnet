<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Iframes extends CI_Controller {

	function __construct () {
		parent::__construct();

		// Load the necessary stuff...
		// $this->lang->load('general');

	}

	public function select () {
		$this->load->view("iframe_select");
	}
}

/* End of file iframes.php */
/* Location: ./application/controllers/iframes.php */