<script type="text/javascript" src="<?php echo base_url("js"); ?>/jquery.validate.js"></script>
<!-- <script type="text/javascript" src="http://jquery.bassistance.de/validate/lib/jquery.metadata.js"></script> -->
<script type="text/javascript" src="<?php echo base_url("js"); ?>/jquery.metadata.js"></script>
<script type="text/javascript" src="<?php echo base_url("js"); ?>/bootstrap-transfer.js"></script>
<!-- <script type="text/javascript" src="<?php echo base_url("js"); ?>/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url("js"); ?>/bootstrap-timepicker.js"></script>
-->

<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>css/bootstrap-transfer.css" />
<!-- <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>css/bootstrap-datepicker.css" />
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>css/bootstrap-timepicker.css" />
 -->
<script type="text/javascript">

$(document).ready(function() {

	$("#document_manage_form").validate({
		rules: {
			doc_name: {
					required: true
				},
			doc_category_id: {
					required: true
				},
			doc_desc: {
					required: true
				},
			doc_type: {
					required: true
			},
			doc_path: {
					required: true,
					accept: "pdf|doc|docx|txt",
					filesize: 2097152
				},
			doc_image: {
					required: true,
					accept: "png|jpeg|jpg|gif",
					filesize: 2097152
				},
			doc_shared_by: {
					required: true
				},
			doc_tags: {
					required: true
				},
			doc_available_formats: {
					required: true
				}
			},
		messages: {
			doc_name: {
					required: "Document Name is a required field."
				},
			doc_category_id: {
					required: "Please select a Document Category."
				},
			doc_desc: {
					required: "Document Description is a required field."
				},
			doc_type: {
					required: "Please select a Document Type."
			},
			doc_path: {
					required: "Document is a required field.",
					accept: "Please upload a document of type (pdf, doc, docx or txt) only.",
					filesize: "Document of size upto 2MB is only allowed."
				},
			doc_image: {
					required: "Document Image is a required field.",
					accept: "Please upload an image of type (jpg, jpeg, gif or png) only.",
					filesize: "Image of size upto 2MB is only allowed."
				},
			doc_shared_by: {
					required: "Document Shared By Name is a required field."
				},
			doc_tags: {
					required: "Tags is a required field."
				},
			doc_available_formats: {
					required: "Available Formats is a required field."
				}
			},
		errorClass: "error", // control-group error
		validClass: "success", // control-group success
		errorElement: "span", // class='help-inline
		highlight: function(element, errorClass, validClass) {
			if (element.type === 'radio') {
				this.findByName(element.name).parent("div").parent("div").removeClass(validClass).addClass(errorClass);
			} else {
				$(element).parent("div").parent("div").removeClass(validClass).addClass(errorClass);
			}
		},
		unhighlight: function(element, errorClass, validClass) {
			if (element.type === 'radio') {
				this.findByName(element.name).parent("div").parent("div").removeClass(errorClass).addClass(validClass);
			} else {
				$(element).parent("div").parent("div").removeClass(errorClass).addClass(validClass);
			}
		}
	});

	// Function for validating uploaded file size using JQuery
	jQuery.validator.addMethod(
    "filesize",
     function(value, element, param) {
         if (this.optional(element)) // return true on optional element
             return true;
        return element.files[0].size <= param;
     }, jQuery.validator.messages.filesize );

	jQuery.validator.addMethod(
	'this_is_optional',
	function(value, element) {
		return true;
	}, '');

	$('#doc_image').change(function () {
		$('#doc_image').removeAttr('name');
		$('#doc_image').attr('name', 'doc_image');
	});

	$('#doc_path').change(function () {
		$('#doc_path').removeAttr('name');
		$('#doc_path').attr('name', 'doc_path');
	});

	$('#doc_type').change(set_doc_price_data);

	set_doc_price_data();

	function set_doc_price_data () {
		var doc_type_id = $('#doc_type').val();
		if (doc_type_id == 1) {
			$('#doc_price_data').hide();
			$('#doc_price').removeClass('required').addClass('this_is_optional');
		} else if (doc_type_id == 2) {
			$('#doc_price_data').show();
			$('#doc_price').removeClass('this_is_optional').addClass('required');
		} else {
			$('#doc_price_data').hide();
			$('#doc_price').removeClass('required').addClass('this_is_optional');
		}
	}

});

</script>

