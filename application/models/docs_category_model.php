<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Docs_Category_Model extends CI_Model {

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();

	}

	// This function is for checking the posted login values with the database table
	function get_category(){

		$category_id_arr = array();

		// TODO::
		// Need to fecth data from documents.
		$category_ids = $this->db->query("(SELECT DISTINCT(documents.category_id) FROM documents WHERE documents.status_id = 1) UNION (SELECT doc_categories.parent_cat_id AS category_id FROM doc_categories WHERE doc_categories.parent_cat_id != 0 AND doc_categories.status_id = 1 AND id IN (SELECT DISTINCT(documents.category_id) FROM documents WHERE documents.status_id = 1))");
		if ($category_ids->num_rows > 0) {
			$cat_id_arr = $category_ids->result_array();
			foreach ($cat_id_arr as $category_id) {
				array_push($category_id_arr, $category_id['category_id']);
			}
		}

		$result = $this->db->query("SELECT * FROM doc_categories WHERE parent_cat_id = 0 AND status_id = 1 AND id IN (".implode(",", $category_id_arr).") ORDER BY doc_cat_name ASC");
		// $result = $this->db->query("SELECT * FROM doc_categories WHERE parent_cat_id = 0 AND status_id = 1");

		if ($result->num_rows() == 0) {
			return false;
		} else {
			return $result->result_array();
		}

		return false;
	}

	public function get_sub_cat($id){

		// TODO::
		// Fetch sub-cats based on active docs
		$result = $this->db->query("SELECT * FROM doc_categories WHERE parent_cat_id = $id AND status_id = 1 AND id IN (SELECT DISTINCT(category_id) FROM documents WHERE status_id = 1)");
		// $result = $this->db->query("SELECT * FROM doc_categories WHERE parent_cat_id = $id AND status_id = 1");

		if ($result->num_rows() == 0) {
			return false;
		} else {
			return $result->result_array();
		}

		return false;
	}

	function getCount($cat_id = 0){

		$selected_country = ($this->session->userdata('selected_country')) ? $this->session->userdata('selected_country'): 226;

		$this->db->select('doc_id');
		$this->db->from('doc_countries');
		if ($cat_id != 0)
			$this->db->where('category_id', $cat_id);
		$this->db->where('country_id', $selected_country);
		$this->db->where('status_id', 1);

		$result_doc_ids = $this->db->get();

		if ($result_doc_ids->num_rows() == 0) {
			return false;
		} else {
			// Get valid Document Id's
			$doc_ids = $result_doc_ids->result_array();
			foreach ($doc_ids as $id) {
				$result_ids[] = $id['doc_id'];
			}
		}

		$this->db->select('*');
		$this->db->from('documents');
		$this->db->where('status_id', 1);
		if ($cat_id != 0)
			$this->db->where('category_id', $cat_id);
		$this->db->where_in('id', $result_ids);
		$this->db->order_by("modified_at", "desc");

		$result = $this->db->get();

		if ($result->num_rows() == 0) {
			return false;
		} else
			// Return the exact count
			return count($result->result_array());
	}

	// get inital documents based on the modified date
	function get_documents($cat_id = 0, $num = 0, $offset = 10){

		$selected_country = ($this->session->userdata('selected_country')) ? $this->session->userdata('selected_country'): 226;

		$this->db->select('doc_id');
		$this->db->from('doc_countries');
		if ($cat_id != 0)
			$this->db->where('category_id', $cat_id);
		$this->db->where('country_id', $selected_country);
		$this->db->where('status_id', 1);

		$result_doc_ids = $this->db->get();

		if ($result_doc_ids->num_rows() == 0) {
			return false;
		} else {
			// Get valid Document Id's
			$doc_ids = $result_doc_ids->result_array();
			foreach ($doc_ids as $id) {
				$result_ids[] = $id['doc_id'];
			}
		}

		$this->db->select('*');
		$this->db->from('documents');
		$this->db->where('status_id', 1);
		if ($cat_id != 0)
			$this->db->where('category_id', $cat_id);
		$this->db->where_in('id', $result_ids);
		$this->db->order_by("modified_at", "desc");
		$this->db->limit($offset, $num);

		$result = $this->db->get();

		if ($result->num_rows() == 0) {
			return false;
		} else
			return $result->result_array();

	}

	function get_featured_documents(){

		$selected_country = ($this->session->userdata('selected_country')) ? $this->session->userdata('selected_country'): 226;

		$this->db->select('doc_id');
		$this->db->from('doc_countries');
		$this->db->where('country_id', $selected_country);
		$this->db->where('status_id', 1);

		$result_doc_ids = $this->db->get();

		if ($result_doc_ids->num_rows() == 0) {
			return false;
		} else {
			// Get valid Document Id's
			$doc_ids = $result_doc_ids->result_array();
			foreach ($doc_ids as $id) {
				$result_ids[] = $id['doc_id'];
			}
		}

		$this->db->select('*');
		$this->db->from('documents');
		$this->db->where('status_id', 1);
		$this->db->where('featured',1);
		$this->db->where_in('id', $result_ids);
		$this->db->order_by("modified_at", "desc");

		$result = $this->db->get();

		if ($result->num_rows() == 0) {
			return false;
		} else
			return $result->result_array();

		return false;
	}

	function get_right_popular_documents(){

		$selected_country = ($this->session->userdata('selected_country')) ? $this->session->userdata('selected_country'): 226;

		$this->db->select('doc_id');
		$this->db->from('doc_countries');
		$this->db->where('country_id', $selected_country);
		$this->db->where('status_id', 1);

		$result_doc_ids = $this->db->get();

		if ($result_doc_ids->num_rows() == 0) {
			return false;
		} else {
			// Get valid Document Id's
			$doc_ids = $result_doc_ids->result_array();
			foreach ($doc_ids as $id) {
				$result_ids[] = $id['doc_id'];
			}
		}

		$this->db->select('*');
		$this->db->from('documents');
		$this->db->where('status_id', 1);
		$this->db->where_in('id', $result_ids);
		$this->db->order_by("modified_at", "desc");

		$result = $this->db->get();

		if ($result->num_rows() == 0) {
			return false;
		} else
			return $result->result_array();

		return false;
	}







	public function get_bread_crums($id = 0){

		$result = array();
		$row = array();

		$query = $this->db->query("select doc_cat_name as sub_cat_name, id as sub_cat_id ,parent_cat_id from doc_categories where id = ". intval($id));
		if ($query->num_rows() > 0){
		   $row = (array)$query->row();
		}

		// var_dump($row); exit();

		$query_cat_name = $this->db->query("select doc_cat_name as cat_name from doc_categories where id = ". $row['parent_cat_id']);
		if ($query_cat_name->num_rows() > 0){
			$row_cat = (array)$query_cat_name->row();
		} else
		$row_cat = array('cat_name' =>'');

		$result = array_merge($row , $row_cat);

		return $result;
	}

	function get_country_documents($cat_id, $country_id, $num,$offset){
		$query = $this->db->query("select * from documents where category_id = ".$cat_id. " and  valid_countries LIKE '%". $country_id."%' limit ".$num.",".$offset);

		if($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;

	}

	function get_footer_category($doc_cat_id = 0){

		if($doc_cat_id != 0) {

			$this->db->where('id', $doc_cat_id);
			$query = $this->db->get('doc_categories');
			$row = $query->row_array();

			if ($row['parent_cat_id'] == 0) {
				$cat_ids[] = $doc_cat_id;
			} else {
				$parent_cat_id = $row['parent_cat_id'];

				$sub_cats = $this->get_sub_cat($parent_cat_id);

				foreach ($sub_cats as $sub_cat) {
					$cat_ids[] = $sub_cat['id'];
				}
			}
		}

		$this->db->distinct();
		$this->db->select('d.category_id, dc.doc_cat_name');
		$this->db->from('documents d , doc_categories dc');
		$this->db->where('d.category_id = dc.id');
		if (isset($cat_ids)) {
			$this->db->where_in('dc.id', $cat_ids);
		}
		$this->db->where('d.status_id', 1);
		$this->db->limit(4, 0);

		$result = $this->db->get();

		if($result->num_rows() > 0){
			$result = $result->result_array();

			return $result;
		} else {
			return 0;
		}
	}

	function get_footer_documents($id){
		$query_doc = $this->db->query("select category_id,id,name,description,image from documents where category_id = ".$id."  and featured = 1 and status_id = 1 limit 10");

		if($query_doc->num_rows() > 0){

			$result_doc = $query_doc->result_array();
			return $result_doc;

		} else
			return 0;
	}

	function get_rating(){

		$this->db->select('*');
		$this->db->from('doc_ratings');

		$result = $this->db->get();

		if ($result->num_rows() == 0) {
			return false;
		} else {
			return $result->result_array();
		}

		return false;
	}

	public function insert_rating($doc_id,$rating){

		$user_id = $_SERVER['REMOTE_ADDR'];

		//getting the rating
		$query = $this->db->query("select * from doc_ratings where doc_id = ".$doc_id." and user_id = '".$user_id."'");
		if($query->num_rows() > 0){

			$data = array('rating' => $rating);
			$this->db->where(array('user_id'=>$user_id ,'doc_id'=>$doc_id));
			$this->db->update('doc_ratings' , $data);
			$result = $this->db->affected_rows();

		}else{
			$data = array('user_id'=> $user_id, 'doc_id'=>$doc_id,'rating' => $rating);
			$this->db->insert('doc_ratings' , $data);
			$result = $this->db->affected_rows();
		}

		$query_rating = $this->db->query("select sum(rating) as rating , count(*) as users from doc_ratings where doc_id =". $doc_id);
		$rating_value = $query_rating->result_array();

		$final_rating  = round($rating_value[0]['rating']/$rating_value[0]['users']);

		$data_document['document_rating'] = $final_rating;
		$this->db->where('id',$doc_id);
		$this->db->update('documents',$data_document);
		$result = $this->db->affected_rows();
		if(!$result)
			return false;
		return true;

	}

	function get_country_doc_count($cat_id, $country_id){

		$query=$this->db->query("select * from documents  where category_id = ". $cat_id ." and  status_id = 1 and valid_countries LIKE '%". $country_id."%' order by modified_at desc");

		$count = $query->num_rows();
		return $count;

	}

	function insert_grab($doc_id,$url,$user_id){

		$data = array('doc_id'=>$doc_id,'grab_url'=>$url,'user_id' => $user_id);
		$this->db->insert('tracking',$data);

		return true;

	}

	function share_sample(){

		$name = $this->input->post('name');
		$email = $this->input->post('share_email_address');
		$company = $this->input->post('company');
		$title =$this->input->post('title');
		$desc = $this->input->post('desc');
		$url = $this->input->post('url');

		$errors ='';

		if(trim($name) == ''){
			$errors .= "Name should not be null or empty<br/>";
		}
		$email_valid = $this->user_validations->is_email($email);


		if(is_string($email_valid))
			$errors .= $email_valid."<br/>";

		if(trim($company) == ''){
			$errors .= "Company Name should not be null or empty<br >";
		}
		if(trim($title) == ''){
			$errors .= 'Title should not be null or empty<br >';
		}
		if(trim($desc) ==''){
			$errors .= 'Desc should not be null or empty<br >';
		}
		if(trim($url) == ''){
			$errors .= 'URL should not be null or empty<br >';
		}
		$url_valid = $this->user_validations->is_validurl($url);


		if(is_string($url_valid))
			$errors .= $url_valid."<br/>";

		if($errors !=''){

			return $errors;
		}

		$created_at = date('Y-m-d H:i:s');

		$created_from = $_SERVER['REMOTE_ADDR'];
		$data = array('sample_name'=>$name,
					 'sample_email'=>$email,
					  'sample_company'=>$company,
					  'sample_title'=>$title,
					 'sample_desc'=>$desc,
					  'sample_url'=>$url,
					  'created_at' => $created_at,
					  'created_from' =>$created_from,
					  'status_id' => '1',
					  'created_by' => '0');
		$this->db->insert('share_sample',$data);
		$this->email->to($email);
		$this->email->from('admin@sample.net', 'admin');
		$this->email->subject('Sample.net: Thanks for your sample suggestion');
		$message = "<b>Sample Details</b>"."<br><br>";
		$message .= "Name : ".$name."<br>";
		$message .= "Email : ".$email ."<br>";
		$message .= "Title : ".$title ."<br>";
		$message .= "Company : ".$company ."<br>";
		$message .= "Description : ".$desc ."<br>";
		$message .= "URL : ".$url ."<br>";
		$content = SHARE_SAMPLE_MAIL_CONTENT;
		$mail_content = str_replace('!!sample_details!!', $message, $content);

		$this->email->message($mail_content);
		$mail_result = $this->email->send();
		//$mail_result = true;


		if(!$mail_result){
			return false;
		}else{
			$affected_rows = $this->db->affected_rows();
			if($affected_rows > 0)
				return true;
		}

	}

	function get_sub_categories($id){

		$query = $this->db->query("select c.id,c.doc_cat_name,c.parent_cat_id,p.name,p.category_id from doc_categories c , documents p where c.parent_cat_id = ".$id." and  p.category_id = c.id");
		// $query = $this->db->query("select id,doc_cat_name from doc_categories where parent_cat_id = " .$id);
		if($query->num_rows() > 0){
			$result = $query->result_array();

			return $result;
		}else
			return 0;

	}

	function get_sub_cat_doc($id){

		$query = $this->db->query("select * from documents where category_id = " .$id);
		if($query->num_rows() > 0){
			$result = $query->result_array();

			return $result;
		}else
			return 0;

	}

};


/* End of file category_model.php */
/* Location: ./system/application/models/category.php */
