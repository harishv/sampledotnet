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

	function change_status (comment_id, del_status) {
		var status, data;

		if (del_status) {
			$('.status_text_' + comment_id).html('<span class="label label-important"><i class="icon-remove icon-white"></i> <?php echo $this->lang->line("admin_prod_cmnt_list_cmnt_deleted"); ?></span>');
			$('.del_btn_' + comment_id).html('');
			status = 2;
		} else {
			$('#onandoff_' + comment_id).toggleClass('active_on');

			if ($('#onandoff_' + comment_id).hasClass('active_on')) {
				status = 1;
			} else{
				status = 0;
			}
		}

		data = {'comment_id' : comment_id, 'status' : status};

		$.ajax({
			// dataType: 'json',
			data: data,
			type: 'POST',
			url: '<?php echo base_url() . ADMINFOLDER. "/products/product_change_comment_status"; ?>',
			success: function(responseTxt){
							console.log(responseTxt);
							if (responseTxt != 1) {
								$('#onandoff_' + comment_id).toggleClass('active_on');
							} else {
								var success_msg = '<div class="span6 alert alert-success"><a class="close" data-dismiss="alert">&times;</a><h4 class="alert-heading"><?php echo $this->lang->line("success"); ?></h4><?php echo $this->lang->line("admin_prod_list_status_change_success"); ?></div>';
								$("#success_message").html(success_msg);
							}
					 }
		});

		return false;
	}

	function delete_comment (comment_id) {
		var choice = confirm('Are you sure.\nYou want to Delete Comment.?');

		if (choice) {
			change_status(comment_id, true);
		}

		return false;
	}

</script>

<div class="row">
	<div class="span8 well">
		<dl class="dl-horizontal">
			<dt><?php echo $this->lang->line('admin_prod_cmnt_list_prod_name'); ?></dt>
			<dd><?php echo $product['name']; ?></dd>
			<dt><?php echo $this->lang->line('admin_prod_cmnt_list_cat_name'); ?></dt>
			<dd><?php echo $this->Common_Model->get_prod_cat_name($product["category_id"]); ?></dd>
		</dl>
	</div>
	<div class="pull-right">
		<?php echo anchor(ADMINFOLDER . "/products/products_list", "<i class='icon-arrow-left icon-white'></i> " . $this->lang->line('admin_prod_cmnt_list_back_to_prod_list'), array("class" => "btn btn-info")); ?>
	</div>
	<div style="clear:both;"></div>
	<br>
	<h3 style="float: left;"><?php echo $this->lang->line('admin_prod_cmnt_list_title'); ?></h3>
	<br>
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

			<?php
			// print_r($comments_list);
				if (isset($comments_list) && $comments_list && count($comments_list) > 0) {
					$tableCount = 1;
			?>

					<table id="fb_likes_list" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>#</th>
								<th><?php echo $this->lang->line("admin_prod_list_tbl_prod_name"); ?></th>
								<th><?php echo $this->lang->line("admin_prod_list_tbl_category"); ?></th>
								<th><?php echo $this->lang->line("admin_prod_list_tbl_status"); ?></th>
								<th width="200px;"><?php echo $this->lang->line("admin_prod_list_tbl_actions"); ?></th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($comments_list as $comment) { ?>
								<tr>
									<td><?php echo $tableCount; ?></td>
									<td><?php echo $comment['comments']; ?></td>
									<td><?php echo $comment['first_name']; ?></td>
									<td>
										<div class="status_text_<?php echo $comment["id"]; ?>">
											<?php if ($comment["status_id"] != 2){ ?>
												<div class="status-switch" id="onandoff_<?php echo $comment["id"]; ?>" onclick="return change_status(<?php echo $comment["id"]; ?>)"></div>
												<?php if ($comment["status_id"] == 1){ ?>
													<script type="text/javascript">
														$('#onandoff_<?php echo $comment["id"]; ?>').addClass('active_on');
													</script>
												<?php } ?>
											<?php } else { ?>
												<span class="label label-important"><i class="icon-remove icon-white"></i> <?php echo $this->lang->line('admin_prod_cmnt_list_cmnt_deleted'); ?></span>
											<?php } ?>
										</div>
									</td>
									<td>
										<?php // echo anchor(ADMINFOLDER . "/products/products_manage/" . $comment["id"], '<i class="icon-edit icon-white"></i> <b>'.$this->lang->line('admin_prod_edit').'</b>', array ("class" => "btn btn-mini btn-success")); ?>
										<span class="del_btn_<?php echo $comment["id"]; ?>">
											<?php if ($comment["status_id"] != 2) {
												echo anchor('', '<i class="icon-trash icon-white"></i> <b>'.$this->lang->line('admin_prod_cmnt_list_delete').'</b>', array ("class" => "btn btn-mini btn-danger", "onclick" => "return delete_comment(".$comment['id'].")"));
											} ?>
										</span>
									</td>
								</tr>
							<?php
									$tableCount++;
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