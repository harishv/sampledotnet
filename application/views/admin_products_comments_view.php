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

	$("#comment_user_form").validate({
		rules: {
			comment_name: {
					required: true,
					
				}
			
			},
		messages: {
			comment_name: {
					required: "User name is a required field",
					
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

		
		

		$user_info = $this->session->userdata('admin_user');
		?>

		<fieldset>
			<legend>

			<?php echo $this->lang->line('admin_prod_comment_edit_title'); ?>	
			<p class="pull-right">
				<?php echo anchor(ADMINFOLDER . "/products/products_list", "<i class='icon-arrow-left icon-white'></i> " . $this->lang->line('back_to_list'), array("class" => "btn btn-info")); ?>
			</p>
			</legend>


			
			
			<br />
			<br />

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
				$attributes = array ("class" => "form-horizontal", "id" => "comment_user_form", "name" => "comment_user_form");
				$action = ADMINFOLDER . "/products/comment_user_action";

				
				echo form_open_multipart($action, $attributes);

			?>
			<input type="hidden" name="comment_id" value="<?php if(isset($comment_data[0]['id']) && $comment_data !='') echo $comment_data[0]['id'];?>" />
			<div class="control-group">
				<label class="control-label" for="prod_name"><?php echo "Comments Name"; ?>
					:</label>
				<div class="controls">
					<input type="text" class="input-xlarge" id="comment_name" name="comment_name"
						placeholder="<?php echo "Please Enter Comments";?>" value="<?php if (isset($comment_data) && $comment_data !='') echo $comment_data[0]['comments'];?>"/>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="prod_category_id">Status
					:</label>
				<div class="controls">
					<select class="input-xlarge" id="type_id" name="type_id">
						<option value="">-- <?php echo "Select Status "; ?> --</option>
						<?php foreach ($comment_status as $key=>$values){ ?>
						<option value="<?php echo $values['id'];?>"<?php echo ($values['id'] == $comment_data[0]['status_id']) ? "selected='selected'" : ""; ?>> <?php echo $values['desc'];?></option>
						<?php } ?>
					</select>

				</div>
			</div>

			

			
			<div class="form-actions">
				<button class="btn btn-primary" type="submit"><?php echo "Update";?></button>
				<button class="btn" type="reset">Cancel</button>
			</div>

			<?php echo form_close();?>


		</fieldset>
	</div>

	
</div>