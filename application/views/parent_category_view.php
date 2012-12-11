<?php
/*
echo "<pre>";
foreach($sub_categories as $cat_key=>$key_values){

	$sub = $this->category_model->get_sub_cat_prod($key_values['id']);
	if(!empty($sub)) {
		echo "category Name :" .$key_values['prod_cat_name'];
		echo "<br />";

		if(isset($sub) && $sub !=''){
			$count = 0;
			foreach($sub as $key=>$values){
				echo $values['name']; echo "<br/>";
				$count ++;
			}

		 if($count > 2) { ?>
			<a href="<?php echo base_url().'category/get_category_product/'.$key_values['id'];?>">More</a>
		<?php } ?>
	<?php }
	}
}
echo "</pre>";
*/
?>


<?php
if(!$render){
?>
<script>
var base_url = "<?php echo base_url();?>";/* global variable for the root path */
</script>

<script type="text/javascript" src="<?php echo base_url("js"); ?>/category.js"></script>

<div id="replace"><!-- for the refreshing issue start-->
<?php }?>

	<!-- Begin main-content div -->
	<div class="flt-l wid_100" id="main-content">

		<!-- Begin content div -->
		<div class="flt-l" id="content">

			<!-- Begin column 1 -->
			<?php include_once 'template/prod_leftnav.php';?>
			<!-- End column 1 -->

			<!-- Begin column 2 -->
			<div class="col-2 flt-l">
				<p class="links">
					<a href="<?php echo base_url();?>">Home</a>
					<img alt="blue" src="<?php echo base_url().'img/blue-bullet.jpg';?>"/>
					<?php if(isset($bread_crum) && $bread_crum !='') { ?>
						<a href="<?php echo base_url().'category/get_category_product/'.$bread_crum['parent_cat_id']?>"><?php echo $bread_crum['cat_name'];?></a>
					<?php }
						if($bread_crum['cat_name'] !='') { ?>
						<img alt="blue" src="<?php echo base_url().'img/blue-bullet.jpg';?>" />
					<?php }
						if(isset($bread_crum) && $bread_crum !='')
							echo $bread_crum['sub_cat_name'];
					?>
				</p>

				<div class="sample mgn-15b">

					<p class="head mgn-0">
						<?php $image_properties = array('src' => 'img/time-icon.png','alt' => 'time','class'=>'flt-l mgn-10l mgn-r');
							echo img($image_properties);?>
						Today's Free Samples <em>We have <?php if(isset($product_count) && $product_count !='') echo $product_count;?> Free Coupons for you today</em>
					</p>

					<?php
						foreach ($sub_categories as $sub_cat) {
							$products = array();
							$products = $this->category_model->get_products($sub_cat['id'], 0, 5);
							//print_r($products);
							$more = false;

							if(count($products) > 4){
								$more = true;
								if(isset($products[4]))
									unset($products[4]);
							}
							?>
						<?php if(!empty($products)){ ?>
							<div class="sub_category_link">
								<span><?php echo $sub_cat['prod_cat_name'];?></span>
								<br>
								<?php include 'products_thumbs_view.php'; ?>
								<br>
								<?php if ($more) { ?>
									<p><a href="<?php echo base_url().'category/get_category_product/' . $sub_cat['id']; ?>">more >></a></p>
								<?php } ?>
							</div>
						<?php } ?>
					<?php }	?>

					<?php // include_once 'products_thumbs_view.php'; ?>

				</div>

				<div class="pages">
					<?php echo $this->pagination->create_links();?>
				</div>

				<!-- Begin tabs here -->
				<?php // include_once 'template/prod_footer_carousel.php';?>
				<!-- End tabs here -->

			<!-- End column 2 -->
			</div>
		<!-- End content div -->
		</div>

	   <!-- Begin sidebar div -->
		<?php include_once 'template/prod_rightnav.php';?>
	   <!-- End sidebar div -->

	<!-- End main-content div -->
	</div>
<?php if(!$render){ ?>
</div><!-- for the refreshing issue  end-->
<?php } ?>






