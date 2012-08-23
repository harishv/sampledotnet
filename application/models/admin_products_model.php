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

	function get_categories($parent_cat_id = 0, $active = true, $flag = true){

		$this->db->select('*');
		$this->db->from('prod_categories');
		$this->db->where('parent_cat_id', $parent_cat_id);

		($active) ? $this->db->where('status_id', 1) : ""; // status_id = 1 resembles Active

		$result = $this->db->get();

		if ($result->num_rows() == 0) {

			return array();

		} else {
			$categories_list = array();
			$parent_categories = $result->result_array();

			// return $parent_categories;

			if ($flag) {

				foreach ($parent_categories as $parent_category) {
					// echo $parent_category['id']."<br />";
					$parent_category['child_categories'] = $this->get_categories($parent_category['id'], $active, false);
					array_push($categories_list, $parent_category);
				}

			} else {

				return $parent_categories;

			}

			return $categories_list;

		}

		return array();

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

	function get_max_product_id()
	{
		$query = $this->db->query("SELECT max(id) as id FROM products");
		if($query->num_rows() > 0)
		{
			return $query->result_array();
		}
	}

	function manage_product($type)
	{
		extract($this->input->post());

		$user = $this->session->userdata("admin_user");
		$current_date = date('Y-m-d H:i:s');
		$ip = $_SERVER['REMOTE_ADDR'];

		$errors = "";

		$errors .= (isset($prod_name) && trim($prod_name) == "") ? "Product Name Sholdnot be empty<br />" : "";
		$errors .= (isset($prod_category_id) && (trim($prod_category_id) == "" || trim($prod_category_id) == 0)) ? "Please select a Product Category<br />" : "";
		$errors .= (isset($prod_desc) && trim($prod_desc) == "") ? "Product Description Sholdnot be empty<br />" : "";
		$errors .= (isset($valid_country_ids) && count($valid_country_ids) < 1) ? "Please select atleast one Valid Countries<br />" : "";

		// Get the Product Id and Image Id to define images names
		$max_product_id = $this->get_max_product_id();
		if($max_product_id[0]['id'] == null){
			$product_id = 1;
		} else {
			$product_id = $max_product_id[0]['id'] + 1;
		}

		// Image Uploads - Start

		// Base Upload Path Generally uploads
		$upload_path = UPLOAD_DIR;

		// Product's Images Upload path
		$upload_path .= "/" . PRODUCTS_DIR;

		if($type == "add"){
			$image_success = false;
		} else if ($type == "edit"){
			$image_success = true;
		}

		/**
		 * Uploading an image starts here
		 */
		if($_FILES['prod_image']['name'] != ""){

			// Set image flag to false first
			$image_success = false;

			// Image Base and New Names
			$base_filename = $_FILES['prod_image']['name'];
			$ext = strrchr($base_filename, ".");

			$base_filename = "product_image" . $ext;

			if($type == "add"){

				$product_image_name = "product_" . $product_id . $ext;

			} else if($type == "edit"){

				$product_image_name = $this->input->post('edit_product_image');

			}

			// Common config image values
			$config['upload_path'] = $upload_path; //$config
			$config['allowed_types'] = ALLOWED_IMG_TYPES;

			// Small Image Name
			$config['file_name']= $product_image_name;

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('prod_image')) {

				$errors .= $this->upload->display_errors();

			} else {

				if($errors == ''){

					if ($type == "edit") {
						// Check for duplicate file name issues and replace the new file with the old file.
						// ex: assume product_image_name = product_5.gif
						$addition = substr(strrchr($product_image_name, "_"), 1); // 5.gif
						$file_ext = strrchr($product_image_name, "."); // .gif
						$img_id = str_replace($file_ext, "", $addition) . "1"; // 51
						$custom_file_name = str_replace($addition, $img_id . $file_ext, $product_image_name); // product_51.gif

						// Change file permission to execlutable one
						@chmod($upload_path . "/" . $product_image_name, 0775);

						if (file_exists($upload_path . "/" . $custom_file_name)) {
							rename($upload_path . "/" . $product_image_name, $upload_path . "/" . "_part_" . $product_image_name);
							rename($upload_path . "/" . $custom_file_name, $upload_path . "/" . $product_image_name);
						}
					}

					// Change file permission to execlutable one
					@chmod($upload_path . "/" . $product_image_name, 0775);

					$thumb_image_upload['image_library'] = 'gd2';
					$thumb_image_upload['source_image'] =  $upload_path . "/" . $product_image_name;
					$thumb_image_upload['new_image'] = $upload_path . "/" . THUMBS_DIR . "/" . THUMB_EXT . $product_image_name;
					$thumb_image_upload['thumb_marker'] = "";
					$thumb_image_upload['create_thumb'] = FALSE;
					$thumb_image_upload['maintain_ratio'] = TRUE;
					$thumb_image_upload['quality']= IMAGE_QUALITY;
					$thumb_image_upload['width'] = PRODUCT_IMAGE_WIDTH;
					$thumb_image_upload['height'] = PRODUCT_IMAGE_HEIGHT;

					$this->load->library('image_lib', $thumb_image_upload);

					if (!$this->image_lib->resize())
					{
						// unlink $product_image_name
						unlink($upload_path."/".$product_image_name);

						// Replace the old existing image while edit mode if the thumb fails with the new one.
						if ($type == "edit" && file_exists($upload_path . "/" . "_part_" . $product_image_name)) {
							rename($upload_path . "/" . "_part_" . $product_image_name, $upload_path . "/" . $product_image_name);
						}

						$errors .= $this->image_lib->display_errors();

					} else {

						// Making image success flag true to represent the success.
						$image_success = true;

						// Change file permission to execlutable one
						@chmod($upload_path . "/" . THUMBS_DIR . "/" . THUMB_EXT . $product_image_name, 0775);

						// Unlink the old existing image while edit mode if the thumb creation is successful.
						if ($type == "edit" && file_exists($upload_path . "/" . "_part_" . $product_image_name)) {
							unlink($upload_path . "/" . "_part_" . $product_image_name);
						}

					}

					// unlink base_small_filename
					// unlink($upload_path."/".$base_filename);

				}
			}

		} else {
			if($image_success){
				if($type == "edit"){
					$product_image_name = $this->input->post('edit_product_image');
				}
			}
		}
		/**
		 * Uploading an image ends here.
		 */

		if($errors == "" && $image_success) {

			// Images are uploaded succesfully.
			// Insertion / Updation of Product record into the database.

			// Prepare valid countries record
			$valid_countries = implode(",", $valid_country_ids);

			$product_information = array (	'name' => $prod_name,
											'category_id' => intval($prod_category_id),
											'image' => $product_image_name,
											'description' => $prod_desc,
											'valid_countries' => $valid_countries,
											'modified_at' => $current_date,
											'modified_from' => $ip,
											'modified_by' => $user["id"] );

			if($type == "add"){

				$product_information['status_id'] = 0; // Status 0 represents Inactive
				$product_information['created_at'] = $current_date;
				$product_information['created_from'] = $ip;
				$product_information['created_by'] = $user["id"];

				$this->db->insert('products', $product_information);

			} else if ($type == "edit"){

				$this->db->where('id', intval($prod_id));
				$this->db->update('products', $product_information);

			}

			$affected_rows = $this->db->affected_rows();

			if($affected_rows > 0){

				if($type == "add"){
					return $product_information;
				} else if($type == "edit"){
					return true;
				}

			} else {

				$errors .= "Database insertion error<br />";

			}
		}

		return $errors;
	}


};


/* End of file admin_products_model.php */
/* Location: ./system/application/models/admin_products_model.php */