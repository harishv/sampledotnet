<script type="text/javascript"
	src="<?php echo base_url("js"); ?>/jquery.validate.js"></script>

<div class="row">
	<div class="span8">
		<?php
		$set = (isset($product) && is_array($product)) ? true : false;

		$user_info = $this->session->userdata('admin_user');
		?>

		<fieldset>
			<legend><?php echo ($set)? "Update" : "Add"; ?> Product Form</legend>

			<p class="pull-right" style="margin-top: 10px;">
				<?php echo anchor(ADMINFOLDER . "/products/products_list", "<i class='icon-arrow-left icon-white'></i> Back to List", array("class" => "btn btn-info")); ?>
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
				$attributes = array ("class" => "form-horizontal", "id" => "product_manage_form", "name" => "product_manage_form");
				$action = ADMINFOLDER . "/products/products_manage_action";

				echo form_open($action, $attributes);
			?>

			<div class="control-group">
				<label class="control-label" for="prod_name">Product Name
					:</label>
				<div class="controls">
					<input type="text" class="input-xlarge" id="prod_name" name="prod_name"
						placeholder="Product Name" />
					<!-- <p class="help-block">example: admin@admin.com</p> -->
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="prod_category_id">Category
					:</label>
				<div class="controls">
					<select class="input-xlarge" id="prod_category_id" name="prod_category_id">
						<option value="">-- Select a Category --</option>
						<?php foreach ($categories as $category) { ?>
							<option value="<?php echo $category['id']; ?>"><?php echo $category['prod_cat_name']; ?></option>
						<?php } ?>
					</select>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="prod_desc">Product Description
					:</label>
				<div class="controls">
					<textarea class="input-xlarge" rows="3" id="prod_desc"
						name="prod_desc" placeholder="Product Description"></textarea>
					<!-- <p class="help-block">example: admin@admin.com</p> -->
				</div>
			</div>


			<div class="control-group">
				<label class="control-label" for="prod_image">Image
					:</label>
				<div class="controls">
					<input class="input-file span3" type="file" id="prod_image"
					name="prod_image" />
					<!-- <p class="help-block">example: admin@admin.com</p> -->
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="valid_country_ids">Valid Countries
					:</label>
				<div class="controls">
					<select size="6" class="input-xlarge" multiple="multiple" id="valid_country_ids" name="valid_country_ids[]">
						<option value="">-- Select atleast one Country --</option>
						<?php foreach ($countries as $country) { ?>
							<option value="<?php echo $country["id"]; ?>"><?php echo $country["name"]; ?></option>
						<?php } ?>
					</select>
				</div>
			</div>

			<div class="form-actions">
				<button class="btn btn-primary" type="submit"><?php echo ($set)? "Update" : "Add"; ?> Product</button>
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