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
		
		$query = $this->db->query("select c.*, u.first_name from comments c, users u where c.user_id = u.user_id and  c.prod_id = ". $id ." and c.status_id = 1");
		
		if ($query->num_rows() > 0) 
			return $query->result_array();
		else 
			return false;
		

		
	}

	function insert_comments($id,$user_id){

		
		$comment = $this->input->post('comment_area');
		$data = array('user_id'=>$user_id,'prod_id'=>$id,'comments'=>$comment);
		$this->db->insert('comments',$data);
		return true;

		
	}
}
