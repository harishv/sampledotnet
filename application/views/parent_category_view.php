<?php

echo "<pre>";
foreach($sub_categories as $cat_key=>$key_values){
		
			

			$sub = $this->category_model->get_sub_cat_prod($key_values['id']);
			if(!empty($sub)) {
			echo "category Name :" .$key_values['prod_cat_name'];echo "<br />";
			if(isset($sub) && $sub !=''){
				$count = 0;
				foreach($sub as $key=>$values){ 
					echo $values['name']; echo "<br/>";
					$count ++;
				}
				
				 if($count > 2) { ?>
					<a href="<?php echo base_url().'category/get_category_product/'.$key_values['id'];?>">More</a>
					`<?php } ?>
			<?php } }
}


?>





