<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category_Model extends CI_Model {

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();

	}

	// This function is for checking the posted login values with the database table
	function get_category(){

		$cat = array();
		$sub_cat = array();
		$category = array();
		$this->db->select('*');
		$this->db->from('prod_categories');
		$this->db->where('parent_cat_id',0);
		$this->db->where('status_id', 2); // status_id = 2 resembles Active

		$result = $this->db->get();

		



		if ($result->num_rows() == 0) {
			return false;
		} else {
			return $result->result_array();
		}

		return false;


	}

	// get inital product based on the modified date
	function get_products($cat_id,$num,$offset){
		
		$product_details = array();
		$product_rating = array();
		$product =array();
		$this->db->select('*');
		$this->db->from('products');
		$this->db->where('status_id', 1);
		if($cat_id !=0)
		$this->db->where('category_id',$cat_id);

		$this->db->order_by("modified_at", "desc"); 
		$this->db->limit($offset,$num);
		$result = $this->db->get();

		//echo $this->db->last_query();exit;
		/*if($cat_id !=0)
		$where = " where category_id =".$cat_id;
		else
		$where ="";

		$query=$this->db->query("select * from products ".$where." order by modified_at desc");

		$product_details['product'] = $query->result_array();

		//echo "<pre>";print_r($product_details);exit;

		foreach($product_details['product'] as $key=>$values){

			$query_rating=$this->db->query("select * from prod_ratings where prod_id = ".$values['id']);

			$product_rating['rating'] = $query_rating->result_array();
			$product = array_merge($product_details['product'],$product_rating['rating']);

			
			
		}

		echo "<pre>";print_r($product);exit;

		

		echo "<pre>";print_r($product);exit;*/


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



};


/* End of file category_model.php */
/* Location: ./system/application/models/category.php */
