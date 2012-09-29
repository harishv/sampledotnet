<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category_Model extends CI_Model {

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();

	}

	// This function is for checking the posted login values with the database table
	function get_category(){

		$result = array();
		$sub_cat = array();
		$category_result = array();
		$this->db->select('*');
		$this->db->from('prod_categories');
		$this->db->where('parent_cat_id',0);
		$this->db->where('status_id', 1); // status_id = 1 resembles Active

		$result = $this->db->get();


		/*$query_cat = $this->db->query("select * from prod_categories where parent_cat_id = 0 and status_id = 1");
		if($query_cat->num_rows() > 0){

			$cat_result = $query_cat->result_array();

			//echo "<pre>";print_r($cat_result);
		//}

		//if(isset($cat_result) && $cat_result!=''){
			foreach($cat_result as $sub_cat_key => $sub_cat_values){

				$query_sub_cat = $this->db->query("select * from prod_categories where parent_cat_id = ". $sub_cat_values['id']." and status_id = 1");
				
				if($query_sub_cat->num_rows() > 0){
				$sub_cat_result['sub_cat'][] = $query_sub_cat->result_array();
				}
			}
		}

		//exit;
		$result = array_merge($cat_result , $sub_cat_result);

		

		return $result;


		$data = array();
     $this->db->select('*');
     $this->db->where('status_id', 1);
    $this->db->from('prod_categories');
     $this->db->groupby('parent_cat_id,id');
     $Q = $this->db->get('prod_categories');
     echo $this->db->last_query();
     exit;
     if ($Q->num_rows() > 0){
       foreach ($Q->result() as $row){
			if ($row->parentid > 0){
				$data[0][$row->parentid]['children'][$row->id] = $row->name;
			
			}else{
				$data[0][$row->id]['name'] = $row->name;
			}
		}
    }
    $Q->free_result(); 
    return $data; 


		//return $sub_cat_result;*/


		



		if ($result->num_rows() == 0) {
			return false;
		} else {
			return $result->result_array();
		}

		return false;


	}

	public function get_sub_cat($id){

		$this->db->select('*');
		$this->db->from('prod_categories');
		$this->db->where('parent_cat_id',$id);
		$this->db->where('status_id', 1); // status_id = 1 resembles Active
		
		$result = $this->db->get();

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
	function get_products($cat_id,$num,$offset){
		
		
		
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
			return $result->result_array();
		}

		return false;

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
		
		$query=$this->db->query("select * from products  order by modified_at desc");
		$count = $query->num_rows();
		return $count;


	}

	function getCount($id){

		$query=$this->db->query("select * from products  where category_id = ". $id ." order by modified_at desc");
		
		$count = $query->num_rows();
		return $count;

	}

	function insert_grab($prod_id,$url,$user_id){

		$data = array('prod_id'=>$prod_id,'grab_url'=>$url,'user_id' => $user_id);
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


		$data = array('name'=>$name,
					  'company'=>$company,
					  'title'=>$title,
					 'desc'=>$desc,
					  'url'=>$url);
		$this->db->insert('share_sample',$data);
		$this->email->to($email);
		$this->email->from('sampel@sample.com', 'admin');
		$this->email->subject('Sample Details');
		$message = "<b>Sample Details</b>"."<br><br><br>";
		$message .= "Name : ".$name."<br>";
		$message .= "Email : ".$email ."<br>";
		$message .= "Title : ".$title ."<br>";
		$message .= "Company : ".$company ."<br>";
		$message .= "Description : ".$desc ."<br>";
		$message .= "URL : ".$url ."<br>";
		$this->email->message($message);
		$mail_result = $this->email->send();


		if(!$mail_result){
			return false;
		}else{
			$affected_rows = $this->db->affected_rows();
			if($affected_rows > 0)
				return true;
		}
		

	}



};


/* End of file category_model.php */
/* Location: ./system/application/models/category.php */
