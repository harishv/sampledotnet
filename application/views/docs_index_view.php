<?php
if(!$render) { ?>
<!-- <script type="text/javascript" src="<?php echo base_url("js"); ?>/category.js"></script> -->


<!-- ShareThis Scripts to display Social media Shares over the page -->
<script type="text/javascript">var switchTo5x=false;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>


<!-- Begin main-content div -->
<div id="main-content" class="flt-l wid_100">
	<!-- Begin content div -->
	<div id="content" class="flt-l">
		<div class="hgt-15px wid_100"></div>

		<div class="hgt-15px"></div>
		
		<!-- Begin slideshow -->
		<div class="slide flt-l mgn-15b">
			<div class="top-container" style="margin:0px; height:30px; padding-left:5px;">
				Home&nbsp;
				<img src="<?php echo base_url(); ?>img/blue-bullet.jpg" />
				<span style="font-weight:bold;">&nbsp; Documents</span>
			</div>
		
			<div class="sidebar">
				<ul>
					<li><a href="#">Rental Agreement<br />Template</a></li>
					<li><a href="#">Rental Agreement<br />Template</a></li>
					<li><a href="#">Rental Agreement<br />Template</a></li>
					<li><a href="#">Rental Agreement<br />Template</a></li>
					<li><a href="#">Rental Agreement<br />Template</a></li>
				</ul>
			</div>

			<!-- sidebar -->
			<div class="right-bar">
				<img src="<?php echo base_url(); ?>img/banner-01.jpg" />
			</div>
			<!-- right-bar -->
		</div>

		<!-- featured-document -->
		<div id="featured-document"> 
			<div class="sub">Featured Documents</div>
			<!-- <iframe src="slider2.html" class="tabs1" style="height:330px;overflow:hidden;" scrolling="no"></iframe> -->
			<?php include_once 'template/doc_header_carousel.php';?>
		</div>

		<!-- search-box -->
		<div id="search-box">
			<div class="search-bar">
				<form name="doc_serach_form" method="get" action="http://www.google.com/search"  target="_blank">
					<input type="text" placeholder="Search for your document here..." value="" />
					<div class="search-now">
						<img src="<?php echo base_url(); ?>img/search-now.jpg" onClick="document.doc_serach_form.submit();" />
					</div>
					<!-- <input class="btn btn-success pull-right" type="submit" value="Search" /> -->
				</form>				
			</div>
		</div>

		<!-- Begin column 1 -->
			<?php include_once 'template/doc_leftnav.php';?>
		<!-- End column 1 -->

		<!-- Begin column 2 -->
		<div class="col-2 flt-l">
			<!-- Begin sample here -->
			<div class="sample mgn-15b">
				<!-- <p class="head mgn-0">
					<img src="<?php echo base_url(); ?>img/time-icon.png" alt="time" class="flt-l mgn-10l mgn-r" />
					Today's Free Samples <em>We have <?php if(isset($product_count) && $product_count !='') echo $product_count;?> Free Coupons for you today</em>
				</p> -->
				<p class="head mgn-0">&nbsp;&nbsp;&nbsp; Most Popular &amp; Downloded Documents</p>
				<div id="replace">
					<!-- for the refreshing issue start-->
					<?php } ?>

					<?php include_once 'documents_thumbs_view.php'; ?>

					<div class="pages">
						<?php echo $this->pagination->create_links();?>
					</div>

					<?php if(!$render) { ?>
				</div>
				<!-- for the refreshing issue  end-->

				<!-- End sample here -->
			</div>
			<!-- Begin tabs here -->
				<?php // include_once 'template/prod_footer_carousel.php';?>
			<!-- End tabs here -->
			<h2>What is Sample.net</h2>
			<p class="bdr-btm1">At samples.net, you find a wide variety of products and services absolutely free. There are huge set of
categories to choose from. We update product samples very frequently to let you reach the offer provider
within the deadline.<br><br>
The sources of samples are mostly genuine and reliable as we verify them prior to publishing. We
address every single query that we receive on the site to let you grab the right deals on time.</p>
			<h2>How to use Sample.net</h2>
			<p class="bdr-btm1">The free samples are listed into various categories to find out what you exactly need. Select a particular
category and then a sub category to browse the list of products in the section.<br><br>
Hit the <b><i>Grab It Now!</i></b> link on something that interests you and fill a form on the page that you are redirected
to. That’s it! You will receive the product very soon. Before that, be sure that the sample is available in
your country at that point in time.<br><br>
You can contact us on our Face book page or email us to post a query. Don’t forget to register with us to
get the latest updates to your email. Also do share the samples on your favorite social networking sites.</p>
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
