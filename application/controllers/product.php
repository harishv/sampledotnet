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

		$data['product_details'] = $this->product_model->get_product_details($product_id);
		$data['comments'] = $this->product_model->get_comments($product_id);

		$data['bread_crum'] = $this->category_model->get_bread_crums($data['product_details'][0]['category_id']);

		$data["countries"] = $this->common_model->get_countries();
		$data['country_names'] = $this->common_model->get_country_names($data['product_details'][0]['valid_countries']);


		
		$data['category'] = $this->category_model->get_category();
		$this->load->view("template/prod_header", $data);
		$this->load->view("product",$data);
		$this->load->view("template/prod_footer");
	}

	public function user_comments(){

		$url = explode('/',$_SERVER['HTTP_REFERER']);
		$formated_url = $url[4].'/'.$url['5'].'/'.$url['6'];
		
		$login_data = $this->session->userdata('user');
		if(isset($login_data['user_id']) && $login_data['user_id'] !=''){
			$product_id = $this->input->post('prod_id');
			$user_id = $login_data['user_id'];
			$insert_comments = $this->product_model->insert_comments($product_id,$user_id);
			redirect('product/product_detail/'.$product_id,'refresh');
		}else{
			
			$newdata = array('comment_errors'  => "Please Log With Your Creditials");
			$this->session->set_userdata($newdata);
			redirect($formated_url,'refresh');
		}

		
		
	}
		

		
	

}

/* End of file index.php */
/* Location: ./application/controllers/product.php */
