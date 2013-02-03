<div class="slide flt-l mgn-15b">
	<a href="#" class="flt-l mgn-15px next">
		<?php
			$image_properties = array('src' => 'img/prev.jpg','alt' => 'Previous');
			echo img($image_properties);
		?>
	</a>
	<ul id="mycarousel" class="jcarousel-skin-tango mgn-15b">
		<?php if(isset($featured_documents) && $featured_documents != '') {
				foreach ($featured_documents as $featured_documents_key => $featured_documents_values) { ?>
					<li>
						<a href="<?php echo base_url().'documents/document_detail/'.$featured_documents_values['id'];?>">
							<img src="<?php echo base_url().DOC_THUMB_IMG_PATH.'thumb_'.$featured_documents_values['image'];?>" alt="<?php echo $featured_documents_values['name']; ?>" width='86' height='98' />
							<br />
							<?php
								$featured_short_desc = substr($featured_documents_values['name'], 0, 8);
								if(strlen($featured_documents_values['name']) > 12)
									echo $featured_short_desc."...";
								else
									echo $featured_documents_values['name'];
							?>
						</a>
					</li>
			<?php }
			} ?>
		<?php /* for ($i=0; $i < 20; $i++) { ?>
			<li>
				<a href="<?php echo base_url().'documents/document_details/1'; ?>">
					<img src="<?php echo base_url('img') . '/icon1.jpg'; ?>" width='86' height='98'>
					<br />
					Non-Disclosure Agreement
					<br />
					(NDA) Template
				</a>
			</li>
		<?php } */ ?>
	</ul>
	<a href="#" class="flt-l mgn-15px next">
		<?php $image_properties = array('src' => 'img/next.jpg','alt' => 'Previous');
			echo img($image_properties);
		?>
	</a>
</div>