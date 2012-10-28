<?php
if(isset($products) && $products != '' && count($products) > 0) { ?>
	<?php include_once 'product_rating_js.php'; ?>
	<!-- Begin Samples here -->
	<?php foreach ($products as $product_value) { ?>
		<div class="samples">
			<?php if($product_value['only_today'] == 1 ){ ?>
			<img src="<?php echo base_url(); ?>img/only-today.png" alt="Only Today" class="only-today" />
			<?php } ?>
			<a href="<?php echo base_url().'product/product_detail/'.$product_value['id'];?>"><img src="<?php echo base_url().PROD_THUMB_IMG_PATH.'thumb_'.$product_value['image'];?>" width='54' height='63' class='small' /></a>
			<p class="pdg_10px">
				<a href="<?php echo base_url().'product/product_detail/'.$product_value['id'];?>"><strong><?php echo $product_value['name'];?></strong></a>
				<br>
				<?php echo (strlen($product_value['description']) > 90) ? substr($product_value['description'], 0, 88) . '..' : $product_value['description']; ?>
			</p>
			<br>
			<div class="star" id="ratings">
				<?php include '5_star_rating_view.php'; ?>
			</div>
			<!--<div class="star" value="<?php //echo $product_value['id'];?>" datarating="<?php //echo $product_value['product_rating'];?>"></div> -->

			<div class="clear"></div>
			<a class="grab flt-r" href="#" onclick="grab_now('<?php echo $product_value['id'];?> ','<?php echo $product_value['grab_url'];?>')">grab it now!</a>
				<div class="social clear">
					<span class='st_facebook'></span>
					<span class='st_twitter'></span>
					<span class='st_googleplus'></span>
					<span class='st_sharethis'></span>
				</div>
		</div>
<?php } ?>
	<!-- End Samples here -->
<?php } else {
	echo "No Products avaiable to display.";
} ?>