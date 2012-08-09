<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {

	function __construct () {
		parent::__construct();

		// Load the necessary stuff...
		$this->load->model('category_model');

	}

	public function index () {
		$data = array();
		$data['category'] = $this->category_model->get_category();
		$data['slider'] = $this->load->view('slider', $data, TRUE);
		$this->load->view("template/header");
		$this->load->view("index_view",$data);
		$this->load->view("template/footer");
	}


}

/* End of file index.php */
/* Location: ./application/controllers/index.php */
