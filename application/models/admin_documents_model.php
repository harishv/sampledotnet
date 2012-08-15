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


};


/* End of file admin_products_model.php */
/* Location: ./system/application/models/admin_products_model.php */