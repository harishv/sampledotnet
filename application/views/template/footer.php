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
  <div class="txt-1">Login here!</div>
  <div class="txt-2">or Sign in with </div>
 </div><!-- top-bg -->
 <div class="middle-bg">
  <div class="form-box">
    <div class="text">Email: </div>
    <div class="form"><input type="text" onblur="if(this.value=='')this.value='Enter your email address here'" onfocus="if(this.value=='Enter your email address here')this.value=''" value="Enter your email address here"></div>
  </div><!-- form-box --><br>
  <div class="form-box">
    <div class="text">Password: </div>
    <div class="form"><input type="password" onblur="if(this.value=='')this.value='Password here'" onfocus="if(this.value=='Password here')this.value=''" value="Password here"></div>
  </div><!-- form-box --><br>
  <div class="login-box">
   <input type="submit" value="Login">
   <a href="#">Forgot your password?</a>
  </div><br>
  <div class="login-box">
   <span>Don't have an account? <a style="color:#053f79; text-decoration:underline;" href="#" >Register now</a></span>  </div>
  <a href="#"><img border="0" style="position:absolute; left: 397px; top: 15px;" src="<?php echo base_url().'img/facebook-1.jpg';?>"></a> </div>
 <!-- middle-bg -->
 <div class="bottom-bg"></div><!-- top-bg -->
 <img style="position:absolute; z-index:1000; left: 382px; top: 39px;" src="<?php echo base_url().'img/line.jpg';?>"></div>
</div>

<div id="register" class="window">
<div id="lr-box-reg">
 <div class="top-bg">
  <div class="txt-1">New User? Sign Up</div>
  <div class="txt-2">or Sign in with </div>
 </div><!-- top-bg -->
 <div class="middle-bg">
  <div class="form-box">
    <div class="text">Email: </div>
    <div class="form"><input type="text" onblur="if(this.value=='')this.value='Enter your email address here'" onfocus="if(this.value=='Enter your email address here')this.value=''" value="Enter your email address here"></div>
  </div><!-- form-box --><br>
  <div class="form-box">
    <div class="text">Password: </div>
    <div class="form"><input type="password" onblur="if(this.value=='')this.value='Password here'" onfocus="if(this.value=='Password here')this.value=''" value="Password here">
    </div>
  </div><!-- form-box --><br>
  <div class="form-box">
    <div class="text">Re-Password:</div>
    <div class="form"><input type="password" onblur="if(this.value=='')this.value='Password here'" onfocus="if(this.value=='Password here')this.value=''" value="Password here"></div>
  </div><!-- form-box --><br>
  <div class="login-box">
   <input type="submit" value="Login">
   <a style="width:180px;" href="#">Already have an account? Login!</a>
  </div>
  <a href="#"><img border="0" style="position:absolute; left: 397px; top: 15px;" src="<?php echo base_url().'img/facebook-1.jpg';?>"></a>
  </div><!-- middle-bg -->
 <div class="bottom-bg"></div><!-- top-bg -->
 <img style="position:absolute; z-index:1000; left: 382px; top: 39px;" src="<?php echo base_url().'img/line.jpg';?>"></div>
 </div>



<div id="mask"></div>
</div>


<script type="text/javascript" src="<?php echo base_url("js"); ?>/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url("js"); ?>/prettify.js"></script>
<script type="text/javascript" src="<?php echo base_url("js"); ?>/docs.js"></script>
</body>
</html>