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
				<img src="<?php base_url(); ?>img/prev.jpg" alt="Previous" />
			</a>
			<ul id="mycarousel"  class="jcarousel-skin-tango mgn-15b">
				<li>
					<a href="#" class="current">
						<img src="<?php base_url(); ?>img/huggies.png" alt="Huggies" />
						<br />
						Ketchup &amp; Jams
					</a>
				</li>
				<li>
					<a href="#">
						<img src="<?php base_url(); ?>img/huggies.png" alt="Huggies" />
						<br />
						Ketchup &amp; Jams
					</a>
				</li>
				<li>
					<a href="#">
						<img src="<?php base_url(); ?>img/huggies.png" alt="Huggies" />
						<br />
						Ketchup &amp; Jams
					</a>
				</li>
				<li>
					<a href="#">
						<img src="<?php base_url(); ?>img/huggies.png" alt="Huggies" />
						<br />
						Ketchup &amp; Jams
					</a>
				</li>
				<li>
					<a href="#">
						<img src="<?php base_url(); ?>img/huggies.png" alt="Huggies" />
						<br />
						Ketchup &amp; Jams
					</a>
				</li>
				<li>
					<a href="#">
						<img src="<?php base_url(); ?>img/huggies.png" alt="Huggies" />
						<br />
						Ketchup &amp; Jams
					</a>
				</li>
				<li>
					<a href="#">
						<img src="<?php base_url(); ?>img/huggies.png" alt="Huggies" />
						<br />
						Ketchup &amp; Jams
					</a>
				</li>
				<li>
					<a href="#">
						<img src="<?php base_url(); ?>img/huggies.png" alt="Huggies" />
						<br />
						Ketchup &amp; Jams
					</a>
				</li>
				<li>
					<a href="#">
						<img src="<?php base_url(); ?>img/huggies.png" alt="Huggies" />
						<br />
						Ketchup &amp; Jams
					</a>
				</li>
				<li>
					<a href="#">
						<img src="<?php base_url(); ?>img/huggies.png" alt="Huggies" />
						<br />
						Ketchup &amp; Jams
					</a>
				</li>
			</ul>
			<a href="#" class="flt-l mgn-15px next">
				<img src="<?php base_url(); ?>img/next.jpg" alt="Previous" />
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
						<a href="#"><?php echo $cat_values['prod_cat_name'];?></a>
					</li>
					<?php } }?>
					
				</ul>
				<!-- End categories -->
			</div>
			<img src="<?php base_url(); ?>img/left-ad.jpg" alt="ad" class="mgn-10l mgn-15b" />
			<!-- End column 1 -->
		</div>
		<!-- Begin column 2 -->
		<div class="col-2 flt-l">
			<!-- Begin sample here -->
			<div class="sample mgn-15b">
				<p class="head mgn-0">
					<img src="<?php base_url(); ?>img/time-icon.png" alt="time" class="flt-l mgn-10l mgn-r" />
					Today's Free Samples <em>We have 127 Free Coupons for you today</em>
				</p>
				<!-- Begin Samples here -->
				<div class="samples">
					<img src="<?php base_url(); ?>img/only-today.png" alt="only today" class="only-today" />
					<a href="<?php echo base_url().'product';?>"><img src="<?php base_url(); ?>img/huggie-small.png" alt="huggies" class="small" /><a/>
					<p class="pdg_10px"> <a href="<?php echo base_url().'product';?>"><strong>Ketchup &amp; Jams</strong></a>
						<br />
						When you buy one bag
						<br />
						M&amp;M’S Brand Pretzel
						<br />
						Chocolate Candies
						<br />
						(9.9 oz. or larger).
					</p>
					<br />
					<div class="star">
						<img src="<?php base_url(); ?>img/star-full.png" alt="full" />
						<img src="<?php base_url(); ?>img/star-full.png" alt="full"/>
						<img src="<?php base_url(); ?>img/star-full.png" alt="full" />
						<img src="<?php base_url(); ?>img/star-full.png" alt="full" />
						<img src="<?php base_url(); ?>img/star-off.png" alt="full" />
					</div>
					<div class="clear"></div>
					<a class="grab flt-r">grab it now!</a>
					<div class="social clear">
						<a href="#">
							<img src="<?php base_url(); ?>img/facebook.jpg" alt="facebook" />
						</a>
						<a href="#">
							<img src="<?php base_url(); ?>img/skype.jpg" alt="skype" />
						</a>
						<span class="share">
							<a href="#">
								<img src="<?php base_url(); ?>img/share.jpg" alt="share" class="flt-r" />
							</a>
						</span>
					</div>
					<!-- End Samples here -->
				</div>
				<!-- Begin Samples here -->
				<div class="samples">
					<a href="<?php echo base_url().'product';?>"><img src="<?php base_url(); ?>img/huggie-small.png" alt="huggies" class="small" /><a/>
					<p class="pdg_10px"> <a href="<?php echo base_url().'product';?>"><strong>Ketchup &amp; Jams</strong><a/>
						<br />
						When you buy one bag
						<br />
						M&amp;M’S Brand Pretzel
						<br />
						Chocolate Candies
						<br />
						(9.9 oz. or larger).
					</p>
					<br />
					<div class="star">
						<img src="<?php base_url(); ?>img/star-full.png" alt="full" />
						<img src="<?php base_url(); ?>img/star-full.png" alt="full"/>
						<img src="<?php base_url(); ?>img/star-full.png" alt="full" />
						<img src="<?php base_url(); ?>img/star-full.png" alt="full" />
						<img src="<?php base_url(); ?>img/star-off.png" alt="full" />
					</div>
					<div class="clear"></div>
					<a class="grab flt-r">grab it now!</a>
					<div class="social clear">
						<a href="#">
							<img src="<?php base_url(); ?>img/facebook.jpg" alt="facebook" />
						</a>
						<a href="#">
							<img src="<?php base_url(); ?>img/skype.jpg" alt="skype" />
						</a>
						<span class="share">
							<a href="#">
								<img src="<?php base_url(); ?>img/share.jpg" alt="share" class="flt-r" />
							</a>
						</span>
					</div>
					<!-- End Samples here -->
				</div>
				<!-- Begin Samples here -->
				<div class="samples">
					<a href="<?php echo base_url().'product';?>"> <img src="<?php base_url(); ?>img/huggie-small.png" alt="huggies" class="small" /></a>
					<p class="pdg_10px">
						<a href="<?php echo base_url().'product';?>"><strong>Ketchup &amp; Jams</strong></a>
						<br />
						When you buy one bag
						<br />
						M&amp;M’S Brand Pretzel
						<br />
						Chocolate Candies
						<br />
						(9.9 oz. or larger).
					</p>
					<br />
					<div class="star">
						<img src="<?php base_url(); ?>img/star-full.png" alt="full" />
						<img src="<?php base_url(); ?>img/star-full.png" alt="full"/>
						<img src="<?php base_url(); ?>img/star-full.png" alt="full" />
						<img src="<?php base_url(); ?>img/star-full.png" alt="full" />
						<img src="<?php base_url(); ?>img/star-off.png" alt="full" />
					</div>
					<div class="clear"></div>
					<a class="grab flt-r">grab it now!</a>
					<div class="social clear">
						<a href="#">
							<img src="<?php base_url(); ?>img/facebook.jpg" alt="facebook" />
						</a>
						<a href="#">
							<img src="<?php base_url(); ?>img/skype.jpg" alt="skype" />
						</a>
						<span class="share">
							<a href="#">
								<img src="<?php base_url(); ?>img/share.jpg" alt="share" class="flt-r" />
							</a>
						</span>
					</div>
					<!-- End Samples here -->
				</div>
				<!-- Begin Samples here -->
				<div class="samples">
					<a href="<?php echo base_url().'product';?>"><img src="<?php base_url(); ?>img/huggie-small.png" alt="huggies" class="small" /><a/>
					<p class="pdg_10px">
						<a href="<?php echo base_url().'product';?>"><strong>Ketchup &amp; Jams</strong></a>
						<br />
						When you buy one bag
						<br />
						M&amp;M’S Brand Pretzel
						<br />
						Chocolate Candies
						<br />
						(9.9 oz. or larger).
					</p>
					<br />
					<div class="star">
						<img src="<?php base_url(); ?>img/star-full.png" alt="full" />
						<img src="<?php base_url(); ?>img/star-full.png" alt="full"/>
						<img src="<?php base_url(); ?>img/star-full.png" alt="full" />
						<img src="<?php base_url(); ?>img/star-full.png" alt="full" />
						<img src="<?php base_url(); ?>img/star-off.png" alt="full" />
					</div>
					<div class="clear"></div>
					<a class="grab flt-r">grab it now!</a>
					<div class="social clear">
						<a href="#">
							<img src="<?php base_url(); ?>img/facebook.jpg" alt="facebook" />
						</a>
						<a href="#">
							<img src="<?php base_url(); ?>img/skype.jpg" alt="skype" />
						</a>
						<span class="share">
							<a href="#">
								<img src="<?php base_url(); ?>img/share.jpg" alt="share" class="flt-r" />
							</a>
						</span>
					</div>
					<!-- End Samples here -->
				</div>
				<!-- Begin Samples here -->
				<div class="samples">
					<a href="<?php echo base_url().'product';?>"><img src="<?php base_url(); ?>img/huggie-small.png" alt="huggies" class="small" /></a>
					<p class="pdg_10px">
						<a href="<?php echo base_url().'product';?>"><strong>Ketchup &amp; Jams</strong></a>
						<br />
						When you buy one bag
						<br />
						M&amp;M’S Brand Pretzel
						<br />
						Chocolate Candies
						<br />
						(9.9 oz. or larger).
					</p>
					<br />
					<div class="star">
						<img src="<?php base_url(); ?>img/star-full.png" alt="full" />
						<img src="<?php base_url(); ?>img/star-full.png" alt="full"/>
						<img src="<?php base_url(); ?>img/star-full.png" alt="full" />
						<img src="<?php base_url(); ?>img/star-full.png" alt="full" />
						<img src="<?php base_url(); ?>img/star-off.png" alt="full" />
					</div>
					<div class="clear"></div>
					<a class="grab flt-r">grab it now!</a>
					<div class="social clear">
						<a href="#">
							<img src="<?php base_url(); ?>img/facebook.jpg" alt="facebook" />
						</a>
						<a href="#">
							<img src="<?php base_url(); ?>img/skype.jpg" alt="skype" />
						</a>
						<span class="share">
							<a href="#">
								<img src="<?php base_url(); ?>img/share.jpg" alt="share" class="flt-r" />
							</a>
						</span>
					</div>
					<!-- End Samples here -->
				</div>
				<!-- Begin Samples here -->
				<div class="samples">
					<a href="<?php echo base_url().'product';?>"><img src="<?php base_url(); ?>img/huggie-small.png" alt="huggies" class="small" /></a>
					<p class="pdg_10px">
						<a href="<?php echo base_url().'product';?>"><strong>Ketchup &amp; Jams</strong></a>
						<br />
						When you buy one bag
						<br />
						M&amp;M’S Brand Pretzel
						<br />
						Chocolate Candies
						<br />
						(9.9 oz. or larger).
					</p>
					<br />
					<div class="star">
						<img src="<?php base_url(); ?>img/star-full.png" alt="full" />
						<img src="<?php base_url(); ?>img/star-full.png" alt="full"/>
						<img src="<?php base_url(); ?>img/star-full.png" alt="full" />
						<img src="<?php base_url(); ?>img/star-full.png" alt="full" />
						<img src="<?php base_url(); ?>img/star-off.png" alt="full" />
					</div>
					<div class="clear"></div>
					<a class="grab flt-r">grab it now!</a>
					<div class="social clear">
						<a href="#">
							<img src="<?php base_url(); ?>img/facebook.jpg" alt="facebook" />
						</a>
						<a href="#">
							<img src="<?php base_url(); ?>img/skype.jpg" alt="skype" />
						</a>
						<span class="share">
							<a href="#">
								<img src="<?php base_url(); ?>img/share.jpg" alt="share" class="flt-r" />
							</a>
						</span>
					</div>
					<!-- End Samples here -->
				</div>
				<!-- Begin Samples here -->
				<div class="samples">
					<a href="<?php echo base_url().'product';?>"><img src="<?php base_url(); ?>img/huggie-small.png" alt="huggies" class="small" /></a>
					<p class="pdg_10px">
						<a href="<?php echo base_url().'product';?>"><strong>Ketchup &amp; Jams</strong></a>
						<br />
						When you buy one bag
						<br />
						M&amp;M’S Brand Pretzel
						<br />
						Chocolate Candies
						<br />
						(9.9 oz. or larger).
					</p>
					<br />
					<div class="star">
						<img src="<?php base_url(); ?>img/star-full.png" alt="full" />
						<img src="<?php base_url(); ?>img/star-full.png" alt="full"/>
						<img src="<?php base_url(); ?>img/star-full.png" alt="full" />
						<img src="<?php base_url(); ?>img/star-full.png" alt="full" />
						<img src="<?php base_url(); ?>img/star-off.png" alt="full" />
					</div>
					<div class="clear"></div>
					<a class="grab flt-r">grab it now!</a>
					<div class="social clear">
						<a href="#">
							<img src="<?php base_url(); ?>img/facebook.jpg" alt="facebook" />
						</a>
						<a href="#">
							<img src="<?php base_url(); ?>img/skype.jpg" alt="skype" />
						</a>
						<span class="share">
							<a href="#">
								<img src="<?php base_url(); ?>img/share.jpg" alt="share" class="flt-r" />
							</a>
						</span>
					</div>
					<!-- End Samples here -->
				</div>
				<!-- Begin Samples here -->
				<div class="samples">
					<a href="<?php echo base_url().'product';?>"><img src="<?php base_url(); ?>img/huggie-small.png" alt="huggies" class="small" /></a>
					<p class="pdg_10px">
						<a href="<?php echo base_url().'product';?>"><strong>Ketchup &amp; Jams</strong></a>
						<br />
						When you buy one bag
						<br />
						M&amp;M’S Brand Pretzel
						<br />
						Chocolate Candies
						<br />
						(9.9 oz. or larger).
					</p>
					<br />
					<div class="star">
						<img src="<?php base_url(); ?>img/star-full.png" alt="full" />
						<img src="<?php base_url(); ?>img/star-full.png" alt="full"/>
						<img src="<?php base_url(); ?>img/star-full.png" alt="full" />
						<img src="<?php base_url(); ?>img/star-full.png" alt="full" />
						<img src="<?php base_url(); ?>img/star-off.png" alt="full" />
					</div>
					<div class="clear"></div>
					<a class="grab flt-r">grab it now!</a>
					<div class="social clear">
						<a href="#">
							<img src="<?php base_url(); ?>img/facebook.jpg" alt="facebook" />
						</a>
						<a href="#">
							<img src="<?php base_url(); ?>img/skype.jpg" alt="skype" />
						</a>
						<span class="share">
							<a href="#">
								<img src="<?php base_url(); ?>img/share.jpg" alt="share" class="flt-r" />
							</a>
						</span>
					</div>
					<!-- End Samples here -->
				</div>
				<div class="pages">
					<a href="#">&lt;</a>
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
					<a href="#">&gt;</a>
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
					<img src="<?php base_url(); ?>img/share-a-sample.png" alt="share a sample" />
				</a>
			</li>
		</ul>
		<p class="free-sample">
			<img src="<?php base_url(); ?>img/gift.png" alt="gift" class="flt-r" />
			Get free samples
			<br />
			0n
			<strong>Facebook</strong>
			<br />
			<a href="#">
				<img src="<?php base_url(); ?>img/like.jpg" alt="like" />
			</a>
		</p>
		<ul class="btn">
			<li>
				<a href="#">
					<img src="<?php base_url(); ?>img/follow-twitter.png" alt="follow us on twitter" />
				</a>
			</li>
			<li>
				<a href="#">
					<img src="<?php base_url(); ?>img/add-to-circles.png" alt="add to circles" />
				</a>
			</li>
			<li>
				<a href="#">
					<img src="<?php base_url(); ?>img/pintrest.png" alt="pintrest" />
				</a>
			</li>
		</ul>
		<!-- Begin Subscribe div -->
		<div class="subscribe">
			<img src="<?php base_url(); ?>img/free-samples.png" alt="free samples" class="mgn-15b" />
			<input type="text" class="free" value="Enter Your Name" onFocus="this.value=''" />
			<input type="text" class="free" value="Enter Your Email" onFocus="this.value=''" />
			<a href="#" class="subscribe-btn">&nbsp;</a>
			<!-- End Subscribe div -->
		</div>
		<img src="<?php base_url(); ?>img/fap-turbo.jpg" alt="fab turbo" class="mgn-15b" />
		<img src="<?php base_url(); ?>img/kaboom.jpg" alt="kaboom" />
		<!-- End sidebar div -->
	</div>
	<!-- End main-content div -->
</div>
