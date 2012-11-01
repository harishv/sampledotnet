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
			}
		} );
	} );

	function change_status (sample_id, del_status) {
		var status, data;

		if (del_status) {
			$('.status_text_' + sample_id).html('<span class="label label-important"><i class="icon-remove icon-white"></i> <?php echo $this->lang->line("admin_prod_deleted"); ?></span>');
			$('.del_btn_' + sample_id).html('');
			status = 2;
		} else {
			$('#onandoff_' + sample_id).toggleClass('active_on');

			if ($('#onandoff_' + sample_id).hasClass('active_on')) {
				status = 1;
			} else{
				status = 0;
			}
		}

		data = {'sample_id' : sample_id, 'status' : status};

		$.ajax({
			// dataType: 'json',
			data: data,
			type: 'POST',
			url: '<?php echo base_url() . ADMINFOLDER. "/products/sample_change_status"; ?>',
			success: function(responseTxt){
							console.log(responseTxt);
							if (responseTxt != 1) {
								$('#onandoff_' + prod_id).toggleClass('active_on');
							} else {
								var success_msg = '<div class="span6 alert alert-success"><a class="close" data-dismiss="alert">&times;</a><h4 class="alert-heading"><?php echo $this->lang->line("success"); ?></h4><?php echo $this->lang->line("admin_prod_list_status_change_success"); ?></div>';
								$("#success_message").html(success_msg);
							}
					 }
		});

		return false;
	}

	function delete_product (prod_id) {
		var choice = confirm('Are you sure.\nYou want to Delete Product.?');

		if (choice) {
			change_status(prod_id, true);
		}

		return false;
	}

</script>

<div class="row">
	<h3 style="float: left;"><?php echo $this->lang->line('admin_sample_list_title'); ?></h3>

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

			<?php
				if (isset($sample_list) && $sample_list && count($sample_list) > 0) {
					$tableCount = 1;
			?>

					<table id="fb_likes_list" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>#</th>
								<th><?php echo $this->lang->line("admin_sample_list_tbl_sample_name"); ?></th>
								<th><?php echo $this->lang->line("admin_sample_list_tbl_sample_email"); ?></th>
								<th><?php echo $this->lang->line("admin_sample_list_tbl_sample_company"); ?></th>
								<th><?php echo $this->lang->line("admin_sample_list_tbl_sample_title"); ?></th>
								<th><?php echo $this->lang->line("admin_prod_list_tbl_status"); ?></th>
								<th width="30%"><?php echo $this->lang->line("admin_sample_list_tbl_actions"); ?></th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($sample_list as $sample_list) { ?>
								<tr>
									<td><?php echo $tableCount; ?></td>
									<td><?php echo $sample_list['sample_name'];?></td>
									<td><?php echo $sample_list['sample_email'];?></td>
									<td><?php echo $sample_list['sample_company'];?></td>
									<td><?php echo $sample_list['sample_title'];?></td>
									<td>
										<div class="status_text_<?php echo $sample_list["id"]; ?>">
											<?php if ($sample_list["status_id"] != 2){ ?>
												<div class="status-switch" id="onandoff_<?php echo $sample_list["id"]; ?>" onclick="return change_status(<?php echo $sample_list["id"]; ?>)"></div>
												<?php if ($sample_list["status_id"] == 1){ ?>
													<script type="text/javascript">
														$('#onandoff_<?php echo $sample_list["id"]; ?>').addClass('active_on');
													</script>
												<?php } ?>
											<?php } else { ?>
												<span class="label label-important"><i class="icon-remove icon-white"></i> <?php echo $this->lang->line('admin_prod_deleted'); ?></span>
											<?php } ?>
										</div>
									</td>
									<td>
										<?php echo anchor(ADMINFOLDER . "/products/sample_view/" . $sample_list["id"], '<i class="icon-edit icon-white"></i> <b>'.$this->lang->line('admin_sample_list_view').'</b>', array ("class" => "btn btn-mini btn-success")); ?>
										<span class="del_btn_<?php echo $sample_list["id"]; ?>">
											<?php if ($sample_list["status_id"] != 2) {
												echo anchor('', '<i class="icon-trash icon-white"></i> <b>'.$this->lang->line('admin_prod_delete').'</b>', array ("class" => "btn btn-mini btn-danger", "onclick" => "return delete_product(".$sample_list['id'].")"));
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
								<th><?php echo $this->lang->line("admin_sample_list_tbl_sample_name"); ?></th>
								<th><?php echo $this->lang->line("admin_sample_list_tbl_sample_email"); ?></th>
								<th><?php echo $this->lang->line("admin_sample_list_tbl_sample_company"); ?></th>
								<th><?php echo $this->lang->line("admin_sample_list_tbl_sample_title"); ?></th>
								<th><?php echo $this->lang->line("admin_prod_list_tbl_status"); ?></th>
								<th width="30%"><?php echo $this->lang->line("admin_sample_list_tbl_actions"); ?></th>
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
