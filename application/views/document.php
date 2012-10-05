<link rel="stylesheet" type="text/css" href="<?php echo base_url("css"); ?>/style-new.css" />
<script type='text/javascript' src='http://www.scribd.com/javascripts/scribd_api.js'></script>
 <script src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript">
  var scribd_doc = scribd.Document.getDoc(<?php echo $doc_id;?>, 'key-21ur0xy330biao2yhfzo');
  var onDocReady = function(e){
     scribd_doc.api.setPage(1);
    alert(scribd_doc.api.title());
     //scribd_doc.api.api.getViewMode();
  }
  var pageChanged = function(evn) {
        var pageCount = scribd_doc.api.getPage();
        if(pageCount > 3)
           scribd_doc.api.setPage(4);
        
      }

  scribd_doc.addEventListener('docReady', onDocReady);
  scribd_doc.addEventListener('pageChanged', pageChanged);
  scribd_doc.addParam('jsapi_version', 2);
  scribd_doc.addParam('default_embed_format', 'html5');
  scribd_doc.addParam('allow_share', true);
  scribd_doc.addParam('search_query', 'Preamble');
  //scribd_doc.addParam('mode','slideshow');
  scribd_doc.addParam('mode','list');
 // scribd_doc.addParam("use_ssl", true);
//scribd_doc.grantAccess('User Identifier', 'Sesssion ID', 'Signature');
  //scribd_doc.addParam('default_embed_format','flash');
  scribd_doc.addParam('height', 600);
  scribd_doc.addParam('width', 600);
  scribd_doc.addParam('public', true);
  scribd_doc.write('embedded_doc');
 
</script>
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
<!-- <a href="http://www.scribd.com/document_downloads/104086828?extension=pdf&secret_password=1mkjuaj0koo4wwms8tyq">Download</a> -->
      <!-- Begin main-content div -->
      <div id="main-content" class="flt-l wid_100">
                <div class="top-container">Home&nbsp;  <img src="../img/blue-bullet.jpg" />   <span style="font-weight:bold;"> Documents...Invoice</span></div>
        <!-- Begin content div -->
        <div id="content" class="flt-l" >
          <div class="hgt-15px wid_100" style="min-height:880px;">
           
           <span>Title: <span style="color:#0c3b93;"><?php //echo $doc_title;?></span> </span>
           <div class="download-box"><a href="#">Download This for</a><span>$ 8.99</span></div>
           
           <div class="pdf-book"><div id='embedded_doc'></div>
<map name="Map2" id="Map2"><area shape="rect" coords="172,770,228,782" href="#" /><area shape="rect" coords="322,773,381,794" href="#" /></map></div>
          </div>

          <div class="bottom-information-container">
           <div class="left">
            <div class="social-bar"><img src="../img/social3.jpg" border="0" usemap="#Map" style="float:left;" />
<map name="Map" id="Map">
  <area shape="rect" coords="2,3,59,32" href="http://www.facebook.com" target="_blank" />
<area shape="rect" coords="64,1,125,20" href="http://twitter.com/" target="_blank" />
<area shape="rect" coords="128,2,185,21" href="#" />
<area shape="rect" coords="190,2,249,22" href="#" />
<area shape="rect" coords="254,2,339,24" href="#" />
<area shape="rect" coords="341,0,401,30" href="#" />
</map><div class="download-box1"><a href="#">Download This for</a><span>$ 8.99</span></div>
            </div>
            	
              <div id="container" >
               <div class="left">
                <div class="top-bar"></div>
                <div class="middle-bar">
                 <span>Shared By :</span>
                 <p>William J.Will</p>
                 <span>Categories</span>
                 <p>Business</p>
                 <span>Tags / Keyword</span>
                 <p>Lorem ipsum,Dolor sit amet, Conseconsectetuer,  Adipiscing,
Onsectetuer</p>
                 <span>Views</span>
                 <p>345</p>
                 <span>Downloads</span>
                 <p>345</p>
                 <span>Available Formats</span>
                 <p>pdf, excel, editable pdf</p>
<p><div class="so" style="margin-top:-10px;"><a href="#"><img src="../img/facebook.jpg" alt="facebook" /></a>&nbsp;&nbsp;&nbsp; <a href="#"><img src="../img/skype.jpg" alt="skype" /></a> &nbsp;&nbsp;&nbsp; <a href="#"><img src="../img/share.jpg" alt="share"  /></a></div></p>
                </div>
       		    <div class="bottom-bar"></div>
               </div><!-- left-->
               <div class="right">
               	<h2>Lorem ipsum sit...</h2>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet domin g id quod mazim placerat facer possim assum. Typi non habent claritatem insitam.</p>
                <img src="../img/bottom-add.jpg" /><br /><br />
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet domin g id quod mazim placerat facer possim assum. Typi non habent claritatem insitam.</p>
                 <a href="#"><img src="../img/social-bar.jpg" /></a>
                 <div class="textarea">
             		<h2 style="float:left;">Enter your comments</h2>
                    <img src="../img/facebook-login-img.jpg" border="0" usemap="#Map3" style="float:right; margin-right:15px;">
<map name="Map3" id="Map3">
  <area shape="rect" coords="2,1,151,23" href="#" /><area shape="rect" coords="179,0,260,24" href="#" />
