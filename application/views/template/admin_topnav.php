<div class="container">
<?php //We add the companies brand name here?>
	<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	</a>

	<a class="brand" href="<?php echo base_url(); ?>">Sample.net Admin</a>

	<div class="nav-collapse">
	<?php //We add the Top Navigation links here?>
		<ul class="nav">
			<li <?php echo (strstr($_SERVER['REQUEST_URI'], "/index") || "http://".$_SERVER["HTTP_HOST"].$_SERVER['REQUEST_URI'] == base_url(ADMINFOLDER)) ? 'class="active"' : ''; ?>><?php echo anchor(ADMINFOLDER, "Home"); ?></li>
			<li id="services_nav"><?php echo anchor("services", "Services"); ?></li>
			<li <?php echo (strstr($_SERVER['REQUEST_URI'], "/methodology")) ? 'class="active"' : ''; ?>><?php echo anchor("methodology", "Methodology"); ?></li>
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
		if ( $this->user_status->admin_is_signed_in() ) {
			$user_info = $this->session->userdata('admin_user');
			$user_name = $user_info['first_name'].".".$user_info['last_name'];

			$profile_string = '<div class="user_profile_nav"><b><i class="icon-user"></i> '.$user_info['email'].'</b><br />'.'My Profile'.'</div>';
			$change_pass_string = '<i class="icon-lock"></i> '.'Change Password';
			$logout_string = '<i class="icon-off"></i> '.'Sign Out';
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
			<?php echo anchor(ADMINFOLDER."/login", 'Log In', array("style" => "background: url(&quot;" . base_url("img") . "/lock_icon.png&quot;) no-repeat scroll 0px center transparent; padding-left: 17px;")); ?>
			</li>
			<?php } ?>
		</ul>
	</div>

</div>
