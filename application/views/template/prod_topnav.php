<link rel="stylesheet" type="text/css" href="<?php echo base_url("css"); ?>/msdropdown/dd.css" />
<script type="text/javascript" src="<?php echo base_url("js"); ?>/msdropdown/jquery.dd.js"></script>

<script type="text/javascript">var switchTo5x=false;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "18f4acdf-af25-4d39-b663-78b081a6f60e"}); </script>

<p class="bg-icon">
	<span class='st_sharethis_large'></span>
	<?php //echo img(array("src" => "/img/nav-icon.jpg", "alt" => $this->lang->line("nav"))); ?>
</p>
<ul id="main-nav">
	<li>
		<?php echo anchor(base_url(), $this->lang->line("nav_products"), array ("class" => "current")); ?>
		<ul>
			<?php
				if(isset($category) && $category !='') {
					foreach($category as $cat_id=>$cat_values) {
						$sub_cat = $this->category_model->get_sub_cat($cat_values['id']); ?>
						<li class="last">
							<a href="<?php if($sub_cat =='')echo base_url().'category/get_category_product/'.$cat_values['id']; else echo "#";?>"><?php echo $cat_values['prod_cat_name'];?></a>
							<?php if(isset($sub_cat) && $sub_cat !='') { ?>
							<ol>
								<?php foreach($sub_cat as $sub_cat_values) { ?>
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
	<li class="last">
		<?php echo anchor("#", $this->lang->line("nav_documents")); ?>
	</li>
</ul>
<p class="login-here">
	<span style="display: block;">
		<?php $user_info = $this->session->userdata('user');
			if(isset($user_info) && $user_info !=''){
				$attributes = array('id' => 'signout', 'class' => 'iframe');
				echo anchor( 'login/logout', "(" . $this->lang->line('nav_signout') .")", $attributes );
			} else { ?>
			<a href="#dialog" name="modal" class='iframe'><?php echo $this->lang->line("nav_login") . "!"; ?></a>
		<?php } ?>
	</span>
	<?php
		if($user_info !='') { ?>
		<?php echo "Welcome, "; ?>
			<a href="#user_profile" name="modal" class='iframe'><?php echo ucfirst($user_info['first_name']);  ?></a>
		 <!-- <a href="#user_profile" name="modal" class='iframe'><?php //echo "user Profile";?> </a> -->
	<?php }else{ ?>
		<a href="#register" name="modal" class='iframe'><?php echo $this->lang->line("nav_become_a_member"); ?></a>
	<?php }	 ?>
</p>

<!-- <p class="bg-icon clr-none">
	<?php echo img(array("src" => "/img/rss.png", "alt" => $this->lang->line("nav_rss"))); ?>
</p> -->

<?php
$url = $_SERVER['REQUEST_URI'];
$url = explode('/', $url);
$catid = end($url);
?>

<div class="selector">
	<form name="myform" id="myform"  action="getvalue.php" enctype="multipart/form-data" method="post">
		<input hidden name="cat_id" id="cat_id" value="<?php if(isset($catid) && $catid !='') echo $catid ;?>" />
		<select style="width:208px" name ="get_country" onchange = "getdata();">
		  <option value="calendar" selected="selected" title="<?php echo base_url("img"); ?>/india-flag.jpg">Choose Your Country</option>
		  <?php if (count($countries) > 0) {
					foreach ($countries as $country) { ?>
					<option value="<?php echo $country["id"]; ?>" title="<?php echo base_url("img"); ?>/india-flag.jpg"><?php echo $country["name"]; ?></option>
			  <?php }
				} ?>
		</select>

	</form>
	<script language="javascript">
	$(document).ready(function(e) {
		try {
			$("body select").msDropDown();
		} catch (e) {
			alert(e.message);
		}
	});
	</script>
</div>
