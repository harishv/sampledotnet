<div class="container">
<?php //We add the companies brand name here?>
	<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	</a>

	<a class="brand" href="<?php echo base_url().ADMINFOLDER; ?>"><?php echo $this->lang->line('brand_name_admin'); ?></a>
	<?php //print_r($user_info);?>
	<div class="nav-collapse">
	<?php //We add the Top Navigation links here?>
		<ul class="admin_nav nav">
			<!-- <li <?php echo (strstr($_SERVER['REQUEST_URI'], "/index") || "http://".$_SERVER["HTTP_HOST"].$_SERVER['REQUEST_URI'] == base_url(ADMINFOLDER)) ? 'class="active"' : ''; ?>><?php echo anchor(ADMINFOLDER, $this->lang->line('nav_home_admin')); ?></li> -->
			<li id="index_nav"><?php echo anchor(ADMINFOLDER, $this->lang->line('nav_home_admin')); ?></li>
			<li id="products_nav"><?php echo anchor(ADMINFOLDER . "/products", $this->lang->line('nav_products_admin')); ?></li>
			<li id="documents_nav"><?php echo anchor(ADMINFOLDER . "/documents", $this->lang->line('nav_documents_admin')); ?></li>
	<?php $user_info = $this->session->userdata('admin_user');
			if(isset($user_info) && $user_info !=''){
				if($user_info['admin_type_ref_id'] == '1'){ ?>
				<li id="users_nav"><?php echo anchor(ADMINFOLDER . "/users", $this->lang->line('admin_users')); ?></li>
		<?php   }
			} ?>
		</ul>
		<script type="text/javascript">
			$(function() {
				// var url = window.location.pathname.split('/');
				// var current_path = url[url.length - 1].split('.')[0];

				// if (current_path == '1') {
				// 	current_path = 'login';
				// }

				// if (current_path != 'products' && current_path != 'documents' && current_path != 'users' && current_path != 'login') {
				// 	current_path = 'index';
				// }

				var current_path, url = window.location.pathname;

				if ((url.indexOf('/products')) != -1){
					current_path = 'products';
				} else if ((url.indexOf('/documents')) != -1){
					current_path = 'documents';
				} else if ((url.indexOf('/users')) != -1){
					current_path = 'users';
				} else if ((url.indexOf('/login')) != -1){
					current_path = 'login';
				} else {
					current_path = 'index';
				}

				$('.admin_nav').find('li').each(function () {
					$(this).removeClass('active');
				});

				$('#' + current_path + "_nav").addClass('active');
			});
		</script>

		<?php // Added this ul for floating the Login/Logout nav?>
		<ul class="admin_nav nav pull-right">
		<?php
		if ( $this->user_status->admin_is_signed_in() ) {
			$user_info = $this->session->userdata('admin_user');

			$user_name = $user_info['admin_name'];

			$profile_string = '<div class="user_profile_nav"><b><i class="icon-user"></i> '.$user_info['admin_email'].'</b></div>';
			$logout_string = '<i class="icon-off"></i> '.$this->lang->line('nav_logout');
			?>
			<li class="dropdown"><?php echo anchor("", $user_name." <b class='caret'></b>", array ("class" => "dropdown-toggle", "data-toggle" => "dropdown"));?>
				<ul class="dropdown-menu">
					<li><?php echo anchor("", $profile_string); ?></li>
					<li class="divider"></li>
					<li><?php echo anchor(ADMINFOLDER . "/logout", $logout_string); ?>
					</li>
				</ul></li>
				<?php
		} else { ?>
			<li id="login_nav">
			<?php echo anchor(ADMINFOLDER."/login", $this->lang->line('nav_login'), array("style" => "background: url(&quot;" . base_url("img") . "/lock_icon.png&quot;) no-repeat scroll 0px center transparent; padding-left: 17px;")); ?>
			</li>
			<?php } ?>
		</ul>
	</div>
</div>