<script type="text/javascript"
	src="<?php echo base_url("js"); ?>/jquery.dataTables.js"></script>

<script
	type="text/javascript"
	src="<?php echo base_url("js"); ?>/DT_bootstrap.js"></script>


<div class="row">
	<div class="span8">


		<fieldset>
			<legend>
				<?php echo $this->lang->line('admin_sample_view') ; ?>
			
			</legend>

			<?php if (isset($errors)) { ?>
				<div class="alert alert-error">
					<a class="close" data-dismiss="alert">&times;</a>
					<h4 class="alert-heading">
						<?php echo $this->lang->line("error"); ?>
					</h4>
					<?php echo $errors; ?>
				</div>
			<?php } ?>
			
			<?php 

			if (isset($sample_view) && $sample_view && count($sample_view) > 0) {	?>
			
				<form class="form-horizontal" >
				

			    <div class="control-group">
				<label class="control-label" for="prod_name"><?php echo $this->lang->line('admin_sample_list_tbl_sample_name'); ?>
					:</label>
					<div class="controls">
					<input type="text" class="input-xlarge" id="prod_name" name="prod_name"
					 value="<?php echo $sample_view[0]['sample_name']; ?>"  readonly="readonly"/>
					<!-- <p class="help-block">example: admin@admin.com</p> -->
					</div>
				</div>

				<div class="control-group">
				<label class="control-label" for="prod_name"><?php echo $this->lang->line('admin_sample_list_tbl_sample_email'); ?>
					:</label>
					<div class="controls">
					<input type="text" class="input-xlarge" id="prod_name" name="prod_name"
					 value="<?php echo $sample_view[0]['sample_email']; ?>" disabled="disabled" />
					<!-- <p class="help-block">example: admin@admin.com</p> -->
					</div>
				</div>

				
				<div class="control-group">
				<label class="control-label" for="prod_name"><?php echo $this->lang->line('admin_sample_list_tbl_sample_company'); ?>
					:</label>
					<div class="controls">
					<input type="text" class="input-xlarge" id="prod_name" name="prod_name"
					 value="<?php echo $sample_view[0]['sample_company']; ?>" disabled="disabled"/>
					<!-- <p class="help-block">example: admin@admin.com</p> -->
					</div>
				</div>

				<div class="control-group">
				<label class="control-label" for="prod_name"><?php echo $this->lang->line('admin_sample_list_tbl_sample_title'); ?>
					:</label>
					<div class="controls">
					<input type="text" class="input-xlarge" id="prod_name" name="prod_name"
					 value="<?php echo $sample_view[0]['sample_title']; ?>" disabled="disabled" />
					<!-- <p class="help-block">example: admin@admin.com</p> -->
					</div>
				</div>

				<div class="control-group">
				<label class="control-label" for="prod_name"><?php echo $this->lang->line('admin_sample_list_tbl_sample_url'); ?>
					:</label>
					<div class="controls">
					<textarea class="input-xlarge" id="prod_name" name="prod_name" disabled="disabled">
					 <?php echo $sample_view[0]['sample_url']; ?> </textarea>
					<!-- <p class="help-block">example: admin@admin.com</p> -->
					</div>
				</div>

				<div class="control-group">
				<label class="control-label" for="prod_name"><?php echo $this->lang->line('admin_sample_list_tbl_sample_desc'); ?>
					:</label>
					<div class="controls">
					<textarea class="input-xlarge" id="prod_name" name="prod_name" disabled="disabled" >
					 <?php echo $sample_view[0]['sample_desc']; ?>   </textarea>
					<!-- <p class="help-block">example: admin@admin.com</p> -->
					</div>
				</div>
			</form>
			<?php } ?>
		
		</fieldset>
	</div>

	
</div>