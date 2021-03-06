<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_Model extends CI_Model {

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();

	}

	function check_user_login(){

		$errors ='';
		$username = $this->input->post('email_address'); 
		$password = $this->input->post('password');
		
		$query = "select * from users WHERE email = ? AND password = ?";
		$variables = array ($username, md5($password));

		$query = $this->db->query($query, $variables);
		if($query->num_rows > 0){
			$result =$query->result_array();
			if($result[0]['status_id'] != 0){
			return $result;

			}else{
				$errors .= "Please Active Your Account";
				return $errors;
			}

		}else{
			$errors .="Please Login with Valid credentials";
			return $errors;
		}
		
		
	}
	public function active_status($user_id){

		//$error = '';
		$query = $this->db->query("select email from users where user_id=".$user_id);
	
		if($query->num_rows > 0){
			$result = $query->result_array();

		}
		
		
			$data['status_id'] = 1;
			$this->db->where('user_id',$user_id);
			$this->db->update('users',$data);
			$this->db->affected_rows();

			$this->email->to($result[0]['email']);
			$this->email->from('admin@sample.net', 'admin');
			$this->email->subject('Account activation complete on samples.net');
			$content = ACTIVATION_MAIL_CONTENT;
			$this->email->message($content);
			$mail_result = $this->email->send();
			if($mail_result)
				return true;
			return false;
		//}
	}

		function forgot_password_email() {

		$errors ='';
		$email = $this->input->post('forgot_address');

		$query=$this->db->query('select * from users  where email="'.$email.'"');

		if($query->num_rows > 0){
			$result_row = $query->row_array();

			if($result_row['status_id']!=0){
				
				return $result_row;
			}else{
				
				$errors .="Please Active your Account to change Password";
				return $errors;
				}
		}else{
			$errors .="Email entered doesn't exists.";
			return $errors;
		}
	
	}

		function forgot_password_send_email($user_data) {

		
		//$list = array($this->input->post('email'));
		
		$currtimestamp = time();

		$current_date = date('Y-m-d H:i:s');
		$ip = $_SERVER['REMOTE_ADDR'];

		$data = array (	'pw_encryption' => $currtimestamp,
						'modified_at' => $current_date,
						'modified_from' => $ip,
						'modified_by' => $user_data['user_id'],
		);

		//print_r($user_data['user_id']);

		$this->db->where('user_id', $user_data['user_id']);
		$this->db->update('users', $data);
			
		$affected_rows = $this->db->affected_rows();
			
		if($affected_rows > 0){
				
			$change_password_url = base_url()."login/change_password/".rtrim(base64_encode($user_data['user_id']), "=")."/$currtimestamp";
			//$url = base_url()."login/change_password/".rtrim(base64_encode(245), "=")."/$currtimestamp";

			$this->email->to($user_data['email']);
			$this->email->from('admin@sample.net', 'admin');
			$this->email->subject('New password request - Sample.net');

			$reset_password_link = "<a href='".$change_password_url."'>Reset your password</a>";
			$mail_content = FORGET_PASSWORD;
			$message = str_replace("!!new_password!!", $reset_password_link,$mail_content);


			$this->email->message($message);

			if ( ! $this->email->send()) {
				$result = "Email send error<br />Please click on the below link to change your password: <br />";
				$result .= anchor($change_password_url, "Click here to change password");
			} else {
				$result = true;
			}
		} else {
			$result = false;
		}
		return $result;
	}

	function check_password_change_authentication($id, $pw_encrypt) {

		$query = $this->db->query("select *  from users WHERE user_id = ".$id ." AND pw_encryption = ".$pw_encrypt);

		if($query ->num_rows > 0){
			return $query->row_array();
		}
		
	}

	function change_password() {

		
		$user_id = $this->session->userdata('change_user_id');
		//echo $user_id = $this->input->post('user_id');echo "<br/>";
		$password = $this->input->post('password');
		$re_password = $this->input->post('repassword');
		

		
		$errors = "";

		if(isset($password) && $password == ""){
			$errors .= "Password Sholdnot be empty<br />";
		}

		if(isset($password) && strlen($password) < 6){
			$errors .= "Password should  be more than 6 characters<br />";
		}

		if((isset($re_password) && $re_password == "") || ($re_password !== $password)){
			$errors .= "Please ensure you have typed in your desired password correctly in both password fields<br />";
		}

		if($errors != ""){

			return $errors;

		} else {

			$current_date = date('Y-m-d H:i:s');
			$ip = $_SERVER['REMOTE_ADDR'];

			$data = array (	'password' => md5($password),
							'pw_encryption' => '',
							'modified_at' => $current_date,
							'modified_from' => $ip,
							'modified_by' => 0,
			);

			//print_r($user_data['user_id']);

			$this->db->where('user_id', intval($user_id));
			$this->db->update('users', $data);
			
			$affected_rows = $this->db->affected_rows();

			if($affected_rows > 0){
				
				$this->session->unset_userdata('header_action');
				$this->session->unset_userdata('change_user_id');
				return $data;
			} /*else {
				$errors .= "DB Insertion error<br />";
				return $errors;
			}*/

		}

	}

	function get_userprofile_info($user_id){

		$query = $this->db->query("select * from users where user_id = ".$user_id);
		if($query ->num_rows > 0){
			$result = $query->result_array();
		}
		
		if(isset($result)){
			if($result[0]['dob'] == '' )
				return false;
			else if($result[0]['gender'] == '')
				return false;
			else if($result[0]['address_1'] == '')
				return false;
			else if($result[0]['address_2'] == '')
				return false;
			else if($result[0]['city'] == '')
				return false;
			else if($result[0]['state'] == '')
				return false;
			else if($result[0]['zip'] == '')
				return false;
			else if($result[0]['category_id'] == '')
				return false;
			else
			return true;

			
			
		}
	
	}

	function contact_us_details(){

		$current_date = date('Y-m-d H:i:s');
		$ip = $_SERVER['REMOTE_ADDR'];
		$name = $this->input->post('contact_name');
		$phone = $this->input->post('contact_phone');
		$enquiry =$this->input->post('contact_enquiry');
		$email = $this->input->post('contact_email');

		$errors = "";

		if(isset($name) && $name == ""){
			$errors .= "Name Should dnot be empty<br />";
		}
		if(isset($phone) && $phone == ""){
			$errors .= "phone Should not be empty<br />";
		}
		if(isset($enquiry) && $enquiry == ""){
			$errors .= "Enquire Should not be empty<br />";
		}

		$email_valid = $this->user_validations->is_email($email);
		if(is_string($email_valid))
			$errors .= $email_valid."<br/>";

		$data = array('name' => $name,
					'subject' => $phone,
					'email' => $email,
					'message' => $enquiry,
					'created_at' => $current_date,
					'created_from' => $ip);
		if($errors == ''){

			$this->db->insert('contact_us' ,$data);
			$affected_rows = $this->db->affected_rows();
			if($affected_rows > 0){
				$message_admin ='';
				$this->email->to('sudhakarg@koderoom.com');
				//$this->email->to('sudhakarg@koderoom.com');
				$this->email->from('admin@sample.net', 'admin');
				$this->email->subject('Contact Us - Sample.net');
				
				$message_admin .= "Name : ".$name."<br>";
				$message_admin .= "E-Mail Address : ".$email ."<br>";
				$message_admin .= "Subject: ".$phone ."<br>";
				$message_admin .= "Message : ".$enquiry ."<br>";
				
				$mail_content_admin = CONTACT_US_ADMIN;
				$message = str_replace("!!contact_us!!", $message_admin,$mail_content_admin);
				$this->email->message($message);
				$this->email->send();


				$this->email->to($email);
				$this->email->from('admin@sample.net', 'admin');
				$this->email->subject('Contact Us - Sample.net');
				$content = CONTACT_US_USER;
				$this->email->message($content);
				$result = $this->email->send();
				if($result)
					return true;
				return false;

			}
			
			//return true;
		}else
			return $errors;

	}




}
