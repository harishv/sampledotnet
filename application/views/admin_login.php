<script type="text/javascript"
	src="<?php echo base_url("js/jquery.validate.js") ?>"></script>

<script type="text/javascript">
<!--

$(document).ready(function() {

	$("#user_login").validate({
		rules: {
			user_id: {
					required: true,
					email: true
				},
			user_password: {
					required: true,
					minlength: 6
				}
			},
		messages: {
			user_id: {
					required: "User ID is a required field",
					email: "Please enter a valid User ID"
				},
			user_password: {
					required: "Password is a required field",
					minlength: "Password should be of minimum 6 characters"
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

});

//-->
</script>

<div class="row">
	<div class="span8" style="float: none; margin: 0 auto;">
	<?php
	$attributes = array ("class" => "form-horizontal", "id" => "user_login", "name" => "user_login");
	$action = ADMINFOLDER . "/login/login_process";

	echo form_open($action, $attributes);
	?>
		<fieldset>
			<legend><?php echo $this->lang->line('admin_login_form_title'); ?></legend>

			<?php if (isset($errors)) {?>
			<div class="alert alert-error">
				<a class="close" data-dismiss="alert">&times;</a>
				<h4 class="alert-heading">
					<?php echo $this->lang->line('error'); ?>
				</h4>
				<?php echo $errors; ?>
			</div>
			<?php } ?>
			<div class="control-group">
				<label class="control-label" for="user_id"><?php echo $this->lang->line('admin_login_form_login_id'); ?>
					:</label>
				<div class="controls">
					<input type="text" class="input-xlarge" id="user_id" name="user_id"
						placeholder="<?php echo $this->lang->line('admin_login_form_login_id_ph'); ?>" />
					<p class="help-block"><?php echo $this->lang->line('example') . ": " . $this->lang->line('admin_login_form_login_id_eg'); ?>
					</p>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="user_password"><?php echo $this->lang->line('admin_login_form_password'); ?>
					:</label>
				<div class="controls">
					<input type="password" class="input-xlarge" id="user_password"
						name="user_password"
						placeholder="<?php echo $this->lang->line('admin_login_form_password_ph'); ?>" />
				</div>
			</div>

			<div class="form-actions">
				<button class="btn btn-primary" type="submit">
					<?php echo $this->lang->line('admin_login_form_action_btn'); ?>
				</button>
				<button class="btn" type="reset">
					<?php echo $this->lang->line('form_cancel'); ?>
				</button>
			</div>

		</fieldset>
		<?php echo form_close();?>
	</div>
</div>
