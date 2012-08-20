<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Products_Model extends CI_Model {

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();

	}

	function get_products($category = 0){

		$this->db->select('*');
		$this->db->from('products');
		// $this->db->where('status_id', 1); // status_id = 1 resembles Active

		$result = $this->db->get();

		if ($result->num_rows() == 0) {
			return false;
		} else {
			return $result->result_array();
		}

		return false;

	}

	function get_product_details($id){

		$this->db->select('*');
		$this->db->from('products');
		$this->db->where('id', $id);

		$result = $this->db->get();

		if ($result->num_rows() == 0) {
			return false;
		} else {
			return $result->row_array();
		}

		return false;

	}

	function get_category(){

		$this->db->select('*');
		$this->db->from('prod_categories');
		// $this->db->where('parent_cat_id',0);
		$this->db->where('status_id', 1); // status_id = 2 resembles Active

		$result = $this->db->get();

		if ($result->num_rows() == 0) {
			return false;
		} else {
			return $result->result_array();
		}

		return false;

	}

	function change_status()
	{
		$product_id = trim($this->input->post("prod_id"));
		$status_id = trim($this->input->post("status"));

		$user = $this->session->userdata("admin_user");
		$current_date = date('Y-m-d H:i:s');
		$ip = $_SERVER['REMOTE_ADDR'];

		$update_data = array ('status_id' => $status_id,
							  'modified_at' => $current_date,
							  'modified_from' => $ip,
							  'modified_by' => $user['id']);

		if ($this->db->update('products', $update_data, array('id' => $product_id))) {
			return true;
		}

		return false;

	}


};


/* End of file admin_products_model.php */
/* Location: ./system/application/models/admin_products_model.php */