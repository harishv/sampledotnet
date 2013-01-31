<div class="row">
	<header id="overview" class="jumbotron subhead">
		<h1><?php echo $this->lang->line("admin_doc_index_title"); ?></h1>
		<hr />
		<p class="lead"><?php echo $this->lang->line("admin_doc_index_desc"); ?></p>
	</header>
</div>
<div class="row jumbotron">
	<?php echo anchor(ADMINFOLDER . "/documents/categories_list", $this->lang->line("admin_doc_manager_categories"), array("class" => "btn btn-large btn-info span3 btn-span3")); ?>
	<?php echo anchor(ADMINFOLDER . "/documents/documents_list", $this->lang->line("admin_doc_manager_documents"), array("class" => "btn btn-large btn-inverse span3 btn-span3")); ?>
	<?php echo anchor(ADMINFOLDER . "/documents/sample_list", $this->lang->line("admin_doc_manager_samples"), array("class" => "btn btn-large btn-warning span3 btn-span3")); ?>
</div>