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
		$data['product'] = $this->category_model->get_products($cat_id = 0);
		$data['slider'] = $this->load->view('slider', $data, TRUE);
		$this->load->view("template/header");
		$this->load->view("index_view",$data);
		$this->load->view("template/footer");
	}

	public function get_category_product(){

		$cat_id = $this->uri->segment(3);
		$data['product'] = $this->category_model->get_products($cat_id);
		$data['category'] = $this->category_model->get_category();
		$this->load->view("template/header");
		$this->load->view("category_products",$data);
		$this->load->view("template/footer");


	}


}

/* End of file index.php */
/* Location: ./application/controllers/index.php */
