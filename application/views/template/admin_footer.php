<!--Body content - Ends-->
<?php /* ?>
</div>
</div>
</div>
<?php */ ?>
</div>
<div class="footer">
	<div class="pull-right">
		<span style="cursor: pointer; margin-right: 10px; display: block; position: absolute; right: 90px;"
			class="label label-inverse back-to-top"><i class="icon-hand-up icon-white"></i> Back to top</span>
	</div>
	<p>Sample.net by <b>Xpedia Digital</b></p>
	<p>
	<?php echo $this->lang->line("footer_follow_us"); ?>
	<?php echo anchor("https://twitter.com/", img(array('src' => '/img/twitter-32.png', 'title' => 'Twitter')), array ("target" => "_blank")); ?>
	<?php echo anchor("https://www.facebook.com/", img(array('src' => '/img/facebook-32.png', 'title' => 'facebook')), array ("target" => "_blank")); ?>
	<?php echo anchor("http://in.linkedin.com/", img(array('src' => '/img/linkedin-32.png', 'title' => 'Linkedin')), array ("target" => "_blank")); ?>
		<br />
		Maintained by <?php echo anchor("http://harishvarada.blogspot.com/", "harishvarada", array ("target" => "_blank")); ?>.
	</p>
</div>

</div>
<!-- End of Main-Container -->
<script type="text/javascript" src="<?php echo base_url("js"); ?>/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url("js"); ?>/prettify.js"></script>

<script type="text/javascript" src="<?php echo base_url("js"); ?>/docs.js"></script>
</body>
</html>
