<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category_Model extends CI_Model {

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();

	}

	// This function is for checking the posted login values with the database table
	function get_category(){

		$this->db->select('*');
		$this->db->from('prod_categories');
		$this->db->where('parent_cat_id',0);
		$this->db->where('status_id', 1);

		$result = $this->db->get();
		//echo $this->db->last_query();exit;


		if ($result->num_rows() == 0) {
			return false;
		} else {
			return $result->result_array();
		}

		return false;
	

	}
		

};


/* End of file admin_login_model.php */
/* Location: ./system/application/models/category.php */