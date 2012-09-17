<?php
if(!$render) { ?>
<script type="text/javascript" src="<?php echo base_url("js"); ?>/category.js"></script>


<!-- ShareThis Scripts to display Social media Shares over the page -->
<script type="text/javascript">var switchTo5x=false;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>


<!-- Begin main-content div -->
<div id="main-content" class="flt-l wid_100">
	<!-- Begin content div -->
	<div id="content" class="flt-l">
		<div class="hgt-15px wid_100"></div>
		<span class="small flt-r pdg_15px"><?php echo "Updated ".$product_updated." ago";?>
		</span>
		<h1>Featured Samples</h1>
		<span class="bdr-btm"></span>
		<div class="hgt-15px"></div>
		<!-- Begin slideshow -->
			<?php include_once 'template/prod_header_carousel.php';?>
		<!-- End slideshow -->

		<!-- Begin column 1 -->
			<?php include_once 'template/prod_leftnav.php';?>
		<!-- End column 1 -->

		<!-- Begin column 2 -->
		<div class="col-2 flt-l">
			<!-- Begin sample here -->
			<div class="sample mgn-15b">
				<p class="head mgn-0">
					<img src="<?php echo base_url(); ?>img/time-icon.png" alt="time" class="flt-l mgn-10l mgn-r" />
					Today's Free Samples <em>We have 127 Free Coupons for you today</em>
				</p>
				<div id="replace">
					<!-- for the refreshing issue start-->
					<?php } ?>
					<?php
						if(isset($product) && $product != '') {
							foreach ($product as $product_key => $product_values) { ?>
								<!-- Begin Samples here -->
								<div class="samples">
									<img src="<?php echo base_url(); ?>img/only-today.png" alt="only today" class="only-today" />
									<a href="<?php echo base_url().'product/product_detail/'.$product_values['id'];?>">
										<img src="<?php echo base_url().PROD_THUMB_IMG_PATH.'thumb_'.$product_values['image'];?>" width='54' height='63' class='small' />
									</a>
									<p class="pdg_10px">
										<a href="<?php echo base_url().'product/product_detail/'.$product_values['id'];?>"><strong><?php echo $product_values['name'];?></strong></a>
										<br />
										<?php
											$short_desc = substr($product_values['description'], 0, 50);
											if(strlen($product_values['description']) > 50)
												echo $short_desc."...";
											else
												echo $product_values['description'];
										?>
									</p>
									<br />
									<div class="star" value="<?php echo $product_values['id'];?>" datarating="<?php echo $product_values['product_rating'];?>"></div>
									
									<div class="clear"></div>
									<a class="grab flt-r" href="<?php echo $product_values['grab_url'];?>">grab it now!</a>
										<div class="social clear">
											<span class='st_facebook'></span>
											<span class='st_twitter'></span>
											<span class='st_googleplus'></span>
											<span class='st_sharethis'></span>
										</div>
								</div>
								<!-- End Samples here -->
					<?php }
					} else {
						echo "No Products are avaiable";
                	} ?>
					<div class="pages">
						<?php echo $this->pagination->create_links();?>
					</div>
					<?php if(!$render) { ?>
				</div>
				<!-- for the refreshing issue  end-->

				<!-- End sample here -->
			</div>
			<!-- Begin tabs here -->
				<?php include_once 'template/prod_footer_carousel.php';?>
			<!-- End tabs here -->
			<h2>What is Sample.net</h2>
			<p class="bdr-btm1">Lorem ipsum dolor sit amet, consectetuer
				adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet
				dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam,
				quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut
				aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in
				hendrerit in vulputate velit esse molestie consequat, vel illum
				dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto
				odio dignissim qui blandit praesent luptatum zzril delenit augue
				duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta
				nobis eleifend option congue nihil imperdiet domin g id quod mazim
				placerat facer possim assum. Typi non habent claritatem insitam.</p>
			<h2>How to use Sample.net</h2>
			<!-- End column 2 -->
		</div>
		<!-- End content div -->
	</div>
	<!-- Begin sidebar div -->
		<?php include_once 'template/prod_rightnav.php';?>
	<!-- End sidebar div -->
</div>
<!-- End main-content div -->
<?php } ?>