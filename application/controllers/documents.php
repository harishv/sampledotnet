<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(0);
class Documents extends CI_Controller {

	function __construct () {
		parent::__construct();
        
		// Load the necessary stuff...
		//$this->load->model('category_model');
		//$this->load->library('pagination');
		//$this->load->helper('url');


	}
    public function index(){ 


        
		$this->load->view("template/header");
		$this->load->view("docs_list",$data);
		$this->load->view("template/footer");
	}
    
    public function showDoc(){ 
        include_once(APPPATH.'libraries/scribd.php');
        $this->_changeStatus('public');
        
		$this->load->view("template/header");
		$this->load->view("document");
		$this->load->view("template/footer");
	}
    private function _changeStatus($status){
    $scribd_api_key = "3awse6c8wfkgc2ssueqjf";
    $scribd_secret = "sec-9q4z6vzohxq6rdyn2we2zuqht8";

   
    $Scribd = new Scribd($scribd_api_key,$scribd_secret);
   $Scribd->changeSettings(104311574, $title = null, $description = null, $access = $status, $license = null, 
   $parental_advisory = null, $show_ads = null, $tags = null);
    //sleep(4);
    $res = $Scribd->getSettings(104311574);
    //echo "<pre>";
   // print_r($res);
  // echo $res['access'].'---'.$status;
  // sleep(4);
    }
}
