<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_Model extends CI_Model {

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();

	}

	function check_user_login(){


		$username = $this->input->post('email_address'); 
		$password = $this->input->post('password');
		
		$query = "select * from users WHERE email = ? AND password = ? AND status_id = ?";
		$variables = array ($username, md5($password), 1);

		$result = $this->db->query($query, $variables);
		
		$row = $result->row_array();

		return $row;
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

		//$result =arrar();
		$email = $this->input->post('forgot_address');

		$query=$this->db->query('select * from users  where email="'.$email.'" and status_id = 1');

		if($query->num_rows > 0){
				$result_row = $query->row_array();
		}else
				$result_row = array();
		
			return $result_row;
		
		
		

		
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




}
