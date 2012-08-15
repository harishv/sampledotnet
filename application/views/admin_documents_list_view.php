<script type="text/javascript"
	src="<?php echo base_url("js"); ?>/jquery.dataTables.js"></script>

<script
	type="text/javascript"
	src="<?php echo base_url("js"); ?>/DT_bootstrap.js"></script>

<script type="text/javascript">
/* Table initialisation */
$(document).ready(function() {
	$('#fb_likes_list').dataTable( {
		"sDom": "<'row'<'span6'l><'span6'f>r>t<'row'<'span6'i><'span6'p>>",
		"sPaginationType": "bootstrap",
		"oLanguage": {
			"sLengthMenu": "_MENU_ records per page"
		}
	} );
} );

</script>

<div class="row">
	<div class="pull-right">
		<?php echo anchor(ADMINFOLDER . "/documents/documents_manage", '<i class="icon-plus icon-white"></i> '.'<b>Add</b>', array ("class" => "btn btn-small btn-danger")); ?>
	</div>
	<pre><?php print_r($documents); ?></pre>
</div>