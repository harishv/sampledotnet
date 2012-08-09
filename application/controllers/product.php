<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller {

	function __construct () {
		parent::__construct();

		// Load the necessary stuff...
		$this->load->model('category_model');

	}

	public function index () {
		$this->load->view("template/header");
		$data['category'] = $this->category_model->get_category();
		$this->load->view("product",$data);
		$this->load->view("template/footer");
	}

}

/* End of file index.php */
/* Location: ./application/controllers/product.php */