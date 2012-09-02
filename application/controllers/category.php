<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller {

	function __construct () {
		parent::__construct();

		// Load the necessary stuff...
		$this->load->model('category_model');
		$this->load->library('pagination');
		$this->load->helper('url');

	}

	public function get_category_product($cat_id,$id='0'){



		
		$config1['base_url'] = base_url().'category/get_category_product/'.$cat_id;
		$config1['total_rows'] = $this->category_model->getCount($cat_id);
		$config1['per_page'] = 2;
		$config1['cur_tag_open']  ='<a class="current">';
		$config1['cur_tag_close'] ='</a>';

		$config1['uri_segment'] = 4;
		
		$this->pagination->initialize($config1);
		

		$data['product'] = $this->category_model->get_products($cat_id,$id,$config1['per_page']);
		$data['bread_crum'] = $this->category_model->get_bread_crums($cat_id);
		

		$data['slider'] = $this->load->view('slider', $data, TRUE);
		
		
		$data['render'] = false;
		$data['category'] = $this->category_model->get_category();
		$this->load->view("template/header");
		$this->load->view("category_products",$data);
		$this->load->view("template/footer");
	}

}
