<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category_Model extends CI_Model {

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();

	}

	// This function is for checking the posted login values with the database table
	function get_category(){

		$category_id_arr = array();

		$category_ids = $this->db->query("(SELECT DISTINCT(products.category_id) FROM products WHERE products.status_id = 1) UNION (SELECT prod_categories.parent_cat_id AS category_id FROM prod_categories WHERE prod_categories.parent_cat_id != 0 AND prod_categories.status_id = 1 AND id IN (SELECT DISTINCT(products.category_id) FROM products WHERE products.status_id = 1))");
		if ($category_ids->num_rows > 0) {
			$cat_id_arr = $category_ids->result_array();
			foreach ($cat_id_arr as $category_id) {
				array_push($category_id_arr, $category_id['category_id']);
			}
		}

		$result = $this->db->query("SELECT * FROM prod_categories WHERE parent_cat_id = 0 AND status_id = 1 AND id IN (".implode(",", $category_id_arr).")");

		if ($result->num_rows() == 0) {
			return false;
		} else {
			return $result->result_array();
		}

		return false;
	}

	public function get_sub_cat($id){

		$result = $this->db->query("SELECT * FROM prod_categories WHERE parent_cat_id = $id AND status_id = 1 AND id IN (SELECT DISTINCT(category_id) FROM products WHERE status_id = 1)");

		if ($result->num_rows() == 0) {
			return false;
		} else {
			return $result->result_array();
		}

		return false;

	}

	public function get_bread_crums($id = 0){

		$result = array();

		$query = $this->db->query("select prod_cat_name as sub_cat_name, parent_cat_id from prod_categories where id = ". intval($id));
		if ($query->num_rows() > 0){
		   $row = (array)$query->row();
		}

			$query_cat_name = $this->db->query("select prod_cat_name as cat_name from prod_categories where id = ". $row['parent_cat_id']);
			if ($query_cat_name->num_rows() > 0){
			   $row_cat = (array)$query_cat_name->row();
			}else
			$row_cat = array('cat_name' =>'');

			$result = array_merge($row , $row_cat);

			return $result;
	}

	// get inital product based on the modified date
	function get_products($cat_id = 0, $num = 0, $offset = 10){

		$this->db->select('*');
		$this->db->from('products');
		$this->db->where('status_id', 1);

		if($cat_id !=0)
			$this->db->where('category_id',$cat_id);

		$this->db->order_by("modified_at", "desc");
		$this->db->limit($offset,$num);
		$result = $this->db->get();

		if ($result->num_rows() == 0) {
			return false;
		} else {
			$products = $result->result_array();

			if($this->session->userdata('selected_country')){
  				$selected_country = $this->session->userdata('selected_country');
  				$result = array();
				foreach ($products as $prod_key => $prod_data) {
					// print_r($prod_data);
					$valid_countries = explode(',', $prod_data['valid_countries']);
					if (in_array($selected_country, $valid_countries)) {
						array_push($result, $prod_data);
					}
				}
				return $result;
  			}

  			return $products;
		}

		return false;
	}

	function get_country_products($cat_id, $country_id, $num,$offset){
		$query = $this->db->query("select * from products where category_id = ".$cat_id. " and  valid_countries LIKE '%". $country_id."%' limit ".$num.",".$offset);


		if($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;


	}

	function get_featured_products(){

		$this->db->select('*');
		$this->db->from('products');
		$this->db->where('status_id', 1);
		$this->db->where('featured',1);
		$this->db->order_by("modified_at", "desc");

		$result = $this->db->get();

		if ($result->num_rows() == 0) {
			return false;
		} else {
			return $result->result_array();
		}

		return false;
	}

	function get_footer_category(){

		$query= $this->db->query("select DISTINCT p.category_id,pc.prod_cat_name from products p , prod_categories pc  where p.featured = 1 and p.category_id = pc.id  and p.status_id = 1 limit 0,5");
		if($query->num_rows() > 0){
			$result = $query->result_array();

			return $result;
		}else
			return 0;
	}

	function get_footer_products($id){
		$query_prod = $this->db->query("select category_id,id,name,description,image from products where category_id = ".$id."  and featured = 1 and status_id = 1");

				if($query_prod->num_rows() > 0){

					$result_prod = $query_prod->result_array();
					return $result_prod;

				}else
					return 0;
	}

	function get_rating(){

		$this->db->select('*');
		$this->db->from('prod_ratings');

		$result = $this->db->get();

		if ($result->num_rows() == 0) {
			return false;
		} else {
			return $result->result_array();
		}

		return false;
	}

	public function insert_rating($prod_id,$rating){

		$user_id = 1;

		//getting the rating
		$query = $this->db->query("select * from prod_ratings where prod_id = ".$prod_id." and user_id = ".$user_id);
		if($query->num_rows() > 0){

			$data = array('rating' => $rating);
			$this->db->where(array('user_id'=>$user_id ,'prod_id'=>$prod_id));
			$this->db->update('prod_ratings' , $data);
			$result = $this->db->affected_rows();

		}else{
			$data = array('user_id'=> $user_id, 'prod_id'=>$prod_id,'rating' => $rating);
			$this->db->insert('prod_ratings' , $data);
			$result = $this->db->affected_rows();
		}

		$query_rating = $this->db->query("select sum(rating) as rating , count(*) as users from prod_ratings where prod_id =". $prod_id);
		$rating_value = $query_rating->result_array();

		$final_rating  = round($rating_value[0]['rating']/$rating_value[0]['users']);

		$data_product['product_rating'] = $final_rating;
		$this->db->where('id',$prod_id);
		$this->db->update('products',$data_product);
		$result = $this->db->affected_rows();
		if(!$result)
			return false;
		return true;

	}

	function getAllCount(){

		$prod_arr = $this->get_products();

		if($prod_arr){
			return count($prod_arr);
		} else {
			return 0;
		}

		// $query=$this->db->query("select * from products  where status_id = 1 order by modified_at desc");
		// $count = $query->num_rows();
		// return $count;

	}

	function getCount($id){

		$query=$this->db->query("select * from products  where category_id = ". $id ." and status_id = 1 order by modified_at desc");

		$count = $query->num_rows();
		return $count;

	}

	function get_country_prod_count($cat_id, $country_id){

		$query=$this->db->query("select * from products  where category_id = ". $cat_id ." and  status_id = 1 and valid_countries LIKE '%". $country_id."%' order by modified_at desc");

		$count = $query->num_rows();
		return $count;



	}

	function insert_grab($prod_id,$url,$user_id){

		$data = array('prod_id'=>$prod_id,'grab_url'=>$url,'user_id' => $user_id);
		$this->db->insert('tracking',$data);

		return true;


	}

	function get_user_profile($id){

		$query = $this->db->query("select * from users where user_id = ". $id);
		if($query->num_rows() > 0){
			return $query->result_array();
		}

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


		if(!$mail_result){
			return false;
		}else{
			$affected_rows = $this->db->affected_rows();
			if($affected_rows > 0)
				return true;
		}


	}

	function get_sub_categories($id){

		//$query = $this->db->query("select c.id,c.prod_cat_name,c.parent_cat_id,p.name,p.category_id from prod_categories c , products p where c.parent_cat_id = ".$id." and  p.category_id = c.id");
		$query = $this->db->query("select id,prod_cat_name from prod_categories where parent_cat_id = " .$id);
		if($query->num_rows() > 0){
			$result = $query->result_array();

			return $result;
		}else
			return 0;

	}

	function get_sub_cat_prod($id){

		$query = $this->db->query("select * from products where category_id = " .$id);
		if($query->num_rows() > 0){
			$result = $query->result_array();

			return $result;
		}else
			return 0;

	}



};


/* End of file category_model.php */
/* Location: ./system/application/models/category.php */
