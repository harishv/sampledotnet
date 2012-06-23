			<!-- End inner wrapper div -->
			</div>
		<!-- End Container div -->
		</div>
	<!-- Emd wrapper div -->
	</div>
<!-- Begin footer wrapper div -->
<div id="footer-wrapper">
	<!-- Begin container div -->
	<div class="container">
		<div class="footer">
			<ul id="utility">
				<li>
					<?php echo anchor("#", $this->lang->line("nav_categories")); ?>
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
			<p class="copy">&copy; <?php echo $this->lang->line("footer_copy_year") . " " . $this->lang->line("footer_brand_name"); ?></p>
		</div>
	<!-- End container div -->
	</div>
<!-- End footer wrapper div -->
</div>
<script src="<?php echo base_url("js"); ?>/jquery.jcarousel.min.js"></script>

<script type="text/javascript" src="<?php echo base_url("js"); ?>/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url("js"); ?>/prettify.js"></script>
<script type="text/javascript" src="<?php echo base_url("js"); ?>/docs.js"></script>
</body>
</html>