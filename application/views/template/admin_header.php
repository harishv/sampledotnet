<?php echo doctype('html5'); ?>
<head>
<title>Sample.net | Administration</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<!-- <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>favicon.ico" /> -->

<link href="<?php echo base_url("css"); ?>/bootstrap.css" type="text/css" rel="stylesheet">
<link href="<?php echo base_url("css"); ?>/bootstrap-responsive.css" type="text/css"
	rel="stylesheet">
<link href="<?php echo base_url("css"); ?>/prettify.css" type="text/css" rel="stylesheet" />
<link href="<?php echo base_url("css"); ?>/docs.css" type="text/css" rel="stylesheet" />

<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script> -->
<script type="text/javascript" src="<?php echo base_url("js"); ?>/jquery-1.7.1.min.js"></script>

</head>
<body data-offset="50" data-target=".subnav" data-spy="scroll" data-twttr-rendered="true">
	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<?php include_once 'admin_topnav.php';?>
		</div>
	</div>

	<!-- Start of Main-Container -->
	<div class="container">
		<div class="main-data">
	<input type="hidden" id="baseURL" value="<?php echo base_url(); ?>" />