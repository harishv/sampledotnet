<?php  if($this->session->userdata('comment_errors')!="") {
$errors=$this->session->userdata('comment_errors');
	$error_child = array('comment_errors'  => '', );
	$this->session->unset_userdata($error_child);

	}



?>

<script type="text/javascript">var switchTo5x=false;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "18f4acdf-af25-4d39-b663-78b081a6f60e"}); </script>
<script>
function comments_validate(){
var comment_obj = document.getElementById("comment_area");
if(comment_obj == null || comment_obj.value.trim() ==''){
	alert("Comments Should not be null or Empty ");
	return false;
}
return true;
}

</script>

<script>
var base_url = "<?php echo base_url();?>";/* global variable for the root path */
</script>

<script type="text/javascript" src="<?php echo base_url("js"); ?>/category.js"></script>

<!-- Begin main-content div -->
<div class="flt-l wid_100" id="main-content">
	<!-- Begin content div -->
	<div class="flt-l" id="content">
		<!-- Begin column 1 -->
		<?php include_once 'template/prod_leftnav.php';?>
		<!-- End column 1 -->

		<div class="col-2 flt-l">
			<?php //echo "<pre>";print_r($bread_crum);?>
			<p class="links">
				 <a href="<?php echo base_url();?>">Home</a>
				  <?php if(isset($bread_crum['cat_name']) && $bread_crum['cat_name'] !=''){ ?>
				 <img alt="blue" src="<?php echo base_url().'img/blue-bullet.jpg';?>">
				 <?php } ?>

				 <?php if(isset($bread_crum) && $bread_crum['sub_cat_id'] !=''){ ?>

				 <?php if(isset($bread_crum['cat_name']) && $bread_crum['cat_name'] !='') ?> <a href="<?php echo base_url().'category/parent_category/'.$bread_crum['parent_cat_id']?>"> <?php echo $bread_crum['cat_name'];?></a>

				 <?php } else { ?>  <?php if(isset($bread_crum['cat_name']) && $bread_crum['cat_name'] !='') ?><a href="<?php echo base_url().'category/get_category_product/'.$bread_crum['parent_cat_id']?>"> <?php echo $bread_crum['cat_name'];?></a><?php }?>

				<?php if($bread_crum['sub_cat_name'] !='') { ?><img alt="blue" src="<?php echo base_url().'img/blue-bullet.jpg';?>">  <?php } ?><?php  if(isset($bread_crum) && $bread_crum !='') ?> <a href="<?php echo base_url().'category/get_category_product/'.$bread_crum['sub_cat_id']?>"><?php echo $bread_crum['sub_cat_name'];?></a>

				<?php if($bread_crum !='') { ?><img alt="blue" src="<?php echo base_url().'img/blue-bullet.jpg';?>">  <?php } ?><?php  if(isset($bread_crum) && $bread_crum !='') echo $prod_name;?>
			</p>

			


			<!-- Begin sample here -->
			<div class="sample mgn-15b">
				<p class="head mgn-15b"> <span class="mgn-10l"><?php echo html_entity_decode($product_details[0]['name']);?></span></p>
				 <div class="computers">
					<?php //$image_properties = array('src' => PROD_IMG_PATH.$product_details[0]['image']);echo img($image_properties);?>
					<a href="<?php echo base_url().PROD_IMG_PATH.$product_details[0]['image'];?>"><img src="<?php echo base_url().PROD_IMG_PATH.$product_details[0]['image'];?>" width='215' height='215' /></a>
					<p>
						<!-- <strong><?php echo $product_details[0]['name'];?></strong><br> -->
						<?php echo html_entity_decode($product_details[0]['description']);?><br><br>
					</p>
					<p class="grey">
						<span><strong>Valid in:</strong><?php if(isset($country_names) && $country_names!= ''){  echo implode(', ',$country_names);}?></span>
						<em><strong class="flt-l">User Rating:</strong>
							<?php include_once 'product_rating_js.php'; ?>

							<?php
							$product_value = $product_details[0];
							include '5_star_rating_view.php'; ?>
						</em>
					</p>
					<script type="text/javascript">
					function report_invalid (prod_id) {
						var data = {'prod_id': prod_id};

						$.ajax({
							url: base_url + 'product/report_invalid',
							type: 'POST',
							data: data,
							dataType: 'json',
							success: function(res) {
								alert(res.data);
								return false;
							}
						});
					}
					</script>
					<p class="grey">
						<span onclick="return report_invalid(<?php echo $product_details[0]['id'];?>);" style="color: #000000; cursor: pointer; text-decoration: underline;">Report Invalid</span>
						<em title="Click to view comments" id="display_comments" style="color: #000000; cursor: pointer; text-decoration: underline;">(<?php if(isset($comments) && $comments !=''){ echo count($comments); } else echo "0";?>) comments</em>
							<!-- <em><a id = "display_comments" href="">(<?php if(isset($comments) && $comments !=''){ echo count($comments); } else echo "0";?>) comments</a></em> -->
					</p>
					<p>
						<a class="grab flt-r" href="<?php echo base_url() . "product/grab_it_now/" . $product_details[0]['id']; ?>">grab it now!</a>
						<!-- <a class="grab flt-r" onclick="grab_now('<?php echo $product_details[0]['id'];?> ','<?php echo $product_details[0]['grab_url'];?>')"  >grab it now!</a> -->
					</p>
					<div class="hgt-15px wid_100"></div>
						<div class="social-networks-div hgt-15px wid_100">
							<span class='st_facebook_button' displayText='Facebook'></span>
							<span class='st_twitter_button' st_via='sampledotnet' displayText='Tweet'></span>
							<span class='st_linkedin_button' displayText='LinkedIn'></span>
							<span class='st_googleplus_button' displayText='Share'></span>
							<span class='st_sharethis_button' displayText='ShareThis'></span>
							<span class='st_email_button' displayText='Email'></span>
						</div>
						<div class="hgt-15px wid_100"></div>
					</div>
				</div>

			<!-- comments section start-->
			<div id="normal_comments" style="display: none;">
			<div class="comment-box">
				<?php
					$user_data = $this->session->userdata('user');
					if ($user_data['user_id'] != '') { ?>
						<div class="comment" id="login_comments">
							<p class="flt-r"></p>
								<h5>Enter your comments</h5>
								<div id="errors_comments" class="errors_data">
									<?php echo (isset($errors)) ? $errors : '';?>
								</div>
								<?php
									$attributes = array('id' => 'comments_data', 'name'=>'comments_data', 'method'=>'post','onSubmit' => 'return comments_validate();');
									echo form_open('product/user_comments/', $attributes);
								?>
									<input type="hidden" name="prod_id" value="<?php echo $product_details[0]['id'];?>" />
									<textarea rows="3" class="clear mgn-15b" id="comment_area" name="comment_area"></textarea>
									
									<input class="btn btn-small btn-primary pull-right" type="submit" name="submit" value="Comment" />
								<?php echo form_close(); ?>
						</div>
				<?php } ?>

			<!-- comments -->
			
			 <?php if(isset($comments) && $comments !=''){ ?>
			 	<h4>Comments</h4>
				<?php foreach($comments as $key=>$values){ ?>
						<div class="comments">
							<p>
								<strong class="mgn-r"><?php echo $values['first_name'] . " " . $values['last_name'];?></strong>
								<strong class="mgn-r">|</strong>
								<?php if(isset($update_data) && $update_data !=''){ ?>
								<span><?php echo $update_data[$key].'ago';?></span>
								<?php } ?>
								<br />
								<?php echo $values['comments'];  ?>
							</p>
						</div>
						<?php }
					} ?>
				<div style='clear:both;'></div>
			</div>
			</div>

			<!-- Begin Facebook Comments here -->
			<?php
			// Fetching the current url.
			$request_type = substr(base_url(),0, 5);
			if ($request_type != 'https')
				$request_type = 'http';
			$product_url = $request_type . '://' . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
			?>
			<fb:comments href="<?php echo $product_url;?>" publish_feed="true" num_posts="3" width="540"></fb:comments>
			<!-- End comments here -->

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
<!-- End inner wrapper div -->
