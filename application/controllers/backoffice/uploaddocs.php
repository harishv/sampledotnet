<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(E_ERROR);

class Uploaddocs extends CI_Controller {
    public $scribd_api_key = "3awse6c8wfkgc2ssueqjf";
    public $scribd_secret = "sec-9q4z6vzohxq6rdyn2we2zuqht8";

   public function __construct()
   {
		parent::__construct();

		// Check if admin is Logged In - Else redirect to admin-login page
		/*if(!$this->user_status->admin_is_signed_in()){
			redirect(ADMINFOLDER . '/login/index/1', 'refresh');
		} */
	}

	public function index()
	{
        $data['message'] = null;
        if($this->input->post()) {
             include_once(APPPATH.'libraries/scribd.php');
            $file_name = $_FILES['upload-file']['name'];
            if( $file_name != "" ) {
            //$path = APPPATH."./uploads/documents/" . basename($file_name);
           $path = '/var/www/personal/uploads/scribddocs/'. basename($file_name);
            //$file_type = explode('.',$file_name);
            if (! move_uploaded_file($_FILES['upload-file']['tmp_name'], $path)) {
                $data['message'] = 'Move failed. Possible duplicate?';
            } else {
                $data['message'] =  'Moved success fully';
            }

            $file_type = explode('.',$file_name);
            $UpdloadData = array();
            $UpdloadData = $this->_createIPaper($path, $file_type[1], "private");
            $UpdloadData['pdfdoc_category'] = $this->input->post('category');
            $UpdloadData['doc_type'] = $this->input->post('doctype');
            $Docsettings = $this->getThumbUrl($UpdloadData['doc_id']);
            $UploadData['thumb_url'] = $Docsettings['thumbnail_url']; 
            $UpdloadData['uploaded_date'] = date('Y-m-d');
            $this->load->model('Scribd_Documents_Model');
            $last_insert_id =  $this->Scribd_Documents_Model->add_document_details($UpdloadData);
            try  
            {  
                   if($last_insert_id == 0){
                       throw new Exception( 'Something really gone wrong', 0, $e);  
            
                       } 
            }  
            catch (Exception $e)  
            {  
            echo $e->getMessage().'<pre>'.$e->getTraceAsString().'</pre>';
            }
               
            }
        }
            if($last_insert_id > 0) {
                    echo "Uploaded success fully";
                } 
		$this->load->view("template/admin_header");
		$this->load->view("uploaddocs", $data);
		$this->load->view("template/admin_footer");
	}
     
    private function _createIPaper($File, $FileType, $Access="private")
    {
        

        if (empty($FileType))
        throw new Exception("Filetype cannot be empty");
        $Scribd = new Scribd($this->scribd_api_key,$this->scribd_secret);

        $UploadData = $Scribd->upload($File,$FileType,$Access,1);
        return $UploadData;
    }
    
    public function getThumbUrl($doc_id)
    {
        $Scribd = new Scribd($this->scribd_api_key,$this->scribd_secret);
        return $Scribd->getSettings($doc_id);
        
    }
    
}
