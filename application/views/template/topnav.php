<div class="container">
<?php //We add the companies brand name here?>
	<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	</a>
	
	<a class="brand" href="<?php echo base_url(); ?>"><?php echo $this->lang->line("brand_name"); ?>
	</a>

	<div class="nav-collapse">
	<?php //We add the Top Navigation links here?>
		<ul class="nav">
			<li
			<?php echo (strstr($_SERVER['REQUEST_URI'], "/index") || "http://".$_SERVER["HTTP_HOST"].$_SERVER['REQUEST_URI'] == base_url()) ? 'class="active"' : ''; ?>><?php echo anchor("", $this->lang->line("nav_home")); ?>
			</li>
			<?php /* ?>
			<li id="services_nav" class="dropdown" >
				<?php echo anchor("services", "Services" . " <span class='caret'></span>", array ("class" => "dropdown-toggle", "data-toggle" => "dropdown"));?>
				<ul class="dropdown-menu">
					<li><?php echo anchor("services", "IOS"); ?></li>
					<li class="divider"></li>
					<li><?php echo anchor("services", "Android"); ?>
					</li>
					<li class="divider"></li>
					<li><?php echo anchor("services", "Win Phone 7"); ?>
					</li>
					<li class="divider"></li>
					<li><?php echo anchor("services", "Mobile WebSites"); ?>
					</li>
				</ul>
			</li>
			<?php */ ?>
			<!--
			<li id="services_nav"><?php echo anchor("services", "Services"); ?></li>
			<li 
			<?php echo (strstr($_SERVER['REQUEST_URI'], "/methodology")) ? 'class="active"' : ''; ?>><?php echo anchor("methodology", "Methodology"); ?></li>
			<li
			<?php echo (strstr($_SERVER['REQUEST_URI'], "/contact_us")) ? 'class="active"' : ''; ?>><?php echo anchor_popup("http://sunilkumarkhanderao.webs.com/", $this->lang->line("nav_contact_us")); ?>
			</li>
		-->
		</ul>
		
		<?php 
			// Making services active or inactive
 			if (strstr($_SERVER['REQUEST_URI'], "/services")) { ?>
				<script type="text/javascript">
					$("#services_nav").addClass("active");
				</script> 
		<?php } else { ?>
				<script type="text/javascript">
					$("#services_nav").removeClass("active");
				</script> 
		<?php } ?>

		<?php // Added this ul for floating the Logout nav?>
		<ul class="nav pull-right">
		<?php
		if ( $this->user_status->is_signed_in() ) {
			$user_info = $this->session->userdata('user');
			$user_name = $user_info['first_name'].".".$user_info['last_name'];

			$profile_string = '<div class="user_profile_nav"><b><i class="icon-user"></i> '.$user_info['email'].'</b><br />'.$this->lang->line("nav_txt_view_my_profile").'</div>';
			$change_pass_string = '<i class="icon-lock"></i> '.$this->lang->line("nav_txt_change_pass");
			$logout_string = '<i class="icon-off"></i> '.$this->lang->line("nav_signout");
			?>
			<li class="dropdown"><?php echo anchor("", $user_name." <b class='caret'></b>", array ("class" => "dropdown-toggle", "data-toggle" => "dropdown"));?>
				<ul class="dropdown-menu">
					<li><?php echo anchor("", $profile_string); ?></li>
					<li class="divider"></li>
					<li><?php echo anchor("", $change_pass_string); ?>
					</li>
					<li class="divider"></li>
					<li><?php echo anchor("logout", $logout_string); ?>
					</li>
				</ul></li>
				<?php
		} else { ?>
			<li
			<?php echo (strstr($_SERVER['REQUEST_URI'], "/login")) ? 'class="active"' : ''; ?>>
			<?php echo anchor("login", $this->lang->line("nav_signin"), array("style" => "background: url(&quot;" . base_url("img") . "/lock_icon.png&quot;) no-repeat scroll 0px center transparent; padding-left: 17px;")); ?>
			</li>
			<?php } ?>
		</ul>
	</div>

</div>
