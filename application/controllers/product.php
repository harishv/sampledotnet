<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller {

	function __construct () {
		parent::__construct();

		// Load the necessary stuff...
		$this->load->model('category_model');
		$this->load->model('product_model');
		$this->load->model('common_model');


	}

	public function index () {

	}
	public function product_detail(){
		$product_id = $this->uri->segment(3);

		$this->load->view("template/header");
		$data['product_details'] = $this->product_model->get_product_details($product_id);
		$data['bread_crum'] = $this->category_model->get_bread_crums($data['product_details'][0]['category_id']);

		$data['country_names'] = $this->common_model->get_country_names($data['product_details'][0]['valid_countries']);

		//$data['slider'] = $this->load->view('slider', $data, TRUE);

		$data['category'] = $this->category_model->get_category();
		$this->load->view("product",$data);
		$this->load->view("template/footer");
	}

}

/* End of file index.php */
/* Location: ./application/controllers/product.php */