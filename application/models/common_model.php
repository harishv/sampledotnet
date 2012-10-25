<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Common_Model extends CI_Model {

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();

		// $this->load->helper('inflector');
	}

	function clear_string($data='')
	{
		return htmlentities(stripslashes($data));
	}

	function get_country_names($country_ids_str)
	{
		$country_ids_str = trim($country_ids_str);

		$this->db->select('name');
		$this->db->from('countries');
		$in = "`id` in ($country_ids_str)";
		$this->db->where($in);

		$names_arr = array();

		$result = $this->db->get();

		foreach ($result->result_array() as $country) {
			array_push($names_arr, $country['name']);
		}

		return $names_arr;
	}

	function get_countries(){

		$this->db->select('*');
		$this->db->from('countries');
		$this->db->where('status_id', 1); // status_id = 1 resembles Active
		$this->db->order_by('name', 'asc');

		$result = $this->db->get();

		if ($result->num_rows() == 0) {
			return false;
		} else {
			return $result->result_array();
		}

		return false;

	}

	function get_prod_cat_name($cat_id)
	{
		$this->db->select('prod_cat_name');
		$this->db->from('prod_categories');
		$this->db->where('id', $cat_id);
		// $this->db->where('status_id', 1); // status_id = 2 resembles Active

		$result = $this->db->get();

		if ($result->num_rows() == 0) {
			return false;
		} else {
			$name_arr = $result->result_array();
			return $name_arr[0]['prod_cat_name'];
		}

		return false;
	}

	function date_diff($start, $end="NOW"){

        $sdate = strtotime($start);
        $edate = strtotime($end);

        $time = $edate - $sdate;
        if($time>=0 && $time<=59) {
                // Seconds
                $timeshift = $time.' seconds ';

        } elseif($time>=60 && $time<=3599) {
                // Minutes + Seconds
                $pmin = ($edate - $sdate) / 60;
                $premin = explode('.', $pmin);

                $presec = $pmin-$premin[0];
                $sec = $presec*60;

                $timeshift = $premin[0].' minutes '.round($sec,0).' seconds ';

        } elseif($time>=3600 && $time<=86399) {
                // Hours + Minutes
                $phour = ($edate - $sdate) / 3600;
                $prehour = explode('.',$phour);

                $premin = $phour-$prehour[0];
                $min = explode('.',$premin*60);

                $presec = '0.'.$min[1];
                $sec = $presec*60;

                $timeshift = $prehour[0].' hours '.$min[0].' minutes '.round($sec,0).' seconds ';

        } elseif($time>=86400) {
                // Days + Hours + Minutes
                $pday = ($edate - $sdate) / 86400;
                $preday = explode('.',$pday);

                $phour = $pday-$preday[0];
                $prehour = explode('.',$phour*24);

                $premin = ($phour*24)-$prehour[0];
                $min = explode('.',$premin*60);

                $presec = '0.'.$min[1];
                $sec = $presec*60;

                $timeshift = $preday[0].' days '.$prehour[0].' hours '.$min[0].' minutes '.round($sec,0).' seconds ';

        }
        return $timeshift;
	}

	function prepare_url($url)
	{
		$url_arr = explode("/", $url);

		foreach ($url_arr as $index => $segment) {
			$segment = strtolower(str_replace(' ', '-', trim($segment)));
			// $segment = underscore($segment);
			// quotes_to_entities()
			$url_arr[$index] = $segment;
		}

		return implode("/", $url_arr);
	}

};

/* End of file common_model.php */
/* Location: ./system/application/models/common_model.php */