<script type="text/javascript">var switchTo5x=false;</script>

<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>

<script type="text/javascript">stLight.options({publisher: "18f4acdf-af25-4d39-b663-78b081a6f60e"}); </script>

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
                foreach($category as $cat_id=>$cat_values){
                  $sub_cat = $this->category_model->get_sub_cat($cat_values['id']);?>
          <li>

            <a href="<?php if($sub_cat =='')echo base_url().'category/get_category_product/'.$cat_values['id']; else echo "#";?>"><?php echo $cat_values['prod_cat_name'];?></a>


          <?php  if(isset($sub_cat) && $sub_cat !=''){ ?>
              <ol>
                <?php foreach($sub_cat as $sub_cat_id=>$sub_cat_values){ ?>

                  <li> <a href="<?php echo base_url().'category/get_category_product/'.$sub_cat_values['id'];?>"><?php echo $sub_cat_values['prod_cat_name'];?></a> </li>

            <?php   } ?>
            </ol>
              <?php } //else echo "No Product Avaiable";?>
              </li>
          <?php } } //else echo "No Product Avaiable";?>


              </ul>
              <!-- End categories -->
            </div>
            <img class="mgn-10l mgn-15b" alt="ad" src="<?php echo base_url().'img/left-ad.jpg';?>">
            <!-- End column 1 -->
          </div>
          <!-- Begin column 2 -->
          <div class="col-2 flt-l">
          <p class="links">
          Home <img alt="blue" src="<?php echo base_url().'img/blue-bullet.jpg';?>"><?php if(isset($bread_crum) && $bread_crum !='')echo $bread_crum['cat_name'];?> <?php if($bread_crum['cat_name'] !='') { ?><img alt="blue" src="<?php echo base_url().'img/blue-bullet.jpg';?>">  <?php } ?><?php  if(isset($bread_crum) && $bread_crum !='') echo $bread_crum['sub_cat_name'];?>
          </p>

            <!-- Begin sample here -->
            <div class="sample mgn-15b">
              <p class="head mgn-15b"> <span class="mgn-10l"><?php echo $product_details[0]['name'];?></span></p>
             <div class="computers">
              <?php //$image_properties = array('src' => PROD_IMG_PATH.$product_details[0]['image']);echo img($image_properties);?>
              <img src="<?php echo base_url().PROD_IMG_PATH.$product_details[0]['image'];?>" width='215' height='215' />
              <p>
              <strong><?php echo $product_details[0]['name'];?></strong><br>
             <?php echo $product_details[0]['description'];?><br><br>
You will also receive periodic <a class="email" href="#">emails and special offers</a>.
              </p>

              <p class="grey">
              <span><strong>Valid in:</strong><?php if(isset($country_names) && $country_names!= ''){  echo implode(', ',$country_names);}?></span>
              <em><strong class="flt-l">User Rating:</strong>
                <?php
            if($product_details[0]['product_rating'] != 0 ){
              for($i=1 ;$i<=$product_details[0]['product_rating'];$i++){ ?>
              <img src="<?php echo base_url().'img/star-full.png';?>" alt="full" />
              <?php }
            }else{
              for($i=1 ;$i<=5;$i++){ ?>
              <img src="<?php echo base_url().'img/star-off.png';?>" alt="full"  onclick="prod_rating(<?php echo $product_details[0]['id'];?>,<?php echo $i;?>);"/>
              <input type="hidden" name="rating_vote" value="<?php echo $i;?>" />
              <?php }
            }

            if($product_details[0]['product_rating'] != 0 && $product_details[0]['product_rating'] < 5){
              for($i=1;$i<=(5-$product_details[0]['product_rating']);$i++){ ?>
              <img src="<?php echo base_url().'img/star-off.png';?>" alt="full" onclick="prod_rating(<?php echo $product_details[0]['id'];?>,<?php echo $product_details[0]['product_rating'] +$i; ?>);"/>
              <input type="hidden" name="rating_vote" value="<?php echo $product_details[0]['product_rating'] +$i; ?>" />
              <?php }
            }
            ?>
              </em>
              </p>
              <p class="grey">
              <span>Report Invalid</span>
              <em>(15) comments</em> </p>
              <p><a class="grab flt-r" href="<?php echo $product_details[0]['grab_url'];?>">grab it now!</a></p>
              <div class="hgt-15px wid_100"></div>
              <!-- <img alt="social" src="<?php echo base_url().'img/social1.jpg';?>"> -->
              <div class="hgt-15px wid_100">
                <span class='st_facebook_button' displayText='Facebook'></span>
                <span class='st_twitter_button' displayText='Tweet'></span>
                <span class='st_linkedin_button' displayText='LinkedIn'></span>
                <span class='st_googleplus_button' displayText='Share'></span>
                <span class='st_sharethis_button' displayText='ShareThis'></span>
                <span class='st_email_button' displayText='Email'></span>
              </div>
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

