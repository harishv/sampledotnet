<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {

	function __construct () {
		parent::__construct();

		// Load the necessary stuff...
		$this->load->model('category_model');
		$this->load->model('common_model');
		$this->load->library('pagination');
		$this->load->helper('url');
		$this->load->library('user_validations');
		$this->load->library('session');

		$login_data = $this->session->userdata('user');
	}

	public function index ($var='') {

		$data = array();

		$login_data = $this->session->userdata('user');

		if(isset($login_data['user_id']) && $login_data['user_id'] !=''){
			$data['user_profile'] = $this->category_model->get_user_profile($login_data['user_id']);
		}

		$id = $var;

		if($id == "")
			$id = 0;

		$config['base_url'] = base_url().'index/index';
		$config['total_rows'] = $this->category_model->getCount();
		$config['per_page'] = 10;

		$config['cur_tag_open']  ='<a class="current">';
		$config['cur_tag_close'] ='</a>';
		//print_r($config);
		$this->pagination->initialize($config);
		$data['category'] = $this->category_model->get_category();

		$data['products'] = $this->category_model->get_products($cat_id = 0, $id, $config['per_page']);
		// echo "<pre>"; print_r($data['products']); exit();

		$data["countries"] = $this->common_model->get_countries();
		$data['featured_products'] = $this->category_model->get_featured_products();
		$data['footer_category'] = $this->category_model->get_footer_category();
		$data['product_count'] = $config['total_rows'];

		// print_r($data['footer_category']); exit;

		foreach($data['footer_category'] as $key=>$values){
			$data['footer_products'] = $this->category_model->get_footer_products($values['category_id']);
		}

		if(isset($data['products'][0]['modified_at']))
			$data['product_updated'] = $this->common_model->date_diff($data['products'][0]['modified_at'],"NOW");

		$data['render'] = false;
		$data['page_title'] = $this->lang->line('index_title');

		$this->load->view("template/prod_header", $data);
		$this->load->view("prod_index_view",$data);
		$this->load->view("template/prod_footer",$data);
	}

	public function redirect_to_blog_catname($cat_name)
	{
		redirect('http://blog.sample.net/US/' . $cat_name . '/');
	}

	public function redirect_to_blog_pagenum($page_num)
	{
		redirect('http://blog.sample.net/page/' . $page_num . '/');
		exit();
	}

	public function redirect_to_blog_catname_pagenum($cat_name, $page_num)
	{
		redirect('http://blog.sample.net/US' . $cat_name . '/page/' . $page_num . '/');
		exit();
	}

	public function redirect_to_blog_page($param_1, $param_2, $param_3='')
	{
		if(isset($param_3) && $param_3 !='' && $param_3 != ' '){
			redirect('http://blog.sample.net/' . $param_1 . '/' . $param_2 . '/' . $param_3 . '.html/');
			exit();
		}
		redirect('http://blog.sample.net/' . $param_1 . '/' . $param_2 . '.html/');
		exit();
	}

	public function product_rating($var=''){

		$login_data = $this->session->userdata('user');

		if( !isset($login_data) || $login_data == ''){
			$return['status'] = 'login_please';
			echo json_encode($return); exit;
		}

		$product_id = $this->input->post('prod_id');
		$rating_vote = $this->input->post('vote_value');
		$rating = $this->category_model->insert_rating($product_id, $rating_vote);

		if(is_bool($rating)){
			$return['status'] = 'succuss';
		} else {
			$return['status'] = 'failed';
		}

		echo json_encode($return); exit;
	}

	public function grab_now(){

		$id =$this->input->post('prod_id');
		$grab_url = $this->input->post('grab_url');
		$login_data = $this->session->userdata('user');
		if(isset($login_data['user_id']) && $login_data['user_id'] !=''){
			$result = $this->category_model->insert_grab($id,$grab_url,$login_data['user_id']);
			$return['status'] = 'succuss';
		}else{
			$return['status']= 'failure';
			$return['data']='Please Login with you creadtials';
		}

		echo json_encode($return);exit;
	}

	public function share_sample(){

		$return_json= array('status' => "error");
		$data = array();
		$data['errors'] = "";

		$sharesample = $this->category_model->share_sample();

		if(is_string($sharesample) ){
			$return_json['data'] =$sharesample;
		}
		else{
		$return_json['status'] = "success";
		$return_json['data'] = "Thank you for sharing a sample with Sample.net";
		}

		echo json_encode($return_json);
	}


	public function get_products($id){

		$data['footer_products'] = $this->category_model->get_footer_products($id);
		$products ='';
		if(isset($data['footer_products']) && $data['footer_products'] !=''){
			// $products .= '<div id="sliderContent" class="ui-corner-all">
			// 			    <div class="viewer ui-corner-all">
			// 			      <div class="content-conveyor ui-helper-clearfix tabs1">';
				foreach($data['footer_products'] as $product){
		$products .= "<div class='item'>
						<p class='first'>
							<span class='hgt-15px wid_100'></span>
							<img src='" . base_url() . PROD_THUMB_IMG_PATH . "thumb_" . $product['image'] ."' alt='huggies' height='98' class='one' />
							<br>
							<span class='hgt-8px wid_100'></span>
							<strong>" . $product['name'] . "</strong>
							<br>" .
							$product['description']
						. "</p>
					</div>";
				}
			// $products .= '</div>
				   //    </div>
				   //    <div id="slider"></div>
				   //  </div>';
		}

	echo $products; exit;

	}

	function set_country()
	{
		$country_id = $this->input->post('country_id');

		if($country_id != null && $country_id != ''){
			$newdata = array( 'selected_country'  => $country_id );
			$this->session->set_userdata($newdata);
		} else {
			$this->session->unset_userdata('selected_country');
		}

		echo "succuss"; exit();
	}

	function email()
	{
		$this->email->from('support@sample.net', 'Sample.net Support Team');
		// $this->email->to('sudhakar1214@gmail.com');
		$this->email->to('harish.varada@gmail.com');
		// $this->email->bcc('them@their-example.com');

		$this->email->subject('Email Test');
		$this->email->message('<b>Testing</b> <br />the email class.');

		$this->email->send();

		echo $this->email->print_debugger();
	}


}

/* End of file index.php */
/* Location: ./application/controllers/index.php */
