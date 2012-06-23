<p class="bg-icon">
	<?php echo img(array("src" => "/img/nav-icon.jpg", "alt" => $this->lang->line("nav"))); ?>
</p>
<ul id="main-nav">
	<li>
		<?php echo anchor(base_url(), $this->lang->line("nav_categories"), array ("class" => "current")); ?>
    	<ul>
			<li>
				<a href="#">Mobiles</a>
				<a href="#">Cameras</a>
				<a href="#">Computers</a>
				<a href="#">Gadgets</a>
				<a href="#">Automobiles</a>
				<a href="#">Kitchen</a>
				<a href="#">Jewellery</a>
			</li>
			<li class="last">
				<a href="#">Gifts</a>
				<a href="#">Fashion</a>
				<a href="#">Health</a>
				<a href="#">Home Decor</a>
				<a href="#">Sports</a>
			</li>
		</ul>
  	</li>
	<li>
		<?php echo anchor("#", $this->lang->line("nav_samples")); ?>
	</li>
	<li>
		<?php echo anchor("#", $this->lang->line("nav_suggest_a_samples")); ?>
	</li>
	<li class="last">
		<?php echo anchor("#", $this->lang->line("nav_contact_us")); ?>
	</li>
</ul>
<p class="login-here">
	<span><?php echo $this->lang->line("nav_login")."!"; ?></span>
	<?php echo $this->lang->line("nav_become_a_member"); ?>
</p>
<p class="bg-icon clr-none">
	<?php echo img(array("src" => "/img/rss.png", "alt" => $this->lang->line("nav_rss"))); ?>
</p>
<div class="selector">
	<iframe src="<?php echo base_url(); ?>iframes/select"></iframe>
</div>