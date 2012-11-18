<script type="text/javascript"
	src="<?php echo base_url("js"); ?>/jquery.dataTables.js"></script>

<script
	type="text/javascript"
	src="<?php echo base_url("js"); ?>/DT_bootstrap.js"></script>

<script type="text/javascript">
	/* Table initialisation */
	$(document).ready(function() {
		$('#fb_likes_list').dataTable( {
			"sDom": "<'row'<'span9'l><'span3'f>r>t<'row'<'span6'i><'span6'p>>",
			"sPaginationType": "bootstrap",
			"oLanguage": {
				"sLengthMenu": "_MENU_ <?php echo $this->lang->line('records_per_page'); ?>"
			},
			"aLengthMenu": [ 25, 50, 100, 200 ],
			"iDisplayLength": 25
		} );
	} );

	function change_status (prod_id, del_status) {
		var status, data;

		if (del_status) {
			$('.status_text_' + prod_id).html('<span class="label label-important"><i class="icon-remove icon-white"></i> <?php echo $this->lang->line("admin_prod_deleted"); ?></span>');
			$('.del_btn_' + prod_id).html('');
			status = 2;
		} else {
			$('#onandoff_' + prod_id).toggleClass('active_on');

			if ($('#onandoff_' + prod_id).hasClass('active_on')) {
				status = 1;
			} else{
				status = 0;
			}
		}

		data = {'prod_id' : prod_id, 'status' : status};

		$.ajax({
			// dataType: 'json',
			data: data,
			type: 'POST',
			url: '<?php echo base_url() . ADMINFOLDER. "/products/product_change_status"; ?>',
			success: function(responseTxt){
							console.log(responseTxt);
							if (responseTxt != 1) {
								$('#onandoff_' + prod_id).toggleClass('active_on');
							} else {
								var success_msg = '<div class="span6 alert alert-success"><a class="close" data-dismiss="alert">&times;</a><h4 class="alert-heading"><?php echo $this->lang->line("success"); ?></h4><?php echo $this->lang->line("admin_prod_list_status_change_success"); ?></div>';
								$("#success_message").html(success_msg);
								window.location = '<?php echo base_url()."backoffice/products/products_list";?>';
							}
					 }
		});

		return false;
	}

	function delete_product (prod_id,status) {

		if ($('#onandoff_' + prod_id).hasClass('active_on')) {

				alert("Please Inactive your product first, to Delete it.");
				return false;

		}else{
			var choice = confirm('Are you sure.\nYou want to Delete Product.?');

			if (choice) {
				change_status(prod_id, true);
			}
			return false;
		}

	}

</script>

