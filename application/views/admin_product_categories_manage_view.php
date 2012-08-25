<script type="text/javascript" src="<?php echo base_url("js"); ?>/jquery.validate.js"></script>

<link rel="stylesheet" type="text/css" media="screen"
	href="<?php echo base_url(); ?>css/bootstrap-transfer.css" />

<script type="text/javascript">

	$(document).ready(function() {

		<?php if (!isset($category) || $category["parent_cat_id"] == 0) { ?>
			$('#parent_cat_dropdown').attr('style', 'display: none');
		<?php } ?>

		var prod_cat_choice;
		$('.prod_cat_choice').click ( function () {
			prod_cat_choice = $('.prod_cat_choice:checked').val();

			if (prod_cat_choice == 'child') {
				$('#parent_cat_dropdown').attr('style', 'display: block');
			} else {
				$('#parent_cat_dropdown').attr('style', 'display: none');
			}
		});

	} );

</script>

<div class="row">
	<div class="span8">

		<?php
		$set = (isset($category) && is_array($category)) ? true : false;

		$user_info = $this->session->userdata('admin_user');
		?>

		<fieldset>
			<legend><?php echo ($set)? $this->lang->line('admin_prod_cat_update_title') : $this->lang->line('admin_prod_cat_add_title'); ?>

			<p class="pull-right">
				<?php echo anchor(ADMINFOLDER . "/products/categories_list", "<i class='icon-arrow-left icon-white'></i> " . $this->lang->line('back_to_categories_list'), array("class" => "btn btn-info")); ?>
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
				$attributes = array ("class" => "form-horizontal", "id" => "prod_cat_manage_form", "name" => "prod_cat_manage_form");
				$action = ADMINFOLDER . "/products/prod_cat_manage_action";

				if ($set) {
					$action .= "/edit";
				}

				echo form_open($action, $attributes);

				if ($set) { ?>
					<input type="hidden" id="prod_cat_id" name="prod_cat_id" value="<?php echo $category["id"]; ?>" />
			<?php } ?>

			<div class="control-group">
				<label class="control-label" for="prod_cat_name"><?php echo $this->lang->line('admin_prod_cat_mng_prod_name'); ?>
					:</label>
				<div class="controls">
					<input type="text" class="input-xlarge" id="prod_cat_name" name="prod_cat_name"
						placeholder="<?php echo $this->lang->line('admin_prod_cat_mng_prod_name_ph'); ?>" value="<?php echo ($set)? $this->Common_Model->clear_string($category["prod_cat_name"]) : ""; ?>" />
					<!-- <p class="help-block">example: admin@admin.com</p> -->
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="prod_cat_choice"><?php echo $this->lang->line('admin_prod_cat_mng_cat_choice'); ?>
					:</label>
				<div class="controls">
					<label class="radio inline">
						<input type="radio" class="prod_cat_choice" value="parent" name="prod_cat_choice" <?php if(isset($category) && $category["parent_cat_id"] == 0) echo 'checked="checked"'; ?>>
						Parent Category
					</label>
					<label class="radio inline">
						<input type="radio" class="prod_cat_choice" value="child" name="prod_cat_choice" <?php if(isset($category) && $category["parent_cat_id"] != 0) echo 'checked="checked"'; ?>>
						Sub-Category
					</label>
				</div>
			</div>

			<div id="parent_cat_dropdown" class="control-group">
				<label class="control-label" for="prod_parent_category_id"><?php echo $this->lang->line('admin_prod_cat_mng_parent_cat'); ?>
					:</label>
				<div class="controls">
					<select class="input-xlarge" id="prod_parent_category_id" name="prod_parent_category_id">
						<option value="">-- <?php echo $this->lang->line('admin_prod_cat_mng_sel_a_cat'); ?> --</option>
						<?php foreach ($categories as $parent_category) {
								if (isset($category) && $category['id'] == $parent_category['id']) {
									continue;
								}
								$selected = "";
								if ($set && $category["parent_cat_id"] == $parent_category['id']) {
									$selected = 'selected="selected"';
								} ?>
								<option value="<?php echo $parent_category['id']; ?>" <?php echo $selected; ?>><?php echo $parent_category['prod_cat_name']; ?></option>
						<?php } ?>
					</select>
				</div>
			</div>

			<div class="form-actions">
				<button class="btn btn-primary" type="submit">
					<?php echo ($set)? $this->lang->line('admin_prod_cat_update_btn') : $this->lang->line('admin_prod_cat_add_btn'); ?>
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