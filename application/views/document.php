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
	if($.trim($('#comment_area').val()) <= 0){
		alert("Comments should not be null or Empty ");
		$('#comment_area').val('').focus();
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
	
	<div class="top-container" style="width: 100%">
		<a href="<?php echo base_url() . '/documents';?>">Home</a>

		<?php if(isset($bread_crum['cat_name']) && $bread_crum['cat_name'] !=''){ ?>
			<img alt="blue" src="<?php echo base_url().'img/blue-bullet.jpg';?>">
		<?php } ?>

		<?php if(isset($bread_crum) && $bread_crum['sub_cat_id'] !=''){ ?>

		<?php if(isset($bread_crum['cat_name']) && $bread_crum['cat_name'] !='') ?>
			<a href="<?php echo base_url().'docs_category/parent_category/'.$bread_crum['parent_cat_id']?>"> <?php echo $bread_crum['cat_name'];?></a>
		<?php } else { ?>  <?php if(isset($bread_crum['cat_name']) && $bread_crum['cat_name'] !='') ?>
			<a href="<?php echo base_url().'docs_category/get_category_document/'.$bread_crum['parent_cat_id']?>"> <?php echo $bread_crum['cat_name'];?></a><?php }?>
		<?php if($bread_crum['sub_cat_name'] !='') { ?><img alt="blue" src="<?php echo base_url().'img/blue-bullet.jpg';?>">  <?php } ?><?php  if(isset($bread_crum) && $bread_crum !='') ?> <a href="<?php echo base_url().'docs_category/get_category_document/'.$bread_crum['sub_cat_id']?>"><?php echo $bread_crum['sub_cat_name'];?></a>

		<?php if($bread_crum !='') { ?><img alt="blue" src="<?php echo base_url().'img/blue-bullet.jpg';?>">  <?php } ?><?php  if(isset($bread_crum) && $bread_crum !='') echo $doc_name;?>
	</div>

	<div class="flt-l" id="content">
		<!-- Begin column 1 -->
		<?php // include_once 'template/doc_leftnav.php';?>
		<!-- End column 1 -->

		<div class="hgt-15px wid_100" style="min-height:750px;">

			<span>
				Title:
				<span style="color:#0c3b93;"><?php echo html_entity_decode($document_details[0]['name']);?></span>
			</span>
			<!-- <div class="download-box">
				<a href="#">Download This for</a>
				<span>$ 8.99</span>
			</div> -->
			<div class="pdf-book">
				<img src="<?php echo base_url().DOC_IMG_PATH.$document_details[0]['image'];?>" border="0" width="673px;" height="575px;" />
				<!-- usemap="#Map2" -->
				<!-- <map name="Map2" id="Map2">
					<area shape="rect" coords="172,770,228,782" href="#" />
					<area shape="rect" coords="322,773,381,794" href="#" />
				</map> -->
			</div>
		</div>

		<div class="bottom-information-container">
			<div class="left">
				<div class="social-bar">
					<!-- <img src="images/social3.jpg" border="0" usemap="#Map" style="float:left;" /> -->
					<div class="social-networks-div hgt-15px wid_100">
						<span class='st_facebook_button' displayText='Facebook'></span>
						<span class='st_twitter_button' st_via='sampledotnet' displayText='Tweet'></span>
						<span class='st_linkedin_button' displayText='LinkedIn'></span>
						<span class='st_googleplus_button' displayText='Share'></span>
						<span class='st_sharethis_button' displayText='ShareThis'></span>
						<span class='st_email_button' displayText='Email'></span>
					</div>
					<!-- <map name="Map" id="Map">
						<area shape="rect" coords="2,3,59,32" href="http://www.facebook.com" target="_blank" />
						<area shape="rect" coords="64,1,125,20" href="http://twitter.com/" target="_blank" />
						<area shape="rect" coords="128,2,185,21" href="#" />
						<area shape="rect" coords="190,2,249,22" href="#" />
						<area shape="rect" coords="254,2,339,24" href="#" />
						<area shape="rect" coords="341,0,401,30" href="#" />
					</map> -->
					<!-- <div class="download-box1">
						<a href="#">Download This for</a>
						<span>$ 8.99</span>
					</div> -->
				</div>

				<div id="container" >
					<div class="left">
						<div class="top-bar"></div>
						<div class="middle-bar">
							<span>Shared By :</span>
							<p>William J.Will</p>
							<span>Categories</span>
							<p><?php echo $this->common_model->get_doc_cat_name($document_details[0]['category_id']); ?></p>
							<span>Tags / Keyword</span>
							<p>Lorem ipsum,Dolor sit amet, Conseconsectetuer,  Adipiscing, Onsectetuer</p>
							<span>Views</span>
							<p>345</p>
							<span>Downloads</span>
							<p>345</p>
							<span>Available Formats</span>
							<p>pdf, excel, editable pdf</p>
							<div class="social clear">
								<span class='st_facebook'></span>
								<span class='st_twitter' st_via='sampledotnet'></span>
								<span class='st_googleplus'></span>
								<span class='st_sharethis'></span>
							</div>
						</div>
						<div class="bottom-bar"></div>
					</div>
					<!-- left-->
					<div class="right">
						<h2><?php echo html_entity_decode($document_details[0]['name']);?></h2>
						<p>
							<?php echo html_entity_decode($document_details[0]['description']);?>
						</p>
						<?php
							// Fetching the current url.
							$request_type = substr(base_url(),0, 5);
							if ($request_type != 'https')
								$request_type = 'http';
							$document_url = $request_type . '://' . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
						?>
						<fb:like href="<?php echo $document_url;?>" send="true" width="450" show_faces="true"></fb:like>

						<div class="hgt-15px"></div>

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
												echo form_open('document/user_comments/', $attributes);
											?>
												<input type="hidden" name="doc_id" value="<?php echo $document_details[0]['id'];?>" />
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

						<div class="hgt-15px"></div>
						
						<fb:comments href="<?php echo $document_url;?>" publish_feed="true" num_posts="3" width="525"></fb:comments>
						
						<!-- data --> </div>
					<!-- right --> </div>
				<!-- container --> </div>
			<!-- left -->
		</div>
		<!-- bottom-information-container -->
		<div class="hgt-15px"></div>
		<!-- Begin slideshow -->
		<!-- featured-document -->
		<!-- search-box -->
		<!-- Begin column 1 -->
		<!-- Begin column 2 -->
		<!-- End content div -->
		</div>


	<!-- Begin sidebar div -->
	<?php include_once 'template/doc_rightnav.php';?>
	<!-- End sidebar div -->

	<!-- End main-content div -->
</div>
<!-- End inner wrapper div -->