<div class="row">
	<h3 style="float: left;"><?php echo $this->lang->line('admin_prod_list_title'); ?></h3>
	<div class="pull-right">
		<?php echo anchor(ADMINFOLDER . "/products/products_manage", '<i class="icon-plus icon-white"></i> <b>'.$this->lang->line('admin_prod_add_new').'</b>', array ("class" => "btn btn-small btn-inverse")); ?>
	</div>
	<br />
	<hr />
	<div class="container">
		<div class="row" style="padding-bottom: 20px;">

			<div id="success_message" class="container">
			<?php if (isset($success)) { ?>
				<div class="span6 alert alert-success">
					<a class="close" data-dismiss="alert">&times;</a>
					<h4 class="alert-heading">
						<?php echo $this->lang->line("success"); ?>
					</h4>
					<?php echo $success; ?>
				</div>
				<?php } ?>
			</div>

			<div id="errors_message" class="container">
			<?php if (isset($errors)) { ?>
				<div class="span6 alert alert-error">
					<a class="close" data-dismiss="alert">&times;</a>
					<h4 class="alert-heading">
						<?php echo $this->lang->line("error"); ?>
					</h4>
					<?php echo $errors; ?>
				</div>
				<?php } ?>
			</div>

			<?php //echo "<pre>";print_r($products);?>
			<?php
				$logged_in_user = $this->session->userdata('admin_user');
				if (isset($products) && $products && count($products) > 0) {
					$tableCount = 1;
			?>

					<table id="fb_likes_list" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>#</th>
								<th><?php echo $this->lang->line("admin_prod_list_tbl_prod_name"); ?></th>
								<th><?php echo $this->lang->line("admin_prod_list_tbl_category"); ?></th>
								<th><?php echo $this->lang->line("admin_prod_list_tbl_status"); ?></th>
								<th width="300px;"><?php echo $this->lang->line("admin_prod_list_tbl_actions"); ?></th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($products as $product) {
								if ($product['status_id'] != 2){
								?>
								<tr>
									<td><?php echo $tableCount; ?></td>
									<td>
										<div style="float: left;">
											<h4>
												<span id="product_<?php echo $product["id"]; ?>"
													rel="popover"
													data-original-title="<?php echo htmlentities(strip_slashes($product["name"])); ?>"><?php echo strip_slashes($product["name"]); ?>
												</span>
												<script type="text/javascript">
													$("#product_<?php echo $product['id']; ?>").popover({ offset: 10, content: "<dl style='margin: 0px; padding: 0px;'><dt><?php echo $this->lang->line("admin_prod_list_tbl_category"); ?></dt><dd><?php echo $this->Common_Model->get_prod_cat_name($product["category_id"]);?></dd><dt><?php echo $this->lang->line("admin_prod_list_tbl_desc"); ?></dt><dd><?php echo $product["description"]; ?></dd><dt><?php echo $this->lang->line("admin_prod_list_tbl_valid_countries"); ?></dt><dd><?php echo implode(", ", $this->Common_Model->get_country_names(implode(",", $this->Common_Model->get_valid_countries($product["id"])))); ?></dd></dl>" });
												</script>
											</h4>
										</div>
									</td>
									<td><?php echo $this->Common_Model->get_prod_cat_name($product["category_id"]); ?></td>
									<td>
										<div class="status_text_<?php echo $product["id"]; ?>">
											<?php if ($product["status_id"] != 2){ ?>
												<div class="status-switch" id="onandoff_<?php echo $product["id"]; ?>" onclick="return change_status(<?php echo $product["id"]; ?>)"></div>
												<?php if ($product["status_id"] == 1){ ?>
													<script type="text/javascript">
														$('#onandoff_<?php echo $product["id"]; ?>').addClass('active_on');
													</script>
												<?php } ?>
											<?php } else { ?>
												<span class="label label-important"><i class="icon-remove icon-white"></i> <?php echo $this->lang->line('admin_prod_deleted'); ?></span>
											<?php } ?>
										</div>
									</td>
									<td>
										<?php echo anchor(ADMINFOLDER . "/products/products_manage/" . $product["id"], '<i class="icon-edit icon-white"></i> <b>'.$this->lang->line('admin_prod_edit').'</b>', array ("class" => "btn btn-mini btn-success")); ?>
										<?php if($logged_in_user['admin_name'] == 'Super Administrator') { ?>
											<span class="del_btn_<?php echo $product["id"]; ?>">
												<?php if ($product["status_id"] != 2) {
													echo anchor('', '<i class="icon-trash icon-white"></i> <b>'.$this->lang->line('admin_prod_delete').'</b>', array ("class" => "btn btn-mini btn-danger", "onclick" => "return delete_product(".$product['id'].",".$product["status_id"].")"));
												} ?>
											</span>
										<?php } ?>
										<?php //echo $products['comments_status']; ?>
										<?php if ($product["comments_count"] > 0 ) {
												//if($products['comments_status'] == '1'){
											echo anchor(ADMINFOLDER . "/products/show_comments/" . $product["id"], '<i class="icon-pencil icon-white"></i> <b>'.$this->lang->line('admin_prod_comments').'</b>', array ("class" => "btn btn-mini btn-info"));
										//} else {echo "";}
										}?>
									</td>
								</tr>
							<?php
										$tableCount++;
									}
								}
							?>
						</tbody>
						<tfoot>
							<tr>
								<th>#</th>
								<th><?php echo $this->lang->line("admin_prod_list_tbl_prod_name"); ?></th>
								<th><?php echo $this->lang->line("admin_prod_list_tbl_category"); ?></th>
								<th><?php echo $this->lang->line("admin_prod_list_tbl_status"); ?></th>
								<th><?php echo $this->lang->line("admin_prod_list_tbl_actions"); ?></th>
							</tr>
						</tfoot>
					</table>
			<?php } else { ?>
			<p>
				<?php echo $this->lang->line("no_data"); ?>
			</p>
			<?php } ?>
		</div>
	</div>
</div>