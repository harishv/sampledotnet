<?php
if(isset($documents) && $documents != '' && count($documents) > 0) { ?>
	<!-- Include Sharethis Plugin scripts -->
	<script type="text/javascript">var switchTo5x=false;</script>
	<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
	<script type="text/javascript">stLight.options({publisher: "18f4acdf-af25-4d39-b663-78b081a6f60e"}); </script>

	<?php include_once 'document_rating_js.php'; ?>
	<!-- Begin Samples here -->
	<?php foreach ($documents as $document_value) { ?>
		<div class="samples">
			<?php if($document_value['only_today'] == 1 ){ ?>
			<img src="<?php echo base_url(); ?>img/only-today.png" alt="Only Today" class="only-today" />
			<?php } ?>
			<a href="<?php echo base_url().'documents/document_detail/'.$document_value['id'];?>"><img src="<?php echo base_url().DOC_THUMB_IMG_PATH.'thumb_'.$document_value['image'];?>" width='54' height='63' class='small' /></a>
			<p class="pdg_10px">
				<a title="<?php echo $document_value['name']; ?>" href="<?php echo base_url().'documents/document_detail/'.$document_value['id'];?>"><strong>
					<?php
					if($document_value['only_today'] == 1 ) {
						$strip = 15;
					} else {
						$strip =20;
					}
					echo (strlen($document_value['name']) > $strip) ? substr($document_value['name'], 0, ($strip-2) ) . '..' : html_entity_decode($document_value['name']) ;?>
				</strong></a>
				<br>
				<?php echo (strlen(html_entity_decode($document_value['description'])) > 85) ? substr(html_entity_decode($document_value['description']), 0, 83) . '..' : html_entity_decode($document_value['description']); ?>
			</p>
			<br>
			<div class="star" id="ratings">
				<?php include '5_star_rating_view.php'; ?>
			</div>

			<div class="clear"></div>

			<?php // Temporarly allowing any user to Grab the Sample. ?>

			<div class="social clear">
				<span class='st_facebook'></span>
				<span class='st_twitter' st_via='sampledotnet'></span>
				<span class='st_googleplus'></span>
				<span class='st_sharethis'></span>
			</div>

			<div class="clear"></div>

		</div>
<?php } ?>
	<!-- End Samples here -->
<?php } else {
	echo "No Documents avaiable to display.";
} ?>
