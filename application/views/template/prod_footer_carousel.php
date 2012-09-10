<script type="text/javascript" src="<?php echo base_url("js"); ?>/jquery-ui-1.7.2.custom.min.js"></script>

<link rel="stylesheet" type="text/css" href="<?php echo base_url("css"); ?>/jquery-ui-1.7.2.custom.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url("css"); ?>/slider.css">

<div class="tabs">
	<ul>
		<li>
			<a href="#Beauty" onclick="tabs(1);" class="active" id="beauty1">Beauty</a>
		</li>
		<li>
			<a href="#Health" onclick="tabs(2);" id="health1">Health</a>
		</li>
		<li>
			<a href="#Kids" id="kids1" onclick="tabs(3);">Kids</a>
		</li>
		<li>
			<a href="#Pets" id="pets1" onclick="tabs(4);">Pets</a>
		</li>
		<li class="last">
			<a href="#Games" id="games1" onclick="tabs(5);">Games</a>
		</li>
	</ul>

	<blockquote id="beauty" class="blockquote_slider">

		<div id="sliderContent" class="ui-corner-all">
			<div class="viewer ui-corner-all">
				<div class="content-conveyor ui-helper-clearfix tabs1">

					<div class="item">
					<p class="first"> <span class="hgt-15px wid_100"></span> <img src="<?php echo base_url('img'); ?>/barbosol.jpg" alt="huggies" class="one" /><br />
						<span class="hgt-8px wid_100"></span> <strong>Ketchup &amp; Jams</strong><br />
						When you buy one bag
						M&amp;M’S Brand Pretzel
						Chocolate Candies
						(9.9 oz. or larger). </p>
					</div>
					<div class="item">
					<p> <span class="hgt-15px wid_100"></span> <img src="<?php echo base_url('img'); ?>/barbosol.jpg" alt="barbosol" /><br />
						<span class="hgt-8px wid_100"></span> <strong>Ketchup &amp; Jams</strong><br />
						When you buy one bag
						M&amp;M’S Brand Pretzel
						Chocolate Candies
						(9.9 oz. or larger). </p>
					</div>
					<div class="item">
					<p> <span class="hgt-15px wid_100"></span> <img src="<?php echo base_url('img'); ?>/horlicks.jpg" alt="horlicks" class="two" /><br />
						<span class="hgt-8px wid_100"></span> <strong>Ketchup &amp; Jams</strong><br />
						When you buy one bag
						M&amp;M’S Brand Pretzel
						Chocolate Candies
						(9.9 oz. or larger). </p>
					</div>
					<div class="item">
					<p> <span class="hgt-15px wid_100"></span> <img src="<?php echo base_url('img'); ?>/coke.jpg" alt="coke" class="three" /><br />
						<span class="hgt-8px wid_100"></span> <strong>Ketchup &amp; Jams</strong><br />
						When you buy one bag
						M&amp;M’S Brand Pretzel
						Chocolate Candies
						(9.9 oz. or larger). </p>
					</div>
					<div class="item">
					<p> <span class="hgt-15px wid_100"></span> <img src="<?php echo base_url('img'); ?>/huggies1.jpg" alt="huggies" class="one" /><br />
						<span class="hgt-8px wid_100"></span> <strong>Ketchup &amp; Jams</strong><br />
						When you buy one bag
						M&amp;M’S Brand Pretzel
						Chocolate Candies
						(9.9 oz. or larger). </p>
					</div>
					<div class="item">
					<p class="last"> <span class="hgt-15px wid_100"></span> <img src="<?php echo base_url('img'); ?>/huggies1.jpg" alt="huggies" class="one" /><br />
						<span class="hgt-8px wid_100"></span> <strong>Ketchup &amp; Jams</strong><br />
						When you buy one bag
						M&amp;M’S Brand Pretzel
						Chocolate Candies
						(9.9 oz. or larger). </p>
					</div>

				</div>
			</div>
			<div id="slider"></div>
		</div>

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

			function tabs(j) {
				if (j == 1) {
					controlTabs();
					nonActive();
					document.getElementById("beauty").style.display = "block";
					document.getElementById("beauty1").className = "active";
				}
				if (j == 2) {
					controlTabs();
					nonActive();
					document.getElementById("health").style.display = "block";
					document.getElementById("health1").className = "active";
				}
				if (j == 3) {
					controlTabs();
					nonActive();
					document.getElementById("kids").style.display = "block";
					document.getElementById("kids1").className = "active";
				}
				if (j == 4) {
					controlTabs();
					nonActive();
					document.getElementById("pets").style.display = "block";
					document.getElementById("pets1").className = "active";
				}
				if (j == 5) {
					controlTabs();
					nonActive();
					document.getElementById("games").style.display = "block";
					document.getElementById("games1").className = "active";
				}
			}

			function controlTabs() {
				var total = document.getElementsByTagName("blockquote").length;
				for (var i = 0; i < total; i++) {
					var numberIds = document.getElementsByTagName("blockquote")[i].id;
					document.getElementById(numberIds).style.display = "none";
				}
			}

			function nonActive() {
				document.getElementById("beauty1").className = "";
				document.getElementById("health1").className = "";
				document.getElementById("kids1").className = "";
				document.getElementById("pets1").className = "";
				document.getElementById("games1").className = "";
			}
		</script>
	</blockquote>

	             <blockquote id="health" style="display:none;">
    <div id="sliderContent1" class="ui-corner-all">
      <div class="viewer ui-corner-all">
        <div class="content-conveyor ui-helper-clearfix tabs1">

          <div class="item">
            <p class="first"> <span class="hgt-15px wid_100"></span> <img src="<?php echo base_url('img'); ?>/barbosol.jpg" alt="huggies" class="one" /><br />
                <span class="hgt-8px wid_100"></span> <strong>Ketchup &amp; Jams</strong><br />
                When you buy one bag
                M&amp;M’S Brand Pretzel
                Chocolate Candies
                (9.9 oz. or larger). </p>
          </div>
          <div class="item">
            <p> <span class="hgt-15px wid_100"></span> <img src="<?php echo base_url('img'); ?>/horlicks.jpg" alt="barbosol" /><br />
                <span class="hgt-8px wid_100"></span> <strong>Ketchup &amp; Jams</strong><br />
                When you buy one bag
                M&amp;M’S Brand Pretzel
                Chocolate Candies
                (9.9 oz. or larger). </p>
          </div>
          <div class="item">
            <p> <span class="hgt-15px wid_100"></span> <img src="<?php echo base_url('img'); ?>/horlicks.jpg" alt="horlicks" class="two" /><br />
                <span class="hgt-8px wid_100"></span> <strong>Ketchup &amp; Jams</strong><br />
                When you buy one bag
                M&amp;M’S Brand Pretzel
                Chocolate Candies
                (9.9 oz. or larger). </p>
          </div>
          <div class="item">
            <p> <span class="hgt-15px wid_100"></span> <img src="<?php echo base_url('img'); ?>/coke.jpg" alt="coke" class="three" /><br />
                <span class="hgt-8px wid_100"></span> <strong>Ketchup &amp; Jams</strong><br />
                When you buy one bag
                M&amp;M’S Brand Pretzel
                Chocolate Candies
                (9.9 oz. or larger). </p>
          </div>
          <div class="item">
            <p> <span class="hgt-15px wid_100"></span> <img src="<?php echo base_url('img'); ?>/huggies1.jpg" alt="huggies" class="one" /><br />
                <span class="hgt-8px wid_100"></span> <strong>Ketchup &amp; Jams</strong><br />
                When you buy one bag
                M&amp;M’S Brand Pretzel
                Chocolate Candies
                (9.9 oz. or larger). </p>
          </div>
          <div class="item">
            <p class="last"> <span class="hgt-15px wid_100"></span> <img src="<?php echo base_url('img'); ?>/huggies1.jpg" alt="huggies" class="one" /><br />
                <span class="hgt-8px wid_100"></span> <strong>Ketchup &amp; Jams</strong><br />
                When you buy one bag
                M&amp;M’S Brand Pretzel
                Chocolate Candies
                (9.9 oz. or larger). </p>
          </div>

        </div>
      </div>
      <div id="slider1"></div>
    </div>

    <script type="text/javascript">
      $(function() {

		//vars
		var conveyor = $(".content-conveyor", $("#sliderContent1")),
		item = $(".item", $("#sliderContent1"));

		//set length of conveyor
		conveyor.css("width", item.length * parseInt(item.css("width")));

        //config
        var sliderOpts = {
		  max: (item.length * parseInt(item.css("width"))) - parseInt($(".viewer", $("#sliderContent1")).css("width")),
          slide: function(e, ui) {
            conveyor.css("left", "-" + ui.value + "px");
          }
        };

        //create slider
        $("#slider1").slider(sliderOpts);
      });
    </script>
             </blockquote>

            <blockquote id="kids" style="display:none;">
    <div id="sliderContent2" class="ui-corner-all">
      <div class="viewer ui-corner-all">
        <div class="content-conveyor ui-helper-clearfix tabs1">

          <div class="item">
            <p class="first"> <span class="hgt-15px wid_100"></span> <img src="<?php echo base_url('img'); ?>/barbosol.jpg" alt="huggies" class="one" /><br />
                <span class="hgt-8px wid_100"></span> <strong>Ketchup &amp; Jams</strong><br />
                When you buy one bag
                M&amp;M’S Brand Pretzel
                Chocolate Candies
                (9.9 oz. or larger). </p>
          </div>
          <div class="item">
            <p> <span class="hgt-15px wid_100"></span> <img src="<?php echo base_url('img'); ?>/horlicks.jpg" alt="barbosol" /><br />
                <span class="hgt-8px wid_100"></span> <strong>Ketchup &amp; Jams</strong><br />
                When you buy one bag
                M&amp;M’S Brand Pretzel
                Chocolate Candies
                (9.9 oz. or larger). </p>
          </div>
          <div class="item">
            <p> <span class="hgt-15px wid_100"></span> <img src="<?php echo base_url('img'); ?>/horlicks.jpg" alt="horlicks" class="two" /><br />
                <span class="hgt-8px wid_100"></span> <strong>Ketchup &amp; Jams</strong><br />
                When you buy one bag
                M&amp;M’S Brand Pretzel
                Chocolate Candies
                (9.9 oz. or larger). </p>
          </div>
          <div class="item">
            <p> <span class="hgt-15px wid_100"></span> <img src="<?php echo base_url('img'); ?>/horlicks.jpg" alt="coke" class="three" /><br />
                <span class="hgt-8px wid_100"></span> <strong>Ketchup &amp; Jams</strong><br />
                When you buy one bag
                M&amp;M’S Brand Pretzel
                Chocolate Candies
                (9.9 oz. or larger). </p>
          </div>
          <div class="item">
            <p> <span class="hgt-15px wid_100"></span> <img src="<?php echo base_url('img'); ?>/huggies1.jpg" alt="huggies" class="one" /><br />
                <span class="hgt-8px wid_100"></span> <strong>Ketchup &amp; Jams</strong><br />
                When you buy one bag
                M&amp;M’S Brand Pretzel
                Chocolate Candies
                (9.9 oz. or larger). </p>
          </div>
          <div class="item">
            <p class="last"> <span class="hgt-15px wid_100"></span> <img src="<?php echo base_url('img'); ?>/huggies1.jpg" alt="huggies" class="one" /><br />
                <span class="hgt-8px wid_100"></span> <strong>Ketchup &amp; Jams</strong><br />
                When you buy one bag
                M&amp;M’S Brand Pretzel
                Chocolate Candies
                (9.9 oz. or larger). </p>
          </div>

        </div>
      </div>
      <div id="slider2"></div>
    </div>

    <script type="text/javascript">
      $(function() {

		//vars
		var conveyor = $(".content-conveyor", $("#sliderContent2")),
		item = $(".item", $("#sliderContent2"));

		//set length of conveyor
		conveyor.css("width", item.length * parseInt(item.css("width")));

        //config
        var sliderOpts = {
		  max: (item.length * parseInt(item.css("width"))) - parseInt($(".viewer", $("#sliderContent2")).css("width")),
          slide: function(e, ui) {
            conveyor.css("left", "-" + ui.value + "px");
          }
        };

        //create slider
        $("#slider2").slider(sliderOpts);
      });
    </script>
             </blockquote>
            <blockquote id="pets" style="display:none;">
    <div id="sliderContent3" class="ui-corner-all">
      <div class="viewer ui-corner-all">
        <div class="content-conveyor ui-helper-clearfix tabs1">

          <div class="item">
            <p class="first"> <span class="hgt-15px wid_100"></span> <img src="<?php echo base_url('img'); ?>/barbosol.jpg" alt="huggies" class="one" /><br />
                <span class="hgt-8px wid_100"></span> <strong>Ketchup &amp; Jams</strong><br />
                When you buy one bag
                M&amp;M’S Brand Pretzel
                Chocolate Candies
                (9.9 oz. or larger). </p>
          </div>
          <div class="item">
            <p> <span class="hgt-15px wid_100"></span> <img src="<?php echo base_url('img'); ?>/horlicks.jpg" alt="barbosol" /><br />
                <span class="hgt-8px wid_100"></span> <strong>Ketchup &amp; Jams</strong><br />
                When you buy one bag
                M&amp;M’S Brand Pretzel
                Chocolate Candies
                (9.9 oz. or larger). </p>
          </div>
          <div class="item">
            <p> <span class="hgt-15px wid_100"></span> <img src="<?php echo base_url('img'); ?>/horlicks.jpg" alt="horlicks" class="two" /><br />
                <span class="hgt-8px wid_100"></span> <strong>Ketchup &amp; Jams</strong><br />
                When you buy one bag
                M&amp;M’S Brand Pretzel
                Chocolate Candies
                (9.9 oz. or larger). </p>
          </div>
          <div class="item">
            <p> <span class="hgt-15px wid_100"></span> <img src="<?php echo base_url('img'); ?>/coke.jpg" alt="coke" class="three" /><br />
                <span class="hgt-8px wid_100"></span> <strong>Ketchup &amp; Jams</strong><br />
                When you buy one bag
                M&amp;M’S Brand Pretzel
                Chocolate Candies
                (9.9 oz. or larger). </p>
          </div>
          <div class="item">
            <p> <span class="hgt-15px wid_100"></span> <img src="<?php echo base_url('img'); ?>/coke.jpg" alt="huggies" class="one" /><br />
                <span class="hgt-8px wid_100"></span> <strong>Ketchup &amp; Jams</strong><br />
                When you buy one bag
                M&amp;M’S Brand Pretzel
                Chocolate Candies
                (9.9 oz. or larger). </p>
          </div>
          <div class="item">
            <p class="last"> <span class="hgt-15px wid_100"></span> <img src="<?php echo base_url('img'); ?>/coke.jpg" alt="huggies" class="one" /><br />
                <span class="hgt-8px wid_100"></span> <strong>Ketchup &amp; Jams</strong><br />
                When you buy one bag
                M&amp;M’S Brand Pretzel
                Chocolate Candies
                (9.9 oz. or larger). </p>
          </div>

        </div>
      </div>
      <div id="slider3"></div>
    </div>

    <script type="text/javascript">
      $(function() {

		//vars
		var conveyor = $(".content-conveyor", $("#sliderContent3")),
		item = $(".item", $("#sliderContent3"));

		//set length of conveyor
		conveyor.css("width", item.length * parseInt(item.css("width")));

        //config
        var sliderOpts = {
		  max: (item.length * parseInt(item.css("width"))) - parseInt($(".viewer", $("#sliderContent3")).css("width")),
          slide: function(e, ui) {
            conveyor.css("left", "-" + ui.value + "px");
          }
        };

        //create slider
        $("#slider3").slider(sliderOpts);
      });
    </script>
             </blockquote>
            <blockquote id="games" style="display:none;">
    <div id="sliderContent4" class="ui-corner-all">
      <div class="viewer ui-corner-all">
        <div class="content-conveyor ui-helper-clearfix tabs1">

          <div class="item">
            <p class="first"> <span class="hgt-15px wid_100"></span> <img src="<?php echo base_url('img'); ?>/coke.jpg" alt="huggies" class="one" /><br />
                <span class="hgt-8px wid_100"></span> <strong>Ketchup &amp; Jams</strong><br />
                When you buy one bag
                M&amp;M’S Brand Pretzel
                Chocolate Candies
                (9.9 oz. or larger). </p>
          </div>
          <div class="item">
            <p> <span class="hgt-15px wid_100"></span> <img src="<?php echo base_url('img'); ?>/coke.jpg" alt="barbosol" /><br />
                <span class="hgt-8px wid_100"></span> <strong>Ketchup &amp; Jams</strong><br />
                When you buy one bag
                M&amp;M’S Brand Pretzel
                Chocolate Candies
                (9.9 oz. or larger). </p>
          </div>
          <div class="item">
            <p> <span class="hgt-15px wid_100"></span> <img src="<?php echo base_url('img'); ?>/horlicks.jpg" alt="horlicks" class="two" /><br />
                <span class="hgt-8px wid_100"></span> <strong>Ketchup &amp; Jams</strong><br />
                When you buy one bag
                M&amp;M’S Brand Pretzel
                Chocolate Candies
                (9.9 oz. or larger). </p>
          </div>
          <div class="item">
            <p> <span class="hgt-15px wid_100"></span> <img src="<?php echo base_url('img'); ?>/coke.jpg" alt="coke" class="three" /><br />
                <span class="hgt-8px wid_100"></span> <strong>Ketchup &amp; Jams</strong><br />
                When you buy one bag
                M&amp;M’S Brand Pretzel
                Chocolate Candies
                (9.9 oz. or larger). </p>
          </div>
          <div class="item">
            <p> <span class="hgt-15px wid_100"></span> <img src="<?php echo base_url('img'); ?>/coke.jpg" alt="huggies" class="one" /><br />
                <span class="hgt-8px wid_100"></span> <strong>Ketchup &amp; Jams</strong><br />
                When you buy one bag
                M&amp;M’S Brand Pretzel
                Chocolate Candies
                (9.9 oz. or larger). </p>
          </div>
          <div class="item">
            <p class="last"> <span class="hgt-15px wid_100"></span> <img src="<?php echo base_url('img'); ?>/coke.jpg" alt="huggies" class="one" /><br />
                <span class="hgt-8px wid_100"></span> <strong>Ketchup &amp; Jams</strong><br />
                When you buy one bag
                M&amp;M’S Brand Pretzel
                Chocolate Candies
                (9.9 oz. or larger). </p>
          </div>

        </div>
      </div>
      <div id="slider4"></div>
    </div>

    <script type="text/javascript">
      $(function() {

		//vars
		var conveyor = $(".content-conveyor", $("#sliderContent4")),
		item = $(".item", $("#sliderContent4"));

		//set length of conveyor
		conveyor.css("width", item.length * parseInt(item.css("width")));

        //config
        var sliderOpts = {
		  max: (item.length * parseInt(item.css("width"))) - parseInt($(".viewer", $("#sliderContent4")).css("width")),
          slide: function(e, ui) {
            conveyor.css("left", "-" + ui.value + "px");
          }
        };

        //create slider
        $("#slider4").slider(sliderOpts);
      });
    </script>
             </blockquote>
              <!-- End tabs here -->
</div>