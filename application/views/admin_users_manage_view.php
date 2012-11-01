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

	$("#admin_user_form").validate({
		rules: {
			user_name: {
					required: true,
					
				},
			pass_name: {
					required: true,
					minlength: 6
				},
			user_email: {
					required: true,
					email: true
				},
			type_id: {
					required: true
					
				}

			},
		messages: {
			user_name: {
					required: "User name is a required field",
					
				},
			pass_name: {
					required: "Password is a required field",
					minlength: "Password should be of minimum 6 characters"
				},
			user_email: {
					required: "Password is a required field",
					email: "Please enter a valid Email"
				},
			type_id: {
					required: "Admin Type is a required field",
					
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
	<div class="span8">
<?php


		$set = (isset($user_list) && is_array($user_list)) ? true : false;

		$user_info = $this->session->userdata('admin_user');
		?>

		<fieldset>
			<legend><?php echo ($set)? $this->lang->line('admin_user_update_title') : $this->lang->line('admin_user_add_title'); ?>

			<p class="pull-right">
				<?php echo anchor(ADMINFOLDER . "/users", "<i class='icon-arrow-left icon-white'></i> " . $this->lang->line('back_to_list'), array("class" => "btn btn-info")); ?>
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
				$attributes = array ("class" => "form-horizontal", "id" => "admin_user_form", "name" => "admin_user_form");
				$action = ADMINFOLDER . "/users/admin_user_action";

				if ($set) {
					$action .= "/edit";
				}

				echo form_open_multipart($action, $attributes);

				if ($set) { ?>
					<input type="hidden" id="user_id" name="user_id" value="<?php echo $user_list[0]['id']; ?>" />
				<?php } ?>

			<div class="control-group">
				<label class="control-label" for="prod_name"><?php echo "User Name"; ?>
					:</label>
				<div class="controls">
					<input type="text" class="input-xlarge" id="user_name" name="user_name"
						placeholder="<?php echo "Please Enter UserName";?>" value="<?php echo ($set) ? $user_list[0]['admin_name']:'';?>"/>
				</div>
			</div>
			<?php //if(!$set){ ?>
			<div class="control-group">
				<label class="control-label" for="prod_name"><?php echo "Password"; ?>
					:</label>
				<div class="controls">
					<input type="password" class="input-xlarge" id="pass_name" name="pass_name"
						placeholder="<?php echo "Please Enter Password";?>" value="<?php echo ($set) ? '':'';?>"/>
				</div>
			</div>
			<?php //} ?>

			<div class="control-group">
				<label class="control-label" for="prod_name"><?php echo "Email"; ?>
					:</label>
				<div class="controls">
					<input type="text" class="input-xlarge" id="user_email" name="user_email"
						placeholder="<?php echo "Please Enter Email";?>" value="<?php echo ($set) ? $user_list[0]['admin_email']:'';?>"/>
				</div>
			</div>

			<?php //print_r($admintypes);?>
			<div class="control-group">
				<label class="control-label" for="prod_category_id">Admin Types
					:</label>
				<div class="controls">
					<?php if(!$set){ ?>
						<select class="input-xlarge" id="type_id" name="type_id">
						<option value="">-- <?php echo "Admin Type"; ?> --</option>
						<?php foreach ($admintypes as $key=>$values){ ?>
						<option value="<?php echo $values['admin_type_id'];?>"> <?php echo $values['admin_type_desc'];?></option>
						<?php } ?>
					</select>
					<?php }else{ ?>
						<select class="input-xlarge" id="type_id" name="type_id">
						<option value="">-- <?php echo "Admin Type"; ?> --</option>
						<?php foreach ($admintypes as $key=>$values){ ?>
						<option value="<?php echo $values['admin_type_id'];?>"<?php echo ($values['admin_type_id'] == $user_list[0]['admin_type_ref_id']) ? "selected='selected'" : "" ; ?>> <?php echo $values['admin_type_desc'];?></option>
						<?php } ?>
						</select>

					<?php } ?>
					
				</div>
			</div>

			<div class="form-actions">
				<button class="btn btn-primary" type="submit"><?php if(!$set)echo "Submit";else echo "Update";?></button>
				<button class="btn" type="reset">Cancel</button>
			</div>

			</form>

		</fieldset>
	</div>

	
</div>