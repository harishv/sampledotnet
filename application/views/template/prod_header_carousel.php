<div class="slide flt-l mgn-15b">
	<a href="#" class="flt-l mgn-15px next">
		<?php
			$image_properties = array('src' => 'img/prev.jpg','alt' => 'Previous');
			echo img($image_properties);
		?>
	</a>
	<ul id="mycarousel" class="jcarousel-skin-tango mgn-15b">
		<?php if(isset($featured_products) && $featured_products != '') {
				foreach ($featured_products as $featured_products_key => $featured_products_values) { ?>
					<li>
						<a href="<?php echo base_url().'product/product_detail/'.$featured_products_values['id'];?>">
							<img src="<?php echo base_url().PROD_THUMB_IMG_PATH.'thumb_'.$featured_products_values['image'];?>" alt="<?php echo $featured_products_values['name']; ?>" width='86' height='98' />
							<br />
							<?php
								$featured_short_desc = substr($featured_products_values['name'], 0, 8);
								if(strlen($featured_products_values['name']) > 12)
									echo $featured_short_desc."...";
								else
									echo $featured_products_values['name'];
							?>
						</a>
					</li>
			<?php }
			} ?>
	</ul>
	<a href="#" class="flt-l mgn-15px next"><?php $image_properties = array('src' => 'img/next.jpg','alt' => 'Previous');
			echo img($image_properties);
		?></a>
</div>