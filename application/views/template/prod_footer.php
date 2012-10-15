			<!-- End inner wrapper div -->
			</div>
		<!-- End Container div -->
		</div>
	<!-- Emd wrapper div -->
	</div>
<!-- Begin footer wrapper div -->
<div id="footer-wrapper">
	<!-- Begin container div -->
	<div class="container">
		<div class="footer">
			<ul id="utility">
				<li>
					<?php echo anchor("#", $this->lang->line("nav_categories")); ?>
				</li>
				<li>
					<?php echo anchor("#", $this->lang->line("nav_samples")); ?>
				</li>
				<li>
					<?php echo anchor("#", $this->lang->line("nav_suggest_a_samples")); ?>
				</li>
				<li class="last">
					<?php echo anchor("#", $this->lang->line("nav_contact_us")); ?>
				</li>
			</ul>
			<p class="copy">&copy; <?php echo $this->lang->line("footer_copy_year") . " " . $this->lang->line("footer_brand_name"); ?></p>
		</div>
	<!-- End container div -->
	</div>
<!-- End footer wrapper div -->
</div>

<div id="boxes">
	<div id="dialog" class="window">
		<div id="lr-box" >
			<div class="top-bg">
				<a href="#" class="close"><img src="<?php echo base_url().'img/close.png';?>" alt="close_window" border="0" class="close_button" /></a>
				<div class="txt-1">Login here!</div>
				<!-- <div class="tsuccuss_messagext-2">or Sign in with </div> -->
			<!-- top-bg -->
			</div>
			<div class="middle-bg">
				<div class="errors_data" id="errors_data"><?php echo (isset($errors)) ? $errors : '';?></div>
				<div id="success_data_signup" class ="success_data"><?php $succuss_msg = $this->session->userdata('succuss_message'); if(isset($succuss_msg) && $succuss_msg !='' ) { echo $succuss_msg;} ?></div>
				<?php
					$attributes = array('id' => 'user_login', 'name'=>'user_login', 'onsubmit'=>'return validate_login()');
				?>
				<?php echo form_open('login/login_check/',$attributes); ?>
				<div class="form-box">
					<div class="text">Email: </div>
					<div class="form">
						<input type="text" name="email_address" id="email_address">
					</div>
				<!-- form-box -->
				</div>
				<br />
				<div class="form-box">
					<div class="text">Password: </div>
					<div class="form">
						<input type="password" name="password"  id="password">
					</div>
				<!-- form-box -->
				</div>
				<br />
				<div class="login-box">
					<input type="submit" value="Login" />
					<a href="#forgotpassword" name="modal">Forgot your password?</a>
				</div>
				<?php echo form_close();?>
				<br />
				<div class="login-box">
					<span>Don't have an account?
						<a style="color:#053f79; text-decoration:underline;" href="#register" name="modal" >Register now</a>
					</span>
				</div>
				<!-- <a href="#"><img border="0" style="position:absolute; left: 397px; top: 15px;" src="<?php echo base_url().'img/facebook-1.jpg';?>"></a> -->
			<!-- middle-bg -->
			</div>
			<!-- top-bg -->
			<div class="bottom-bg"></div>
			<!-- <img style="position:absolute; z-index:1000; left: 382px; top: 39px;" src="<?php echo base_url().'img/line.jpg';?>" /> -->
		</div>
	</div>

	<div id="register" class="window">
		<div id="lr-box-reg">
			<div class="top-bg">
				<a href="#"class="close"><img src="<?php echo base_url().'img/close.png';?>" alt="close_window" border="0" class="close_button" /></a>
				<div class="txt-1">New User? Sign Up</div>
				<!-- <div class="txt-2">or Sign in with </div> -->
			<!-- top-bg -->
			</div>
			<div class="middle-bg">
				<div id="errors_data_signup" class="errors_data"><?php echo (isset($errors)) ? $errors : '';?></div>
				<div id="errors_email_singup" style="display:none">
					Email Address '<span id="email_replace"></span>'
					<br />has already been registered.
					<br />Please try a different one or go to Login to access your account.
				</div>
				<div id="reg_success_data_signup" class ="success_data"><?php echo (isset($success) && $success != '') ? $success : "";?></div>
				<div id="user_regd_div">
				<?php
					$attributes = array('id' => 'userlogin', 'name'=>'userlogin', 'onsubmit'=>'return validate_registerform()');
				?>
				<?php echo form_open('register/register_user/',$attributes); ?>
				<div class="form-box">
					<div class="text">First Name: </div>
					<div class="form">
						<input type="text"  name="first_name" id="first_name" />
					</div>
				<!-- form-box -->
				</div>
				<br />
				<div class="form-box">
					<div class="text">Last Name: </div>
					<div class="form">
						<input type="text"  name="last_name" id="last_name" />
					</div>
				<!-- form-box -->
				</div>
				<br />
				<div class="form-box" id="email_reg">
					<div class="text">Email: </div>
					<div class="form">
						<input type="text" name="email_add"  id="email_add" />
					</div>
				<!-- form-box -->
				</div>
				<br />
				<div class="form-box" id="pass_reg" >
					<div class="text">Password: </div>
					<div class="form">
						<input type="password" name="pass" id="pass" />
					</div>
				<!-- form-box -->
				</div>
				<br />
				<div class="form-box" id="re_pass_reg" >
					<div class="text">Confirm Password:</div>
					<div class="form"><input type="password"  name="re_pass" id="re_pass" ></div>
				<!-- form-box -->
				</div>
				<br />
				<div class="login-box" id="login_reg">
					<input type="submit" value="Register" />
					<span style="margin-left: 20px;">Already have an account? <a href="#dialog" name="modal" class='iframe' style="color:#053f79; text-decoration:underline;">Login!</a></span>
				</div>
				<!-- <a href="#"><img border="0" style="position:absolute; left: 397px; top: 15px;" src="<?php echo base_url().'img/facebook-1.jpg';?>"></a>-->
				<?php echo form_close();?>
				</div>
			<!-- middle-bg -->
			</div>
			<!-- top-bg -->
			<div class="bottom-bg"></div>
			<!-- <img style="position:absolute; z-index:1000; left: 382px; top: 39px;" src="<?php echo base_url().'img/line.jpg';?>" />-->
		</div>
	</div>

	<?php // user profile popup?>



	<div id="user_profile" class="window">
		<!--<script type="text/javascript" src="<?php echo base_url("js"); ?>/bootstrap-datepicker.js"></script>
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>css/bootstrap-datepicker.css" /> -->

		<div id="lr-box-reg">
			<div class="top-bg">
				<a href="#" class="close"><img src="<?php echo base_url().'img/close.png';?>" alt="close_window" border="0" class="close_button" /></a>
				<div class="txt-1">Please Update Your Information</div>
				<!-- <div class="txt-2">or Sign in with </div> -->
			<!-- top-bg -->
			</div>
			<div class="middle-bg">

				<div id="errors_data_user_profile" class="errors_data"><?php echo (isset($errors)) ? $errors : '';?></div>
				<div id="success_data_user_profile"  class ="success_data" style="display:none;"><?php echo (isset($success)) ? $success : '';?></div>
				<div id="user_profile_div">
				<?php
					$attributes = array('id' => 'user_profile_data', 'name'=>'user_profile', 'onsubmit'=>'return validate_user_profile()');
				?>
				<?php echo form_open('register/user_profile/', $attributes); ?>

				<input type="hidden" name="user_id" value="<?php if(isset($user_profile[0]['user_id']) && $user_profile[0]['user_id'] !='') echo $user_profile[0]['user_id']; else echo "";?>" >

				<div class="form-box" id="user_dob">
					<div class="text">DOB: </div>
					<div class="form">
						<input type="text"  name="dob"  id="datepicker1" value="<?php if(isset($user_profile[0]['dob'])) if($user_profile[0]['dob'] !='0000-00-00') { $timestamp = strtotime($user_profile[0]['dob']); echo date('m-d-Y',$timestamp);} else echo "";?>">
						<br>
						<div style="clear:both"></div>
						<span>Please enter date in the format (mm-dd-yyyy)</span>
					</div>
				<!-- form-box -->
				</div>
				<div style="clear:both"></div>
				<br />
				<div class="form-box">
					<div class="text">Gender: </div>
					<div>
						<?php $checked = "checked"; ?>
						<input type="radio" name="gender" id="gender" checked="checked" value="M" />Male
						<input type="radio" name="gender" value="F" />Female
					</div>
				<!-- form-box -->
				</div>
				<br />
				<div class="form-box" id="email_reg">
					<div class="text">Street Address 1: </div>
					<div class="form">
						<input type="text" name="address1" id="address1" value="<?php if(isset($user_profile[0]['address_1']) && $user_profile[0]['address_1'] !='') echo $user_profile[0]['address_1']; else echo "";?>" >
					</div>
				<!-- form-box -->
				</div>
				<br />
				<div class="form-box" id="email_reg">
					<div class="text">Street Address 2: </div>
					<div class="form">
						<input type="text" name="address2" id="address2" value="<?php if(isset($user_profile[0]['address_1']) && $user_profile[0]['address_2'] !='') echo $user_profile[0]['address_2']; else echo "";?>" >
					</div>
				<!-- form-box -->
				</div>
				<br />
				<div class="form-box" id="email_reg">
					<div class="text">City: </div>
					<div class="form">
						<input type="text" name="city" id="city" value="<?php if(isset($user_profile[0]['city']) && $user_profile[0]['city'] !='') echo $user_profile[0]['city']; else echo "";?>"/>
					</div>
				<!-- form-box -->
				</div>
				<br />
				<div class="form-box" id="email_reg">
					<div class="text">State: </div>
					<div class="form">
						<input type="text" name="state" id="state" value="<?php if(isset($user_profile[0]['state']) && $user_profile[0]['state'] !='') echo $user_profile[0]['state']; else echo "";?>" />
					</div>
				<!-- form-box -->
				</div>
				<br />
				<div class="form-box" id="email_reg">
					<div class="text">Zip: </div>
					<div class="form">
						<input type="text" name="zip"  id="zip" value="<?php if(isset($user_profile[0]['zip']) && $user_profile[0]['zip'] !='') echo $user_profile[0]['zip']; else echo "";?>"/>
					</div>
				<!-- form-box -->
				</div>
				<br />
				<!-- <div class="form-box" id="email_reg"> -->
					<div class="text">Categories: </div>
					<div class="form">
						<?php
							foreach ($category as $cat_id=>$cat_values) { ?>
						<input type='checkbox' name="cat_name[]" value="<?php echo $cat_values['id']; ?>" />
						<?php echo $cat_values['prod_cat_name']; ?>
						<br/>
						<?php } ?>
					</div>
				<!-- </div> -->
				<div class="login-box" id="login_reg">
					<input type="submit" value="Update" />
				</div>
				<?php echo form_close();?>
				</div>
				<!--<a href="#"><img border="0" style="position:absolute; left: 397px; top: 15px;" src="<?php echo base_url().'img/facebook-1.jpg';?>"></a>-->
			<!-- middle-bg -->
			</div>
			<!-- top-bg -->
			<div class="bottom-bg"></div>
			<!-- <img style="position:absolute; z-index:1000; left: 382px; top: 39px;" src="<?php //echo base_url().'img/line.jpg';?>" /> -->
		</div>
	</div>

	<?php // Share a Sample ?>
	<div id="share_sample" class="window">
		<div id="lr-box" >
			<div class="top-bg">
				<a href="#" class="close"><img src="<?php echo base_url().'img/close.png';?>" alt="close_window" border="0" class="close_button" /></a>
				<div class="txt-1">Share a Sample Here!</div>
				<!-- <div class="txt-2">or Sign in with </div> -->
			<!-- top-bg -->
			</div>
			<div class="middle-bg">
				<div id="sample_errors_data" class="errors_data"><?php echo (isset($errors)) ? $errors : '';?></div>
				<div id="sample_succuss_data" class="success_data" style="display:none;"><?php echo (isset($success)) ? $success : '';?></div>
				<div id="share_sample_div">
				<?php
					$attributes = array('id' => 'sharesample', 'name'=>'share_sample', 'onsubmit'=>'return validate_sample()');
				?>
				<?php echo form_open('index/share_sample/', $attributes); ?>
				<div class="form-box">
					<div class="text">Name: </div>
					<div class="form">
						<input type="text" name="name"  id="name">
					</div>
				<!-- form-box -->
				</div>
				<br />
				<div class="form-box">
					<div class="text">Email: </div>
					<div class="form">
						<input type="text" name="share_email_address" id="share_email_address">
					</div>
				<!-- form-box -->
				</div>
				<br />
				<div class="form-box">
					<div class="text">Company: </div>
					<div class="form">
						<input type="text" name="company"  id="company">
					</div>
				<!-- form-box -->
				</div>
				<br />
				<div class="form-box">
					<div class="text">Product Title: </div>
					<div class="form">
						<input type="text" name="title"  id="title">
					</div>
				<!-- form-box -->
				</div>
				<br />
				<div class="form-box">
					<div class="text">Product Description: </div>
					<div class="text-area">
						<textarea id="desc" name="desc" rows="3" cols="30"></textarea>
					</div>
				<!-- form-box -->
				</div>
				<br />
				<br />
				<div style="clear:both"></div>
				<div class="form-box">
					<div class="text">URL: </div>
					<div class="form">
						<input type="text" name="url"  id="url">
					</div>
				<!-- form-box -->
				</div>
				<br />
				<div class="login-box">
					<input type="submit" value="Share Now!" />
				</div>
				<?php echo form_close();?>
				<br />
				</div>
			<!-- middle-bg -->
			</div>
			<!-- top-bg -->
			<div class="bottom-bg"></div>
			<!-- <img style="position:absolute; z-index:1000; left: 382px; top: 39px;" src="<?php echo base_url().'img/line.jpg';?>" /> -->
		</div>
	</div>


	<div id="forgotpassword" class="window">
		<div id="lr-box-pass" >
			<div class="top-bg">
				<a href="#" class="close"><img src="<?php echo base_url().'img/close.png';?>" alt="close_window" border="0" class="close_button" /></a>
				<div class="txt-1">ForgetPassword</div>
				<!-- <div class="txt-2">or Sign in with </div> -->
			<!-- top-bg -->
			</div>
			<div class="middle-bg">
				<div id="forget_errors_data" class="errors_data"><?php echo (isset($errors)) ? $errors : '';?></div>
				<div id="success_data_forgot"  class ="success_data" style="display:none;"><?php echo (isset($success)) ? $success : '';?></div>
				<?php
					$attributes = array('id' => 'forgot_password', 'name'=>'forgot_password', 'onsubmit'=>'return validate_forgetpassword()');
				?>
				<?php echo form_open('login/forget_password_action/',$attributes); ?>
				<div class="form-box">
					<div class="text">Email: </div>
					<div class="form">
						<input type="text" name="forgot_address" id="forgot_address">
					</div>
				<!-- form-box -->
				</div>
				<br />

				<div class="login-box">
					<input type="submit" value="Submit" />

				</div>
				<?php echo form_close();?>
				<br />


			</div>
			<!-- top-bg -->
			<div class="bottom-bg"></div>

		</div>
	</div>

	<div id="changepassword" class="window">
		<div id="lr-box-pass" >
			<div class="top-bg">
				<a href="#" class="close"><img src="<?php echo base_url().'img/close.png';?>" alt="close_window" border="0" class="close_button" /></a>
				<div class="txt-1">ChangePassword</div>
				<!-- <div class="txt-2">or Sign in with </div> -->
			<!-- top-bg -->
			</div>
			<div class="middle-bg">
				<div id="change_pwd_errors_data" class="errors_data"><?php echo (isset($errors)) ? $errors : '';?></div>
				<div id="success_pwd_data"  class ="success_data" style="display:none;"><?php echo (isset($success)) ? $success : '';?></div>
				<?php
					$attributes = array('id' => 'change_password', 'name'=>'change_password', 'onsubmit'=>'return validate_chanagepassword()');
				?>
				<?php echo form_open('login/forget_password_action/',$attributes); ?>
				<div class="form-box">
					<div class="text">New Password: </div>
					<div class="form">
						<input id="password_cp" type="password" size="30" name="password">
					</div>

				</div>
				<div class="form-box">
					<div class="text">Confirm Password: </div>
					<div class="form">
						<input id="repassword" type="password" size="30" name="repassword">
					</div>

				</div>
				<br />

				<div class="login-box">
					<input type="submit" value="Submit" />

				</div>
				<?php echo form_close();?>
				<br />


			</div>
			<!-- top-bg -->
			<div class="bottom-bg"></div>

		</div>
	</div>

	<div id="mask"></div>
</div>

<script type="text/javascript" src="<?php echo base_url("js"); ?>/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url("js"); ?>/prettify.js"></script>
<script type="text/javascript" src="<?php echo base_url("js"); ?>/docs.js"></script>
<script type="text/javascript">
$('.categories ul li ol li').mouseover(function() {
	$(this).parent().parent().addClass('blue');
});
$('.categories ul li ol li').mouseout(function() {
	$(this).parent().parent().removeClass('blue');
});
</script>
</body>
</html>
