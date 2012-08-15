<script type="text/javascript" src="<?php echo base_url("js"); ?>/jquery.validate.js"></script>
<script type="text/javascript" src="<?php echo base_url("js"); ?>/bootstrap-transfer.js"></script>

<link rel="stylesheet" type="text/css" media="screen"
	href="<?php echo base_url(); ?>css/bootstrap-transfer.css" />

<div class="row">
	<div class="span8">
		<?php
		$set = (isset($document) && is_array($document)) ? true : false;

		$user_info = $this->session->userdata('admin_user');
		?>

		<fieldset>
			<legend><?php echo ($set)? "Update" : "Add"; ?> Document Form</legend>

			<p class="pull-right" style="margin-top: 10px;">
				<?php echo anchor(ADMINFOLDER . "/documents/documents_list", "<i class='icon-arrow-left icon-white'></i> Back to List", array("class" => "btn btn-info")); ?>
			</p>
			<br />
			<br />

			<?php if (isset($errors)) { ?>
				<div class="alert alert-error">
					<a class="close" data-dismiss="alert">&times;</a>
					<h4 class="alert-heading">Error!</h4>
					<?php echo $errors; ?>
				</div>
			<?php } ?>

			<?php
				$attributes = array ("class" => "form-horizontal", "id" => "document_manage_form", "name" => "document_manage_form");
				$action = ADMINFOLDER . "/documents/documents_manage_action";

				echo form_open_multipart($action, $attributes);
			?>

			<div class="control-group">
				<label class="control-label" for="doc_name">Document Name
					:</label>
				<div class="controls">
					<input type="text" class="input-xlarge" id="doc_name" name="doc_name"
						placeholder="Document Name" />
					<!-- <p class="help-block">example: admin@admin.com</p> -->
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="doc_category_id">Category
					:</label>
				<div class="controls">
					<select class="input-xlarge" id="doc_category_id" name="doc_category_id">
						<option value="">-- Select a Category --</option>
						<?php foreach ($categories as $category) { ?>
							<option value="<?php echo $category['id']; ?>"><?php echo $category['doc_cat_name']; ?></option>
						<?php } ?>
					</select>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="doc_desc">Document Description
					:</label>
				<div class="controls">
					<textarea class="input-xlarge" rows="3" id="doc_desc"
						name="doc_desc" placeholder="Document Description"></textarea>
					<!-- <p class="help-block">example: admin@admin.com</p> -->
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="doc_file">Upload Document
					:</label>
				<div class="controls">
					<input class="input-file span3" type="file" id="doc_file"
					name="doc_file" />
					<!-- <p class="help-block">example: admin@admin.com</p> -->
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="valid_country_ids">Valid Countries
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
							//t.set_values(["2", "4"]);
							//console.log(t.get_values());
						});
					</script>
				</div>
			</div>

			<div class="form-actions">
				<button class="btn btn-primary" type="submit"><?php echo ($set)? "Update" : "Add"; ?> Document</button>
				<button class="btn" type="reset">Cancel</button>
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