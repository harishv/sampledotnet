
      <!-- Begin main-content div -->
      <div class="flt-l wid_100" id="main-content">
        <!-- Begin content div -->
        <div class="flt-l" id="content">
          <!-- Begin column 1 -->
          <div class="col-1 bdr-1 flt-l mgn-r">
            <!-- Begin categories -->
            <div class="categories mgn-15b">
              <p class="head mgn-0"><span class="mgn-20l">Categories</span></p>
              <ul>
                
                <?php if(isset($category) && $category !=''){
                        foreach($category as $cat_id=>$cat_values){ ?>
                <li><a href="#"><?php echo $cat_values['prod_cat_name'];?></a></li>
                <?php } }?>

                
              </ul>
              <!-- End categories -->
            </div>
            <img class="mgn-10l mgn-15b" alt="ad" src="<?php echo base_url().'img/left-ad.jpg';?>">
            <!-- End column 1 -->
          </div>
          <!-- Begin column 2 -->
          <div class="col-2 flt-l">
          <p class="links">
          Home <img alt="blue" src="images/blue-bullet.jpg"> Computers <img alt="blue" src="<?php echo base_url().'img/blue-bullet.jpg';?>"> Kids  Computers
          </p>
            <!-- Begin sample here -->
            <div class="sample mgn-15b">
              <p class="head mgn-15b"> <span class="mgn-10l">Educational toys Learning Machine</span></p>
             <div class="computers">
              <img alt="computer" src="<?php echo base_url().'img/toy-computer.jpg';?>">
              <p>
              <strong>Educational Toys Learning Machine</strong><br>
              All moms deserve to be rewarded. If your baby could thank you, they’d never stop. Gifts to Grow gives you the rewards you deserve, simply by buying Pampers diapers and wipes. Earn points toward scooters, strollers, books, magazine subscriptions, gift cards, and even charitable donations. Join now and get 100 Free Points.<br><br>
