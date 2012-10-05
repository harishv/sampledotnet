<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Scribd_Documents_Model extends CI_Model {

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();

	}

	function add_document_details($doc_details_array) {
		$this->db->insert('scribd_documents', $doc_details_array);
	    return  $this->db->insert_id();  
	}

	function get_docs_list() 
	{
		$query_result = $this->db->get('scribd_documents');
		/*foreach ($query_result->result() as $row)
			{
    			 $docs_list['doc_id ']  = $row->doc_id;
    			 $docs_list['doc_title '] = $row->doc_title;
    			 $docs_list['access_key'] = $row->access_key;
    			 $docs_list['secret_password'] = $row->secret_password;
    			 $docs_list['pdfdoc_category'] = $row->pdfdoc_category;
    			 $docs_list['access '] = $row->access;
    			 $docs_list['thumbnail_url '] = $row->thumbnail_url;
    			 $docs_list['uploaded_date '] = $row->uploaded_date;

			} */
			
		return $query_result;
	}
}
