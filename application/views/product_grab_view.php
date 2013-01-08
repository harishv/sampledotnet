<!-- Begin main-content div -->
<div id="main-content" class="flt-l wid_100">
	<?php
		$redirect_url = $product_details[0]['grab_url'];

		if(stristr($redirect_url, 'facebook.com') === FALSE) { ?>
		<iframe src="<?php echo $redirect_url; ?>" width="100%" height="600px"></iframe>
	<?php } else {
			redirect($redirect_url, 'refresh');
		} ?>
</div>