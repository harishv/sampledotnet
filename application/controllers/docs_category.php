<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Docs_Category extends CI_Controller {

	function __construct () {
		parent::__construct();

		// Load the necessary stuff...
		$this->load->model('common_model');
		$this->load->model('category_model');
		$this->load->model('docs_category_model');
		$this->load->library('pagination');
		$this->load->helper('url');

	}



	public function get_category_document($cat_id, $id='0'){



		$data["countries"] = $this->common_model->get_countries();
		$config['base_url'] = base_url().'docs_category/get_category_product/'.$cat_id;
		$config['total_rows'] = $this->docs_category_model->getCount($cat_id);
		$config['per_page'] = 10;
		$config['first_link'] = '|<<';
		$config['last_link'] = '>>|';
		$config['cur_tag_open']  ='<a class="current">';
		$config['cur_tag_close'] ='</a>';

		$config['uri_segment'] = 4;

		$this->pagination->initialize($config);
		$data['documents'] = $this->docs_category_model->get_documents($cat_id, $id, $config['per_page']);
		$data['bread_crum'] = $this->docs_category_model->get_bread_crums($cat_id);
		$data['document_count'] = $config['total_rows'];

		// echo "<pre>";print_r($data['documents']);

		//$data['slider'] = $this->load->view('slider', $data, TRUE);

		$data['render'] = false;
		$data['category'] = $this->category_model->get_category();
		$data['doc_category'] = $this->docs_category_model->get_category();
		$this->load->view("template/prod_header",$data);
		$this->load->view("category_documents",$data);
		$this->load->view("template/prod_footer");
	}

	public function get_products($id='0'){

		$cat_id = $this->input->post('cat_id');
		$country_id = $this->input->post('country_id');
		$data["countries"] = $this->common_model->get_countries();
		$config1['base_url'] = base_url().'category/get_category_product/'.$cat_id;
		$config1['total_rows'] = $this->docs_category_model->get_country_prod_count($cat_id,$country_id);
		$config1['per_page'] = 10;
		$config1['first_link'] = '|<<';
		$config1['last_link'] = '>>|';
		$config1['cur_tag_open']  ='<a class="current">';
		$config1['cur_tag_close'] ='</a>';

		$config1['uri_segment'] = 4;


		$this->pagination->initialize($config1);


		//$data['product'] = $this->docs_category_model->get_products($cat_id,$id,$config1['per_page']);
		$data['product'] = $this->docs_category_model->get_country_products($cat_id,$country_id,$id,$config1['per_page']);

		$data['bread_crum'] = $this->docs_category_model->get_bread_crums($cat_id);


		//$data['slider'] = $this->load->view('slider', $data, TRUE);
		//print_r($data['product']);exit;

		$data['render'] = true;
		$data['category'] = $this->docs_category_model->get_category();
		if(is_array($data['product'])){
			$return['page'] = $this->load->view('category_products',$data,TRUE);
			$return['status'] = 'succuss';
			echo json_encode($return);exit;
		}



	}

	public function parent_category($cat_id, $id='0'){
		// $cat_id = $id;

		$data["countries"] = $this->common_model->get_countries();
		$config1['base_url'] = base_url().'category/get_category_product/'.$cat_id;
		$config1['total_rows'] = $this->docs_category_model->getCount($cat_id);
		$config1['per_page'] = 10;
		$config1['first_link'] = '|<<';
		$config1['last_link'] = '>>|';
		$config1['cur_tag_open']  ='<a class="current">';
		$config1['cur_tag_close'] ='</a>';

		$config1['uri_segment'] = 4;

		$this->pagination->initialize($config1);
		// $data['products'] = $this->docs_category_model->get_products($cat_id, $id, $config1['per_page']);
		$data['bread_crum'] = $this->docs_category_model->get_bread_crums($cat_id);
		$data['product_count'] = $config1['total_rows'];

		//echo "<pre>";print_r($data['products']);

		//$data['slider'] = $this->load->view('slider', $data, TRUE);

		$data['render'] = false;
		$data['category'] = $this->docs_category_model->get_category();

		$data['sub_categories'] = $this->docs_category_model->get_sub_categories($cat_id);
		$this->load->view("template/prod_header",$data);
		$this->load->view("parent_category_view",$data);
		$this->load->view("template/prod_footer");
	}

}
