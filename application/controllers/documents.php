<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

error_reporting(0);

class Documents extends CI_Controller {

	function __construct () {
		parent::__construct();

		// Load the necessary stuff...
		$this->load->library('pagination');
		$this->load->helper('url');
		$this->load->model('category_model');
		$this->load->model('docs_category_model');
		$this->load->model('common_model');
		$this->load->model('admin_documents_model');
		$this->load->library('user_validations');
		$this->load->library('session');

	}
	public function index(){
		$data = array();

		$login_data = $this->session->userdata('user');

		if(isset($login_data['user_id']) && $login_data['user_id'] !=''){
			$data['user_profile'] = $this->common_model->get_user_profile($login_data['user_id']);
		}

		$id = $var;

		if($id == "")
			$id = 0;

		$config['base_url'] = base_url().'document/index';
		$config['total_rows'] = $this->docs_category_model->getCount();
		$config['per_page'] = 10;

		$config['first_link'] = '|<<';
		$config['last_link'] = '>>|';

		$config['cur_tag_open']  ='<a class="current">';
		$config['cur_tag_close'] ='</a>';

		$this->pagination->initialize($config);
		$data['category'] = $this->category_model->get_category();
		$data['doc_category'] = $this->docs_category_model->get_category();

		// $data['documents'] = $this->docs_category_model->get_documents($cat_id = 0, $id, $config['per_page']);
		// echo "<pre>"; print_r($data['doc_category']); exit();

		$data["countries"] = $this->common_model->get_countries();
		// $data['featured_documents'] = $this->docs_category_model->get_featured_documents();
		// $data['footer_category'] = $this->docs_category_model->get_footer_category();
		$data['docs_count'] = $config['total_rows'];

		$data['render'] = false;

		$data['page_title'] = $this->lang->line('index_title');
		$data['site_type'] = 'docs';

		$this->load->view("template/prod_header", $data);
		$this->load->view("docs_index_view", $data);
		$this->load->view("template/prod_footer");
	}

	public function showdoc($doc_id = ''){
		$data['category'] = $this->docs_category_model->get_category();

		include_once(APPPATH.'libraries/scribd.php');
		$this->_changeStatus('public');
		$data['doc_id'] = $doc_id; //$this->uri->segment(4);
		$this->load->view("template/prod_header");
		$this->load->view("document", $data);
		$this->load->view("template/prod_footer");
	}

	private function _changeStatus($status){
		$scribd_api_key = "3awse6c8wfkgc2ssueqjf";
		$scribd_secret = "sec-9q4z6vzohxq6rdyn2we2zuqht8";
		$Scribd = new Scribd($scribd_api_key,$scribd_secret);
		$Scribd->changeSettings('106358489', $title = 'Test title', $description = null, $access = $status, $license = null,
		$parental_advisory = null, $show_ads = null, $tags = null);
		$res = $Scribd->getSettings('106358489');
	}

	public function docs_list() {
		$data['category'] = $this->docs_category_model->get_category();

		$this->load->view("template/doc_header");
		$this->load->view("documents");
		$this->load->view("template/prod_footer");
	}

	public function slider()
	{
		$docs_list = $this->admin_documents_model->get_docs_list();
		$data['docs_list'] = $docs_list->result();
		$this->load->view("docslider", $data);
	}
}
