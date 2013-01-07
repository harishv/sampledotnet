<?php echo doctype('html5'); ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $this->lang->line("if_image_dropdown"); ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url("css"); ?>/msdropdown/dd.css" />
<script type="text/javascript" src="<?php echo base_url("js"); ?>/msdropdown/jquery-1.6.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url("js"); ?>/msdropdown/jquery.dd.js"></script>
</head>
<body>
	<form name="myform" id="myform" action="getvalue.php"
		enctype="multipart/form-data" method="post">
		<p>
			<select style="width: 208px" class="mydds" name="myimge">
				<option value="calendar" selected="selected" title="<?php echo base_url("img"); ?>/india-flag.jpg"><?php echo $this->lang->line("if_choose_your_country"); ?></option>
				<option value="shopping_cart" title="<?php echo base_url("img"); ?>/india-flag.jpg"><?php echo $this->lang->line("if_shopping_cart"); ?></option>
			</select> <br /> <br />
		</p>
	</form>
	<script language="javascript" type="text/javascript">
		function showvalue(arg) {
		    alert(arg);
		    //arg.visible(false);
		}

		$(document).ready(function() {

		    try {
		        oHandler = $(".mydds").msDropDown().data("dd");
		        //oHandler.visible(true);
		        //alert($.msDropDown.version);
		        //$.msDropDown.create("body select");
		        $("#ver").html($.msDropDown.version);
		    } catch (e) {
		        alert("Error: " + e.message);
		    }
		})		
	</script>
	<div class="node-links">
		<div class="adsense">
			<script type="text/javascript"><!--
            google_ad_client = "pub-7681689922712917";
            /* 468x15 */
            google_ad_slot = "4604426671";
            google_ad_width = 468;
            google_ad_height = 15;
            //-->
            </script>
			<!--script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script-->
		</div>
	</div>
</body>
</html>
