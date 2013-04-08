<div id="sidebar" class="flt-r">
	<!-- Begin search -->

	<ul>
		<li>
			<!-- Banner Advertisement -->
			<?php require_once '/adds/add5.php'; ?>
		</li>
	</ul>

	<?php if (isset($right_popular_documents) && count($right_popular_documents) > 0) { ?>
		<div class="most-popluar">
			<ul>
				<li>Most Popular</li>
			</ul>
			<?php foreach ($right_popular_documents as $docs) { ?>
			<div class="box-container">
				<img src="<?php echo base_url().DOC_THUMB_IMG_PATH.'thumb_'.$docs['image'];?>" align="left" style="margin-right:10px;" />
				<span class="sub"><a href="<?php echo base_url().'documents/document_detail/'.$docs['id'];?>"><?php echo $docs['name']; ?></a></span>
				<br /><br />
				<?php echo $docs['description']; ?>
				<div style="clear: both;"></div>
				<div class="bor"></div>
			</div>
			<?php } ?>
		</div>
	<?php } ?>

	<ul>
		<li>
			<!-- Banner Advertisement -->
			<?php require_once '/adds/add6.php'; ?>
		</li>
	</ul>

</div>