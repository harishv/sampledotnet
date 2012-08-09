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
			<legend>Admin Login Form</legend>

			<?php if (isset($errors)) {?>
			<div class="alert alert-error">
				<a class="close" data-dismiss="alert">&times;</a>
				<h4 class="alert-heading">
				Error!
				</h4>
				<?php echo $errors; ?>
			</div>
			<?php } ?>
			<div class="control-group">
				<label class="control-label" for="user_id">Login ID
					:</label>
				<div class="controls">
					<input type="text" class="input-xlarge" id="user_id" name="user_id"
						placeholder="Login ID" />
					<p class="help-block">example: admin@admin.com
					</p>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="user_password">Password
					:</label>
				<div class="controls">
					<input type="password" class="input-xlarge" id="user_password"
						name="user_password"
						placeholder="Password" />
				</div>
			</div>

			<div class="form-actions">
				<button class="btn btn-primary" type="submit">
				Submit
				</button>
				<button class="btn" type="reset">
				Cancel
				</button>
			</div>

		</fieldset>
		<?php echo form_close();?>
	</div>
</div>
