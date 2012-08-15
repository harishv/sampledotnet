<div class="row">
	<header id="overview" class="jumbotron subhead">
		<h1>Documents Management System</h1>
		<hr />
		<p class="lead">This is the primary section, where we are going to manage all documents related information.</p>
	</header>
</div>
<div class="row jumbotron">
	<?php echo anchor("", "Manager Categories", array("class" => "btn btn-large btn-primary span3 btn-span3")); ?>
	<?php echo anchor(ADMINFOLDER . "/documents/documents_list", "Manager Documents", array("class" => "btn btn-large btn-warning span3 btn-span3")); ?>
</div>