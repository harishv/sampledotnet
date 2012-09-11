<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_validations {

	var $CI;

	/**
	 * Constructor
	 */
	function __construct()
	{
		// Obtain a reference to the ci super object
		$this->CI =& get_instance();

		//$this->CI->load->library('session');

	}
	
	// Validation for not null
	function is_empty($str) {
		if($str == null || $str == ""){
			return "error_1010";
		} else {
			return true;
		}
	}
	
	// validation for email
	function is_email($str) {
		if($str=="")
		{
			return "Please enter Email";
		}
		else{
			$each_emails=explode(",",$str);

			$count=1;
			foreach($each_emails as $key=>$email_ids )
			{
				if(strpos($email_ids,"<")){
					$email_name=explode("<",$email_ids);
					$email_id=explode(">",$email_name[1]);
					if(!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", trim($email_id[0]))){
						$count++;
					}
				}
				elseif(!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", trim($email_ids))){
					$count++;

				}
				if($count>1)
				return "Please enter valid Email";
			}
			if($count==1)
			return TRUE;
		}
	}
	/** validations for alphanumeric
	 * can be used for firstname,lastname etc .
	 */
	function is_alphanumeric($str)
	{
		if($str=="")
		{
			return "error_1002";
		}
		else{
			return (!preg_match("/^[a-z0-9 ]+$/ix",$str)) ? "error_1003" : TRUE;
		}
	}
	/** validations for aplhanumeric and special characters
	 * can be used for password,confirm password etc .
	 */
	function is_password($str)
	{
		if($str=="")
		{
			return "error_1004";
		}
		else{
			return (!preg_match("/^[\S]+$/ix",$str)) ? "error_1005" : TRUE;
		}
	}
	/** validations for zip
	 * can be used for zip for 5 numbers etc .
	 */
	function is_zip($str)
	{
		if($str=="")
		{
			return "error_1006";
		}
		else{
			return (!preg_match("/^[\d]{5}$/ix",$str)) ? "error_1007" : TRUE;
		}
	}
	/** validations for url
	 * can be used for url enter fields  .
	 */
	function is_validurl($str)
	{
		if($str=="")
		{
			return "error_1008";
		}
		else{
			return (!preg_match("/^(((http|https):\/\/)?)((www)?)[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(([0-9]{1,5})?\/.*)?$/ix" , $str)) ? "error_1009" : TRUE;
		}
	}
	/** function for displaying error messages
	 */
	function display_errors($err_code)
	{
		$err_msg = "";
	 foreach($err_code as $key=>$value)
	 {
	 	$err_msg .= $CI->$config->error($value)."<br />";
	 }
	 return $err_msg;
	}

}


/* End of file User_status.php */
/* Location: ./application/libraries/User_status.php */
