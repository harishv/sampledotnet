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

	function change_status (user_id, del_status) {
		var status, data;

		if (del_status) {
			$('.status_text_' + user_id).html('<span class="label label-important"><i class="icon-remove icon-white"></i> <?php echo $this->lang->line("admin_prod_deleted"); ?></span>');
			$('.del_btn_' + user_id).html('');
			status = 2;
		} else {
			$('#onandoff_' + user_id).toggleClass('active_on');

			if ($('#onandoff_' + user_id).hasClass('active_on')) {
				status = 1;
			} else{
				status = 0;
			}
		}

		data = {'user_id' : user_id, 'status' : status};

		$.ajax({
			// dataType: 'json',
			data: data,
			type: 'POST',
			url: '<?php echo base_url() . ADMINFOLDER. "/users/user_change_status"; ?>',
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

	function delete_user (user_id) {
		var choice = confirm('Are you sure.\nYou want to Delete Product.?');

		if (choice) {
			change_status(user_id, true);
		}

		return false;
	}

</script>

<div class="row">
	<h3 style="float: left;"><?php echo $this->lang->line('admin_users_list_title'); ?></h3>
	<div class="pull-right">
		<?php echo anchor(ADMINFOLDER . "/users/users_manage", '<i class="icon-plus icon-white"></i> <b>'.$this->lang->line('admin_user_add_new').'</b>', array ("class" => "btn btn-small btn-inverse")); ?>
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

			<?php

				if (isset($users_list) && $users_list && count($users_list) > 0) {
					$tableCount = 1;
			?>

					<table id="fb_likes_list" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>#</th>
								<th><?php echo $this->lang->line("admin_user_list_tbl_user_name"); ?></th>
								<th><?php echo $this->lang->line("admin_user_list_tbl_user_email"); ?></th>
								<th><?php echo $this->lang->line("admin_user_list_tbl_user_type"); ?></th>
								<th><?php echo $this->lang->line("admin_user_list_tbl_status"); ?></th>
								<th width="300px;"><?php echo $this->lang->line("admin_prod_list_tbl_actions"); ?></th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($users_list as $users_list) { ?>
								<tr>
									<td><?php echo $tableCount; ?></td>
									
									<td><?php echo $users_list['admin_name'];?></td>
									<td><?php echo $users_list['admin_email'];?></td>
									<?php if($users_list['admin_type_ref_id'] == '1')
										$type = $users_list['admin_type_desc'];
									  else if ($users_list['admin_type_ref_id'] == '2')
										$type = $users_list['admin_type_desc'];
									  
									?>
    								<td><?php echo $type;?></td>
    								<td>
										<div class="status_text_<?php echo $users_list["id"]; ?>">
											<?php if ($users_list["status_id"] != 2){ ?>
												<div class="status-switch" id="onandoff_<?php echo $users_list["id"]; ?>" onclick="return change_status(<?php echo $users_list["id"]; ?>)"></div>
												<?php if ($users_list["status_id"] == 1){ ?>
													<script type="text/javascript">
														$('#onandoff_<?php echo $users_list["id"]; ?>').addClass('active_on');
													</script>
												<?php } ?>
											<?php } else { ?>
												<span class="label label-important"><i class="icon-remove icon-white"></i> <?php echo $this->lang->line('admin_prod_deleted'); ?></span>
											<?php } ?>
										</div>
									</td>
									<td>
										<?php echo anchor(ADMINFOLDER . "/users/users_manage/" . $users_list["id"], '<i class="icon-edit icon-white"></i> <b>'.$this->lang->line('admin_prod_edit').'</b>', array ("class" => "btn btn-mini btn-success")); ?>
										<span class="del_btn_<?php echo $users_list["id"]; ?>">
											<?php if ($users_list["status_id"] != 2) {
												echo anchor('', '<i class="icon-trash icon-white"></i> <b>'.$this->lang->line('admin_prod_delete').'</b>', array ("class" => "btn btn-mini btn-danger", "onclick" => "return delete_user(".$users_list['id'].")"));
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
								<th><?php echo $this->lang->line("admin_user_list_tbl_user_name"); ?></th>
								<th><?php echo $this->lang->line("admin_user_list_tbl_user_email"); ?></th>
								<th><?php echo $this->lang->line("admin_user_list_tbl_user_type"); ?></th>
								<th><?php echo $this->lang->line("admin_user_list_tbl_status"); ?></th>
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