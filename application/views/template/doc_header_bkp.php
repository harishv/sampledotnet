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
		<link href="<?php echo base_url("css"); ?>/style-new.css" type="text/css" rel="stylesheet" />
		<link href="<?php echo base_url("css"); ?>/skin.css" type="text/css" rel="stylesheet" />
        <link href="<?php echo base_url("css"); ?>/colorbox.css" type="text/css" rel="stylesheet" />
		<script src="<?php echo base_url("js"); ?>/jquery-1.4.2.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url("js"); ?>/jquery-latest.pack.js"></script>
        <script type="text/javascript" src="<?php echo base_url("js"); ?>/jquery.colorbox-min.js"></script>
        <script type="text/javascript" src="<?php echo base_url("js"); ?>/jquery.colorbox.js"></script>
		<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script> -->
		<script type="text/javascript" src="<?php echo base_url("js"); ?>/jquery-1.4.2.min.js"></script>
    	<script type="text/javascript" src="<?php echo base_url("js"); ?>/jquery-ui-1.7.2.custom.min.js"></script>
		<script src="<?php echo base_url("js"); ?>/jquery.jcarousel.js"></script>
		<script type="text/javascript">
		var base_url = "<?php echo base_url();?>";/* global variable for the root path */
		</script>

		<script type="text/javascript">
			jQuery(document).ready(function() {
				$('#mycarousel').jcarousel({
					start: 1
				});
			});

			$(document).ready(function() {
				//==============Script that runs the modal windows for Invite Friends, and Login
				//==============================================================================
				//select all the a tag with name equal to modal
				$('a[name=modal]').click(function(e) {
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
		</script>
        
        <script>
		$(document).ready(function(){
	
			//Examples of how to assign the ColorBox event to elements
			$(".group1").colorbox({rel:'group1'});
			$(".group2").colorbox({rel:'group2', transition:"fade"});
			$(".group3").colorbox({rel:'group3', transition:"none", width:"75%", height:"75%"});
			$(".group4").colorbox({rel:'group4', slideshow:true});
			$(".ajax").colorbox();
			$(".youtube").colorbox({iframe:true, innerWidth:425, innerHeight:344});
			$(".iframe").colorbox({iframe:true, width:"750px", height:"350px"});
			$(".inline").colorbox({inline:true, width:"50%"});
			$(".callbacks").colorbox({
				onOpen:function(){ alert('onOpen: colorbox is about to open'); },
				onLoad:function(){ alert('onLoad: colorbox has started to load the targeted content'); },
				onComplete:function(){ alert('onComplete: colorbox has displayed the loaded content'); },
				onCleanup:function(){ alert('onCleanup: colorbox has begun the close process'); },
				onClosed:function(){ alert('onClosed: colorbox has completely closed'); }
			});
			
			//Example of preserving a JavaScript event for inline calls.
			$("#click").click(function(){ 
				$('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
				return false;
			});
		});
	</script>

<script type="text/javascript" charset="utf-8">
      $(function(){
        $("input, textarea, select, button").uniform();
      });
    </script>
<script>
function currentShow(i){
 if(i==1){
 	document.getElementById("bussiness").className="active"
 }else if(i==2){
    document.getElementById("bussiness").className=""
 }
}
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
