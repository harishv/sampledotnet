
<link rel="stylesheet" type="text/css" href="<?php echo base_url("css");?>/jquery-ui-1.7.2.custom.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("css");?>/slider2.css"> 

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

<div id="sliderContent" class="ui-corner-all">		
      <div class="viewer ui-corner-all">
        <div class="content-conveyor ui-helper-clearfix tabs1">

          <div class="item">
            <p class="first"> <span class="hgt-15px wid_100"></span> <img src="<?php echo base_url().'img/icon1.jpg';?>" alt="huggies" class="one" /><br />
                <span class="hgt-8px wid_100"></span><br />
                Non-Disclosure Agreement (NDA) Template</p>
          </div>
          <div class="item">
            <p class="first"> <span class="hgt-15px wid_100"></span> <img src="<?php echo base_url().'img/icon1.jpg';?>" alt="huggies" class="one" /><br />
                <span class="hgt-8px wid_100"></span><br />
                Non-Disclosure Agreement (NDA) Template</p>
          </div>
          <div class="item">
            <p class="first"> <span class="hgt-15px wid_100"></span> <img src="<?php echo base_url().'img/icon1.jpg';?>" alt="huggies" class="one" /><br />
                <span class="hgt-8px wid_100"></span><br />
                Non-Disclosure Agreement (NDA) Template</p>
          </div>
             <div class="item">
            <p class="first"> <span class="hgt-15px wid_100"></span> <img src="<?php echo base_url().'img/icon1.jpg';?>" alt="huggies" class="one" /><br />
                <span class="hgt-8px wid_100"></span><br />
                Non-Disclosure Agreement (NDA) Template</p>
          </div>
          <div class="item">
            <p class="first"> <span class="hgt-15px wid_100"></span> <img src="<?php echo base_url().'img/icon1.jpg';?>" alt="huggies" class="one" /><br />
                <span class="hgt-8px wid_100"></span><br />
                Non-Disclosure Agreement (NDA) Template</p>
          </div>
          <div class="item">
            <p class="first"> <span class="hgt-15px wid_100"></span> <img src="<?php echo base_url().'img/icon1.jpg';?>" alt="huggies" class="one" /><br />
                <span class="hgt-8px wid_100"></span><br />
                Non-Disclosure Agreement (NDA) Template</p>
          </div>
          <div class="item">
            <p class="first"> <span class="hgt-15px wid_100"></span> <img src="<?php echo base_url().'img/icon1.jpg';?>" alt="huggies" class="one" /><br />
                <span class="hgt-8px wid_100"></span><br />
                Non-Disclosure Agreement (NDA) Template</p>
          </div>
          
        </div>
      </div>
      <div id="slider"></div>
    </div>
