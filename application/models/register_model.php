<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register_Model extends CI_Model {

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();

	}

	public function register_new_user()
	{



		$errors = '';

		$first_name = $this->input->post('first_name');


		$last_name = $this->input->post('last_name');
		$email = $this->input->post('email_add');
		$password = $this->input->post('pass');
		$re_password = $this->input->post('re_pass');


		$current_date = date('Y-m-d H:i:s');
		$ip = $_SERVER['REMOTE_ADDR'];

		if(trim($first_name) == '' ){
			$errors .= 'First Name should not be null or empty<br/>';
		}
		if(trim($last_name) == ''){
			$errors .='Last Name should not be null or empty<br/>';
		}
		$email_valid = $this->user_validations->is_email($email);


		if(is_string($email_valid))
			$errors .= $email_valid."<br/>";



		$password =$this->input->post('pass');

		$re_password = $this->input->post('re_pass');


		if( trim($password) == ""){
			$errors .= "Password should not be null or empty.<br/>";
		}
		else if((trim($re_password) == "") || ($re_password !== $password)){
			$errors .= "Password and Verify password should be same<br/>";
		}else if((strlen($re_password) < 6) && (strlen($password) < 6)){
			$errors .= "Password should contain at least 6 characters<br/>";
		}


		if($errors !=''){

			return $errors;
		}




		$user_information = array ( 'first_name' => $first_name,
									'last_name' => $last_name,
									'email' => $email,
									'password' => md5($password),
									'created_at' => $current_date,
									'created_from' => $ip,
									'created_by' => 0,
									'modified_at' => $current_date,
									'modified_from' => $ip,
									'modified_by' => 0,

		);


		$this->db->insert('users', $user_information);
		$last_id = $this->db->insert_id();
		$encode_last_id=base64_encode($last_id);
		$encode_last_id=rtrim($encode_last_id,"/(([=]) || ([+]))/");
		$this->email->to($email);
		$this->email->from('sampel@sample.com', 'admin');
		$this->email->subject('Welcome to Sample');
		$message_url = base_url().'login/active_account/'.$encode_last_id;
		$this->email->message($message_url);
		$mail_result = $this->email->send();



		if(!$mail_result){
			return false;
		}else{
			$affected_rows = $this->db->affected_rows();
			if($affected_rows > 0)
				return true;
			}
	}
	public function check_email_address_availability($email,$status='1') {

		//$member_type = 1;
		$email = urldecode($email);

		$query = "SELECT * FROM users WHERE email = ? AND  status_id =".$status;
		//$variables = array ($email, 3); // 3 is delete state in db at present
		$variables = array ($email);

		$result = $this->db->query($query, $variables);
		if($result->num_rows() > 0)
			return $result->row();
		else
			return false;
	}

	public function update_user_profile($user_id){


		$errors = '';
		$dob = $this->input->post('dob');
		$dob1 = explode('-',$dob); // mm-dd-yyyy
		
		$formated_dob = $dob1[2].'-'.$dob1[0].'-'.$dob1[1];
		
		
		$gender = $this->input->post('gender');
		$address1 = $this->input->post('address1');
		$address2 = $this->input->post('address2');
		$state = $this->input->post('state');
		$city = $this->input->post('city');
		$zip = $this->input->post('zip');
		$category = $this->input->post('cat_name');

		$cat_id = implode($category,',');


		if(trim($dob) == '' ){
			$errors .= 'DateOfBrith should not be null or empty<br/>';
		}
		if(trim($address1) == '' ){
			$errors .= 'Address should not be null or empty<br/>';
		}
		if(trim($address2) == '' ){
			$errors .= 'Address should not be null or empty<br/>';
		}
		if(trim($state) == '' ){
			$errors .= 'State should not be null or empty<br/>';
		}
		if(trim($city) == '' ){
			$errors .= 'City should not be null or empty<br/>';
		}

		if($errors !='')
			return $errors;


		$user_profile_information = array (
									'dob' => $formated_dob,
									'gender' => $gender,
									'address_1' => $address1,
									'address_2' => $address2,
									'category_id'=>$cat_id,
									'city' => $city,
									'state' => $state,
									'zip' => $zip,


		);

		$this->db->where('user_id' , $user_id);
		$this->db->update('users', $user_profile_information);


		$affected_rows = $this->db->affected_rows();
		if($affected_rows > 0){

			$this->session->set_userdata(array('header_action' => ''));
			return true;
		}

	}
}
