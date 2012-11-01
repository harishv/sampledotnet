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

		$query = $this->db->query("SELECT comments.*, users.first_name, users.last_name FROM comments LEFT JOIN users ON comments.user_id = users.user_id WHERE comments.prod_id =  $id AND comments.status_id = 1");

		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return false;



	}

	function insert_comments($id,$user_id){


		$comment = $this->input->post('comment_area');
		$current_date = date('Y-m-d H:i:s');
		$ip = $_SERVER['REMOTE_ADDR'];

		$data = array('user_id'=>$user_id,'prod_id'=>$id,'comments'=>$comment,'status_id'=>1,'created_at' => $current_date,
					'created_from' => $ip, 'created_by'=>$user_id,'modified_at'=>$current_date,'modified_from'=>$ip,
					'modified_by' => '0');
		$this->db->insert('comments',$data);
		return true;


	}

	
}
