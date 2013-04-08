<div class="col-1 bdr-1 flt-l mgn-r min-h">
	<!-- Begin categories -->
	<div class="categories mgn-15b">
		<p class="head mgn-0">
			<span class="mgn-20l">Categories</span>
		</p>
		<ul>
			<?php
				if(isset($doc_category) && $doc_category !='') {
					foreach($doc_category as $cat_id => $cat_values) {
						$sub_cat = $this->docs_category_model->get_sub_cat($cat_values['id']); ?>
						<li>
							<a href="<?php if($sub_cat =='')echo base_url().'docs_category/get_category_document/'.$cat_values['id']; else echo base_url().'docs_category/parent_category/'.$cat_values['id'];?>"><?php echo $cat_values['doc_cat_name'];?></a>
							<?php if(isset($sub_cat) && $sub_cat !='') { ?>
							<ol>
								<?php foreach($sub_cat as $sub_cat_id=>$sub_cat_values) { ?>
								<li>
									<a href="<?php echo base_url().'docs_category/get_category_document/'.$sub_cat_values['id'];?>"><?php echo $sub_cat_values['doc_cat_name'];?></a>
								</li>
								<?php } ?>
							</ol>
							<?php } ?>
						</li>
				<?php }
				} ?>
		</ul>
	</div>

	<!-- Banner Advertisement -->
	<?php require_once '/adds/add2.php'; ?>
	<!-- End categories -->

	<!-- Begin premium docs -->
	<!-- <div class="categories mgn-15b">
		<p class="head mgn-0">
			<span class="mgn-20l">Premium Docs</span>
		</p>
		<ul>
			<?php
				if(isset($doc_category) && $doc_category !='') {
					foreach($doc_category as $cat_id => $cat_values) {
						$sub_cat = $this->docs_category_model->get_sub_cat($cat_values['id']); ?>
						<li>
							<a href="<?php if($sub_cat =='')echo base_url().'docs_category/get_category_document/'.$cat_values['id']; else echo base_url().'docs_category/parent_category/'.$cat_values['id'];?>"><?php echo $cat_values['doc_cat_name'];?></a>
							<?php if(isset($sub_cat) && $sub_cat !='') { ?>
							<ol>
								<?php foreach($sub_cat as $sub_cat_id=>$sub_cat_values) { ?>
								<li>
									<a href="<?php echo base_url().'docs_category/get_category_document/'.$sub_cat_values['id'];?>"><?php echo $sub_cat_values['doc_cat_name'];?></a>
								</li>
								<?php } ?>
							</ol>
							<?php } ?>
						</li>
				<?php }
				} ?>
		</ul>
	</div> -->
	<!-- End premium docs -->
</div>