</map>
                    <textarea></textarea>
                 </div><!-- textarea -->
                 <div class="data">
                 <img src="../img/thumb.jpg"  align="left" style="margin-right:10px;"/>
                 James JH   |   4 hours ago
                 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec aliquam, nisl in lacinia imperdiet, nisl turpis tristique neque, eu feugiat risus enim ac ipsum. Ut ultricies lectus venenatis tortor.</p>
                 </div><!-- data -->
                 <div class="data">
                 <img src="../img/thumb.jpg"  align="left" style="margin-right:10px;"/>
                 James JH   |   4 hours ago
                 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec aliquam, nisl in lacinia imperdiet, nisl turpis tristique neque, eu feugiat risus enim ac ipsum. Ut ultricies lectus venenatis tortor.</p>
                 </div><!-- data -->
                 <div class="data">
                 <img src="../img/thumb.jpg"  align="left" style="margin-right:10px;"/>
                 James JH   |   4 hours ago
                 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec aliquam, nisl in lacinia imperdiet, nisl turpis tristique neque, eu feugiat risus enim ac ipsum. Ut ultricies lectus venenatis tortor.</p>
                 </div><!-- data -->
              	</div><!-- right -->
              </div><!-- container -->
            
           </div><!-- left -->
           <div class="right"><img src="../img/link-img.jpg" style="margin-left:10px;" /></div><!-- right -->
          </div><!-- bottom-information-container -->
          <div class="hgt-15px"></div>
          <!-- Begin slideshow -->
          <!-- featured-document -->
          <!-- search-box -->
          <!-- Begin column 1 -->
          <!-- Begin column 2 -->
          <!-- End content div -->
        </div>
        <!-- Begin sidebar div -->
        <div id="sidebar" class="flt-r"  style="margin-bottom:70px;">
          <!-- Begin search -->
          <ul ><li><a href="#"><img src="../img/add.jpg" alt="add" width="100%;" style="margin-top:10px;" /></a></li>
          </ul>
          <div class="most-popluar">
           <ul><li>Related Documents</li></ul>
           <div class="box-container"><img src="../img/book.png" align="left" style="margin-right:10px;" /><span class="sub">Consulting and Website Development<br />
Agreement</span><br /><br />Lorem ipsum dolor sit amet, consec onsectetuer adipiscing onsectetuer... <div class="bor"></div></div>
           <div class="box-container"><img src="../img/book.png" align="left" style="margin-right:10px;" /><span class="sub">Consulting and Website Development<br />
Agreement</span><br /><br />Lorem ipsum dolor sit amet, consec onsectetuer adipiscing onsectetuer... <div class="bor"></div></div>
           <div class="box-container"><img src="../img/book.png" align="left" style="margin-right:10px;" /><span class="sub">Consulting and Website Development<br />
Agreement</span><br /><br />Lorem ipsum dolor sit amet, consec onsectetuer adipiscing onsectetuer... <div class="bor"></div></div>
           <div class="box-container"><img src="../img/book.png" align="left" style="margin-right:10px;" /><span class="sub">Consulting and Website Development<br />
Agreement</span><br /><br />Lorem ipsum dolor sit amet, consec onsectetuer adipiscing onsectetuer... <div class="bor"></div></div>
          </div>
          <!-- Begin Subscribe div --><!-- End sidebar div -->
</div>
        <!-- End main-content div -->
      </div>
      <!-- End inner wrapper div -->
    </div>
    <!-- End Container div -->
  </div>
  <!-- Emd wrapper div -->
</div>
<div class="bottom-footer" style="border-top:1px #CCCCCC solid;">
 <div class="data">
  <h2>Importent Links</h2>
  <div class="horizantalbar">
   <div class="column"><a href="#">Legal</a></div>
   <div class="column"><a href="#">Tax</a></div>
   <div class="column"><a href="#">Entertainment</a></div>
   <div class="column"><a href="#">Terms of Service</a></div>
  </div><!-- horizantalbar-->
  <div class="horizantalbar">
   <div class="column"><a href="#">Business</a></div>
   <div class="column"><a href="#">Real Estate</a></div>
   <div class="column"><a href="#">Health &amp; Fitness</a></div>
   <div class="column"><a href="#">Copyright</a></div>
  </div><!-- horizantalbar-->
  <div class="horizantalbar">
   <div class="column"><a href="#">Personal Finance</a></div>
   <div class="column"><a href="#">Current Events</a></div>
   <div class="column"><a href="#">Medicine</a></div>
   <div class="column"><a href="#">Privacy Policy</a></div>
  </div><!-- horizantalbar-->
  <div class="horizantalbar">
   <div class="column"><a href="#">Technology</a></div>
   <div class="column"><a href="#">Politics &amp; History</a></div>
   <div class="column"><a href="#">Conferences</a></div>
   </div>
  <!-- horizantalbar-->
  <div class="horizantalbar">
   <div class="column"><a href="#">Education</a></div>
   <div class="column"><a href="#">Guides</a></div>
   <div class="column"><a href="#">Art &amp; Literature</a></div>
   </div>
  <!-- horizantalbar-->
  <div class="horizantalbar">
   <div class="column"><a href="#">Jobs &amp; Careers</a></div>
   <div class="column"><a href="#">Science</a></div>
   <div class="column"><a href="#">Travel</a></div>
   </div>
  <!-- horizantalbar-->
 </div><!-- data-->
</div><!-- bottom-footer -->
<!-- Begin footer wrapper div -->

</body>
</html>
