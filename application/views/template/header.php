<?php error_reporting(E_ALL); ?>
<?php echo doctype('html5'); ?>
<html xmlns:fb="http://ogp.me/ns/fb#">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<!-- Custome Meta Tags -->
		<?php
			if (isset($page_meta_data) && $page_meta_data != '') {
				echo $page_meta_data;
			}
		?>

		<title>
			<?php
				if (isset($page_title) && $page_title == $this->lang->line('index_title')) {
					echo $page_title;
				} else {
					echo (isset($page_title)) ? $page_title . ' - ' : '';
					echo $this->lang->line("title");
				}
			?>
		</title>

		<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>favicon.ico" />

		<link href="<?php echo base_url("css"); ?>/bootstrap.css" type="text/css" rel="stylesheet">
		<link href="<?php echo base_url("css"); ?>/bootstrap-responsive.css" type="text/css" rel="stylesheet">
		<link href="<?php echo base_url("css"); ?>/style.css" type="text/css" rel="stylesheet" />
		<link href="<?php echo base_url("css"); ?>/skin.css" type="text/css" rel="stylesheet" />

		<script src="<?php echo base_url("js"); ?>/jquery-1.4.2.min.js"></script>

		<script type="text/javascript">
			/* global variable for the root path */
			var base_url = "<?php echo base_url();?>", image_url = "<?php echo base_url().'img/';?>";
		</script>

		<script type="text/javascript" src="<?php echo base_url("js"); ?>/jquery-latest.pack.js"></script>
		<script type="text/javascript" src="<?php echo base_url("js"); ?>/jquery.datePicker.js"></script>
		<script type="text/javascript" src="<?php echo base_url("js"); ?>/jquery.raty.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url("js"); ?>/jquery.raty.js"></script>

		<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script> -->

		<script src="<?php echo base_url("js"); ?>/jquery.jcarousel.js"></script>
		<script>
		$(document).ready(function() {
		<?php $login_errors = $this->session->userdata('comment_login_errors');

			 if(isset($login_errors) && $login_errors != ''){ ?>
			 	alert("<?php echo $login_errors;?>");
			 <?php } $this->session->set_userdata(array('comment_login_errors' => '')); ?>
		});
		</script>

		<script type="text/javascript">
			jQuery(document).ready(function() {
				jQuery('#mycarousel').jcarousel({
					start: 1
				});
			});

			$(document).ready(function() {

				//==============Script that runs the modal windows for Invite Friends, and Login
				//==============================================================================
				//select all the a tag with name equal to modal
				$('a[name=modal]').click(function(e) {

					//document.getElementById('userlogin').reset();
					//$("#userlogin").reset();
					//$("#user_login").reset();
					$('#share_sample_div').show();
					$('#sample_succuss_data').hide();
					$('#reg_success_data_signup').hide();
					$('#user_regd_div').show();
					$('#user_profile_div').show();
					$('#success_data_user_profile').hide();


					$('#userlogin').each(function() {
						this.reset();
					});

					$('#user_login').each(function() {
						this.reset();
					});

					$('#forgot_password').each(function() {
						this.reset();
					});

					//Cancel the link behavior
					e.preventDefault();

					//Get the A tag
					var id = $(this).attr('href');

					if ($('#dialog').css("display") == "block") {
						$('#dialog').css("display", "none");
					}
					if ($('#register').css("display") == "block") {

						$('#register').css("display", "none");

					}
					if ($('#forgotpassword').css("display") == "block") {
						$('#forgotpassword').css("display", "none");
					}

					//Get the screen height and width
					var maskHeight = $(document).height();
					var maskWidth = $(window).width();

					//Set heigth and width to mask to fill up the whole screen
					$('#mask').css({
						'width': maskWidth,
						'height': maskHeight
					});

					//transition effect
					$('#mask').fadeIn(1000);
					$('#mask').fadeTo("slow", 0.8);

					//Get the window height and width
					var winH = $(window).height();
					var winW = $(window).width();

					//Set the popup window to center
					$(id).css('top', winH / 3 - $(id).height() / 2);
					$(id).css('left', winW / 3 - $(id).width() / 2);

					//transition effect
					$(id).fadeIn(2000);

				});

				$('.window .close').click(function(e) {
					//Cancel the link behavior
					e.preventDefault();

					// Clear Messages
					$('.errors_data').html('');
					$('.success_data').html('');

					$('#mask').hide();
					$('.window').hide();
				});

			});

		$(document).ready(function() {

				//==============Script that runs the modal windows for Invite Friends, and Login
				//==============================================================================
				//select all the a tag with name equal to modal

				//Cancel the link behavior
				<?php
					$header_action = $this->session->userdata('header_action');
					if(isset($header_action) && $header_action != '') { ?>
						var id;
					<?php if($header_action == 'changepassword') { ?>
							id = "#changepassword";
							$('#changepassword').css("display", "block");
						<?php } else if ($header_action == 'user_login') { ?>
							id = "#dialog";
							$('#dialog').css("display", "block");
						<?php } else if ($header_action == 'user_profile') { ?>
							id = "#user_profile";
							$('#user_profile').css("display", "block");
						<?php }
					$this->session->set_userdata(array('header_action' => ''));
				?>

				//Get the screen height and width
				var maskHeight = $(document).height();
				var maskWidth = $(window).width();

				//Set heigth and width to mask to fill up the whole screen
				$('#mask').css({
					'width': maskWidth,
					'height': maskHeight
				});

				//transition effect
				$('#mask').fadeIn(1000);
				$('#mask').fadeTo("slow", 0.8);

				//Get the window height and width
				var winH = $(window).height();
				var winW = $(window).width();

				//Set the popup window to center
				$(id).css('top', winH / 3 - $(id).height() / 2);
				$(id).css('left', winW / 3 - $(id).width() / 2);

				//transition effect
				$(id).fadeIn(2000);

			<?php } ?>

			});

		$(document).keyup(function(f) {
//==============Closes the Modal windows by presing Escape key
//========================================
  if (f.keyCode == 27) {
  	$('#mask').hide();
	$('.window').hide();
  }   // esc
});


		</script>
	</head>
	<body>
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s); js.id = id;
			js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=<?php echo FB_APP_ID; ?>";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>

		<!-- Begin wrapper div -->
		<div id="wrapper" class="flt-l wid_100">
			<!-- Begin Container div -->
			<div class="container">
				<!-- Begin Header div -->
				<div id="header">
					<?php echo anchor(base_url(), img(array("src" => "/img/logo.png", "alt" => $this->lang->line("brand_name"), "class" => "mgn-15b")), array("class" => "flt-l mgn-20rn")); ?>
					<span class="flt-l slogan">genuine freebies!</span>
					<!-- Banner Advertisement -->
					<?php require_once 'adds/add1.php'; ?>
					<!-- Navigation starts here -->
					<div class="wid_100 flt-l" >
						<?php
							include_once 'topnav.php';
						?>
					</div>
					<!-- Navigation ends here -->
				<!-- End Header div -->
				</div>
				<!-- Begin inner wrapper div -->
				<div id="inner-wrapper" class="flt-l wid_100">
					<input type="hidden" id="baseURL" value="<?php echo base_url(); ?>" />


