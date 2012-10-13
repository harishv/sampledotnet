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

	function get_comments($id){
		$this->db->select('*');
		$this->db->from('user_comments');
		$this->db->where('prod_id',$id);
		$result = $this->db->get();
		if ($result->num_rows() == 0) {
			return false;
		} else {
			return $result->result_array();
		}

		return false;

		
	}

	function insert_comments($id,$user_id){

		$comment = $this->input->post('comment_area');
		$data = array('user_id'=>$user_id,'prod_id'=>$id,'comments'=>$comment);
		$this->db->insert('user_comments',$data);
		return true;

		
	}
}
