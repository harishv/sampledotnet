<?php error_reporting(E_ALL); ?>
<?php echo doctype('html5'); ?>
<html xmlns:fb="http://ogp.me/ns/fb#">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<title><?php echo $this->lang->line("title"); ?></title>

		<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>favicon.ico" />

		<link href="<?php echo base_url("css"); ?>/bootstrap.css" type="text/css" rel="stylesheet">
		<link href="<?php echo base_url("css"); ?>/bootstrap-responsive.css" type="text/css" rel="stylesheet">
		<!-- <link href="<?php echo base_url("css"); ?>/prettify.css" type="text/css" rel="stylesheet" /> -->
		<!-- <link href="<?php echo base_url("css"); ?>/docs.css" type="text/css" rel="stylesheet" /> -->
		<link href="<?php echo base_url("css"); ?>/style.css" type="text/css" rel="stylesheet" />
		<link href="<?php echo base_url("css"); ?>/skin.css" type="text/css" rel="stylesheet" />

		<!-- <script src="<?php echo base_url("js"); ?>/jquery-1.7.1.min.js"></script> -->
		<script type="text/javascript">
		var base_url = "<?php echo base_url();?>";/* global variable for the root path */
		var image_url ="<?php echo base_url().'img/';?>";

		</script>

		<script src="<?php echo base_url("js"); ?>/jquery-1.4.2.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url("js"); ?>/jquery-latest.pack.js"></script>
		<script type="text/javascript" src="<?php echo base_url("js"); ?>/jquery.datePicker.js"></script>
		<script type="text/javascript" src="<?php echo base_url("js"); ?>/jquery.raty.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url("js"); ?>/jquery.raty.js"></script>

		<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script> -->

		<script src="<?php echo base_url("js"); ?>/jquery.jcarousel.js"></script>

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

					$(function() {

						var date = new Date();
						date.setYear('2007');
						$("#datepicker").datepicker({

							changeMonth: true,
							changeYear: true,
							maxDate: '+0d',
							defaultDate: date
						});
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

					$('#mask').hide();
					$('.window').hide();
				});

			});

			


		$(document).ready(function() {

				//==============Script that runs the modal windows for Invite Friends, and Login
				//==============================================================================
				//select all the a tag with name equal to modal

				//Cancel the link behavior

				//Get the A tag
				var id = $(this).attr('href');
						<?php $header_action = $this->session->userdata('header_action');
								if(isset($header_action)) {
									if($header_action == 'changepassword') { ?>
					$('#changepassword').css("display", "block");
									<?php } else if ($header_action == 'user_login') { ?>
					$('#dialog').css("display", "block");
									<?php } else if ($header_action == 'user_profile') { ?>
					$('#user_profile').css("display", "block");
									<?php }  ?>
					//Get the screen height and width
					

				<?php } ?>

				
			});

		
		</script>
	</head>
	<body>
		<!-- Begin wrapper div -->
		<div id="wrapper" class="flt-l wid_100">
			<!-- Begin Container div -->
			<div class="container">
				<!-- Begin Header div -->
				<div id="header">
					<?php echo anchor(base_url(), img(array("src" => "/img/logo.jpg", "alt" => $this->lang->line("brand_name"), "class" => "mgn-15b")), array("class" => "flt-l mgn-15px")); ?>
					<span class="flt-l slogan">Grab it Now!</span>
					<?php echo img(array("src" => "/img/colocation-america.jpg", "alt" => $this->lang->line("header_colocation_america"), "class" => "flt-r")); ?>
					<!-- Navigation starts here -->
					<div class="wid_100 flt-l" >
						<?php include_once 'prod_topnav.php';?>
					</div>
					<!-- Navigation ends here -->
				<!-- End Header div -->
				</div>
				<!-- Begin inner wrapper div -->
				<div id="inner-wrapper" class="flt-l wid_100">
					<input type="hidden" id="baseURL" value="<?php echo base_url(); ?>" />
