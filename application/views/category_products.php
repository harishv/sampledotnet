<script>
var base_url = "<?php echo base_url();?>";/* global variable for the root path */

</script>
<script type="text/javascript" src="<?php echo base_url("js"); ?>/category.js"></script>

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
                <li>
                  <a href="<?php echo base_url().'index/get_category_product/'.$cat_values['id'];?>"><?php echo $cat_values['prod_cat_name'];?></a>
                </li>
                <?php } }else{

                  echo "No Products are avaiable";
                }?>
          
              </ul>
              <!-- End categories -->
            </div>
            <img class="mgn-10l mgn-15b" alt="ad" src="<?php echo base_url().'img/left-ad.jpg';?>">
            <!-- End column 1 -->
          </div>
          <!-- Begin column 2 -->
          <div class="col-2 flt-l">
          <p class="links">
          Home <img alt="blue" src="<?php echo base_url().'img/blue-bullet.jpg';?>"> Computers <img alt="blue" src="<?php echo base_url().'img/blue-bullet.jpg';?>"> Kids  Computers
          </p>
           <div class="sample mgn-15b">
              <p class="head mgn-0"> <img class="flt-l mgn-10l mgn-r" alt="time" src="<?php echo base_url().'images/time-icon.png';?>"> Today's Free Samples <em>We have 127 Free Coupons for you today</em></p>
           <?php if(isset($product) && $product!=''){
            foreach ($product as $product_key=>$product_values){ ?>
        <!-- Begin Samples here -->
        <div class="samples">
          <img src="<?php echo base_url().'img/only-today.png';?>" alt="only today" class="only-today" />
          <a href="<?php echo base_url().'product';?>"><img src="<?php echo base_url().'img/huggie-small.png';?>" alt="huggies" class="small" /><a/>
          <p class="pdg_10px"> <a href="<?php echo base_url().'product';?>"><strong><?php echo $product_values['name'];?></strong></a>
            <br/><?php echo $product_values['description'];?>
          </p>
          <br />
         <div class="star" id="ratings">
            <?php 
            if($product_values['product_rating'] != 0 ){
              for($i=1 ;$i<=$product_values['product_rating'];$i++){ ?>
              <img src="<?php echo base_url(); ?>img/star-full.png" alt="full" />
              <?php } 
            }else{
              for($i=1 ;$i<=5;$i++){ ?>
              <img src="<?php echo base_url(); ?>img/star-off.png" alt="full"  onclick="prod_rating(<?php echo $product_values['id'];?>,<?php echo $i;?>);"/>
              <input type="hidden" name="rating_vote" value="<?php echo $i;?>" /> 
              <?php } 
            }

            if($product_values['product_rating'] != 0 && $product_values['product_rating'] < 5){
              for($i=1;$i<=(5-$product_values['product_rating']);$i++){ ?>
              <img src="<?php echo base_url(); ?>img/star-off.png" alt="full" onclick="prod_rating(<?php echo $product_values['id'];?>,<?php echo $product_values['product_rating'] +$i; ?>);"/>
              <input type="hidden" name="rating_vote" value="<?php echo $product_values['product_rating'] +$i; ?>" />
              <?php }
            }
            ?>
            
          </div>
          <div class="clear"></div>
          <a class="grab flt-r">grab it now!</a>
          <div class="social clear">
            <a href="#">
              <img src="<?php echo base_url().'img/facebook.jpg';?>" alt="facebook" />
            </a>
            <a href="#">
              <img src="<?php echo base_url().'img/skype.jpg';?>" alt="skype" />
            </a>
            <span class="share">
              <a href="#">
                <img src="<?php echo base_url().'img/share.jpg';?>" alt="share" class="flt-r" />
              </a>
            </span>
          </div>
          <!-- End Samples here -->
        </div>
      
        <?php } } else{

                  echo "No Products are avaiable";
                }?>

                <div class="pages">
        <!--<a href="#">&lt;</a>
          <a href="#">1</a>
          <a href="#">2</a>
          <a href="#">3</a>
          <a href="#" class="current">4</a>
          <a href="#">5</a>
          <span class="more">
            <strong>&hellip;</strong>
          </span>
          <a href="#">10</a>
          <a href="#">20</a>
          <a href="#">30</a>
          <a href="#">&gt;</a>  -->
          <?php echo $this->pagination->create_links();?>
        </div> 
        <!-- End sample here -->
      </div>

        
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
          <p class="free-sample"> <img class="flt-r" alt="gift" src="<?php echo base_url().'img/gift.png';?>"> Get free samples<br>
            0n <strong>Facebook</strong><br>
            <a href="#"><img alt="like" src="<?php echo base_url().'img/like.jpg';?>"></a> </p>
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
          <img class="mgn-15b" alt="fab turbo" src="images/fap-turbo.jpg"> <img alt="kaboom" src="<?php echo base_url().'img/kaboom.jpg';?>">
          <!-- End sidebar div -->
        </div>
        <!-- End main-content div -->
      </div>
    