You will also receive periodic <a class="email" href="#">emails and special offers</a>.
              </p>
              <p class="grey">
              <span><strong>Valid in:</strong> India, USA</span>
              <em><strong class="flt-l">User Rating:</strong><img alt="full" src="<?php echo base_url().'img/star-full.png';?>"> <img alt="full" src="images/star-full.png"> <img alt="full" src="images/star-full.png"> <img alt="full" src="<?php echo base_url().'img/star-full.png';?>"> <img alt="full" src="<?php echo base_url().'img/star-off.png';?>"> 
              </em>
              </p>
              <p class="grey">
              <span>Report Invalid</span>
              <em>(15) comments</em> </p>
              <p><a class="grab flt-r" href="#">grab it now!</a></p>
              <div class="hgt-15px wid_100"></div>
              <img alt="social" src="<?php echo base_url().'img/social1.jpg';?>">
              <div class="hgt-15px wid_100"></div>
              <img alt="social" src="<?php echo base_url().'img/social2.jpg';?>">
              <div class="hgt-15px wid_100"></div>
             
              </div>
              <!-- End sample here -->
            </div>
            <!-- Begin comments here -->
            <div class="comment"><p class="flt-r">
            <a href="#"><img class="flt-l" alt="facebook" src="<?php echo base_url().'img/facebook-login.jpg';?>"></a>
            <span class="flt-l">or</span>
            <a href="#"><img alt="login" src="<?php echo base_url().'img/login.jpg';?>"></a>
            
            </p>
            <h3>Enter your comments</h3>
            <textarea class="clear mgn-15b" rows="3"></textarea>
            <!-- End comments here -->
            </div>
            <!-- comments -->
            <div class="comments">
            <img alt="img" src="<?php echo base_url().'img/img-comment.jpg';?>">
            <p>
            <strong class="mgn-r">James JH   </strong> <strong class="mgn-r">|</strong>  <span>4 hours ago</span><br>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec aliquam, nisl in lacinia imperdiet, nisl turpis tristique neque, eu feugiat risus enim ac ipsum. Ut ultricies lectus venenatis tortor.
            </p>
            </div>
            <!-- comments -->
            <div class="comments">
            <img alt="img" src="<?php echo base_url().'img/img-comment.jpg';?>">
            <p>
            <strong class="mgn-r">James JH   </strong> <strong class="mgn-r">|</strong>  <span>4 hours ago</span><br>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec aliquam, nisl in lacinia imperdiet, nisl turpis tristique neque, eu feugiat risus enim ac ipsum. Ut ultricies lectus venenatis tortor.
            </p>
            </div>
            <!-- comments -->
            <div class="comments">
            <img alt="img" src="<?php echo base_url().'img/img-comment.jpg';?>">
            <p>
            <strong class="mgn-r">James JH   </strong> <strong class="mgn-r">|</strong>  <span>4 hours ago</span><br>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec aliquam, nisl in lacinia imperdiet, nisl turpis tristique neque, eu feugiat risus enim ac ipsum. Ut ultricies lectus venenatis tortor.
            </p>
            </div>
            <!-- Begin tabs here -->
            <div class="tabs">
              <ul>
                <li><a class="current" href="#">Beauty</a></li>
                <li><a href="#">Health</a></li>
                <li><a href="#">Kids</a></li>
                <li><a href="#">Pets</a></li>
                <li class="last"><a href="#">Games</a></li>
              </ul>
              <p> <span class="hgt-15px wid_100"></span> <img alt="huggies" src="<?php echo base_url().'img/huggies1.jpg';?>"><br>
                <span class="hgt-8px wid_100"></span> <strong>Ketchup &amp; Jams</strong><br>
                When you buy one bag
                M&amp;M’S Brand Pretzel
                Chocolate Candies 
                (9.9 oz. or larger). </p>
              <p> <span class="hgt-15px wid_100"></span> <img alt="horlicks" src="<?php echo base_url().'img/horlicks.jpg';?>"><br>
                <span class="hgt-15px wid_100"></span> <span class="hgt-8px wid_100"></span> <strong>Ketchup &amp; Jams</strong><br>
                When you buy one bag
                M&amp;M’S Brand Pretzel
                Chocolate Candies 
                (9.9 oz. or larger). </p>
              <p> <img alt="barbosol" src="<?php echo base_url().'img/barbosol.jpg';?>"><br>
                <strong>Ketchup &amp; Jams</strong><br>
                When you buy one bag
                M&amp;M’S Brand Pretzel
                Chocolate Candies 
                (9.9 oz. or larger). </p>
              <p class="last"> <img alt="coke" src="<?php echo base_url().'img/coke.jpg';?>"><br>
                <span class="hgt-15px wid_100"></span> <strong>Ketchup &amp; Jams</strong><br>
                When you buy one bag
                M&amp;M’S Brand Pretzel
                Chocolate Candies 
                (9.9 oz. or larger). </p>
            <iframe class="playground" src="slider.html"></iframe> 
              <!-- End tabs here -->
            </div>
            <!-- End column 2 -->
          </div>
          <!-- End content div -->
        </div>
        <!-- Begin sidebar div -->
        <div class="flt-r" id="sidebar">
          <!-- Begin search -->
          <div class="search">
            <input type="text" onfocus="this.value=''" value="search" class="sch">
            <br>
            <a class="grab flt-r">search</a>
            <!-- End search -->
          </div>
          <ul class="btn">
            <li><a href="#"><img alt="share a sample" src="<?php echo base_url().'img/share-a-sample.png';?>"></a></li>
          </ul>
          <p class="free-sample"> <img class="flt-r" alt="gift" src="images/gift.png"> Get free samples<br>
            0n <strong>Facebook</strong><br>
            <a href="#"><img alt="like" src="images/like.jpg"></a> </p>
          <ul class="btn">
            <li><a href="#"><img alt="follow us on twitter" src="<?php echo base_url().'img/follow-twitter.png';?>"></a></li>
            <li><a href="#"><img alt="add to circles" src="<?php echo base_url().'img/add-to-circles.png';?>"></a></li>
            <li><a href="#"><img alt="pintrest" src="<?php echo base_url().'img/pintrest.png';?>"></a></li>
          </ul>
          <!-- Begin Subscribe div -->
          <div class="subscribe"> <img class="mgn-15b" alt="free samples" src="<?php echo base_url().'img/free-samples.png';?>">
            <input type="text" onfocus="this.value=''" value="Enter Your Name" class="free">
            <input type="text" onfocus="this.value=''" value="Enter Your Email" class="free">
            <a class="subscribe-btn" href="#">&nbsp;</a>
            <!-- End Subscribe div -->
          </div>
          <img class="mgn-15b" alt="fab turbo" src="<?php echo base_url().'img/fap-turbo.jpg';?>"> <img alt="kaboom" src="<?php echo base_url().'img/kaboom.jpg';?>">
          <!-- End sidebar div -->
        </div>
        <!-- End main-content div -->
      </div>
      <!-- End inner wrapper div -->
   
