<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {

	function __construct () {
		parent::__construct();

		// Load the necessary stuff...
		$this->load->model('category_model');
		$this->load->library('pagination');
		$this->load->helper('url');

	}

	public function index ($var='') {
		$data = array();

		$id = $var;

		if($id == "")
			$id = 0;

		$config['base_url'] = base_url().'index/index';
		$config['total_rows'] = $this->category_model->getAllCount();
		$config['per_page'] = 2;

		/*$config['last_link'] = '<b class="currentpage"> </b>';
		$config['first_link'] = '<b class="currentpage"> </b>';
		$config['full_tag_open'] = '<div class="pages">';
		$config['full_tag_close'] = '</div>';

		$config['prev_tag_open'] = '<b class="currentpage"> </b>';
		$config['next_tag_open'] = '<b class="currentpage"> </b>';*/
		$config['cur_tag_open']  ='<b class="currentpage">';
		$config['cur_tag_close'] ='</b>';



		$this->pagination->initialize($config);
		$data['category'] = $this->category_model->get_category();
		$data['product'] = $this->category_model->get_products($cat_id = 0,$id,$config['per_page']);
		$data['slider'] = $this->load->view('slider', $data, TRUE);

		//print_r($data);
		//exit;
		$this->load->view("template/header");
		$this->load->view("index_view",$data);
		$this->load->view("template/footer");
	}


	public function get_category_product(){

		$cat_id = $this->uri->segment(3);
		$data['product'] = $this->category_model->get_products($cat_id = 0,$id,$config['per_page']);
		$data['category'] = $this->category_model->get_category();
		$this->load->view("template/header");
		$this->load->view("category_products",$data);
		$this->load->view("template/footer");
	}

	public  function product_rating(){

		$product_id = $this->input->post('prod_id');
		$rating_vote = $this->input->post('vote_value');

		$rating = $this->category_model->insert_rating($product_id, $rating_vote);
		if(is_bool($rating)){
			$return['status'] = 'succuss';
			echo json_encode($return);exit;
		}
	}


}

/* End of file index.php */
/* Location: ./application/controllers/index.php */
