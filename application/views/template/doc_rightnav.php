<div id="sidebar" class="flt-r">
	<!-- Begin search -->

	<ul>
		<li>
			<a href="#">
				<img src="<?php echo base_url('img'); ?>/add.jpg" alt="add" width="100%;" style="margin-top:10px;" />
			</a>
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

	<img src="<?php echo base_url('img'); ?>/add1.jpg"  style="margin-top:10px; margin-left:15px;"/>
</div>
