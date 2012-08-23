<div class="row">
	<header id="overview" class="jumbotron subhead">
		<h1><?php echo $this->lang->line("admin_prod_index_title"); ?></h1>
		<hr />
		<p class="lead"><?php echo $this->lang->line("admin_prod_index_desc"); ?></p>
	</header>
</div>
<div class="row jumbotron">
	<?php echo anchor("", $this->lang->line("admin_prod_manager_categories"), array("class" => "btn btn-large btn-primary span3 btn-span3")); ?>
	<?php echo anchor(ADMINFOLDER . "/products/products_list", $this->lang->line("admin_prod_manager_products"), array("class" => "btn btn-large btn-success span3 btn-span3")); ?>
</div>