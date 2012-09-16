<link rel="stylesheet" type="text/css" href="<?php echo base_url("css"); ?>/msdropdown/dd.css" />
<script type="text/javascript" src="<?php echo base_url("js"); ?>/msdropdown/jquery.dd.js"></script>
<p class="bg-icon">
	<?php echo img(array("src" => "/img/nav-icon.jpg", "alt" => $this->lang->line("nav"))); ?>
</p>
<ul id="main-nav">
	<li>
		<?php echo anchor(base_url(), $this->lang->line("nav_categories"), array ("class" => "current")); ?>
		<ul>
			<?php
				if(isset($category) && $category !='') {
					foreach($category as $cat_id=>$cat_values) {
						$sub_cat = $this->category_model->get_sub_cat($cat_values['id']); ?>
						<li class="last">
							<a href="<?php if($sub_cat =='')echo base_url().'category/get_category_product/'.$cat_values['id']; else echo "#";?>"><?php echo $cat_values['prod_cat_name'];?></a>
							<?php if(isset($sub_cat) && $sub_cat !='') { ?>
							<ol>
								<?php foreach($sub_cat as $sub_cat_id=>$sub_cat_values) { ?>
								<li>
									<a href="<?php echo base_url().'category/get_category_product/'.$sub_cat_values['id'];?>"><?php echo $sub_cat_values['prod_cat_name'];?></a>
								</li>
								<?php } ?>
							</ol>
							<?php } ?>
						</li>
				<?php }
				} ?>
		</ul>
  	</li>
	<li>
		<?php echo anchor("", $this->lang->line("nav_samples")); ?>
	</li>
	<li>
		<?php //echo anchor("#", $this->lang->line("nav_suggest_a_samples")); ?>
		<a href="#user_profile" name="modal" class='iframe'><?php echo "user Profile";?> </a>
	</li>
	<!--
	<li>
		<?php echo anchor("#", $this->lang->line("nav_suggest_a_samples")); ?>
	</li>
	-->
	<li class="last">
		<?php echo anchor("#", $this->lang->line("nav_contact_us")); ?>
	</li>
</ul>
<p class="login-here"><span><?php
	$user_info = $this->session->userdata('user');
	?>
	<a href="#dialog" name="modal" class='iframe' ><?php if(isset($user_info) && $user_info !=''){ $attributes=array('id'=>'signout'); echo anchor( 'login/logout', "(Sign Out)", $attributes );}else { echo $this->lang->line("nav_login")."!"; }?></a></span>
	<?php

	if($user_info !=''){ ?>
		 <span class="iframe"><?php echo "welcome,"." ".ucfirst($user_info['first_name']);  ?></span>
	<?php }else{ ?>
		<a href="#register" name="modal" class='iframe'><?php echo $this->lang->line("nav_become_a_member"); ?></a>
	<?php }	 ?>

	</a>
</p>


<p class="bg-icon clr-none">
	<?php echo img(array("src" => "/img/rss.png", "alt" => $this->lang->line("nav_rss"))); ?>
</p>
<div class="selector">
	<!-- <iframe src="<?php echo base_url(); ?>iframes/select"></iframe> -->
    <form name="myform" id="myform"  action="getvalue.php" enctype="multipart/form-data" method="post">

        <select style="width:208px">
          <option value="calendar" selected="selected" title="<?php echo base_url("img"); ?>/india-flag.jpg">Choose Your Country</option>
          <option value="shopping_cart" title="<?php echo base_url("img"); ?>/india-flag.jpg">Shopping Cart</option>
        </select>

    </form>
     <script language="javascript">
    $(document).ready(function(e) {
    try {
    $("body select").msDropDown();
    } catch(e) {
    alert(e.message);
    }
    });
    </script>
</div>
