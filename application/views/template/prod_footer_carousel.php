
    <meta charset="utf-8" />
    <title>jQuery UI Tabs - Content via Ajax</title>
     <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" /> 
    <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
    <script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>
	<link rel="stylesheet" href="/resources/demos/style.css" />
    
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

 
<div id="tabs">
    <ul>
       
		<?php  if(isset($footer_category) && $footer_category !=''){ 
				foreach($footer_category as $key=>$values){ ?>
        <li><a href="<?php echo base_url().'index/get_products/'.$values['category_id'];?>"><?php echo $values['prod_cat_name'];?></a></li>
		<?php  } } ?>

        
    </ul>


    </div>



    
</div>



