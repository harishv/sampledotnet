<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {

	function __construct () {
		parent::__construct();

		// Load the necessary stuff...
		// $this->lang->load('general');

	}

	public function index () {
		
		$this->load->view("template/header");
		$data = array();
		$data['slider'] = $this->load->view('slider',$data,TRUE);
		$this->load->view("index_view",$data);
		$this->load->view("template/footer");
	}
	public function slider() {
		$this->load->view("slider1");
	}

	public function getProduct(){

		$this->load->view("template/header");
		$this->load->view("product");
		$this->load->view("template/footer");
	}
}

/* End of file index.php */
/* Location: ./application/controllers/index.php */
