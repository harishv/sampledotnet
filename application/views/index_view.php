<?php 
if(!$render){

?>
<script>
var base_url = "<?php echo base_url();?>";/* global variable for the root path */

</script>
<script type="text/javascript" src="<?php echo base_url("js"); ?>/category.js"></script>
<div id="replace"><!-- for the refreshing issue  start-->
<?php }?>  


<!-- Begin main-content div -->
<div id="main-content" class="flt-l wid_100">
	<!-- Begin content div -->
	<div id="content" class="flt-l">
		<div class="hgt-15px wid_100"></div>
		<span class="small flt-r pdg_15px">Updated 4 hours ago</span>
		<h1>Featured Samples</h1>
		<span class="bdr-btm"></span>
		<div class="hgt-15px"></div>
		<!-- Begin slideshow -->
		<div class="slide flt-l mgn-15b">
			<a href="#" class="flt-l mgn-15px next">
				<?php $image_properties = array('src' => 'img/prev.jpg','alt' => 'Previous');
								echo img($image_properties);?>
				
			</a>
			<ul id="mycarousel"  class="jcarousel-skin-tango mgn-15b">
				<?php //echo "<pre>";print_r($featured_products);exit;?>
				 <?php if(isset($featured_products) && $featured_products!=''){
						foreach ($featured_products as $featured_products_key=>$featured_products_values){ ?>
				<li>
					<a href="#" class="current">
						<a href="<?php echo base_url().'product/product_detail/'.$featured_products_values['id'];?>"><?php $image_properties = array('src' => PROD_THUMB_IMG_PATH.'thumb_'.$featured_products_values['image'],'alt' => $featured_products_values['name'],'class'=>'small');
								echo img($image_properties);?>
						<br />
						<?php echo $featured_products_values['name'];?>
					</a>
				</li>
				<?php } } ?>
			</ul>
			<a href="#" class="flt-l mgn-15px next">
				<?php $image_properties = array('src' => 'img/next.jpg','alt' => 'Previous');
				echo img($image_properties);?>
				
			</a>
			<!-- End slideshow -->
		</div>
		<!-- Begin column 1 -->
		<div class="col-1 bdr-1 flt-l mgn-r min-h">
			<!-- Begin categories -->
			<div class="categories mgn-15b">
				<p class="head mgn-0">
					<span class="mgn-20l">Categories</span>
				</p>

				
				<ul>
					<?php if(isset($category) && $category !=''){
								foreach($category as $cat_id=>$cat_values){ ?>
					<li>
						<a href="<?php echo base_url().'category/get_category_product/'.$cat_values['id'];?>"><?php echo $cat_values['prod_cat_name'];?></a>
					</li>
					<?php } } ?>
					
				</ul>
				<!-- End categories -->
			</div>
			
			<!-- End column 1 -->
		</div>
		<!-- Begin column 2 -->
		<div class="col-2 flt-l">
			<!-- Begin sample here -->
			<div class="sample mgn-15b">
				<p class="head mgn-0">
					<img src="<?php echo base_url(); ?>img/time-icon.png" alt="time" class="flt-l mgn-10l mgn-r" />
					Today's Free Samples <em>We have 127 Free Coupons for you today</em>
				</p>

				<?php if(isset($product) && $product!=''){
						foreach ($product as $product_key=>$product_values){ ?>
				<!-- Begin Samples here -->
				<div class="samples">
					<img src="<?php echo base_url(); ?>img/only-today.png" alt="only today" class="only-today" />
					
					<a href="<?php echo base_url().'product/product_detail/'.$product_values['id'];?>"><?php $image_properties = array('src' => PROD_THUMB_IMG_PATH.'thumb_'.$product_values['image'],'alt' => $product_values['name'],'class'=>'small');
								echo img($image_properties);?><a/>
					<p class="pdg_10px"> <a href="<?php echo base_url().'product/product_detail/'.$product_values['id'];?>"><strong><?php echo $product_values['name'];?></strong></a>
						<br/><?php  $short_desc = substr($product_values['description'],0,50); if(strlen($product_values['description']) > 50) echo $short_desc."..."; else echo $product_values['description'];?>
					</p>
					<br />


					<div class="star" id="ratings">
						<?php 
						if($product_values['product_rating'] != 0 ){
							for($i=1 ;$i<=$product_values['product_rating'];$i++){ ?>
							<img src="<?php echo base_url(); ?>img/star-full.png" alt="full" />
							<?php } 
						}else{
							for($i=1 ;$i<=5;$i++){ ?>
							<img src="<?php echo base_url(); ?>img/star-off.png" alt="full"  onclick="prod_rating(<?php echo $product_values['id'];?>,<?php echo $i;?>);"/>
							<input type="hidden" name="rating_vote" value="<?php echo $i;?>" /> 
							<?php } 
						}

						if($product_values['product_rating'] != 0 && $product_values['product_rating'] < 5){
							for($i=1;$i<=(5-$product_values['product_rating']);$i++){ ?>
							<img src="<?php echo base_url(); ?>img/star-off.png" alt="full" onclick="prod_rating(<?php echo $product_values['id'];?>,<?php echo $product_values['product_rating'] +$i; ?>);"/>
							<input type="hidden" name="rating_vote" value="<?php echo $product_values['product_rating'] +$i; ?>" />
							<?php }
						}
						?>
						
					</div>

					<div class="clear"></div>
					<a  class="grab flt-r" href="<?php echo $product_values['grab_url'];?>">grab it now!</a>
					<div class="social clear">
						<a href="#">
							<?php $image_properties = array('src' => 'img/facebook.jpg','alt' => 'facebook');
								echo img($image_properties);?>
							
						</a>
						<a href="#">
							
							<?php $image_properties = array('src' => 'img/skype.jpg','alt' => 'skype');
								echo img($image_properties);?>
						</a>
						<span class="share">
							<a href="#">
								<?php $image_properties = array('src' => 'img/share.jpg','alt' => 'share','class'=>'flt-r');
								echo img($image_properties);?>
								
							</a>
						</span>
					</div>
					<!-- End Samples here -->
				</div>
				<?php } } else{

                  echo "No Products are avaiable";
                }?>
				
				
				
				
				
				
			<div class="pages">
				<!--<a href="#">&lt;</a>
					<a href="#">1</a>
					<a href="#">2</a>
					<a href="#">3</a>
					<a href="#" class="current">4</a>
					<a href="#">5</a>
					<span class="more">
						<strong>&hellip;</strong>
					</span>
					<a href="#">10</a>
					<a href="#">20</a>
					<a href="#">30</a>
					<a href="#">&gt;</a>  -->
					<?php echo $this->pagination->create_links();?>
				</div> 
				<!-- End sample here -->
			</div>
			<!-- Begin tabs here -->
			<div class="tabs">
				<ul>
					<li>
						<a href="#" class="current">Beauty</a>
					</li>
					<li>
						<a href="#">Health</a>
					</li>
					<li>
						<a href="#">Kids</a>
					</li>
					<li>
						<a href="#">Pets</a>
					</li>
					<li class="last">
						<a href="#">Games</a>
					</li>
				</ul>
				
				<?php echo $slider;?>
				<!-- End tabs here -->
			</div>
			<h2>What is Sample.net</h2>
			<p class="bdr-btm1">
				Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet domin g id quod mazim placerat facer possim assum. Typi non habent claritatem insitam.
			</p>
			<h2>How to use Sample.net</h2>
			<!-- End column 2 -->
		</div>
		<!-- End content div -->
	</div>
	<!-- Begin sidebar div -->
	<div id="sidebar" class="flt-r">
		<!-- Begin search -->
		<div class="search">
			<input class="sch" type="text" value="search" onFocus="this.value=''" />
			<br />
			<a class="grab flt-r">search</a>
			<!-- End search -->
		</div>
		<ul class="btn">
			<li>
				<a href="#">
					<?php $image_properties = array('src' => 'img/share-a-sample.png','alt' => 'share a sample');
								echo img($image_properties);?>
					
				</a>
			</li>
		</ul>
		<p class="free-sample">
			<?php $image_properties = array('src' => 'img/gift.png','alt' => 'gift','class'=>'flt-r');
								echo img($image_properties);?>
			
			Get free samples
			<br />
			0n
			<strong>Facebook</strong>
			<br />
			<a href="#">
				<?php $image_properties = array('src' => 'img/like.jpg','alt' => 'like');
								echo img($image_properties);?>
				
			</a>
		</p>
		<ul class="btn">
			<li>
				<a href="#">
					<?php $image_properties = array('src' => 'img/follow-twitter.png','alt' => 'follow us on twitter');
								echo img($image_properties);?>
					
				</a>
			</li>
			<li>
				<a href="#">
					<?php $image_properties = array('src' => 'img/add-to-circles.png','alt' => 'add to circles');
								echo img($image_properties);?>
					
					
				</a>
			</li>
			<li>
				<a href="#">
					<?php $image_properties = array('src' => 'img/pintrest.png','alt' => 'pintrest');
								echo img($image_properties);?>
					
				</a>
			</li>
		</ul>
		<!-- Begin Subscribe div -->
		<div class="subscribe">
			<?php $image_properties = array('src' => 'img/free-samples.png','alt' => 'free samples','class'=>'mgn-15b');
								echo img($image_properties);?>
			
			<input type="text" class="free" value="Enter Your Name" onFocus="this.value=''" />
			<input type="text" class="free" value="Enter Your Email" onFocus="this.value=''" />
			<a href="#" class="subscribe-btn">&nbsp;</a>
			<!-- End Subscribe div -->
		</div>
		<?php $image_properties = array('src' => 'img/fap-turbo.jpg','alt' => 'fab turbo','class'=>'mgn-15b');
								echo img($image_properties);?>
		<?php $image_properties = array('src' => 'img/kaboom.jp','alt' => 'kaboom');
								echo img($image_properties);?>
		
		
		<!-- End sidebar div -->
	</div>
	<!-- End main-content div -->
</div>
<?php if(!$render){ ?>
</div><!-- for the refreshing issue  end-->
<?php } ?>
