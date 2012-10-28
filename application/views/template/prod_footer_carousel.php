<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url("css"); ?>/jquery-ui-1.7.2.custom.css"> -->
<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url("css"); ?>/slider.css"> -->

<!-- <script type="text/javascript" src="<?php echo base_url("js"); ?>/jquery-ui-1.7.2.custom.min.js"></script> -->

<!-- <script src="http://code.jquery.com/jquery-1.8.2.js"></script> -->
<script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>

<script>
$(function() {
    $( "#tabs" ).tabs({
        beforeLoad: function( event, ui ) {
            ui.jqXHR.error(function() {
                ui.panel.html(
                    "Couldn't load this tab. We'll try to fix this as soon as possible. " +
                    "If this wouldn't be a demo." );
            });
        }
    });
});
</script>

<div class="tabs" id="tabs">
    <ul>
	<?php
        if(isset($footer_category) && $footer_category !=''){
            foreach($footer_category as $key=>$values){ ?>
        <li><a href="<?php echo base_url().'index/get_products/'.$values['category_id'];?>"><?php echo $values['prod_cat_name'];?></a></li>
	  <?php } ?>
      <?php } ?>
    </ul>
</div>






