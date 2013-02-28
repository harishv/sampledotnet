<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

error_reporting(0);

class Documents extends CI_Controller {

	function __construct () {
		parent::__construct();

		// Load the necessary stuff...
		$this->load->library('pagination');
		$this->load->helper('url');
		$this->load->model('category_model');
		$this->load->model('common_model');
		$this->load->model('docs_category_model');
		$this->load->model('document_model');
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

		$data['documents'] = $this->docs_category_model->get_documents($cat_id = 0, $id, $config['per_page']);

		$data["countries"] = $this->common_model->get_countries();
		$data['featured_documents'] = $this->docs_category_model->get_featured_documents();
		$data['right_popular_documents'] = $this->docs_category_model->get_right_popular_documents();

		// $data['footer_category'] = $this->docs_category_model->get_footer_category();
		$data['docs_count'] = $config['total_rows'];

		if(isset($data['documents'][0]['modified_at']))
			$data['document_updated'] = $this->common_model->date_diff($data['documents'][0]['modified_at'],"NOW");

		$data['render'] = false;

		$data['page_title'] = $this->lang->line('index_title');
		$data['site_type'] = 'docs';

		$this->load->view("template/header", $data);
		$this->load->view("docs_index_view", $data);
		$this->load->view("template/footer");
	}

	public function document_detail($id){
		$data['document_details'] = $this->document_model->get_document_details($id);

		$data['bread_crum'] = $this->docs_category_model->get_bread_crums($data['document_details'][0]['category_id']);
		$bread_crum = $data['bread_crum'];
		//$data['sub_categories'] = $this->docs_category_model->get_sub_categories_breadcrums($data['bread_crum']['parent_cat_id']);


		if ($bread_crum['parent_cat_id'] == 0) {
			$parent_cat_name = $bread_crum['sub_cat_name'];
			$doc_name = $data['document_details']['0']['name'];

			$url = 'doc/' . $parent_cat_name . "/" . $doc_name . "-" . $id;
			$formated_url = $this->common_model->prepare_url($url);
		} else {
			$parent_cat_name = $bread_crum['cat_name'];
			$sub_cat_name = $bread_crum['sub_cat_name'];
			$doc_name = $data['document_details']['0']['name'];

			$url = 'doc/' . $parent_cat_name . "/" . $sub_cat_name . "/" . $doc_name . "-" . $id;
			$formated_url = $this->common_model->prepare_url($url);
		}

		redirect($formated_url);
	}

	public function seo_parent_url($parent_cat_name, $doc_name_id)
	{
		// Extract Product ID from $doc_name_id
		$document_id = trim(strrchr($doc_name_id, "-"), '-');

		$this->document_views($document_id);
	}

	public function seo_child_url($parent_cat_name, $sub_cat_name, $doc_name_id)
	{
		// Extract Product ID from $doc_name_id
		$document_id = trim(strrchr($doc_name_id, "-"), '-');

		$this->document_views($document_id);
	}

	public function document_views($document_id)
	{
		$data['update_data'] = array();

		$data['document_details'] = $this->document_model->get_document_details($document_id);


		$data['doc_name'] = $data['document_details']['0']['name'];
		$data['comments'] = $this->document_model->get_comments($document_id);

		if(isset($data['comments']) && $data['comments'] !=''){
			foreach($data['comments'] as $comment_key => $comment_values){
				$comment_updated = $this->common_model->date_diff($comment_values['modified_at'],"NOW");
				array_push($data['update_data'], $comment_updated);
			}
		}


		$data['bread_crum'] = $this->docs_category_model->get_bread_crums($data['document_details'][0]['category_id']);

		$data["countries"] = $this->common_model->get_countries();
		$data['country_names'] = $this->common_model->get_country_names(implode(',', $this->common_model->get_valid_countries($data['document_details'][0]['id'])));

		$data['category'] = $this->category_model->get_category();
		$data['doc_category'] = $this->docs_category_model->get_category();

		$cat_name = $data['bread_crum']['sub_cat_name'];

		$data['right_popular_documents'] = $this->docs_category_model->get_right_popular_documents();
		$data['footer_category'] = $this->docs_category_model->get_footer_category($data['document_details'][0]['category_id']);

		if(count($data['footer_category']) > 0){
			$data['footer_documents'] = array();
			foreach($data['footer_category'] as $values){
				array_push($data['footer_documents'], $this->docs_category_model->get_footer_documents($values['category_id']));
			}
		}

		$data['page_title'] = $data['document_details'][0]['name'] . ' | ' . $cat_name;

		$data['page_meta_data'] = '<meta property="og:image" content="' . base_url(). PROD_IMG_PATH . $data['document_details'][0]['image'] . '" />';

		// echo "<pre>"; print_r($data['footer_category']); echo "</pre>"; exit;

		$this->load->view("template/header", $data);
		$this->load->view("document", $data);
		$this->load->view("template/footer");
	}

	public function document_rating($var=''){

		$login_data = $this->session->userdata('user');

		if( !isset($login_data) || $login_data == ''){
			$return['status'] = 'login_please';
			echo json_encode($return); exit;
		}

		$document_id = $this->input->post('doc_id');
		$rating_vote = $this->input->post('vote_value');
		$rating = $this->docs_category_model->insert_rating($document_id, $rating_vote);

		if(is_bool($rating)){
			$return['status'] = 'succuss';
		} else {
			$return['status'] = 'failed';
		}

		echo json_encode($return); exit;
	}










	public function showdoc($doc_id = ''){
		$data['category'] = $this->docs_category_model->get_category();

		include_once(APPPATH.'libraries/scribd.php');
		$this->_changeStatus('public');
		$data['doc_id'] = $doc_id; //$this->uri->segment(4);
		$this->load->view("template/header");
		$this->load->view("document", $data);
		$this->load->view("template/footer");
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
		$this->load->view("template/footer");
	}

	public function slider()
	{
		$docs_list = $this->admin_documents_model->get_docs_list();
		$data['docs_list'] = $docs_list->result();
		$this->load->view("docslider", $data);
	}

	public function download_pdf($document_id){
		$document_details = $this->document_model->get_document_details($document_id);
		header('Content-disposition: attachment; filename='.$document_details[0]['name']);
		header('Content-type: application/pdf');
		readfile(base_url().'uploads/documents/'.$document_details[0]['doc_path']);
		
		
		
	}
}

/* End of file documents.php */
/* Location: ./application/controllers/documents.php */
