<?php 
if(!$render){

?>
<script>
var base_url = "<?php echo base_url();?>";/* global variable for the root path */

</script>
<script type="text/javascript" src="<?php echo base_url("js"); ?>/category.js"></script>
<div id="replace"><!-- for the refreshing issue  start-->
<?php }?>  

<script type="text/javascript">var switchTo5x=false;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "18f4acdf-af25-4d39-b663-78b081a6f60e"}); </script>


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
              <?php } ?>
              </li>
          <?php } } ?>
          
              </ul>
              <!-- End categories -->
            </div>
            <img class="mgn-10l mgn-15b" alt="ad" src="<?php echo base_url().'img/left-ad.jpg';?>">
            <!-- End column 1 -->
          </div>
          <!-- Begin column 2 -->
          <div class="col-2 flt-l">
          <p class="links">
            <?php //echo "<pre>";print_r($bread_crum);exit;?>
          Home <img alt="blue" src="<?php echo base_url().'img/blue-bullet.jpg';?>"><?php if(isset($bread_crum) && $bread_crum !='')echo $bread_crum['cat_name'];?> <?php if($bread_crum['cat_name'] !='') { ?><img alt="blue" src="<?php echo base_url().'img/blue-bullet.jpg';?>">  <?php } ?><?php  if(isset($bread_crum) && $bread_crum !='') echo $bread_crum['sub_cat_name'];?>
          </p>
           <div class="sample mgn-15b">
              <p class="head mgn-0"> 
                 <?php $image_properties = array('src' => 'img/time-icon.png','alt' => 'time','class'=>'flt-l mgn-10l mgn-r');
                echo img($image_properties);?>
                Today's Free Samples <em>We have 127 Free Coupons for you today</em></p>
           <?php if(isset($product) && $product!=''){
            foreach ($product as $product_key=>$product_values){ ?>
        <!-- Begin Samples here -->
        <div class="samples">
          <img src="<?php echo base_url(); ?>img/only-today.png" alt="only today" class="only-today" />
          
          <a href="<?php echo base_url().'product/product_detail/'.$product_values['id'];?>"><img src="<?php echo base_url().PROD_THUMB_IMG_PATH.'thumb_'.$product_values['image'];?>"  width ='54' height ='63' class='small'/>
          <p class="pdg_10px"> <a href="<?php echo base_url().'product/product_detail/'.$product_values['id'];?>"><strong><?php echo $product_values['name'];?></strong></a>
            <br/><?php echo $product_values['description'];?>
          </p>//
          <br />
         <div class="star" id="ratings">
            <?php 
            if($product_values['product_rating'] != 0 ){
              for($i=1 ;$i<=$product_values['product_rating'];$i++){ 
                $image_properties = array('src' => 'img/star-full.png','alt' => 'full'); echo img($image_properties);
               } 
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
            <span class='st_facebook'></span>
            <span class='st_twitter'></span>
            <span class='st_googleplus'></span>
            <span class='st_sharethis'></span>
          </div>
          <!-- End Samples here -->
        </div>
      
        <?php } } else{

                  echo "No Products are avaiable";
                }?>

                <div class="pages">
                  <?php echo $this->pagination->create_links();?>
                </div> 
        <!-- End sample here -->
      </div>

          <!-- Begin tabs here -->
      <div class="tabs">
        <ul>
          <li>
            <a href="#" class="current">Beauty</a>
          </li>
          <li>
            <a href="#">Health</a>
          </li>
          <li>
            <a href="#">Kids</a>
          </li>
          <li>
            <a href="#">Pets</a>
          </li>
          <li class="last">
            <a href="#">Games</a>
          </li>
        </ul>

        <?php echo $slider;?>
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
      <li>
        <a href="#">
          <?php $image_properties = array('src' => 'img/share-a-sample.png','alt' => 'share a sample');
                echo img($image_properties);?>
          
        </a>
      </li>
    </ul>
          </ul>
    <p class="free-sample">
      <?php $image_properties = array('src' => 'img/gift.png','alt' => 'gift','class'=>'flt-r');
                echo img($image_properties);?>
      
      Get free samples
      <br />
      0n
      <strong>Facebook</strong>
      <br />
      <a href="#">
        <?php $image_properties = array('src' => 'img/like.jpg','alt' => 'like');
                echo img($image_properties);?>
        
      </a>
    </p>
          <ul class="btn">
      <li>
        <a href="#">
          <?php $image_properties = array('src' => 'img/follow-twitter.png','alt' => 'follow us on twitter');
                echo img($image_properties);?>
          
        </a>
      </li>
      <li>
        <a href="#">
          <?php $image_properties = array('src' => 'img/add-to-circles.png','alt' => 'add to circles');
                echo img($image_properties);?>
          
          
        </a>
      </li>
      <li>
        <a href="#">
          <?php $image_properties = array('src' => 'img/pintrest.png','alt' => 'pintrest');
                echo img($image_properties);?>
          
        </a>
      </li>
    </ul>
          <!-- Begin Subscribe div -->
          <div class="subscribe"> <img class="mgn-15b" alt="free samples" src="<?php echo base_url().'img/free-samples.png';?>">
            <input type="text" onfocus="this.value=''" value="Enter Your Name" class="free">
            <input type="text" onfocus="this.value=''" value="Enter Your Email" class="free">
            <a class="subscribe-btn" href="#">&nbsp;</a>
            <!-- End Subscribe div -->
          </div>
         
          <?php $image_properties = array('src' => 'img/fap-turbo.jpg','alt' => 'fab turbo','class'=>'mgn-15b');
                echo img($image_properties);?>
          <?php $image_properties = array('src' => 'img/kaboom.jpg','alt' => 'kaboom');
                echo img($image_properties);?>
          <!-- End sidebar div -->
        </div>
        <!-- End main-content div -->
      </div>
<?php if(!$render){ ?>
</div><!-- for the refreshing issue  end-->
<?php } ?>
    