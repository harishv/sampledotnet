<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Validate extends CI_Model {

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();

	}

	function is_empty($data)
	{
		return ($data == null || strlen(trim($data)) < 1) ? false : true;
	}

	function is_valid_url($data)
	{
		if (!$this->is_empty($data)) {
			return false;
		}

		$url_regex = "/^(((http|https):\/\/)?)((www)?)[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(([0-9]{1,5})?\/.*)?$/i";
		return preg_match($url_regex, trim($data));
	}

	function is_valid_email($data)
	{
		if (!$this->is_empty($data)) {
			return false;
		}

		$email_regex = "/^[a-z0-9]+((\.[a-z0-9]+)*(\_[a-z0-9]+)*)*@[a-zA-Z]+\.(([a-zA-Z]{2,3})|([a-zA-Z]{2}\.[a-zA-Z]{2}))$/";
		$split = strstr($data, "<");

		if($split) {
			if ($split[1] == "<") {
				return false;
			} else {
				$split = ltrim($split, "<");
			}

			$email = substr($split, 0, strrpos($split, ">") - strlen($split));
			if ($email) {
				$data = $email;
			} else {
				return false;
			}
		}

		return preg_match($email_regex, trim($data));
	}

	function is_valid_multi_email($data)
	{
		if (!$this->is_empty($data)) {
			return false;
		}

		$emails = explode(",", $data);

		foreach ($emails as $email) {
			if (!$this->is_valid_email($email)) return false;
		}

		return true;
	}

};

/* End of file validate.php */
/* Location: ./system/application/models/validate.php */