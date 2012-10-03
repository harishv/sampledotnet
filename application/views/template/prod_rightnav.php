<div id="sidebar" class="flt-r">
	<!-- Begin search -->
	<div class="search">
		<input class="sch" type="text" value="search" onFocus="this.value=''" />
		<br /> <a class="grab flt-r">search</a>
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
		<a href="#"><?php
			$image_properties = array('src' => 'img/like.jpg','alt' => 'like');
			echo img($image_properties); ?></a>
	</p>
	<ul class="btn">
		<li>
			<a href="#"><?php
				$image_properties = array('src' => 'img/follow-twitter.png','alt' => 'follow us on twitter');
				echo img($image_properties); ?></a>
		</li>
		<li>
			<a href="#"><?php
				$image_properties = array('src' => 'img/add-to-circles.png','alt' => 'add to circles');
				echo img($image_properties); ?></a>
		</li>
		<li>
			<a href="#"><?php
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
		$image_properties = array('src' => 'img/fap-turbo.jpg','alt' => 'fab turbo','class'=>'mgn-15b');
		echo img($image_properties);

		$image_properties = array('src' => 'img/kaboom.jpg','alt' => 'kaboom');
		echo img($image_properties);
	?>
</div>