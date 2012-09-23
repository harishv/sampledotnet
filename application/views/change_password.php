
	<div align="center">
		<div class="pagetitle"><span class="margin05_T left">Change Password</span> </div>
			<div id="errors_data_cp" class="errors_data">
	<?php if(isset($pass_errors)) { echo $pass_errors; } ?>
	</div>
	<div id="success_data">
	<?php if(isset($success)) { echo $success; } ?>
	</div>

		<?php $attributes = array('id' => 'change_password', 'name'=>'changepassword' ,'class' => 'forgot_password_first');?>
		
			<?php echo form_open('login/change_password_action',$attributes);
		
		?>
		<input type="hidden" name="user_id"
			value="<?php if(isset($user_id)){ echo $user_id; } ?>" />
			
		  <div class="box-inner">

		<p>New Password:</p>
			<p><input id="password_cp" type="password" size="30" name="password"></p>
		<p>Confirm Password:</p>
			<p><input id="repassword" type="password" size="30" name="repassword"></p>

		<p><input type="submit"  name="submit_password_reset" value="submit"></p>
		</div>
		<div class="box-bottom"><div class="box-bottom2"><div class="box-bottom3"></div></div></div>
			<?php echo form_close();?>

			

</div>

