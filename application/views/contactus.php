<script type="text/javascript" src="<?php echo base_url("js"); ?>/category.js"></script>
<?php  if($this->session->userdata('error_msg')!="") {
  $errors=$this->session->userdata('error_msg');
  $error_clear = array('error_msg'  => '', );
  $this->session->unset_userdata($error_clear);

  }
  if($this->session->userdata('succuss_msg')!="") {
  $success=$this->session->userdata('succuss_msg');
  $success_clear= array('succuss_msg'  => '', );
  $this->session->unset_userdata($success_clear);

  } ?>

<style type="text/css">
	textarea {
		background-color: #FFFFFF;
		border: 1px solid #CCCCCC;
		border-radius: 3px 3px 3px 3px;
		padding: 4px;
		width: 100%;
	}
</style>



<div class="row">
	<div style="float: none; margin: 0 auto;" class="span9">
	<?php
		$attributes = array('class' => 'form-horizontal', 'id' => 'contactus_form', 'name'=>'contactus_form', 'onSubmit'=>'return validate_contactus();');
		echo form_open('login/contactus',$attributes);
	?>
		<fieldset>
			<legend>Send us a message</legend>

			<h5>
				Would you like to contact us? Just email us at info@sample.net or fill out and send us the information below and we will get back to you as soon as possible.
			</h5>

			<div style="margin: 5px;">&nbsp;</div>

			<div class="control-group">
				<div id="contact_errors_data" class="errors_data"><?php echo (isset($errors)) ? $errors : '';?></div>
				<div id="contact_data"  class ="success_data" ><?php echo (isset($success)) ? $success : '';?></div>
			</div>

			<div class="control-group">
				<label for="user_id" class="control-label">Your Name :</label>
				<div class="controls">
					<input type="text" placeholder="Your Name" name="contact_name" id="contact_name" class="input-xlarge">
				</div>
			</div>

			<div class="control-group">
				<label for="user_id" class="control-label">Your Email :</label>
				<div class="controls">
					<input type="text" placeholder="Your Email" name="contact_email" id="contact_email" class="input-xlarge">
				</div>
			</div>

			<div class="control-group">
				<label for="user_password" class="control-label">Your Phone :</label>
				<div class="controls">
					<input type="text" placeholder="Your Phone" name="contact_phone" id="contact_phone" class="input-xlarge">
				</div>
			</div>

			<div class="control-group">
				<label for="user_password" class="control-label">Your Message :</label>
				<div class="controls">
					<textarea placeholder="Message" rows="5" name="contact_enquiry" id="contact_enquiry" class="input-xlarge"></textarea>
				</div>
			</div>

			<div class="form-actions">
				<button type="submit" class="btn btn-primary">
				Submit</button>
				<button type="reset" class="btn">
				Cancel</button>
			</div>

		</fieldset>
		<?php echo form_close(); ?>
	</div>
</div>