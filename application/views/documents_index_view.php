<div class="flt-l wid_100" id="inner-wrapper">
      <!-- Begin main-content div -->
      <div class="flt-l wid_100" id="main-content">
        <!-- Begin content div -->
        <div class="flt-l" id="content">
          <div class="hgt-15px wid_100"></div>

          
          <div class="hgt-15px"></div>
          
          <!-- Begin slideshow -->
          <div class="slide flt-l mgn-15b">
                        <div style="margin:0px; height:30px; padding-left:5px;" class="top-container">Home&nbsp;  <img src="<?php echo base_url().'img/blue-bullet.jpg';?>">   <span style="font-weight:bold;"> &nbsp; Documents</span></div>
           <div class="sidebar">
            <ul>
             <li><a href="#">Rental Agreement<br>Template</a></li>
             <li><a href="#">Rental Agreement<br>Template</a></li>
             <li><a href="#">Rental Agreement<br>Template</a></li>
             <li><a href="#">Rental Agreement<br>Template</a></li>
             <li><a href="#">Rental Agreement<br>Template</a></li>
            </ul>
           </div>
           <!-- sidebar -->
           <div class="right-bar"><img src="<?php echo base_url().'img/banner-01.jpg';?>"></div><!-- right-bar -->
          </div>
          <div id="featured-document"> 
            <div class="sub">Featured Documents</div>
			<?php include('docs_carousel.php');?>
       	   
          </div>
          <!-- featured-document -->
          <div id="search-box">
          	<div class="search-bar"><input type="text" onblur="if(this.value=='')this.value='Search for your document here...'" onfocus="if(this.value=='Search for your document here...')this.value=''" value="Search for your document here...">
            <div class="search-now"><img src="<?php echo base_url().'img/search-now.jpg';?>"></div>
          </div>
          </div><!-- search-box -->
          <!-- Begin column 1 -->
          <?php include('template/docs_leftnav.php');?>
          <!-- Begin column 2 -->
          <div class="col-2 flt-l">
            <!-- Begin sample here -->
            <div class="sample mgn-15b">
              <p class="head mgn-0">&nbsp;&nbsp;&nbsp; Most Popular &amp; Downloded Documents</p>
              <!-- Begin Samples here -->
              <?php include('documents_thumbs_view.php');?>
            <!-- Begin tabs here -->
            <h2>What is Sample.net</h2>
            <p class="bdr-btm1">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet domin g id quod mazim placerat facer possim assum. Typi non habent claritatem insitam.<br><br><img style="margin-left:20px;" src="images/bottom-add.jpg"><br><br>
aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit.</p>
            <!-- End column 2 -->
          </div>
          <!-- End content div -->
        </div>
        <!-- Begin sidebar div -->
   		<?php include('template/docs_rightnav.php');?>
        <!-- End main-content div -->
      </div>
      <!-- End inner wrapper div -->
    </div>
