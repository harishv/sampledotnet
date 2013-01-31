<link rel="stylesheet" type="text/css" media="screen"
	href="<?php echo base_url(); ?>css/bootstrap-transfer.css" />

<script type="text/javascript">

	$(document).ready(function() {

		<?php if (!isset($category) || $category["parent_cat_id"] == 0) { ?>
			$('#parent_cat_dropdown').attr('style', 'display: none');
		<?php } ?>

		var doc_cat_choice;
		$('.doc_cat_choice').click ( function () {
			doc_cat_choice = $('.doc_cat_choice:checked').val();

			if (doc_cat_choice == 'child') {
				$('#parent_cat_dropdown').attr('style', 'display: block');
			} else {
				$('#parent_cat_dropdown').attr('style', 'display: none');
			}
		});

		$('#doc_cat_name').blur(function () {
			validate_category_name();
		});

		$('.doc_cat_choice').blur(function () {
			validate_category_choice();
		});

		$('#doc_parent_category_id').change(function () {
			validate_parent_category();
		});

	} );

	function validate_category_form () {
		validate_category_name();
		validate_category_choice();

		var doc_cat_choice = $('.doc_cat_choice:checked').val();

		if (doc_cat_choice == 'child') {
			validate_parent_category();
		} else {
			$('#doc_parent_category_error').html('');
		}

		var doc_cat_name_error =	$('#doc_cat_name_error').html();
		var doc_cat_choice_error =	$('#doc_cat_choice_error').html();
		var doc_parent_category_error = $('#doc_parent_category_error').html();

		if ($.trim(doc_cat_name_error) === '' && $.trim(doc_cat_choice_error) === '') {
			if (doc_cat_choice == 'child') {
				if ($.trim(doc_parent_category_error) !== '') {
					return false;
				}
			}
			return true;
		}

		return false;
	}

	function validate_category_name () {
		var doc_cat_name = $.trim($('#doc_cat_name').val());

		if (doc_cat_name === undefined || doc_cat_name == null || doc_cat_name === '') {
			$('#doc_cat_name_error').html('Category Name is a required field.');
			$('#doc_cat_name').parent('div').parent('div').removeClass('success').addClass('error');
		} else {
			$('#doc_cat_name_error').html('');
			$('#doc_cat_name').parent('div').parent('div').removeClass('error').addClass('success');
		}

	}

	function validate_category_choice () {
		var doc_cat_choice = $.trim($('.doc_cat_choice:checked').val());

		if (doc_cat_choice === undefined || doc_cat_choice == null || doc_cat_choice === '') {
			$('#doc_cat_choice_error').html('Please select a Category choice.');
			$('#doc_cat_choice_error').parent('div').parent('div').removeClass('success').addClass('error');
		} else {
			$('#doc_cat_choice_error').html('');
			$('#doc_cat_choice_error').parent('div').parent('div').removeClass('error').addClass('success');
		}

	}

	function validate_parent_category () {
		var doc_parent_category_id = $.trim($('#doc_parent_category_id').val());

		if (doc_parent_category_id === undefined || doc_parent_category_id == null || doc_parent_category_id === '') {
			$('#doc_parent_category_error').html('Please select a Parent Category.');
			$('#doc_parent_category_error').parent('div').parent('div').removeClass('success').addClass('error');
		} else {
			$('#doc_parent_category_error').html('');
			$('#doc_parent_category_error').parent('div').parent('div').removeClass('error').addClass('success');
		}

	}

</script>

<div class="row">
	<div class="span8">

		<?php
		$set = (isset($category) && is_array($category)) ? true : false;

		$user_info = $this->session->userdata('admin_user');
		?>

		<fieldset>
			<legend><?php echo ($set)? $this->lang->line('admin_doc_cat_update_title') : $this->lang->line('admin_doc_cat_add_title'); ?>

			<p class="pull-right">
				<?php echo anchor(ADMINFOLDER . "/documents/categories_list", "<i class='icon-arrow-left icon-white'></i> " . $this->lang->line('back_to_categories_list'), array("class" => "btn btn-info")); ?>
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
				$attributes = array ("class" => "form-horizontal", "id" => "doc_cat_manage_form", "name" => "doc_cat_manage_form", "onsubmit" => "return validate_category_form()");
				$action = ADMINFOLDER . "/documents/doc_cat_manage_action";

				if ($set) {
					$action .= "/edit";
				}

				echo form_open($action, $attributes);

				if ($set) { ?>
					<input type="hidden" id="doc_cat_id" name="doc_cat_id" value="<?php echo $category["id"]; ?>" />
			<?php } ?>

			<div class="control-group">
				<label class="control-label" for="doc_cat_name"><?php echo $this->lang->line('admin_doc_cat_mng_doc_name'); ?>
					:</label>
				<div class="controls">
					<input type="text" class="input-xlarge" id="doc_cat_name" name="doc_cat_name"
						placeholder="<?php echo $this->lang->line('admin_doc_cat_mng_doc_name_ph'); ?>" value="<?php echo ($set)? $this->Common_Model->clear_string($category["doc_cat_name"]) : ""; ?>" />
					<span class="help-inline" id="doc_cat_name_error"></span>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="doc_cat_choice"><?php echo $this->lang->line('admin_doc_cat_mng_cat_choice'); ?>
					:</label>
				<div class="controls">
					<label class="radio inline">
						<input type="radio" class="doc_cat_choice" value="parent" name="doc_cat_choice" <?php if(isset($category) && $category["parent_cat_id"] == 0) echo 'checked="checked"'; ?>>
						Parent Category
					</label>
					<label class="radio inline">
						<input type="radio" class="doc_cat_choice" value="child" name="doc_cat_choice" <?php if(isset($category) && $category["parent_cat_id"] != 0) echo 'checked="checked"'; ?>>
						Sub-Category
					</label>
					<span class="help-inline" id="doc_cat_choice_error" style="vertical-align: bottom;"></span>
				</div>
			</div>

			<div id="parent_cat_dropdown" class="control-group">
				<label class="control-label" for="doc_parent_category_id"><?php echo $this->lang->line('admin_doc_cat_mng_parent_cat'); ?>
					:</label>
				<div class="controls">
					<select class="input-xlarge" id="doc_parent_category_id" name="doc_parent_category_id">
						<option value="">-- <?php echo $this->lang->line('admin_doc_cat_mng_sel_a_cat'); ?> --</option>
						<?php foreach ($categories as $parent_category) {
								if (isset($category) && $category['id'] == $parent_category['id']) {
									continue;
								}
								$selected = "";
								if ($set && $category["parent_cat_id"] == $parent_category['id']) {
									$selected = 'selected="selected"';
								} ?>
								<option value="<?php echo $parent_category['id']; ?>" <?php echo $selected; ?>><?php echo $parent_category['doc_cat_name']; ?></option>
						<?php } ?>
					</select>
					<span class="help-inline" id="doc_parent_category_error"></span>
				</div>
			</div>

			<div class="form-actions">
				<button class="btn btn-primary" type="submit">
					<?php echo ($set)? $this->lang->line('admin_doc_cat_update_btn') : $this->lang->line('admin_doc_cat_add_btn'); ?>
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