<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Scribd_Documents_Model extends CI_Model {

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();

	}

	function add_document_details($doc_details_array){
	$this->db->insert('scribd_documents', $doc_details_array);
    return  $this->db->insert_id();  
	}
}