<div class="row">
	<div class="span8">

		<?php
		$set = (isset($document) && is_array($document)) ? true : false;
		$user_info = $this->session->userdata('admin_user');
		?>

		<fieldset>
			<legend><?php echo ($set)? $this->lang->line('admin_doc_update_title') : $this->lang->line('admin_doc_add_title'); ?>

			<p class="pull-right">
				<?php echo anchor(ADMINFOLDER . "/documents/documents_list", "<i class='icon-arrow-left icon-white'></i> " . $this->lang->line('back_to_list'), array("class" => "btn btn-info")); ?>
			</p>
			</legend>

			<?php if (isset($errors)) { ?>
				<div class="alert alert-error">
					<a class="close" data-dismiss="alert">&times;</a>
					<h4 class="alert-heading">
						<?php echo $this->lang->line("error"); ?>
					</h4>
					<?php echo $errors; ?>
				</div>
			<?php } ?>

			<?php
				$attributes = array ("class" => "form-horizontal", "id" => "document_manage_form", "name" => "document_manage_form");
				$action = ADMINFOLDER . "/documents/documents_manage_action";

				if ($set) {
					$action .= "/edit";
				}

				echo form_open_multipart($action, $attributes);

				if ($set) { ?>
					<input type="hidden" id="doc_id" name="doc_id" value="<?php echo $document["id"]; ?>" />
				<?php } ?>

			<div class="control-group">
				<label class="control-label" for="doc_name"><?php echo $this->lang->line('admin_doc_mng_doc_name'); ?>
					:</label>
				<div class="controls">
					<input type="text" class="input-xlarge" id="doc_name" name="doc_name"
						placeholder="<?php echo $this->lang->line('admin_doc_mng_doc_name_ph'); ?>" value="<?php echo ($set)? html_entity_decode($document["name"]) : ""; ?>" />
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="doc_category_id"><?php echo $this->lang->line('admin_doc_mng_cat'); ?>
					:</label>
				<div class="controls">
					<select class="input-xlarge" id="doc_category_id" name="doc_category_id">
						<option value="">-- <?php echo $this->lang->line('admin_doc_mng_sel_a_cat'); ?> --</option>
						<?php foreach ($categories as $category) {
							if (count($category['child_categories']) > 0) { ?>
								<optgroup label="<?php echo $category['doc_cat_name']; ?>">
									<?php foreach ($category['child_categories'] as $child_category) {
											$selected = "";
											if ($set && $document["category_id"] == $child_category['id']) {
												$selected = 'selected="selected"';
											} ?>
											<option value="<?php echo $child_category['id']; ?>" <?php echo $selected; ?>><?php echo $child_category['doc_cat_name']; ?></option>
									<?php } ?>
								</optgroup>
							<?php } else {
								$selected = "";
								if ($set && $document["category_id"] == $category['id']) {
									$selected = 'selected="selected"';
								} ?>
								<option value="<?php echo $category['id']; ?>" <?php echo $selected; ?>><?php echo $category['doc_cat_name']; ?></option>
							<?php }
							} ?>
					</select>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="doc_desc"><?php echo $this->lang->line('admin_doc_mng_desc'); ?>
					:</label>
				<div class="controls">
					<textarea class="input-xlarge" rows="3" id="doc_desc"
						name="doc_desc" placeholder="<?php echo $this->lang->line('admin_doc_mng_desc_ph'); ?>"><?php echo ($set) ? html_entity_decode($document['description']) : ""; ?></textarea>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="doc_type"><?php echo $this->lang->line('admin_doc_mng_type'); ?>
					:</label>
				<div class="controls">
					<select class="input-xlarge" id="doc_type" name="doc_type">
						<option value="">-- <?php echo $this->lang->line('admin_doc_mng_sel_a_type'); ?> --</option>
						<?php foreach ($doc_types as $doc_type) {
							$selected = "";
							if ($set && ($document["doc_type_id"] == $doc_type['id'])) {
								$selected = 'selected="selected"';
							} ?>
							<option value="<?php echo $doc_type['id']; ?>" <?php echo $selected; ?>><?php echo $doc_type['name']; ?></option>
						<?php } ?>
					</select>
				</div>
			</div>

			<div class="control-group" id="doc_price_data" style="display: none;">
				<label class="control-label" for="doc_price"><?php echo $this->lang->line('admin_doc_mng_doc_price'); ?>
					:</label>
				<div class="controls">
					<input type="text" class="input-xlarge this_is_optional" id="doc_price" name="doc_price"
						placeholder="<?php echo $this->lang->line('admin_doc_mng_doc_price_ph'); ?>" value="<?php echo ($set)? html_entity_decode($document["doc_price"]) : ""; ?>" />
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="doc_path"><?php echo $this->lang->line('admin_doc_mng_doc_path'); ?>
					:</label>
				<div class="controls">
					<input class="input-file span3" type="file" id="doc_path" name="doc_path" />
					<?php if ($set) { ?>
						<br />
						<a href="<?php echo base_url(). DOC_IMG_PATH . $document['doc_path']; ?>"><?php echo $document['doc_path']; ?></a>
						<input type='hidden' id='edit_document_path' name='edit_document_path' value='<?php echo $document["doc_path"]; ?>' />
						<script type="text/javascript">
							$('#doc_path').attr('name', 'doc_path_edit');
						</script>
					<?php } ?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="doc_image"><?php echo $this->lang->line('admin_doc_mng_image'); ?>
					:</label>
				<div class="controls">
					<input class="input-file span3" type="file" id="doc_image"
					name="doc_image" />
					<?php if ($set) {
							$image_properties = array(	'src' => DOC_THUMB_IMG_PATH . THUMB_EXT . $document["image"],
														'style' => "float: left; padding-right: 10px;"
												);
							echo img($image_properties); ?>
							<input type='hidden' id='edit_document_image' name='edit_document_image' value='<?php echo $document["image"]; ?>' />
							<script type="text/javascript">
								$('#doc_image').attr('name', 'doc_image_edit');
							</script>
					<?php } ?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="doc_shared_by"><?php echo $this->lang->line('admin_doc_mng_doc_shared_by'); ?>
					:</label>
				<div class="controls">
					<input type="text" class="input-xlarge" id="doc_shared_by" name="doc_shared_by"
						placeholder="<?php echo $this->lang->line('admin_doc_mng_doc_shared_by_ph'); ?>" value="<?php echo ($set)? html_entity_decode($document["shared_by"]) : ""; ?>" />
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="doc_tags"><?php echo $this->lang->line('admin_doc_mng_doc_tags'); ?>
					:</label>
				<div class="controls">
					<textarea class="input-xlarge" rows="3" id="doc_tags" name="doc_tags"
						placeholder="<?php echo $this->lang->line('admin_doc_mng_doc_tags_ph'); ?>"><?php echo ($set)? html_entity_decode($document["tags"]) : ""; ?></textarea>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="doc_available_formats"><?php echo $this->lang->line('admin_doc_mng_doc_avail_formats'); ?>
					:</label>
				<div class="controls">
					<input type="text" class="input-xlarge" id="doc_available_formats" name="doc_available_formats"
						placeholder="<?php echo $this->lang->line('admin_doc_mng_doc_avail_formats_ph'); ?>" value="<?php echo ($set)? html_entity_decode($document["available_formats"]) : ""; ?>" />
				</div>
			</div>

			<div class="control-group">
				<label for="doc_featured" class="control-label"><?php echo $this->lang->line('admin_doc_mng_featured'); ?>
					:</label>
				<div class="controls">
					<label class="checkbox">
						<input type="checkbox" id="doc_featured" name="doc_featured" value="1" <?php if($set && $document["featured"]) echo 'checked="checked"'; ?>>
						<?php echo $this->lang->line('admin_doc_mng_featured_note'); ?>
					</label>
				</div>
			</div>

			<div class="control-group">
				<label for="doc_only_today" class="control-label"><?php echo $this->lang->line('admin_doc_mng_only_today'); ?>
					:</label>
				<div class="controls">
					<label class="checkbox">
						<input type="checkbox" id="doc_only_today" name="doc_only_today" value="1" <?php if($set && $document["only_today"]) echo 'checked="checked"'; ?>>
						<?php echo $this->lang->line('admin_doc_mng_only_today_note'); ?>
					</label>
				</div>
			</div>

			<?php
				if( isset($document['id']) && $document['id'] !='' ) {
					$country_id = $this->Common_Model->get_valid_countries($document["id"], 'doc');
				}
			?>
			<div class="control-group">
				<label class="control-label" for="valid_country_ids"><?php echo $this->lang->line('admin_doc_mng_valid_cont'); ?>
					:</label>
				<div class="controls">

					<?php foreach ($countries as $country) { ?>
					<label class="checkbox">
						<input type="checkbox" name="valid_country_ids[]" id="valid_country_ids" value = "<?php echo $country['id'];?>" <?php if(isset($country_id)) foreach($country_id as $key=>$values) {  if($set && $values == $country['id']) echo 'checked="checked"'; }?> ><?php echo $country['name'];?>
					</label>
					<?php } ?>

					 <!-- <script type="text/javascript">
						$(function() {
							var t = $('#valid_countries').bootstrapTransfer(
								{'target_id': 'multi-select-input',
								 'target_name': 'valid_country_ids[]',
								 'height': '15em',
								 'hilite_selection': true});

							t.populate([
								<?php foreach ($countries as $country) { ?>
									{value:"<?php echo $country["id"]; ?>", content:"<?php echo $country["name"]; ?>"},
								<?php } ?>
							]);
							<?php if($set){ ?>
								t.set_values([<?php echo $document['valid_countries']; ?>]);
							<?php }/* else { ?>
								t.set_values(["15", "38", "77", "226"]);
							<?php } */?>
							// t.set_values(["2", "4"]);
							console.log(t.get_values());
						});
					</script> -->
				</div>
			</div>

			<!-- <div class="control-group">
				<label for="doc_status" class="control-label"><?php echo $this->lang->line('admin_doc_mng_status'); ?>
					:</label>
				<div class="controls">
					<script type="text/javascript">
						$(function () {
							$('#doc_status_scheduled').click(function () {
								var doc_status_sch = $('#doc_status_scheduled:checked').val();

								if (doc_status_sch == 1) {
									$('#doc_status_schedule_div').show();
									$('#doc_status_dropdown_div').hide();
								} else {
									$('#doc_status_dropdown_div').show();
									$('#doc_status_schedule_div').hide();
								}

							});
						});
					</script>
					<label class="checkbox">
						<input type="checkbox" id="doc_status_scheduled" name="doc_status_scheduled" value="1">
						<?php echo $this->lang->line('admin_doc_mng_scheduled'); ?>
					</label>
					<div id="doc_status_dropdown_div">
						<?php $user_info = $this->session->userdata('admin_user'); ?>
						<select class="input-xlarge" id="doc_status" name="doc_status">
							<option value="0" <?php if($set && $document["status_id"] == 0) echo 'selected="selected"'; ?>><?php echo $this->lang->line('admin_doc_mng_status_inactive'); ?></option>
							<option value="1" <?php if($set && $document["status_id"] == 1) echo 'selected="selected"'; ?>><?php echo $this->lang->line('admin_doc_mng_status_active'); ?></option>
							<?php if ($user_info['admin_type_ref_id'] == 1) { ?>
								<option value="2" <?php if($set && $document["status_id"] == 2) echo 'selected="selected"'; ?>><?php echo $this->lang->line('admin_doc_mng_status_deleted'); ?></option>
							<?php } ?>
						</select>
					</div>
					<div id="doc_status_schedule_div" style="display:none;">
						<script type="text/javascript">
							$(function(){
								$('#doc_status_schedule_date').datepicker();
								$('#doc_status_schedule_time').timepicker();
							});
						</script>
						<div class="input-append date" id="doc_status_schedule_date" data-date="12-02-2012" data-date-format="dd-mm-yyyy">
							<input class="input-small" size="16" type="text" value="12-02-2012" readonly />
							<span class="add-on"><i class="icon-calendar"></i></span>
						</div>
						<div class="input-append bootstrap-timepicker-component">
							<input type="text" id="doc_status_schedule_time" class="input-small" readonly />
							<span class="add-on"><i class="icon-time"></i></span>
						</div>
					</div>
				</div>
			</div> -->

			<div class="form-actions">
				<button class="btn btn-primary" type="submit">
					<?php echo ($set)? $this->lang->line('admin_doc_update_btn') : $this->lang->line('admin_doc_add_btn'); ?>
				</button>
				<button class="btn" type="reset"><?php echo $this->lang->line('form_cancel'); ?></button>
			</div>

			<?php echo form_close();?>

		</fieldset>
	</div>

	<div class="span3">
		<h3>What's included</h3>
		<p>This application helps us to generate a script for Facebook Like Button and also to track the likes information through that.
We need to provide the following information to go forward:</p>
		<ul>
			<li>One</li>
			<li>Two</li>
			<li>Three</li>
			<li>Four</li>
		</ul>
		<hr>
		<h4>Note</h4>
		<p>Please don't fail to link "jquery.js" to the campaign page.</p>
	</div>

</div>