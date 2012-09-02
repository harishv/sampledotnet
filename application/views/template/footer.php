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
 	<a href="#"class="close"/><img src="<?php echo base_url().'img/close.png';?>" alt="close_window" border="0" class="close_button" /></a>
  <div class="txt-1">Login here!</div>
  <div class="txt-2">or Sign in with </div>
 </div><!-- top-bg -->
 <div class="middle-bg">
  <div class="form-box">
    <div class="text">Email: </div>
    <div class="form"><input type="text"  name="email_address" id="email_address"></div>
  </div><!-- form-box --><br>
  <div class="form-box">
    <div class="text">Password: </div>
    <div class="form"><input type="password" name="password"  id="password" ></div>
  </div><!-- form-box --><br>
  <div class="login-box">
   <input type="submit" value="Login">
   <a href="#">Forgot your password?</a>
  </div><br>
  <div class="login-box">
   <span>Don't have an account? <a style="color:#053f79; text-decoration:underline;" href="#register" name="modal" >Register now</a></span>  </div>
  <a href="#"><img border="0" style="position:absolute; left: 397px; top: 15px;" src="<?php echo base_url().'img/facebook-1.jpg';?>"></a> </div>
 <!-- middle-bg -->
 <div class="bottom-bg"></div><!-- top-bg -->
 <img style="position:absolute; z-index:1000; left: 382px; top: 39px;" src="<?php echo base_url().'img/line.jpg';?>"></div>


</div>



<div id="register" class="window">
<div id="lr-box-reg">
 <div class="top-bg">
 	<a href="#"class="close"/><img src="<?php echo base_url().'img/close.png';?>" alt="close_window" border="0" class="close_button" /></a>

  <div class="txt-1">New User? Sign Up</div>
  <div class="txt-2">or Sign in with </div>
 </div><!-- top-bg -->
 <div class="middle-bg">
   
    <div id="errors_data_signup" class="errors_data">
      <?php echo (isset($errors)) ? $errors : '';?>
    </div>
      
    <div id="success_data_signup"  class ="sucuss_data" style="display:none;">
      <?php echo (isset($success)) ? $success : '';?>
    </div>

    <div id="errors_email_singup" style="display:none"> 
      Email Address '<span id="email_replace"></span>' <br/>has already been registered. <br/>Please try a different one or go to Login to access your account.
      </div>

   <?php $attributes = array('id' => 'userlogin', 'name'=>'userlogin', 'onsubmit'=>'return validate_registerform()'); ?>
   <?php echo form_open('register/register_user/',$attributes); ?>
   
  
  <div class="form-box" id="email_reg">
    <div class="text">Email: </div>
    <div class="form"><input type="text" name="email_add"  id="email_add" ></div>
  </div><!-- form-box --><br>
  <div class="form-box" id="pass_reg" >
    <div class="text">Password: </div>
    <div class="form"><input type="password" name="pass" id="pass" >
    </div>
  </div><!-- form-box --><br>
  <div class="form-box" id="re_pass_reg" >
    <div class="text">Re-Password:</div>
    <div class="form"><input type="password"  name="re_pass" id="re_pass" ></div>
  </div><!-- form-box -->
  <br>
  <div class="login-box" id="login_reg">
   <input type="submit" value="Login">
  
   <a href="#dialog" name="modal" class='iframe' style="width:180px;">Already have an account? Login!</a>
  
  </div>
  <a href="#"><img border="0" style="position:absolute; left: 397px; top: 15px;" src="<?php echo base_url().'img/facebook-1.jpg';?>"></a>
  </div><!-- middle-bg -->
 <div class="bottom-bg"></div><!-- top-bg -->
  <?php echo form_close();?>

 <img style="position:absolute; z-index:1000; left: 382px; top: 39px;" src="<?php echo base_url().'img/line.jpg';?>"></div>
 </div>



<div id="mask"></div>
</div>


<script type="text/javascript" src="<?php echo base_url("js"); ?>/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url("js"); ?>/prettify.js"></script>
<script type="text/javascript" src="<?php echo base_url("js"); ?>/docs.js"></script>
</body>
</html>