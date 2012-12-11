<script>
function validate_search(){
	
 var search_val = document.getElementById('search_value');
 if(search_val == 'null' || search_val.value.trim() == ''){
 	alert("search should not be null or Empty");
 	return false;
 }
 return true;
}
</script>
<div id="sidebar" class="flt-r">
	<!-- Begin search -->
	<div class="search">
		<form method="get" action="http://www.google.com/search" , target='_blank' ,onSubmit = 'return validate_search();'>
			<input class="sch" type="text" name="q" size="31" maxlength="255" placeholder="Search" value="" />
			<br>
			<input class="btn btn-success pull-right" id="search_value" type="submit" value="Search" />
			<!-- <input type="radio" name="sitesearch" value="" /> The Web
			<input type="radio" name="sitesearch" value="<?php echo $_SERVER["SERVER_NAME"]; ?>" checked /> Only Sample.net -->
		</form>
		<!-- End search -->
	</div>
	<ul class="btn">
		<li>
			<a href="#share_sample" name="modal" class="iframe"><?php
				$image_properties = array('src' => 'img/share-a-sample.png','alt' => 'share a sample');
				echo img($image_properties);
			?></a>
		</li>
	</ul>
	<p class="free-sample">
		<?php
			$image_properties = array('src' => 'img/gift.png','alt' => 'gift','class'=>'flt-r');
			echo img($image_properties);
		?>
		Get free samples <br /> 0n <strong>Facebook</strong>
		<br />
		<?php // Please replace below base_url() with FB_PAGE ?>
		<div class="fb_like_btn fb-like" data-href="<?php echo FB_PAGE; ?>" data-send="false" data-width="100" data-show-faces="false"></div>
	</p>
	<ul class="btn">
		<li>
			<a href="<?php echo TWITTER_PAGE; ?>"><?php
				$image_properties = array('src' => 'img/follow-twitter.png','alt' => 'follow us on twitter');
				echo img($image_properties); ?></a>
		</li>
		<li>
			<a href="<?php echo GOOGLEPLUS_PAGE; ?>"><?php
				$image_properties = array('src' => 'img/add-to-circles.png','alt' => 'add to circles');
				echo img($image_properties); ?></a>
		</li>
		<li>
			<a href="<?php echo PINTEREST_PAGE; ?>"><?php
				$image_properties = array('src' => 'img/pintrest.png','alt' => 'pintrest');
				echo img($image_properties); ?></a>
		</li>
	</ul>
	<div class="subscribe">
		<?php $user_info = $this->session->userdata('user'); ?>
		<a href="#<?php echo (isset($user_info) && $user_info != '') ? 'user_profile' : 'dialog'; ?>" name="modal" class="iframe"><?php
			$image_properties = array('src' => 'img/free-samples.png','alt' => 'free samples','class'=>'mgn-15b gap', 'width'=>'35', 'height'=>'50', 'align'=>'left');
			echo img($image_properties);
		?>
		<span>Subscribe Now to get free Samples by E-mail </span></a>
	<!-- End Subscribe div -->
	</div>
	<?php
		/*
		$image_properties = array('src' => 'img/fap-turbo.jpg','alt' => 'fab turbo','class'=>'mgn-15b');
		echo img($image_properties);

		$image_properties = array('src' => 'img/kaboom.jpg','alt' => 'kaboom');
		echo img($image_properties);
		*/
	?>
</div>