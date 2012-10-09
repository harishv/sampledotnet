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
								<th><?php echo $this->lang->line("admin_sample_list_tbl_sample_url"); ?></th>
								<th width="30%"><?php echo $this->lang->line("admin_sample_list_tbl_sample_desc"); ?></th>
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
									<td><?php echo $sample_list['sample_url'];?></td>
									<td><?php echo $sample_list['sample_desc'];?></td>

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
								<th><?php echo $this->lang->line("admin_sample_list_tbl_sample_url"); ?></th>
								<th><?php echo $this->lang->line("admin_sample_list_tbl_sample_desc"); ?></th>
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
