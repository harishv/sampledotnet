<script type="text/javascript" src="<?php echo base_url("js"); ?>/jquery.validate.js"></script>
<!-- <script type="text/javascript" src="http://jquery.bassistance.de/validate/lib/jquery.metadata.js"></script> -->
<script type="text/javascript" src="<?php echo base_url("js"); ?>/jquery.metadata.js"></script>
<script type="text/javascript" src="<?php echo base_url("js"); ?>/bootstrap-transfer.js"></script>
<script type="text/javascript" src="<?php echo base_url("js"); ?>/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url("js"); ?>/bootstrap-timepicker.js"></script>

<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>css/bootstrap-transfer.css" />
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>css/bootstrap-datepicker.css" />
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>css/bootstrap-timepicker.css" />

<script type="text/javascript">

$(document).ready(function() {

	$("#product_manage_form").validate({
		rules: {
			prod_name: {
					required: true
				},
			prod_category_id: {
					required: true
				},
			prod_desc: {
					required: true
				},
			prod_grab_url: {
					required: true,
					url: true
				},
			prod_image: {
					required: true,
					accept: "png|jpeg|jpg|gif",
					filesize: 2097152
				}
			},
		messages: {
			prod_name: {
					required: "Product Name is a required field."
				},
			prod_category_id: {
					required: "Please select a Product Category."
				},
			prod_desc: {
					required: "Product Description is a required field."
				},
			prod_grab_url: {
					required: "Grab URL is a required field.",
					url: "Please enter a valid Grab URL."
				},
			prod_image: {
					required: "Product Image is a required field.",
					accept: "Please upload an image of type (jpg, jpeg, gif or png) only.",
					filesize: "Image of size upto 2MB is only allowed."
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

	$('#prod_image').change(function () {
		$('#prod_image').removeAttr('name');
		$('#prod_image').attr('name', 'prod_image');
	});

});


</script>

<div class="row">
	<div class="span8">

		<?php
		$set = (isset($product) && is_array($product)) ? true : false;

		$user_info = $this->session->userdata('admin_user');
		?>

		<fieldset>
			<legend><?php echo ($set)? $this->lang->line('admin_prod_update_title') : $this->lang->line('admin_prod_add_title'); ?>

			<p class="pull-right">
				<?php echo anchor(ADMINFOLDER . "/products/products_list", "<i class='icon-arrow-left icon-white'></i> " . $this->lang->line('back_to_list'), array("class" => "btn btn-info")); ?>
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
				$attributes = array ("class" => "form-horizontal", "id" => "product_manage_form", "name" => "product_manage_form");
				$action = ADMINFOLDER . "/products/products_manage_action";

				if ($set) {
					$action .= "/edit";
				}

				echo form_open_multipart($action, $attributes);

				if ($set) { ?>
					<input type="hidden" id="prod_id" name="prod_id" value="<?php echo $product["id"]; ?>" />
				<?php } ?>

			<div class="control-group">
				<label class="control-label" for="prod_name"><?php echo $this->lang->line('admin_prod_mng_prod_name'); ?>
					:</label>
				<div class="controls">
					<input type="text" class="input-xlarge" id="prod_name" name="prod_name"
						placeholder="<?php echo $this->lang->line('admin_prod_mng_prod_name_ph'); ?>" value="<?php echo ($set)? $this->Common_Model->clear_string($product["name"]) : ""; ?>" />
					<!-- <p class="help-block">example: admin@admin.com</p> -->
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="prod_category_id"><?php echo $this->lang->line('admin_prod_mng_cat'); ?>
					:</label>
				<div class="controls">
					<select class="input-xlarge" id="prod_category_id" name="prod_category_id">
						<option value="">-- <?php echo $this->lang->line('admin_prod_mng_sel_a_cat'); ?> --</option>
						<?php foreach ($categories as $category) {
							if (count($category['child_categories']) > 0) { ?>
								<optgroup label="<?php echo $category['prod_cat_name']; ?>">
									<?php foreach ($category['child_categories'] as $child_category) {
											$selected = "";
											if ($set && $product["category_id"] == $child_category['id']) {
												$selected = 'selected="selected"';
											} ?>
											<option value="<?php echo $child_category['id']; ?>" <?php echo $selected; ?>><?php echo $child_category['prod_cat_name']; ?></option>
									<?php } ?>
								</optgroup>
							<?php } else {
								$selected = "";
								if ($set && $product["category_id"] == $category['id']) {
									$selected = 'selected="selected"';
								} ?>
								<option value="<?php echo $category['id']; ?>" <?php echo $selected; ?>><?php echo $category['prod_cat_name']; ?></option>
							<?php }
							} ?>
					</select>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="prod_desc"><?php echo $this->lang->line('admin_prod_mng_desc'); ?>
					:</label>
				<div class="controls">
					<textarea class="input-xlarge" rows="3" id="prod_desc"
						name="prod_desc" placeholder="<?php echo $this->lang->line('admin_prod_mng_desc_ph'); ?>"><?php echo ($set) ? $this->Common_Model->clear_string($product['description']) : ""; ?></textarea>
					<!-- <p class="help-block">example: admin@admin.com</p> -->
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="prod_grab_url"><?php echo $this->lang->line('admin_prod_mng_prod_grab_url'); ?>
					:</label>
				<div class="controls">
					<input type="text" class="input-xlarge" id="prod_grab_url" name="prod_grab_url"
						placeholder="<?php echo $this->lang->line('admin_prod_mng_prod_grab_url_ph'); ?>" value="<?php echo ($set)? $this->Common_Model->clear_string($product["grab_url"]) : ""; ?>" />
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="prod_image"><?php echo $this->lang->line('admin_prod_mng_image'); ?>
					:</label>
				<div class="controls">
					<input class="input-file span3" type="file" id="prod_image"
					name="prod_image" />
					<?php if ($set) {
							$image_properties = array(	'src' => PROD_THUMB_IMG_PATH . THUMB_EXT . $product["image"],
														'style' => "float: left; padding-right: 10px;"
												);
							echo img($image_properties); ?>
							<input type='hidden' id='edit_product_image' name='edit_product_image' value='<?php echo $product["image"]; ?>' />
							<script type="text/javascript">
								$('#prod_image').attr('name', 'prod_image_edit');
							</script>
					<?php } ?>
				</div>
			</div>

			<div class="control-group">
				<label for="prod_featured" class="control-label"><?php echo $this->lang->line('admin_prod_mng_featured'); ?>
					:</label>
				<div class="controls">
					<label class="checkbox">
						<input type="checkbox" id="prod_featured" name="prod_featured" value="1" <?php if($set && $product["featured"]) echo 'checked="checked"'; ?>>
						<?php echo $this->lang->line('admin_prod_mng_featured_note'); ?>
					</label>
				</div>
			</div>

			<div class="control-group">
				<label for="prod_only_today" class="control-label"><?php echo $this->lang->line('admin_prod_mng_only_today'); ?>
					:</label>
				<div class="controls">
					<label class="checkbox">
						<input type="checkbox" id="prod_only_today" name="prod_only_today" value="1" <?php if($set && $product["only_today"]) echo 'checked="checked"'; ?>>
						<?php echo $this->lang->line('admin_prod_mng_only_today_note'); ?>
					</label>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="valid_country_ids"><?php echo $this->lang->line('admin_prod_mng_valid_cont'); ?>
					:</label>
				<div class="controls">
					<div id="valid_countries" class="span5"></div>
					<script type="text/javascript">
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
								t.set_values([<?php echo $product['valid_countries']; ?>]);
							<?php }/* else { ?>
								t.set_values(["15", "38", "77", "226"]);
							<?php } */?>
							// t.set_values(["2", "4"]);
							// console.log(t.get_values());
						});
					</script>
				</div>
			</div>

			<div class="control-group">
				<label for="prod_status" class="control-label"><?php echo $this->lang->line('admin_prod_mng_status'); ?>
					:</label>
				<div class="controls">
					<script type="text/javascript">
						$(function () {
							$('#prod_status_scheduled').click(function () {
								var prod_status_sch = $('#prod_status_scheduled:checked').val();

								if (prod_status_sch == 1) {
									$('#prod_status_schedule_div').show();
									$('#prod_status_dropdown_div').hide();
								} else {
									$('#prod_status_dropdown_div').show();
									$('#prod_status_schedule_div').hide();
								}

							});
						});
					</script>
					<label class="checkbox">
						<input type="checkbox" id="prod_status_scheduled" name="prod_status_scheduled" value="1">
						<?php echo $this->lang->line('admin_prod_mng_scheduled'); ?>
					</label>
					<div id="prod_status_dropdown_div">
						<?php $user_info = $this->session->userdata('admin_user'); ?>
						<select class="input-xlarge" id="prod_status" name="prod_status">
							<option value="0" <?php if($set && $product["status_id"] == 0) echo 'selected="selected"'; ?>><?php echo $this->lang->line('admin_prod_mng_status_inactive'); ?></option>
							<option value="1" <?php if($set && $product["status_id"] == 1) echo 'selected="selected"'; ?>><?php echo $this->lang->line('admin_prod_mng_status_active'); ?></option>
							<?php if ($user_info['admin_type_ref_id'] == 1) { ?>
								<option value="2" <?php if($set && $product["status_id"] == 2) echo 'selected="selected"'; ?>><?php echo $this->lang->line('admin_prod_mng_status_deleted'); ?></option>
							<?php } ?>
						</select>
					</div>
					<div id="prod_status_schedule_div" style="display:none;">
						<script type="text/javascript">
							$(function(){
								$('#prod_status_schedule_date').datepicker();
								$('#prod_status_schedule_time').timepicker();
							});
						</script>
						<div class="input-append date" id="prod_status_schedule_date" data-date="12-02-2012" data-date-format="dd-mm-yyyy">
							<input class="input-small" size="16" type="text" value="12-02-2012" readonly />
							<span class="add-on"><i class="icon-calendar"></i></span>
						</div>
						<div class="input-append bootstrap-timepicker-component">
							<input type="text" id="prod_status_schedule_time" class="input-small" readonly />
							<span class="add-on"><i class="icon-time"></i></span>
						</div>
					</div>
				</div>
			</div>

			<div class="form-actions">
				<button class="btn btn-primary" type="submit">
					<?php echo ($set)? $this->lang->line('admin_prod_update_btn') : $this->lang->line('admin_prod_add_btn'); ?>
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