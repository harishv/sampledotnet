<!--Body content - Ends-->
</div>
<div class="footer">
	<div class="pull-right">
		<span style="cursor: pointer; margin-right: 10px; display: block; position: absolute; right: 90px;"
			class="label label-inverse back-to-top"><i class="icon-hand-up icon-white"></i> <?php echo $this->lang->line('footer_back_to_top'); ?></span>
	</div>
	<p><?php echo $this->lang->line('footer_powered_by') . " <b>" . $this->lang->line('xpedient_digital')."</b>"; ?></p>
	<p>
		<?php echo $this->lang->line("footer_follow_us"); ?>
		<?php echo anchor("https://twitter.com/", img(array('src' => '/img/twitter-32.png', 'title' => $this->lang->line('twitter'))), array ("target" => "_blank")); ?>
		<?php echo anchor("https://www.facebook.com/", img(array('src' => '/img/facebook-32.png', 'title' => $this->lang->line('facebook'))), array ("target" => "_blank")); ?>
		<?php echo anchor("http://in.linkedin.com/", img(array('src' => '/img/linkedin-32.png', 'title' => $this->lang->line('linkedin'))), array ("target" => "_blank")); ?>
		<br />
		<?php echo $this->lang->line('footer_maintained_by') . " " . anchor("http://harishvarada.blogspot.com/", "harishvarada", array ("target" => "_blank")); ?>.
	</p>
</div>

</div>
<!-- End of Main-Container -->
</body>
</html>