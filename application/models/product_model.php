<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_Model extends CI_Model {

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();

	}

	function get_product_details($id){
		$this->db->select('*');
		$this->db->from('products');
		$this->db->where('id',$id);
		$this->db->where('status_id', 1); 

		$result = $this->db->get();
		if ($result->num_rows() == 0) {
			return false;
		} else {
			return $result->result_array();
		}

		return false;
	}
}
