<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Contactus extends CI_Controller {

	function __construct () {
		parent::__construct();

		
		$this->load->model('category_model');
		$this->load->model('common_model');
		$this->load->model('login_model');
		$this->load->library('user_validations');
		$this->load->library('session');

	}
	public function index(){
		$data['category'] = $this->category_model->get_category();
		$data["countries"] = $this->common_model->get_countries();
		$this->load->view("template/header",$data);
		$this->load->view("contactus");
		$this->load->view("template/footer");
	}
}