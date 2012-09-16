<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {

	function __construct () {
		parent::__construct();

		// Load the necessary stuff...
		$this->load->model('category_model');
		$this->load->model('common_model');
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

		$config['cur_tag_open']  ='<a class="current">';
		$config['cur_tag_close'] ='</a>';

		$this->pagination->initialize($config);
		$data['category'] = $this->category_model->get_category();

		$data['product'] = $this->category_model->get_products($cat_id = 0,$id,$config['per_page']);

		$data['featured_products'] = $this->category_model->get_featured_products();
		$data['product_updated'] = $this->common_model->date_diff($data['product'][0]['modified_at'],"NOW");

		// $data['slider'] = $this->load->view('slider', $data, TRUE);

		$data['render'] = false;
		$this->load->view("template/prod_header", $data);
		$this->load->view("prod_index_view",$data);
		$this->load->view("template/prod_footer",$data);
	}

	/*public function get_left_navigation()
	{
		$this->load->view("template/prod_leftnav");
	}*/

	public function get_category_product($cat_id,$id='0'){

		$config1['base_url'] = base_url().'category/get_category_product/'.$cat_id;
		$config1['total_rows'] = $this->category_model->getCount($cat_id);
		$config1['per_page'] = 2;
		$config1['cur_tag_open']  ='<a class="current">';
		$config1['cur_tag_close'] ='</a>';

		$config1['uri_segment'] = 4;

		$this->pagination->initialize($config1);

		$data['product'] = $this->category_model->get_products($cat_id,$id,$config1['per_page']);

		$data['category'] = $this->category_model->get_category();
		$this->load->view("template/prod_header", $data);
		$this->load->view("category_products",$data);
		$this->load->view("template/prod_footer");
	}

	public  function product_rating($var=''){

		$product_id = $this->input->post('prod_id');
		$rating_vote = $this->input->post('vote_value');
		$rating = $this->category_model->insert_rating($product_id, $rating_vote);
		$data = array();

		$id = $var;

		if($id == "")
		$id=0;

		$config['base_url'] = base_url().'index/index';
		$config['total_rows'] = $this->category_model->getAllCount();
		$config['per_page'] = 2;


		$config['cur_tag_open']  ='<b class="currentpage">';
		$config['cur_tag_close'] ='</b>';



		$this->pagination->initialize($config);
		$data['category'] = $this->category_model->get_category();
		$data['product'] = $this->category_model->get_products($cat_id = 0,$id,$config['per_page']);
		$data['featured_products'] = $this->category_model->get_featured_products();
		$data['product_updated'] = $this->common_model->date_diff($data['product'][0]['modified_at'],"NOW");
		$data['slider'] = $this->load->view('slider', $data, TRUE);

		$data['render'] = true;

		if(is_bool($rating)){
			$return['page'] = $this->load->view('prod_index_view',$data,TRUE);
			$return['status'] = 'succuss';
			echo json_encode($return);exit;
		}
	}

	function email()
	{
		$this->email->from('admin@sample.net', 'Sample.net Admin');
		$this->email->to('sudhakar1214@gmail.com');
		//$this->email->cc('harishv@koderoom.com');
		// $this->email->bcc('them@their-example.com');

		$this->email->subject('Email Test');
		$this->email->message('<b>Testing</b> <br />the email class.');

		$this->email->send();

		echo $this->email->print_debugger();
	}


}

/* End of file index.php */
/* Location: ./application/controllers/index.php */
