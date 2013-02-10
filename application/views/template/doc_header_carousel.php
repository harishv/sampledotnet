<?php if(isset($featured_documents) && $featured_documents != '') { ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url("css"); ?>/jquery-ui-1.7.2.custom.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url("css"); ?>/slider2.css">

<script type="text/javascript" src="<?php echo base_url("js"); ?>/jquery-ui-1.7.2.custom.min.js"></script>

<script>
$(function() {
	//vars
	var conveyor = $(".content-conveyor", $("#sliderContent")),
		item = $(".item", $("#sliderContent"));

	//set length of conveyor
	conveyor.css("width", item.length * parseInt(item.css("width")));

	//config
	var sliderOpts = {
		max: (item.length * parseInt(item.css("width"))) - parseInt($(".viewer", $("#sliderContent")).css("width")),
		slide: function(e, ui) {
			conveyor.css("left", "-" + ui.value + "px");
		}
	};

	//create slider
	$("#slider").slider(sliderOpts);
});
</script>

<!-- SliderContent div- start -->
<div id="sliderContent" class="sliderContent-css ui-corner-all">
	<div class="viewer ui-corner-all">
		<div class="content-conveyor ui-helper-clearfix tabs1" style="margin-bottom: 10px;">
			<?php
				$flag = true;
				foreach ($featured_documents as $item) {
					$p_class = '';
					if ($flag) {
						$p_class = 'first';
					}
				?>
			<div class="item">
				<p class="<?php echo $p_class; ?>">
					<span class="hgt-15px wid_100"></span>
					<a href="<?php echo base_url().'documents/document_detail/'.$item['id'];?>">
						<img src="<?php echo base_url().DOC_THUMB_IMG_PATH.'thumb_'.$item['image'];?>" alt="<?php echo $item['name']; ?>" title="<?php echo $item['name']; ?>" height="143" width="136" /></a>
					<br />
					<span class="hgt-8px wid_100"></span>
					<?php
						$item_short_name = $item['name'];
						if(strlen($item_short_name) > 15)
							$item_short_name = substr($item_short_name, 0, 13) . "..";

						$item_short_desc = $item['description'];
						if(strlen($item_short_desc) > 40)
							$item_short_desc = substr($item_short_desc, 0, 38) . "..";

					?>
					<a href="<?php echo base_url().'documents/document_detail/'.$item['id'];?>"><strong><?php echo $item_short_name; ?></strong></a>
					<br />
					<?php echo $item_short_desc; ?>
				</p>
			</div>
			<?php 
				$flag = false;
				} ?>
		</div>
	</div>
		<div id="slider"></div>
</div>
<?php } ?>
