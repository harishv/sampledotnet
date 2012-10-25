<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller {

	function __construct () {
		parent::__construct();

		// Load the necessary stuff...
		$this->load->model('category_model');
		$this->load->model('product_model');
		$this->load->model('common_model');
	}

	public function product_detail($id){
		$data['product_details'] = $this->product_model->get_product_details($id);

		$data['bread_crum'] = $this->category_model->get_bread_crums($data['product_details'][0]['category_id']);
		$bread_crum = $data['bread_crum'];

		if ($bread_crum['parent_cat_id'] == 0) {
			$parent_cat_name = $bread_crum['sub_cat_name'];
			$prod_name = $data['product_details']['0']['name'];

			$url = 'prod/' . $parent_cat_name . "/" . $prod_name . "-" . $id;
			$formated_url = $this->common_model->prepare_url($url);
		} else {
			$parent_cat_name = $bread_crum['cat_name'];
			$sub_cat_name = $bread_crum['sub_cat_name'];
			$prod_name = $data['product_details']['0']['name'];

			$url = 'prod/' . $parent_cat_name . "/" . $sub_cat_name . "/" . $prod_name . "-" . $id;
			$formated_url = $this->common_model->prepare_url($url);
		}

		redirect($formated_url);
	}

	public function seo_parent_url($parent_cat_name, $prod_name_id)
	{
		// Extract Product ID from $prod_name_id
		$product_id = trim(strrchr($prod_name_id, "-"), '-');

		$this->product_views($product_id);
	}

	public function seo_child_url($parent_cat_name, $sub_cat_name, $prod_name_id)
	{
		// Extract Product ID from $prod_name_id
		$product_id = trim(strrchr($prod_name_id, "-"), '-');

		$this->product_views($product_id);
	}

	public function product_views($product_id)
	{
		$data['product_details'] = $this->product_model->get_product_details($product_id);
		$data['comments'] = $this->product_model->get_comments($product_id);

		$data['bread_crum'] = $this->category_model->get_bread_crums($data['product_details'][0]['category_id']);

		$data["countries"] = $this->common_model->get_countries();
		$data['country_names'] = $this->common_model->get_country_names($data['product_details'][0]['valid_countries']);

		$data['category'] = $this->category_model->get_category();

		$this->load->view("template/prod_header", $data);
		$this->load->view("product", $data);
		$this->load->view("template/prod_footer");
	}

	public function user_comments(){

		$url = explode('/',$_SERVER['HTTP_REFERER']);
		//$formated_url = $url[4].'/'.$url['5'].'/'.$url['6'];

		$login_data = $this->session->userdata('user');
		if(isset($login_data['user_id']) && $login_data['user_id'] !=''){
			$product_id = $this->input->post('prod_id');
			$user_id = $login_data['user_id'];
			$insert_comments = $this->product_model->insert_comments($product_id,$user_id);
			redirect('product/product_detail/'.$product_id,'refresh');
		}else{

			$newdata = array('comment_errors'  => "Please Log With Your Creditials");
			$this->session->set_userdata($newdata);
			redirect($url,'refresh');
		}



	}

}

/* End of file index.php */
/* Location: ./application/controllers/product.php */
