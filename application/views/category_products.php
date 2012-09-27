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
			<?php include_once 'template/prod_leftnav.php';?>
		<!-- End column 1 -->
  
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

		<?php if($product_values['only_today'] == 1){ ?>
          <img src="<?php echo base_url(); ?>img/only-today.png" alt="only today" class="only-today" />
		<?php } ?>
          
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
         
          <a class="grab flt-r" href="#" onclick="grab_now('<?php echo $product_values['id'];?> ','<?php echo $product_values['grab_url'];?>')">grab it now!</a>
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
<?php if(!$render){ ?>
</div><!-- for the refreshing issue  end-->
<?php } ?>
    
