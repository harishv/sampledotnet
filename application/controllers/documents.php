<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

error_reporting(0);

class Documents extends CI_Controller {

	function __construct () {
		parent::__construct();

		// Load the necessary stuff...
		//$this->load->library('pagination');
		//$this->load->helper('url');
		$this->load->model('category_model');
		$this->load->model('common_model');
		$this->load->library('user_validations');
		$this->load->library('session');

	}
	public function index(){
		$data['category'] = $this->category_model->get_category();

		$this->load->view("template/doc_header");
		$this->load->view("docs_list");
		$this->load->view("template/prod_footer");
	}

	public function showdoc($doc_id = ''){
		$data['category'] = $this->category_model->get_category();

		include_once(APPPATH.'libraries/scribd.php');
		$this->_changeStatus('public');
		$data['doc_id'] = $doc_id; //$this->uri->segment(4);
		$this->load->view("template/doc_header");
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
		$data['category'] = $this->category_model->get_category();

		$this->load->view("template/doc_header");
		$this->load->view("documents");
		$this->load->view("template/prod_footer");
	}

	public function slider()
	{
		$this->load->model('Scribd_Documents_Model');
		$docs_list = $this->Scribd_Documents_Model->get_docs_list();
		$data['docs_list'] = $docs_list->result();
		$this->load->view("docslider", $data);
	}
}
