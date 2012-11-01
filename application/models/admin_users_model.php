<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Users_Model extends CI_Model {

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}

	function get_users(){

		$query = $this->db->query("select a.*,ref.admin_type_desc from admin a, admin_type_ref ref where a.admin_type_ref_id = ref.admin_type_id");
		//$query = $this->db->query("select * from admin ");
		if($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
		
	}

	function get_user_details($id){
		$query = $this->db->query("select * from admin a, admin_type_ref ref where a.admin_type_ref_id = ref.admin_type_id  and a.id = ".$id);
		
		if($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;

	}
	function admin_types(){
		$query = $this->db->query("select * from admin_type_ref");
		
		if($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;

	}

	function manage_user($type){

		

		$user = $this->session->userdata("admin_user");
		$current_date = date('Y-m-d H:i:s');
		$ip = $_SERVER['REMOTE_ADDR'];

		$user_id = $this->input->post('user_id');
		$username = $this->input->post('user_name');
		$email = $this->input->post('user_email');
		$password = $this->input->post('pass_name');
		$admintype = $this->input->post('type_id');
		$select_query = "select admin_email from admin";
		$where_query = " where id != ".$user_id;
		$query = $select_query.$where_query;

		if($type=="add"){
			$query_email = $this->db->query($select_query);
		}
		else
			$query_email = $this->db->query($query);


		
		if($query_email->num_rows() > 0){

			$result_mail =  $query_email->result_array();
		}

		$errors = "";
		if(trim($username) == ''){
			$errors .= "User Name shouldn't be empty<br/>";
		}if(trim($email) == ''){
			$errors .= "Email Name shouldn't be empty<br/>";
		}
		foreach($result_mail as $key=>$values){

			if($email == $values['admin_email']){
				$errors .="Email Already Exists<br/>";
			}
		}

		if(trim($password) == ''){
			$errors .="Password shouldn't be empty<br/>";
		}else if(strlen($password) < 6)
			$errors .="Password Should be greater than 6 characters<br>";
		if(trim($admintype) ==""){
			$errors .="Admin Type shouldn't be empty";
		}

		
		if($errors ==''){

			$data = array('admin_name'=>$username,
						'admin_email'=>$email,
						'password'=>md5($password),
						'admin_type_ref_id'=>$admintype,
						'modified_at'=>$current_date,
						'modified_from'=>$ip,
						'modified_by'=>$user["id"]);

			if($type == 'add'){

				$data['created_at'] = $current_date;
				$data['created_from']=$ip;
				$data['modified_by'] =0;

				$this->db->insert('admin',$data);

			}else if($type == 'edit'){

				$this->db->where('id', intval($user_id));
				$this->db->update('admin',$data);

			}
			$affected_rows = $this->db->affected_rows();
			
			if($affected_rows > 0){

				if($type == "add"){
					return $data;
				}else if($type == "edit"){
					return true;
				}

			} else {

				$errors .= "Database insertion error<br />";

			}

			

		}

		return $errors;


	}

	function change_status()
	{
		$user_id = trim($this->input->post("user_id"));
		$status_id = trim($this->input->post("status"));

		$user = $this->session->userdata("admin_user");
		$current_date = date('Y-m-d H:i:s');
		$ip = $_SERVER['REMOTE_ADDR'];

		$update_data = array ('status_id' => $status_id,
							  'modified_at' => $current_date,
							  'modified_from' => $ip,
							  'modified_by' => $user['id']);

		if ($this->db->update('admin', $update_data, array('id' => $user_id))) {
			return true;
		}

		return false;
	}


}