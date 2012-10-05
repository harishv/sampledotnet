<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>jQuery UI Slider</title>
    <link href="<?php echo base_url("css"); ?>/jquery-ui-1.7.2.custom.css" type="text/css" rel="stylesheet" />
    <link href="<?php echo base_url("css"); ?>/slider2.css" type="text/css" rel="stylesheet" />
  </head>
  <body>
    <div id="sliderContent" class="ui-corner-all">    
      <div class="viewer ui-corner-all">
        <div class="content-conveyor ui-helper-clearfix tabs1">
          
          <?php foreach ($docs_list as $row) { ?>
         <a href="<?php echo base_url();?>documents/showDoc?doc_id=<?php echo $row->doc_id;?>" target="_parent">
          <div class="item">
            <p class="first"> <span class="hgt-15px wid_100"></span> <img src="<?php echo $row->thumbnail_url;?>" alt="huggies" class="one" /><br />
                <span class="hgt-8px wid_100"></span><br />
                <?php echo $row->doc_title; ?></p>
          </div>
        </a>
          <?php } ?>
        </div>
      </div>
      <div id="slider"></div>
    </div>
    <script type="text/javascript" src="<?php echo base_url("js"); ?>/jquery-1.4.2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url("js"); ?>/jquery-ui-1.7.2.custom.min.js"></script>
    <script type="text/javascript">
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
  </body>
</html>