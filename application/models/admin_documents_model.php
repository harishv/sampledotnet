<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Documents_Model extends CI_Model {

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();

	}

	function get_documents($category = 0){

		$result = $this->db->query("SELECT documents.*,COUNT(doc_comments.doc_id) AS comments_count FROM documents LEFT JOIN doc_comments ON documents.id = doc_comments.doc_id AND doc_comments.status_id = 1  AND documents.status_id != 2 GROUP BY documents.id ORDER BY documents.modified_at DESC");

		if ($result->num_rows() == 0) {
			return false;
		} else {
			return $result->result_array();
		}

		return false;

	}

	function get_category(){

		$this->db->select('*');
		$this->db->from('doc_categories');
		// $this->db->where('parent_cat_id',0);
		$this->db->where('status_id', 1); // status_id = 1 resembles Active

		$result = $this->db->get();

		if ($result->num_rows() == 0) {
			return false;
		} else {
			return $result->result_array();
		}

		return false;

	}

	function add_document_details($doc_details_array) {
		$this->db->insert('documents', $doc_details_array);
		return  $this->db->insert_id();
	}

	function get_docs_list()
	{
		$query_result = $this->db->get('scribd_documents');
		/*foreach ($query_result->result() as $row) {
			$docs_list['doc_id ']  = $row->doc_id;
			$docs_list['name '] = $row->name;
			$docs_list['access_key'] = $row->access_key;
			$docs_list['secret_password'] = $row->secret_password;
			$docs_list['pdfdoc_category'] = $row->pdfdoc_category;
			$docs_list['access '] = $row->access;
			$docs_list['thumbnail_url '] = $row->thumbnail_url;
			$docs_list['uploaded_date '] = $row->uploaded_date;
		} */

		return $query_result;
	}

	function get_document_details($id){

		$this->db->select('*');
		$this->db->from('documents');
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
		$this->db->from('doc_categories');
		$this->db->where('id', $id);

		$result = $this->db->get();

		if ($result->num_rows() == 0) {
			return false;
		} else {
			return $result->row_array();
		}

		return false;

	}

	function get_categories($parent_cat_id = 0, $order_column = 'doc_cat_name', $order_type ='asc', $active = true, $flag = true, $display = 'drop_down'){

		$this->db->select('*');
		$this->db->from('doc_categories');
		($display != 'admin') ? $this->db->where('parent_cat_id', $parent_cat_id) : "";
		$this->db->order_by($order_column, $order_type);
		$this->db->where('status_id != 2');
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

	function get_document_types($id = 0){

		$this->db->select('*');
		$this->db->from('doc_types');
		if($id != 0)
			$this->db->where('id', $id);

		$result = $this->db->get();

		if ($result->num_rows() == 0) {
			return false;
		} else {
			if($id != 0)
				return $result->row_array();
			else
				return $result->result_array();
		}

		return false;

	}

	function change_status()
	{
		$document_id = trim($this->input->post("doc_id"));
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

		if ($this->db->update('documents', $update_data, array('id' => $document_id))) {
			if($this->db->update('doc_countries', $update_country_information, array('doc_id' => $document_id)))
				return true;
		}

		return false;
	}

	function change_category_status()
	{
		$doc_cat_id = trim($this->input->post("doc_cat_id"));
		$status_id = trim($this->input->post("status"));

		$user = $this->session->userdata("admin_user");
		$current_date = date('Y-m-d H:i:s');
		$ip = $_SERVER['REMOTE_ADDR'];

		$update_data = array ('status_id' => $status_id,
							  'modified_at' => $current_date,
							  'modified_from' => $ip,
							  'modified_by' => $user['id']);

		if ($this->db->update('doc_categories', $update_data, array('id' => $doc_cat_id))) {
			return true;
		}

		return false;
	}

	function manage_document_category($type)
	{
		extract($this->input->post());

		$user = $this->session->userdata("admin_user");
		$current_date = date('Y-m-d H:i:s');
		$ip = $_SERVER['REMOTE_ADDR'];

		$errors = "";

		$errors .= (isset($doc_cat_name) && trim($doc_cat_name) == "") ? "Document's Category Name shouldn't be empty<br />" : "";
		$errors .= (!isset($doc_cat_choice) || ((isset($doc_cat_choice) && (trim($doc_cat_choice) == "")))) ? "Please select a Document's Category choice<br />" : "";

		if (isset($doc_cat_choice)) {
			if ($doc_cat_choice == 'child') {
				$errors .= (isset($doc_parent_category_id) && $doc_parent_category_id == '') ? "Please select a Document Categories Parent Category<br />" : "";
			} else {
				$doc_parent_category_id = 0;
			}
		} else {
			$doc_parent_category_id = 0;
		}

		if(trim($errors) == "") {

			$doc_cat_information = array (	'doc_cat_name' => $doc_cat_name,
											'parent_cat_id' => intval($doc_parent_category_id),
											'modified_at' => $current_date,
											'modified_from' => $ip,
											'modified_by' => $user["id"] );

			if($type == "add"){

				$doc_cat_information['status_id'] = 0; // Status 0 represents Inactive
				$doc_cat_information['created_at'] = $current_date;
				$doc_cat_information['created_from'] = $ip;
				$doc_cat_information['created_by'] = $user["id"];

				$this->db->insert('doc_categories', $doc_cat_information);

			} else if ($type == "edit"){

				$this->db->where('id', intval($doc_cat_id));
				$this->db->update('doc_categories', $doc_cat_information);

			}

			$affected_rows = $this->db->affected_rows();

			if($affected_rows > 0){

				if($type == "add"){
					return $doc_cat_information;
				} else if($type == "edit"){
					return true;
				}

			} else {

				$errors .= "Database insertion error<br />";

			}
		}

		return trim($errors);
	}

	function get_max_document_id()
	{
		$query = $this->db->query("SELECT max(id) as id FROM documents");
		if($query->num_rows() > 0)
		{
			return $query->result_array();
		}
	}

	function manage_document($type)
	{

		// echo "<pre>"; print_r($this->input->post()); print_r($_FILES['doc_path']); print_r($_FILES['doc_image']); echo "</pre>"; exit();
		extract($this->input->post());

		$user = $this->session->userdata("admin_user");
		$current_date = date('Y-m-d H:i:s');
		$ip = $_SERVER['REMOTE_ADDR'];

		$errors = "";

		$errors .= (isset($doc_name) && trim($doc_name) == "") ? "Document Name shouldn't be empty<br />" : "";
		$errors .= (isset($doc_category_id) && (trim($doc_category_id) == "" || trim($doc_category_id) == 0)) ? "Please select a Document Category<br />" : "";
		$errors .= (isset($doc_desc) && trim($doc_desc) == "") ? "Document Description shouldn't be empty<br />" : "";
		$errors .= (isset($doc_type) && (trim($doc_type) == "" || trim($doc_type) == 0)) ? "Please select a Document Type<br />" : "";
		if (isset($doc_type) && $doc_type == 2) {
			$errors .= (isset($doc_price) && trim($doc_price) == "") ? "Document Price is shouldn't be emptly for Premium document type<br />" : "";
		}
		$errors .= (isset($doc_shared_by) && trim($doc_shared_by) == "") ? "Document Shared By Name shouldn't be empty<br />" : "";
		$errors .= (isset($doc_tags) && trim($doc_tags) == "") ? "Tags shouldn't be empty<br />" : "";
		$errors .= (isset($doc_available_formats) && trim($doc_available_formats) == "") ? "Available Formats shouldn't be empty<br />" : "";
		$errors .= ( !isset($valid_country_ids) || (isset($valid_country_ids) && count($valid_country_ids) < 1) )? "Please select atleast one Valid Country<br />" : "";

		if (!isset($doc_featured)) $doc_featured = 0;
		if (!isset($doc_only_today)) $doc_only_today = 0;

		if(trim($errors) == ''){
			// Get the Document Id and Image Id to define images names
			$max_document_id = $this->get_max_document_id();
			if($max_document_id[0]['id'] == null){
				$document_id = 1;
			} else {
				$document_id = $max_document_id[0]['id'] + 1;
			}

			// Upload's starts

			// Base Upload Path Generally uploads
			$upload_path = UPLOAD_DIR;

			// Document's Images, Documents Upload path
			$upload_path .= "/" . DOCUMENTS_DIR;

			if($type == "add"){
				$image_success = false;
				$doc_success = false;
			} else if ($type == "edit"){
				$image_success = true;
				$doc_success = true;
			}


			/**
			 * Uploading a document starts here
			 */
			if(isset($_FILES['doc_path']) && $_FILES['doc_path']['name'] != ""){

				// Set image flag to false first
				$doc_success = false;

				// Doc Base and New Names
				$base_filename = $_FILES['doc_path']['name'];
				$ext = strrchr($base_filename, ".");

				$base_filename = "document_path" . $ext;

				if ($type == "add"){
					$document_path_name = "document_" . $document_id . $ext;
				} else if ($type == "edit"){
					$document_path_name = $this->input->post('edit_document_path');
				}

				// Common config image values
				$config['upload_path'] = $upload_path; //$config
				$config['allowed_types'] = ALLOWED_DOC_TYPES;

				// Small Image Name
				$config['file_name']= $document_path_name;

				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('doc_path')) {

					$errors .= $this->upload->display_errors();

				} else {

					if(trim($errors) == ''){

						if ($type == "edit") {
							// Check for duplicate file name issues and replace the new file with the old file.
							// ex: assume document_path_name = document_5.gif
							$addition = substr(strrchr($document_path_name, "_"), 1); // 5.gif
							$file_ext = strrchr($document_path_name, "."); // .gif
							$img_id = str_replace($file_ext, "", $addition) . "1"; // 51
							$custom_file_name = str_replace($addition, $img_id . $file_ext, $document_path_name); // document_51.gif

							// Change file permission to execlutable one
							@chmod($upload_path . "/" . $document_path_name, 0775);

							if (file_exists($upload_path . "/" . $custom_file_name)) {
								rename($upload_path . "/" . $document_path_name, $upload_path . "/" . "_part_" . $document_path_name);
								rename($upload_path . "/" . $custom_file_name, $upload_path . "/" . $document_path_name);
							}
						}

						// Change file permission to execlutable one
						@chmod($upload_path . "/" . $document_path_name, 0775);

						// Making image success flag true to represent the success.
						$doc_success = true;

						// Unlink the old existing image while edit mode if the thumb creation is successful.
						if ($type == "edit" && file_exists($upload_path . "/" . "_part_" . $document_path_name)) {
							unlink($upload_path . "/" . "_part_" . $document_path_name);
						}

						// unlink base_small_filename
						// unlink($upload_path."/".$base_filename);

					}

				}

			} else {
				if($doc_success){
					if($type == "edit"){
						$document_path_name = $this->input->post('edit_document_path');
					}
				}
			}
			/**
			 * Uploading a document ends here
			 */


			/**
			 * Uploading an image starts here
			 */
			if($doc_success && isset($_FILES['doc_image']) && $_FILES['doc_image']['name'] != ""){

				// Set image flag to false first
				$image_success = false;

				// Image Base and New Names
				$base_filename = $_FILES['doc_image']['name'];
				$ext = strrchr($base_filename, ".");

				$base_filename = "document_image" . $ext;

				if($type == "add"){

					$document_image_name = "document_" . $document_id . $ext;

				} else if($type == "edit"){

					$document_image_name = $this->input->post('edit_document_image');

				}

				// Common config image values
				$config1['upload_path'] = $upload_path; //$config
				$config1['allowed_types'] = ALLOWED_IMG_TYPES;

				// Small Image Name
				$config1['file_name']= $document_image_name;

				$this->load->library('upload', $config1);

				$this->upload->initialize($config1);

				if ( ! $this->upload->do_upload('doc_image')) {

					$errors .= 'image err<br />';
					$errors .= $this->upload->display_errors();

				} else {

					if(trim($errors) == ''){

						if ($type == "edit") {
							// Check for duplicate file name issues and replace the new file with the old file.
							// ex: assume document_image_name = document_5.gif
							$addition = substr(strrchr($document_image_name, "_"), 1); // 5.gif
							$file_ext = strrchr($document_image_name, "."); // .gif
							$img_id = str_replace($file_ext, "", $addition) . "1"; // 51
							$custom_file_name = str_replace($addition, $img_id . $file_ext, $document_image_name); // document_51.gif

							// Change file permission to execlutable one
							@chmod($upload_path . "/" . $document_image_name, 0775);

							if (file_exists($upload_path . "/" . $custom_file_name)) {
								rename($upload_path . "/" . $document_image_name, $upload_path . "/" . "_part_" . $document_image_name);
								rename($upload_path . "/" . $custom_file_name, $upload_path . "/" . $document_image_name);
							}
						}

						// Change file permission to execlutable one
						@chmod($upload_path . "/" . $document_image_name, 0775);

						$thumb_image_upload['image_library'] = 'gd2';
						$thumb_image_upload['source_image'] =  $upload_path . "/" . $document_image_name;
						$thumb_image_upload['new_image'] = $upload_path . "/" . THUMBS_DIR . "/" . THUMB_EXT . $document_image_name;
						$thumb_image_upload['thumb_marker'] = "";
						$thumb_image_upload['create_thumb'] = FALSE;
						$thumb_image_upload['maintain_ratio'] = FALSE;
						$thumb_image_upload['quality']= IMAGE_QUALITY;
						$thumb_image_upload['width'] = DOCUMENT_IMAGE_WIDTH;
						$thumb_image_upload['height'] = DOCUMENT_IMAGE_HEIGHT;

						$this->load->library('image_lib', $thumb_image_upload);

						if (!$this->image_lib->resize())
						{
							// unlink $document_image_name
							unlink($upload_path."/".$document_image_name);

							// Replace the old existing image while edit mode if the thumb fails with the new one.
							if ($type == "edit" && file_exists($upload_path . "/" . "_part_" . $document_image_name)) {
								rename($upload_path . "/" . "_part_" . $document_image_name, $upload_path . "/" . $document_image_name);
							}

							$errors .= $this->image_lib->display_errors();

						} else {

							// Making image success flag true to represent the success.
							$image_success = true;

							// Change file permission to execlutable one
							@chmod($upload_path . "/" . THUMBS_DIR . "/" . THUMB_EXT . $document_image_name, 0775);

							// Unlink the old existing image while edit mode if the thumb creation is successful.
							if ($type == "edit" && file_exists($upload_path . "/" . "_part_" . $document_image_name)) {
								unlink($upload_path . "/" . "_part_" . $document_image_name);
							}

						}

					}

				}

				if (trim($errors) != '') {
					// Unlink document_path_name
					if ($type == "add" || ($type == "edit" && $_FILES['doc_path']['name'] != "")) {
						unlink($upload_path . "/" . $document_path_name);
					}
				}

			} else {
				if($image_success){
					if($type == "edit"){
						$document_image_name = $this->input->post('edit_document_image');
					}
				}
			}
			/**
			 * Uploading an image ends here.
			 */

			// Upload's End
		}

		if(trim($errors) == "" && $image_success && $doc_success) {

			// Images, Documnets are uploaded succesfully.
			// Insertion / Updation of Document record into the database.

			// Prepare valid countries record

			$valid_countries = implode(",", $valid_country_ids);

			$document_information = array (	'name' => htmlspecialchars(htmlentities($doc_name,ENT_QUOTES)),
											'category_id' => intval($doc_category_id),
											'doc_type_id' => intval($doc_type),
											'doc_price' => htmlentities(trim($doc_price)),
											'image' => $document_image_name,
											'description' => htmlentities(trim($doc_desc)),
											'shared_by' => htmlentities(trim($doc_shared_by)),
											'tags' => htmlentities(trim($doc_tags)),
											'available_formats' => htmlentities(trim($doc_available_formats)),
											'doc_path' => $document_path_name,
											'featured' => $doc_featured,
											'only_today' => $doc_only_today,
											'modified_at' => $current_date,
											'modified_from' => $ip,
											'modified_by' => $user["id"] );

			if($type == "add"){

				$document_information['status_id'] = 0; // Status 0 represents Inactive
				$document_information['created_at'] = $current_date;
				$document_information['created_from'] = $ip;
				$document_information['created_by'] = $user["id"];

				$this->db->insert('documents', $document_information);
				$last_id = $this->db->insert_id();

				foreach($valid_country_ids as $key=>$values){
					$country_information['category_id'] = $doc_category_id;
					$country_information['doc_id'] = $last_id;
					$country_information['status_id'] = 0;
					$country_information['modified_at'] = $current_date;
					$country_information['country_id'] = $values;

					$this->db->insert('doc_countries', $country_information);

				}

			} else if ($type == "edit"){

				$this->db->where('id', intval($doc_id));
				$this->db->update('documents', $document_information);

				$last_id = $this->db->insert_id();

				$query_del = $this->db->query("delete from doc_countries where doc_id = ".$doc_id);
				$query = $this->db->query("select * from documents where id = ".$doc_id);

				if($query->num_rows > 0){
					$result = $query->result_array();
				}

				foreach($valid_country_ids as $key=>$values){
					$country_information['category_id'] = $doc_category_id;
					$country_information['doc_id'] = $doc_id;
					$country_information['status_id'] = $result[0]['status_id'];
					$country_information['modified_at'] = $current_date;
					$country_information['country_id'] = $values;

					$this->db->insert('doc_countries', $country_information);
				}

			}

			$affected_rows = $this->db->affected_rows();

			if($affected_rows > 0){

				if($type == "add"){
					return $document_information;
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

/* End of file admin_documents_model.php */
/* Location: ./system/application/models/admin_documents_model.php */