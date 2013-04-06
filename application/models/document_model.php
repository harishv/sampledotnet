<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Document_Model extends CI_Model {

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}

	function get_document_details($id){
		$this->db->select('*');
		$this->db->from('documents');
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

		$query = $this->db->query("SELECT doc_comments.*, users.first_name, users.last_name FROM doc_comments LEFT JOIN users ON doc_comments.user_id = users.user_id WHERE doc_comments.doc_id =  $id AND doc_comments.status_id = 1");

		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return false;

	}

	function insert_comments($id,$user_id){


		$comment = $this->input->post('comment_area');
		$current_date = date('Y-m-d H:i:s');
		$ip = $_SERVER['REMOTE_ADDR'];

		$data = array('user_id'=>$user_id,'doc_id'=>$id,'comments'=>$comment,'status_id'=>1,'created_at' => $current_date,
					'created_from' => $ip, 'created_by'=>$user_id,'modified_at'=>$current_date,'modified_from'=>$ip,
					'modified_by' => '0');
		$this->db->insert('comments',$data);
		return true;


	}


	function insert_payment_details(){
		$details = $this->session->userdata['payment_details'];
		$data = array('name'=>$details['name'] , 'email'=>$details['email'] , 'phone' => $details['phone'] , 'price' => $details['price'] ,'doc_id' => $details['doc_id']);
		$this->db->insert('transaction',$data);
		return true;


	}

	
}
