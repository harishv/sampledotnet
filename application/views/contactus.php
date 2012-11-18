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


				<div id="contact_errors_data" class="errors_data"><?php echo (isset($errors)) ? $errors : '';?></div>
				<div id="contact_data"  class ="success_data" ><?php echo (isset($success)) ? $success : '';?></div>
				<br />
				<?php
					
					$attributes = array('id' => 'contactus_form', 'name'=>'contactus_form', 'onSubmit'=>'return validate_contactus();');
				?>
				<?php echo form_open('login/contactus/',$attributes); ?>
				

					<div class="text">Name: </div>
					
						<input type="text" name="contact_name" id="contact_name">
					
				
				
				<br />
				
				
					<div class="text">E-Mail Address: </div>
					
						<input type="text" name="contact_email" id="contact_email">
					
				<br />
					<div class="text">Subject: </div>
					
						<input type="text" name="contact_phone" id="contact_phone">
					
				
				
				<br />
				
					<div class="text">Message: </div>
					
						<textarea name="contact_enquiry" id="contact_enquiry"></textarea>
					
				

				<br />

				
					<input type="submit" value="Submit" />

				
				<?php echo form_close();?>
				
