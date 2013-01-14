<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Documents_Model extends CI_Model {

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();

	}

	function get_documents($category = 0){

		$this->db->select('*');
		$this->db->from('documents');
		$this->db->where('status_id', 1); // status_id = 1 resembles Active

		$result = $this->db->get();

		if ($result->num_rows() == 0) {
			return false;
		} else {
			return $result->result_array();
		}

		return false;

	}

	function get_category(){

		$this->db->select('*');
		$this->db->from('doc_categories');
		// $this->db->where('parent_cat_id',0);
		$this->db->where('status_id', 1); // status_id = 1 resembles Active

		$result = $this->db->get();

		if ($result->num_rows() == 0) {
			return false;
		} else {
			return $result->result_array();
		}

		return false;

	}

	function add_document_details($doc_details_array) {
		$this->db->insert('documents', $doc_details_array);
		return  $this->db->insert_id();
	}

	function get_docs_list()
	{
		$query_result = $this->db->get('scribd_documents');
		/*foreach ($query_result->result() as $row) {
			$docs_list['doc_id ']  = $row->doc_id;
			$docs_list['name '] = $row->name;
			$docs_list['access_key'] = $row->access_key;
			$docs_list['secret_password'] = $row->secret_password;
			$docs_list['pdfdoc_category'] = $row->pdfdoc_category;
			$docs_list['access '] = $row->access;
			$docs_list['thumbnail_url '] = $row->thumbnail_url;
			$docs_list['uploaded_date '] = $row->uploaded_date;
		} */

		return $query_result;
	}

};


/* End of file admin_products_model.php */
/* Location: ./system/application/models/admin_products_model.php */