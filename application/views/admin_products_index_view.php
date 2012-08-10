<div class="row">
	<header id="overview" class="jumbotron subhead">
		<h1>Products Management System</h1>
		<hr />
		<p class="lead">This is the primary section, where we are going to manage all products related information.</p>
	</header>
</div>
<div class="row jumbotron">
	<?php echo anchor("", "Manager Categories", array("class" => "btn btn-large btn-primary span3 btn-span3")); ?>
	<?php echo anchor(ADMINFOLDER . "/products/products_list", "Manager Products", array("class" => "btn btn-large btn-success span3 btn-span3")); ?>
</div>