<script type="text/javascript" src="<?php echo base_url("js"); ?>/jquery.validate.js"></script>
<script type="text/javascript" src="<?php echo base_url("js"); ?>/bootstrap-transfer.js"></script>

<link rel="stylesheet" type="text/css" media="screen"
	href="<?php echo base_url(); ?>css/bootstrap-transfer.css" />

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
						placeholder="<?php echo $this->lang->line('admin_prod_mng_prod_name_ph'); ?>" value="<?php echo ($set)? $product["name"] : ""; ?>" />
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
						name="prod_desc" placeholder="<?php echo $this->lang->line('admin_prod_mng_desc_ph'); ?>"><?php echo ($set) ? $product['description'] : ""; ?></textarea>
					<!-- <p class="help-block">example: admin@admin.com</p> -->
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
					<?php } ?>
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
							<?php } ?>
							// t.set_values(["2", "4"]);
							// console.log(t.get_values());
						});
					</script>
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