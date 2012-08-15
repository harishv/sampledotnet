<?php error_reporting(E_ALL); ?>
<?php echo doctype('html5'); ?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $this->lang->line("title"); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>favicon.ico" />

<link href="<?php echo base_url("css"); ?>/bootstrap.css" type="text/css" rel="stylesheet">
<link href="<?php echo base_url("css"); ?>/bootstrap-responsive.css" type="text/css" rel="stylesheet">
<!-- <link href="<?php echo base_url("css"); ?>/prettify.css" type="text/css" rel="stylesheet" /> -->
<!-- <link href="<?php echo base_url("css"); ?>/docs.css" type="text/css" rel="stylesheet" /> -->
<link href="<?php echo base_url("css"); ?>/style.css" type="text/css" rel="stylesheet" />
<link href="<?php echo base_url("css"); ?>/skin.css" type="text/css" rel="stylesheet" />

<!-- <script src="<?php echo base_url("js"); ?>/jquery-1.7.1.min.js"></script> -->
<script src="<?php echo base_url("js"); ?>/jquery-1.4.2.min.js"></script>
<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script> -->

<script src="<?php echo base_url("js"); ?>/jquery.jcarousel.js"></script>


<script type="text/javascript">
jQuery(document).ready(function() {
    jQuery('#mycarousel').jcarousel({
        start: 2
    });
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
				<?php echo img(array("src" => "/img/colocation-america", "alt" => $this->lang->line("header_colocation_america"), "class" => "flt-r")); ?>
				<!-- Navigation starts here -->
				<div class="wid_100 flt-l" >
					<?php include_once 'topnav.php';?>
				</div>
				<!-- Navigation ends here -->
			<!-- End Header div -->
    		</div>
    		<!-- Begin inner wrapper div -->
    		<div id="inner-wrapper" class="flt-l wid_100">
    			<input type="hidden" id="baseURL" value="<?php echo base_url(); ?>" />
