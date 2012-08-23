<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Common_Model extends CI_Model {

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();

	}

	function get_countries(){

		$this->db->select('*');
		$this->db->from('countries');
		$this->db->where('status_id', 1); // status_id = 2 resembles Active

		$result = $this->db->get();

		if ($result->num_rows() == 0) {
			return false;
		} else {
			return $result->result_array();
		}

		return false;

	}

	function get_prod_cat_name($cat_id)
	{
		$this->db->select('prod_cat_name');
		$this->db->from('prod_categories');
		$this->db->where('id', $cat_id);
		// $this->db->where('status_id', 1); // status_id = 2 resembles Active

		$result = $this->db->get();

		if ($result->num_rows() == 0) {
			return false;
		} else {
			$name_arr = $result->result_array();
			return $name_arr[0]['prod_cat_name'];
		}

		return false;
	}


};

/* End of file common_model.php */
/* Location: ./system/application/models/common_model.php */