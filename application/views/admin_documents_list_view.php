<script type="text/javascript"
	src="<?php echo base_url("js"); ?>/jquery.dataTables.js"></script>

<script
	type="text/javascript"
	src="<?php echo base_url("js"); ?>/DT_bootstrap.js"></script>

<script type="text/javascript">
	/* Table initialisation */
	$(document).ready(function() {
		$('#docs_list').dataTable( {
			"sDom": "<'row'<'span9'l><'span3'f>r>t<'row'<'span6'i><'span6'p>>",
			"sPaginationType": "bootstrap",
			"oLanguage": {
				"sLengthMenu": "_MENU_ <?php echo $this->lang->line('records_per_page'); ?>"
			},
			"aLengthMenu": [ 25, 50, 100, 200 ],
			"iDisplayLength": 25
		} );
	} );

	function change_status (doc_id, del_status) {
		var status, data;

		if (del_status) {
			$('.status_text_' + doc_id).html('<span class="label label-important"><i class="icon-remove icon-white"></i> <?php echo $this->lang->line("admin_doc_deleted"); ?></span>');
			$('.del_btn_' + doc_id).html('');
			status = 2;
		} else {
			$('#onandoff_' + doc_id).toggleClass('active_on');

			if ($('#onandoff_' + doc_id).hasClass('active_on')) {
				status = 1;
			} else{
				status = 0;
			}
		}

		data = {'doc_id' : doc_id, 'status' : status};

		$.ajax({
			data: data,
			type: 'POST',
			url: '<?php echo base_url() . ADMINFOLDER. "/documents/document_change_status"; ?>',
			success: function(responseTxt){
						console.log(responseTxt);
						if (responseTxt != 1) {
							$('#onandoff_' + doc_id).toggleClass('active_on');
						} else {
							var success_msg = '<div class="span6 alert alert-success"><a class="close" data-dismiss="alert">&times;</a><h4 class="alert-heading"><?php echo $this->lang->line("success"); ?></h4><?php echo $this->lang->line("admin_doc_list_status_change_success"); ?></div>';
							$("#success_message").html(success_msg);
							window.location = '<?php echo base_url() . ADMINFOLDER . "/documents/documents_list";?>';
						}
					 }
		});

		return false;
	}

	function delete_product (doc_id,status) {

		if ($('#onandoff_' + doc_id).hasClass('active_on')) {

				alert("Please Inactive your product first, to Delete it.");
				return false;

		}else{
			var choice = confirm('Are you sure.\nYou want to Delete Product.?');

			if (choice) {
				change_status(doc_id, true);
			}
			return false;
		}

	}

</script>

<div class="row">
	<h3 style="float: left;"><?php echo $this->lang->line('admin_doc_list_title'); ?></h3>
	<div class="pull-right">
		<?php echo anchor(ADMINFOLDER . "/documents/documents_manage", '<i class="icon-plus icon-white"></i> <b>'.$this->lang->line('admin_doc_add_new').'</b>', array ("class" => "btn btn-small btn-inverse")); ?>
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

			<?php // echo "<pre>"; print_r ($documents); echo "</pre>"; exit();?>
			<?php
				$logged_in_user = $this->session->userdata('admin_user');
				if (isset($documents) && $documents && count($documents) > 0) {
					$tableCount = 1;
			?>

					<table id="docs_list" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>#</th>
								<th><?php echo $this->lang->line("admin_doc_list_tbl_doc_name"); ?></th>
								<th><?php echo $this->lang->line("admin_doc_list_tbl_category"); ?></th>
								<th><?php echo $this->lang->line("admin_doc_list_tbl_status"); ?></th>
								<th width="300px;"><?php echo $this->lang->line("admin_doc_list_tbl_actions"); ?></th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($documents as $document) {
								if ($document['status_id'] != 2){
								?>
								<tr>
									<td><?php echo $tableCount; ?></td>
									<td>
										<div style="float: left;">
											<h4>
												<span id="document_<?php echo $document["id"]; ?>"
													rel="popover"
													data-original-title="<?php echo htmlentities(strip_slashes($document["name"])); ?>"><?php echo strip_slashes($document["name"]); ?>
												</span>
												<script type="text/javascript">
													$("#product_<?php echo $document['id']; ?>").popover({ offset: 10, content: "<dl style='margin: 0px; padding: 0px;'><dt><?php echo $this->lang->line("admin_doc_list_tbl_category"); ?></dt><dd><?php echo $this->Common_Model->get_doc_cat_name($document["category_id"]);?></dd><dt><?php echo $this->lang->line("admin_doc_list_tbl_desc"); ?></dt><dd><?php echo $document["description"]; ?></dd><dt><?php echo $this->lang->line("admin_doc_list_tbl_valid_countries"); ?></dt><dd><?php echo implode(", ", $this->Common_Model->get_country_names(implode(",", $this->Common_Model->get_valid_countries($document["id"], "doc")))); ?></dd></dl>" });
												</script>
											</h4>
										</div>
									</td>
									<td><?php echo $this->Common_Model->get_doc_cat_name($document["category_id"]); ?></td>
									<td>
										<div class="status_text_<?php echo $document["id"]; ?>">
											<?php if ($document["status_id"] != 2){ ?>
												<div class="status-switch" id="onandoff_<?php echo $document["id"]; ?>" onclick="return change_status(<?php echo $document["id"]; ?>)"></div>
												<?php if ($document["status_id"] == 1){ ?>
													<script type="text/javascript">
														$('#onandoff_<?php echo $document["id"]; ?>').addClass('active_on');
													</script>
												<?php } ?>
											<?php } else { ?>
												<span class="label label-important"><i class="icon-remove icon-white"></i> <?php echo $this->lang->line('admin_doc_deleted'); ?></span>
											<?php } ?>
										</div>
									</td>
									<td>
										<?php echo anchor(ADMINFOLDER . "/documents/documents_manage/" . $document["id"], '<i class="icon-edit icon-white"></i> <b>'.$this->lang->line('admin_doc_edit').'</b>', array ("class" => "btn btn-mini btn-success")); ?>
										<?php if($logged_in_user['admin_name'] == 'Super Administrator') { ?>
											<span class="del_btn_<?php echo $document["id"]; ?>">
												<?php if ($document["status_id"] != 2) {
													echo anchor('', '<i class="icon-trash icon-white"></i> <b>'.$this->lang->line('admin_doc_delete').'</b>', array ("class" => "btn btn-mini btn-danger", "onclick" => "return delete_document(".$document['id'].",".$document["status_id"].")"));
												} ?>
											</span>
										<?php } ?>
										<?php //echo $documents['comments_status']; ?>
										<?php if ($document["comments_count"] > 0 ) {
												//if($documents['comments_status'] == '1'){
											echo anchor(ADMINFOLDER . "/documents/show_comments/" . $document["id"], '<i class="icon-pencil icon-white"></i> <b>'.$this->lang->line('admin_doc_comments').'</b>', array ("class" => "btn btn-mini btn-info"));
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
								<th><?php echo $this->lang->line("admin_doc_list_tbl_doc_name"); ?></th>
								<th><?php echo $this->lang->line("admin_doc_list_tbl_category"); ?></th>
								<th><?php echo $this->lang->line("admin_doc_list_tbl_status"); ?></th>
								<th><?php echo $this->lang->line("admin_doc_list_tbl_actions"); ?></th>
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