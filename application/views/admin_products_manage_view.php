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

<div class="row-fluid">


	<?php
	$set = (isset($product) && is_array($product)) ? true : false;

	$user_info = $this->session->userdata('admin_user');
	?>

	<fieldset>
		<div class="sapn12">

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

		</div>

		<div class="span12">

			<?php
				$attributes = array ("class" => "form-horizontal", "id" => "product_manage_form", "name" => "product_manage_form");
				$action = ADMINFOLDER . "/products/products_manage_action";

				if ($set) {
					$action .= "/edit";
				}

				echo form_open_multipart($action, $attributes); ?>

				<div class="span7">

					<?php if ($set) { ?>
							<input type="hidden" id="prod_id" name="prod_id" value="<?php echo $product["id"]; ?>" />
						<?php } ?>

					<div class="control-group">
						<label class="control-label" for="prod_name"><?php echo $this->lang->line('admin_prod_mng_prod_name'); ?>
							:</label>
						<div class="controls">
							<input type="text" class="input-xlarge" id="prod_name" name="prod_name"
								placeholder="<?php echo $this->lang->line('admin_prod_mng_prod_name_ph'); ?>" value="<?php echo ($set)? html_entity_decode($product["name"]) : ""; ?>" />
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
								name="prod_desc" placeholder="<?php echo $this->lang->line('admin_prod_mng_desc_ph'); ?>"><?php echo ($set) ? html_entity_decode($product['description']) : ""; ?></textarea>
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

					<?php
						if( isset($product['id']) && $product['id'] !='' ) {
							$country_id = $this->Common_Model->get_valid_countries($product["id"]);
						}
					?>

					<div class="control-group">
						<label class="control-label" for="valid_country_ids"><?php echo $this->lang->line('admin_prod_mng_valid_cont'); ?>
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
							<?php echo ($set)? $this->lang->line('admin_prod_update_btn') : $this->lang->line('admin_prod_add_btn'); ?>
						</button>
						<button class="btn" type="reset"><?php echo $this->lang->line('form_cancel'); ?></button>
					</div>

				</div>

				<div class="span4">

					<h3><?php echo $this->lang->line('admin_prod_mng_meta_tags_heading'); ?></h3>

					<div class="control-group">
						<label for="meta_keywords" class="control-label"><?php echo $this->lang->line('admin_prod_mng_meta_keywords'); ?>
							:</label>
						<div class="controls">
							<textarea class="input-xlarge" rows="3" id="meta_keywords" name="meta_keywords" placeholder="<?php echo $this->lang->line('admin_prod_mng_meta_keywords_ph'); ?>"><?php echo ($set) ? html_entity_decode($product['meta_keywords']) : ""; ?></textarea>
						</div>
					</div>

					<div class="control-group">
						<label for="meta_desc" class="control-label"><?php echo $this->lang->line('admin_prod_mng_meta_desc'); ?>
							:</label>
						<div class="controls">
							<textarea class="input-xlarge" rows="3" id="meta_desc" name="meta_desc" placeholder="<?php echo $this->lang->line('admin_prod_mng_meta_desc_ph'); ?>"><?php echo ($set) ? html_entity_decode($product['meta_desc']) : ""; ?></textarea>
						</div>
					</div>

				</div>
			<?php echo form_close();?>
		</div>

	</fieldset>

</div>