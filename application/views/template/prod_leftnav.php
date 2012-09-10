<div class="col-1 bdr-1 flt-l mgn-r min-h">
	<!-- Begin categories -->
	<div class="categories mgn-15b">
		<p class="head mgn-0">
			<span class="mgn-20l">Categories</span>
		</p>
		<ul>
			<?php
				if(isset($category) && $category !='') {
					foreach($category as $cat_id=>$cat_values) {
						$sub_cat = $this->category_model->get_sub_cat($cat_values['id']); ?>
						<li>
							<a href="<?php if($sub_cat =='')echo base_url().'category/get_category_product/'.$cat_values['id']; else echo "#";?>"><?php echo $cat_values['prod_cat_name'];?></a>
							<?php if(isset($sub_cat) && $sub_cat !='') { ?>
							<ol>
								<?php foreach($sub_cat as $sub_cat_id=>$sub_cat_values) { ?>
								<li>
									<a href="<?php echo base_url().'category/get_category_product/'.$sub_cat_values['id'];?>"><?php echo $sub_cat_values['prod_cat_name'];?></a>
								</li>
								<?php } ?>
							</ol>
							<?php } ?>
						</li>
				<?php }
				} ?>
		</ul>
	</div>
	<!-- End categories -->
</div>