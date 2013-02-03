<link rel="stylesheet" type="text/css" href="<?php echo base_url("css"); ?>/jquery-ui-1.7.2.custom.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url("css"); ?>/slider.css">

<script type="text/javascript" src="<?php echo base_url("js"); ?>/jquery-ui-1.7.2.custom.min.js"></script>

<script>
$(function() {
	$('#my_carousel_tabs a').click(function(e) {
		e.preventDefault();
		$(this).tab('show');
	});

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

<?php
	if(isset($footer_category) && $footer_category != ''){  ?>
	<ul class="nav nav-tabs" id="my_carousel_tabs">
		<?php
			$flag = true;
			foreach($footer_category as $tab_key => $category) {
				$li_class = '';
				if ($flag) {
					$li_class = "active";
				}
			?>
			<li class="<?php echo $li_class; ?>">
				<a data-toggle="tab" href="#my_tab_<?php echo $category['category_id']; ?>"><?php echo $category['doc_cat_name']; ?></a>
			</li>
		<?php
			$flag = false;
			} ?>
	</ul>

	<div class="tab-content" style="overflow: hidden;">
		<?php
			$flag = true;
			foreach ($footer_documents as $documents) {
				$main_div_class = '';
				$p_class = '';
				if ($flag) {
					$main_div_class = 'in active';
					$p_class = 'first';
				}
			?>
			<div id="my_tab_<?php echo $documents[0]['category_id']; ?>" class="tab-pane fade <?php echo $main_div_class; ?>">
				<!-- SliderContent div- start -->
				<div id="sliderContent" class="sliderContent-css ui-corner-all">
					<div class="viewer ui-corner-all">
						<div class="content-conveyor ui-helper-clearfix tabs1">
							<?php foreach ($documents as $item) { ?>
							<div class="item">
								<p class="<?php echo $p_class; ?>">
									<span class="hgt-15px wid_100"></span>
									<a href="<?php echo base_url().'documents/document_detail/'.$item['id'];?>"><img src="<?php echo base_url().DOC_THUMB_IMG_PATH.'thumb_'.$item['image'];?>" alt="<?php echo $item['name']; ?>" title="<?php echo $item['name']; ?>" /></a>
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
							<?php } ?>
						</div>
					</div>
      				<div id="slider"></div>
				</div>
			</div>
		<?php
			$flag = false;
			}
		?>
	</div>
	<?php } ?>