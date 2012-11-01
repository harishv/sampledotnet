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
		$data['update_data'] = array();
		//$data = array();
		$data['product_details'] = $this->product_model->get_product_details($product_id);
		$data['comments'] = $this->product_model->get_comments($product_id);
		//echo "<pre>";print_r($data['comments']);
		if(isset($data['comments']) && $data['comments'] !=''){
			foreach($data['comments'] as $comment_key => $comment_values){
				$comment_updated = $this->common_model->date_diff($comment_values['modified_at'],"NOW");
				array_push($data['update_data'], $comment_updated);

			}

		}

		//print_r($data['update_data']);exit;
	//	$data['updated_data'] = $updated_data;
	//print_r($data['updated_data']);
		
			

		$data['bread_crum'] = $this->category_model->get_bread_crums($data['product_details'][0]['category_id']);

		$data["countries"] = $this->common_model->get_countries();
		$data['country_names'] = $this->common_model->get_country_names($data['product_details'][0]['valid_countries']);

		$data['category'] = $this->category_model->get_category();

		$cat_name = $data['bread_crum']['sub_cat_name'];

		$data['page_title'] = $data['product_details'][0]['name'] . ' | ' . $cat_name;

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

	public function grab_it_now($id='')
	{
		if ($id == '') {
			redirect(base_url(), 'refresh');
		}

		$data['category'] = $this->category_model->get_category();
		$data["countries"] = $this->common_model->get_countries();
		$data['product_details'] = $this->product_model->get_product_details($id);

		$this->load->view("template/prod_header", $data);
		$this->load->view("product_grab_view", $data);
		$this->load->view("template/prod_footer");
	}

	public function report_invalid()
	{
		$id = $this->input->post('prod_id');

		if ($id == '') {
			$result['data'] = 'No proper data';

		} else {
			$data['product_details'] = $this->product_model->get_product_details($id);

			$this->email->to('admin@sample.net');
			$this->email->cc('harish.varada@gmail.com');
			$this->email->from('admin@sample.net', 'admin');
			$this->email->subject('Product Reported Invalid');

			$message = "The following product has been reported invalid.<br><br>";
			$message .= "<b>Product Details</b>"."<br><br><br>";
			$message .= "ID : ".$data['product_details'][0]['id']."<br>";
			$message .= "Name : ".$data['product_details'][0]['name']."<br>";
			$message .= "Grab URL : ". $data['product_details'][0]['grab_url'] ."<br>";

			$this->email->message($message);
			$mail_result = $this->email->send();

			if(is_string($mail_result) ){
				$result['data'] = $mail_result;
			}
			else{
				$result['data'] = "Thank you for reporting the product as Invalid.";
			}
		}

		echo json_encode($result); exit();
	}

}

/* End of file index.php */
/* Location: ./application/controllers/product.php */
