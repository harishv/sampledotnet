<link rel="stylesheet" type="text/css" href="<?php echo base_url("css"); ?>/msdropdown/dd.css" />
<script type="text/javascript" src="<?php echo base_url("js"); ?>/msdropdown/jquery.dd.js"></script>

<script type="text/javascript">var switchTo5x=false;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "18f4acdf-af25-4d39-b663-78b081a6f60e"}); </script>

<p class="bg-icon">
	<span class='st_sharethis_large'></span>
</p>
<ul id="main-nav">
	<li class="last">
		<?php
			if (!isset($site_type) || $site_type == '') {
				$current_class = 'current';
			} else {
				$current_class = '';
			}
			echo anchor(base_url(), $this->lang->line("nav_products"), array ("class" => $current_class)); ?>
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
	<!--
	<li class="last">
		<?php
			if (isset($site_type) && $site_type == 'docs') {
				$current_class = 'current';
			} else {
				$current_class = '';
			}
			echo anchor(base_url() . 'documents', $this->lang->line("nav_documents"), array ("class" => $current_class)); ?>
		<?php if(isset($doc_category) && $doc_category !='') { ?>
		<ul>
			<?php
				foreach($doc_category as $cat_id => $cat_values) {
						$sub_cat = $this->docs_category_model->get_sub_cat($cat_values['id']); ?>
						<li class="last">
							<a href="<?php if($sub_cat =='')echo base_url().'docs_category/get_category_documents/'.$cat_values['id']; else echo "#";?>"><?php echo $cat_values['doc_cat_name'];?></a>
							<?php if(isset($sub_cat) && $sub_cat !='') { ?>
							<ol>
								<?php foreach($sub_cat as $sub_cat_values) { ?>
								<li>
									<a href="<?php echo base_url().'docs_category/get_category_documents/'.$sub_cat_values['id'];?>"><?php echo $sub_cat_values['doc_cat_name'];?></a>
								</li>
								<?php } ?>
							</ol>
							<?php } ?>
						</li>
			<?php } ?>
		</ul>
		<?php } ?>
	</li>
	-->
</ul>
<p class="login-here">
	<span style="display: block;">
		<?php $user_info = $this->session->userdata('user');
			//print_r($user_info);
			if(isset($user_info) && $user_info !=''){
				$attributes = array('id' => 'signout', 'class' => 'iframe');
				echo anchor( 'login/logout', "(" . $this->lang->line('nav_signout') .")", $attributes );
			} else { ?>
			<a href="#dialog" name="modal" class='iframe'><?php echo $this->lang->line("nav_login") . "!"; ?></a>
		<?php } ?>
	</span>
	<?php
		if(isset($user_info) && $user_info !='') { ?>
		<?php echo "Welcome, "; ?>
			<a href="#user_profile" name="modal" class='iframe'><?php if(isset($user_info['first_name']) && $user_info['first_name'] != '') echo ucfirst($user_info['first_name']);  ?></a>
		 <!-- <a href="#user_profile" name="modal" class='iframe'><?php //echo "user Profile";?> </a> -->
	<?php
		unset($user_info);
		}else{ ?>
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

<script type="text/javascript">
function setcountry(catid) {
	var country_id = document.countries_list.get_country.options[document.countries_list.get_country.selectedIndex].value;

	var request_type = base_url.substr(0, 5);

	if (request_type != 'https') {
		request_type = 'http';
	}

	var redirect_url = request_type + '://<?php echo $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"]; ?>';

	if (redirect_url.substr(redirect_url.length - 4, 4) == '.php') {
		redirect_url = redirect_url.replace('.php', '.html');
	}
	redirect_url = redirect_url.replace('.php', '');

	var data = {
		'country_id': country_id
	};

	$.ajax({
		url: base_url + 'index/set_country',
		type: 'POST',
		data: data,
		success: function(res) {
			if (res == 'succuss') {
				window.location = redirect_url;
				return true;
			}
			return false;
		}
	});
}
</script>

<div class="selector">
	<form name="countries_list" id="countries_list"  action="getvalue.php" enctype="multipart/form-data" method="post">
		<input hidden name="cat_id" id="cat_id" value="<?php if(isset($catid) && $catid !='') echo $catid ;?>" />
		<input hidden id="selected_country_id" value="226"><!-- United States default country id -->
		<select style="width:208px" name ="get_country" onchange="return setcountry();">
		  <option value="" selected="selected" title="">Choose Your Country</option>
		  <?php if (count($countries) > 0) {
		  			if($this->session->userdata('selected_country')){
		  				$selected_country = $this->session->userdata('selected_country');
		  			} else {
		  				$selected_country = 226; // United States ID in DB.

		  				$newdata = array( 'selected_country'  => $selected_country );
						$this->session->set_userdata($newdata);
		  			}
					foreach ($countries as $country) {
						$selected = ($country['id'] == $selected_country) ? 'selected="selected"' : '';
						?>
					<option value="<?php echo $country["id"]; ?>" title="<?php echo base_url("img") . "/" . strtolower($country['code']) . "-flag.png"; ?>" <?php echo $selected; ?>><?php echo $country["name"]; ?></option>
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
