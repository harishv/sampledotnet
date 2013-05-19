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
					accept: "pdf|doc|docx|zip",
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

<div class="row-fluid">


	<?php
	$set = (isset($document) && is_array($document)) ? true : false;
	$user_info = $this->session->userdata('admin_user');
	?>

	<fieldset>
		<div class="sapn12">
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

		</div>

		<div class="span12">

			<?php
				$attributes = array ("class" => "form-horizontal", "id" => "document_manage_form", "name" => "document_manage_form");
				$action = ADMINFOLDER . "/documents/documents_manage_action";

				if ($set) {
					$action .= "/edit";
				}

				echo form_open_multipart($action, $attributes); ?>

				<div class="span7">
					<?php if ($set) { ?>
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
						</div>
					</div>

					<div class="form-actions">
						<button class="btn btn-primary" type="submit">
							<?php echo ($set)? $this->lang->line('admin_doc_update_btn') : $this->lang->line('admin_doc_add_btn'); ?>
						</button>
						<button class="btn" type="reset"><?php echo $this->lang->line('form_cancel'); ?></button>
					</div>


				</div>

				<div class="span4">

					<h3><?php echo $this->lang->line('admin_doc_mng_meta_tags_heading'); ?></h3>

					<div class="control-group">
						<label for="meta_keywords" class="control-label"><?php echo $this->lang->line('admin_doc_mng_meta_keywords'); ?>
							:</label>
						<div class="controls">
							<textarea class="input-xlarge" rows="3" id="meta_keywords" name="meta_keywords" placeholder="<?php echo $this->lang->line('admin_doc_mng_meta_keywords_ph'); ?>"><?php echo ($set) ? html_entity_decode($document['meta_keywords']) : ""; ?></textarea>
						</div>
					</div>

					<div class="control-group">
						<label for="meta_desc" class="control-label"><?php echo $this->lang->line('admin_doc_mng_meta_desc'); ?>
							:</label>
						<div class="controls">
							<textarea class="input-xlarge" rows="3" id="meta_desc" name="meta_desc" placeholder="<?php echo $this->lang->line('admin_doc_mng_meta_desc_ph'); ?>"><?php echo ($set) ? html_entity_decode($document['meta_desc']) : ""; ?></textarea>
						</div>
					</div>

				</div>
			<?php echo form_close();?>
		</div>

	</fieldset>

</div>