<?php  if($this->session->userdata('comment_errors')!="") {
$errors=$this->session->userdata('comment_errors'); 
  $error_child = array('comment_errors'  => '', );
  $this->session->unset_userdata($error_child);
  
  }
?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

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
			<?php include_once 'template/prod_leftnav.php';?>
		<!-- End column 1 -->
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
<!-- You will also receive periodic <a class="email" href="#">emails and special offers</a>.-->
              </p>

              <p class="grey">
              <span><strong>Valid in:</strong><?php if(isset($country_names) && $country_names!= ''){  echo implode(', ',$country_names);}?></span>
              <em><strong class="flt-l">User Rating:</strong>
                <?php
            /*if($product_details[0]['product_rating'] != 0 ){
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
            } */
            ?>
			<div class="star" value="<?php echo $product_details[0]['id'];?>" datarating="<?php echo $product_details[0]['product_rating'];?>"></div>
            </em>
              </p>
              <p class="grey">
              <span>Report Invalid</span>
              <em><a id = "display_comments" href="#">(<?php if(isset($comments) && $comments !=''){ echo count($comments); } else echo "0";?>) comments</a></em> </p>
			  <p><a class="grab flt-r" href="#" onclick="grab_now('<?php echo $product_details[0]['id'];?> ','<?php echo $product_details[0]['grab_url'];?>')"  >grab it now!</a></p>
              <div class="hgt-15px wid_100"></div>
              <!-- <img alt="social" src="<?php echo base_url().'img/social1.jpg';?>"> -->
              <div class="social-networks-div hgt-15px wid_100">
                <span class='st_facebook_button' displayText='Facebook'></span>
                <span class='st_twitter_button' displayText='Tweet'></span>
                <span class='st_linkedin_button' displayText='LinkedIn'></span>
                <span class='st_googleplus_button' displayText='Share'></span>
                <span class='st_sharethis_button' displayText='ShareThis'></span>
                <span class='st_email_button' displayText='Email'></span>
              </div>
              <div class="hgt-15px wid_100"></div>
              <!-- <img alt="social" src="<?php echo base_url().'img/social2.jpg';?>"> -->
			<!-- comments section start-->
			<div id="normal_comments" style="display:none">
			<div class="comment"><p class="flt-r">
           
            </p>
            <h3>Enter your comments</h3> <?php //print($errors);?>
			<div id="errors_comments" class="errors_data"><?php echo (isset($errors)) ? $errors : '';?></div>
			<?php
					$attributes = array('id' => 'comments_data', 'name'=>'comments_data', 'method'=>'post');
				?>
				<?php echo form_open('product/user_comments/', $attributes); ?>
			<input type="hidden" name="prod_id" value="<?php echo $product_details[0]['id'];?>" />
            <textarea rows="3" class="clear mgn-15b" id="comment_area" name="comment_area"></textarea>
           	<input type="submit" name="submit" value="Submit" />
			</form>
            </div>
            <!-- comments -->
			 <?php if(isset($comments) && $comments !=''){
					foreach($comments as $key=>$values){ ?>
            <div class="comments">
			 
            <img src="images/img-comment.jpg" alt="img" />
            <p>
            <strong class="mgn-r">James JH   </strong> <strong class="mgn-r">|</strong>  <span>4 hours ago</span><br />
          			
					 <?php echo $values['comments'];  ?>
					
					
            </p>
            </div>
            <?php } } ?>
            </div>
			<div>
			<!-- comments section end
              <div class="hgt-15px wid_100">
                &nbsp;<fb:like href="<?php echo base_url()."/product/product_detail/".$product_details[0]['id'];?>" send="true" width="450" show_faces="true"></fb:like>
              </div>
              <div class="hgt-15px wid_100"></div>
              </div>
              <!-- End sample here -->
            </div>
            <!-- Begin comments here -->
            <!-- Facebook Comments Section -->
            <fb:comments href="<?php echo base_url()."/product/product_detail/".$product_details[0]['id'];?>" num_posts="3" width="540"></fb:comments>
            <!-- End comments here -->
            <!-- Begin tabs here -->
				<?php include_once 'template/prod_footer_carousel.php';?>
			<!-- End tabs here -->
            <!-- End column 2 -->
          </div>
          <!-- End content div -->
        </div>
       
        <!-- Begin sidebar div -->
		<?php include_once 'template/prod_rightnav.php';?>
	<!-- End sidebar div -->
        <!-- End main-content div -->
      </div>
      <!-- End inner wrapper div -->
