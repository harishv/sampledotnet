<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Products_Model extends CI_Model {

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();

	}

	function get_products($category = 0){

		$result = $this->db->query("SELECT products.*,COUNT(comments.prod_id) AS comments_count FROM products LEFT JOIN comments ON products.id = comments.prod_id AND comments.status_id = 1  AND products.status_id != 2 GROUP BY products.id ORDER BY products.modified_at DESC");
		//echo $this->db->last_query();
		if ($result->num_rows() == 0) {
			return false;
		} else {
			return $result->result_array();
		}

		return false;

	}

	function get_samples(){

		$this->db->select('*');
		$this->db->from('share_sample');
		$this->db->where('status_id', 1);
		$this->db->order_by("created_at", "desc");
		// $this->db->where('status_id', 1); // status_id = 1 resembles Active

		$result = $this->db->get();

		if ($result->num_rows() == 0) {
			return false;
		} else {
			return $result->result_array();
		}

		return false;


	}

	function get_sample_view_details($id){
		$this->db->select('*');
		$this->db->from('share_sample');
		//$this->db->order_by("created_at", "desc");
		 $this->db->where('id', $id); // status_id = 1 resembles Active

		$result = $this->db->get();

		if ($result->num_rows() == 0) {
			return false;
		} else {
			return $result->result_array();
		}

		return false;


	}

	function get_comments($prod_id)
	{
		$result = $this->db->query("SELECT comments.*, users.first_name FROM comments, users WHERE comments.user_id = users.user_id AND comments.prod_id = " . $prod_id ." and comments.status_id = 1");

		if ($result->num_rows() == 0) {
			return false;
		} else {
			return $result->result_array();
		}

		return false;
	}

	function get_comment_status(){
		$result = $this->db->query("SELECT * FROM comments where status_id = 1");

		if ($result->num_rows() == 0) {
			return false;
		} else {
			return $result->result_array();
		}

		return false;
	}

	function get_comment_details($id){

		$query = $this->db->query("select * from comments where id = ".$id);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return false;

	}

	function get_status(){

		$query = $this->db->query("select * from status");
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return false;


	}

	function manage_comment(){

		$errors = '';
		$user = $this->session->userdata("admin_user");
		$current_date = date('Y-m-d H:i:s');
		$ip = $_SERVER['REMOTE_ADDR'];
		$comment_name = $this->input->post('comment_name');
		$status_id = $this->input->post('type_id');
		$comment_id = $this->input->post('comment_id');

		if(trim($comment_name) == ''){
			$errors .= "Product Name shouldn't be empty<br />";
		}

		if($errors == ''){

			$data = array('comments' => $comment_name,
							'status_id' => $status_id,
							'modified_at' =>$current_date,
							'modified_from' =>$ip,
							'modified_by'=>$user['id']);

			$this->db->where('id', intval($comment_id));
			$this->db->update('comments', $data);




			$affected_rows = $this->db->affected_rows();

			if($affected_rows > 0)
				return $data;
		}

		return $errors;

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

	function get_category_details($id){

		$this->db->select('*');
		$this->db->from('prod_categories');
		$this->db->where('id', $id);

		$result = $this->db->get();

		if ($result->num_rows() == 0) {
			return false;
		} else {
			return $result->row_array();
		}

		return false;

	}

	function get_categories($parent_cat_id = 0, $order_column = 'prod_cat_name', $order_type ='asc', $active = true, $flag = true, $display = 'drop_down'){

		$this->db->select('*');
		$this->db->from('prod_categories');
		($display != 'admin') ? $this->db->where('parent_cat_id', $parent_cat_id) : "";
		$this->db->order_by($order_column, $order_type);
		$this->db->where('status_id !=2');
		//($active) ? $this->db->where('status_id', 1) : ""; // status_id = 1 resembles Active

		$result = $this->db->get();

		if ($result->num_rows() == 0) {

			return array();

		} else {
			$categories_list = array();
			$parent_categories = $result->result_array();

			if ($display == 'admin') {
				return $parent_categories;
			}

			if ($flag) {

				foreach ($parent_categories as $parent_category) {
					$parent_category['child_categories'] = $this->get_categories($parent_category['id'], $order_column, $order_type, $active, false);
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
		$update_country_information =  array('status_id' => $status_id,
											'modified_at' => $current_date);

		if ($this->db->update('products', $update_data, array('id' => $product_id))) {
			if($this->db->update('prod_countries', $update_country_information, array('prod_id' => $product_id)))
				return true;
		}

		return false;
	}

	function sample_change_status()
	{
		$product_id = trim($this->input->post("sample_id"));
		$status_id = trim($this->input->post("status"));

		$user = $this->session->userdata("admin_user");
		$current_date = date('Y-m-d H:i:s');
		$ip = $_SERVER['REMOTE_ADDR'];

		$update_data = array ('status_id' => $status_id,
							  'modified_at' => $current_date,
							  'modified_from' => $ip,
							  'modified_by' => $user['id']);

		if ($this->db->update('share_sample', $update_data, array('id' => $product_id))) {
			return true;
		}

		return false;
	}


	function change_comment_status()
	{
		$comment_id = trim($this->input->post("comment_id"));
		$status_id = trim($this->input->post("status"));

		$update_data = array ('status_id' => $status_id);

		if ($this->db->update('comments', $update_data, array('id' => $comment_id))) {
			return true;
		}

		return false;
	}

	function change_category_status()
	{
		$prod_cat_id = trim($this->input->post("prod_cat_id"));
		$status_id = trim($this->input->post("status"));

		$user = $this->session->userdata("admin_user");
		$current_date = date('Y-m-d H:i:s');
		$ip = $_SERVER['REMOTE_ADDR'];

		$update_data = array ('status_id' => $status_id,
							  'modified_at' => $current_date,
							  'modified_from' => $ip,
							  'modified_by' => $user['id']);

		if ($this->db->update('prod_categories', $update_data, array('id' => $prod_cat_id))) {
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

	function cleanText($str){

		$str = str_replace("Ñ" ,"&#209;", $str);
		//$str =  preg_replace('/Ñ/g',"|&#209;|", $str);

		//echo "Text BEGIN ".$str."  --- ".bin2hex ("Ñ")."\n<BR>";     // d1

		/*
		for($i = 0 ; $i < strlen($str) ; $i++){
		echo "".$str{$i}."  - ". bin2hex ( $str{$i})."<BR>";
		}
		*/

		$str = str_replace("ñ" ,"&#241;", $str);
		$str = str_replace("ñ" ,"&#241;", $str);
		$str = str_replace("Á","&#193;", $str);
		$str = str_replace("á","&#225;", $str);
		$str = str_replace("É","&#201;", $str);
		$str = str_replace("é","&#233;", $str);

		$str = str_replace("ú","&#250;", $str);

		$str = str_replace("ù","&#249;", $str);
		$str = str_replace("Í","&#205;", $str);
		$str = str_replace("í","&#237;", $str);
		$str = str_replace("Ó","&#211;", $str);
		$str = str_replace("ó","&#243;", $str);
		$str = str_replace("“","&#8220;", $str);

		$str = str_replace("”","&#8221;", $str);

		$str = str_replace("‘","&#8216;", $str);
		$str = str_replace("’","&#8217;", $str);
		$str = str_replace("—","&#8212;", $str);

		$str = str_replace("–","&#8211;", $str);
		$str = str_replace("™","&trade;", $str);
		$str = str_replace("ü","&#252;", $str);
		$str = str_replace("Ü","&#220;", $str);
		$str = str_replace("Ê","&#202;", $str);
		$str = str_replace("ê","&#238;", $str);
		$str = str_replace("Ç","&#199;", $str);
		$str = str_replace("ç","&#231;", $str);
		$str = str_replace("È","&#200;", $str);
		$str = str_replace("è","&#232;", $str);
		$str = str_replace("Â", "&#194;", $str);
		$str = str_replace("â", "&#226;", $str);
		$str = str_replace("•","&#149;" , $str);


		return $str;

	}

	function manage_product($type)
	{

		extract($this->input->post());

		$user = $this->session->userdata("admin_user");
		$current_date = date('Y-m-d H:i:s');
		$ip = $_SERVER['REMOTE_ADDR'];

		$errors = "";

		$errors .= (isset($prod_name) && trim($prod_name) == "") ? "Product Name shouldn't be empty<br />" : "";
		$errors .= (isset($prod_category_id) && (trim($prod_category_id) == "" || trim($prod_category_id) == 0)) ? "Please select a Product Category<br />" : "";
		$errors .= (isset($prod_desc) && trim($prod_desc) == "") ? "Product Description shouldn't be empty<br />" : "";
		$errors .= (isset($prod_grab_url) && trim($prod_grab_url) == "") ? "Product Grab URL shouldn't be empty<br />" : "";
		if (isset($prod_grab_url) && trim($prod_grab_url) != "") {
			$errors .= (!$this->Validate->is_valid_url($prod_grab_url)) ? "Please provide a valid Product Grab URL<br />" : "";
		}
		$errors .= ( !isset($valid_country_ids) || (isset($valid_country_ids) && count($valid_country_ids) < 1) )? "Please select atleast one Valid Country<br />" : "";

		if (!isset($prod_featured)) $prod_featured = 0;
		if (!isset($prod_only_today)) $prod_only_today = 0;

		if(trim($errors) == ''){
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
			if(isset($_FILES['prod_image']) && $_FILES['prod_image']['name'] != ""){

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

					if(trim($errors) == ''){

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
						$thumb_image_upload['maintain_ratio'] = FALSE;
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
		}

		if(trim($errors) == "" && $image_success) {

			// Images are uploaded succesfully.
			// Insertion / Updation of Product record into the database.

			// Prepare valid countries record


			$valid_countries = implode(",", $valid_country_ids);


			$product_information = array (	'name' => htmlentities(htmlspecialchars(trim($prod_name)),ENT_QUOTES),
											'category_id' => intval($prod_category_id),
											'image' => $product_image_name,
											'description' => htmlentities(trim($prod_desc)),
											'grab_url' => $prod_grab_url,
											'meta_keywords' => htmlentities(trim($meta_keywords)),
											'meta_desc' => htmlentities(trim($meta_desc)),
											'featured' => $prod_featured,
											'only_today' => $prod_only_today,
											'modified_at' => $current_date,
											'modified_from' => $ip,
											'modified_by' => $user["id"] );

			if($type == "add"){

				$product_information['status_id'] = 0; // Status 0 represents Inactive
				$product_information['created_at'] = $current_date;
				$product_information['created_from'] = $ip;
				$product_information['created_by'] = $user["id"];

				$this->db->insert('products', $product_information);
				$last_id = $this->db->insert_id();

				foreach($valid_country_ids as $key=>$values){
					$country_information['category_id'] = $prod_category_id;
					$country_information['prod_id'] = $last_id;
					$country_information['status_id'] = 0;
					$country_information['modified_at'] = $current_date;
					$country_information['country_id'] = $values;
					$this->db->insert('prod_countries', $country_information);

				}

			} else if ($type == "edit"){

				$this->db->where('id', intval($prod_id));
				$this->db->update('products', $product_information);
				$last_id = $this->db->insert_id();
				$query_del = $this->db->query("delete from prod_countries where prod_id = ".$prod_id);
				$query = $this->db->query("select * from products where id = ".$prod_id);
				if($query->num_rows > 0){
					$result = $query->result_array();
				}

				foreach($valid_country_ids as $key=>$values){
					$country_information['category_id'] = $prod_category_id;
					$country_information['prod_id'] = $prod_id;
					$country_information['status_id'] = $result[0]['status_id'];
					$country_information['modified_at'] = $current_date;
					$country_information['country_id'] = $values;
					$this->db->insert('prod_countries', $country_information);

				}

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

		return trim($errors);
	}

	function manage_product_category($type)
	{
		extract($this->input->post());

		$user = $this->session->userdata("admin_user");
		$current_date = date('Y-m-d H:i:s');
		$ip = $_SERVER['REMOTE_ADDR'];

		$errors = "";

		$errors .= (isset($prod_cat_name) && trim($prod_cat_name) == "") ? "Product's Category Name shouldn't be empty<br />" : "";
		$errors .= (!isset($prod_cat_choice) || ((isset($prod_cat_choice) && (trim($prod_cat_choice) == "")))) ? "Please select a Product's Category choice<br />" : "";

		if (isset($prod_cat_choice)) {
			if ($prod_cat_choice == 'child') {
				$errors .= (isset($prod_parent_category_id) && $prod_parent_category_id == '') ? "Please select a Product Categories Parent Category<br />" : "";
			} else {
				$prod_parent_category_id = 0;
			}
		} else {
			$prod_parent_category_id = 0;
		}

		if(trim($errors) == "") {

			$prod_cat_information = array (	'prod_cat_name' => $prod_cat_name,
											'parent_cat_id' => intval($prod_parent_category_id),
											'modified_at' => $current_date,
											'modified_from' => $ip,
											'modified_by' => $user["id"] );

			if($type == "add"){

				$prod_cat_information['status_id'] = 0; // Status 0 represents Inactive
				$prod_cat_information['created_at'] = $current_date;
				$prod_cat_information['created_from'] = $ip;
				$prod_cat_information['created_by'] = $user["id"];

				$this->db->insert('prod_categories', $prod_cat_information);

			} else if ($type == "edit"){

				$this->db->where('id', intval($prod_cat_id));
				$this->db->update('prod_categories', $prod_cat_information);

			}

			$affected_rows = $this->db->affected_rows();

			if($affected_rows > 0){

				if($type == "add"){
					return $prod_cat_information;
				} else if($type == "edit"){
					return true;
				}

			} else {

				$errors .= "Database insertion error<br />";

			}
		}

		return trim($errors);
	}

};


/* End of file admin_products_model.php */
/* Location: ./system/application/models/admin_products_model.php */