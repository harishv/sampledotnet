<?php  if($this->session->userdata('comment_errors')!="") {
$errors=$this->session->userdata('comment_errors');
	$error_child = array('comment_errors'  => '', );
	$this->session->unset_userdata($error_child);

	}
$return_url = base_url().'documents/'

?>

<script type="text/javascript">var switchTo5x=false;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "18f4acdf-af25-4d39-b663-78b081a6f60e"}); </script>

<script>
	var base_url = "<?php echo base_url();?>";
</script>

<script type="text/javascript" src="<?php echo base_url("js"); ?>/category.js"></script>

<!-- Begin main-content div -->
<div class="flt-l wid_100" id="main-content">
	<!-- Begin content div -->

	<div class="top-container" style="width: 100%">
		<a href="<?php echo base_url() . 'documents';?>">Home</a>

		<?php if(isset($bread_crum['cat_name']) && $bread_crum['cat_name'] !=''){ ?>
			<img alt="blue" src="<?php echo base_url().'img/blue-bullet.jpg';?>">
		<?php } ?>

		<?php if(isset($bread_crum) && $bread_crum['sub_cat_id'] !=''){ ?>

		<?php if(isset($bread_crum['cat_name']) && $bread_crum['cat_name'] !='') ?>
			<a href="<?php echo base_url().'docs_category/parent_category/'.$bread_crum['parent_cat_id']?>"> <?php echo $bread_crum['cat_name'];?></a>
		<?php } else { ?>  <?php if(isset($bread_crum['cat_name']) && $bread_crum['cat_name'] !='') ?>
			<a href="<?php echo base_url().'docs_category/get_category_document/'.$bread_crum['parent_cat_id']?>"> <?php echo $bread_crum['cat_name'];?></a><?php }?>
		<?php if($bread_crum['sub_cat_name'] !='') { ?><img alt="blue" src="<?php echo base_url().'img/blue-bullet.jpg';?>">  <?php } ?><?php  if(isset($bread_crum) && $bread_crum !='') ?> <a href="<?php echo base_url().'docs_category/get_category_document/'.$bread_crum['sub_cat_id']?>"><?php echo $bread_crum['sub_cat_name'];?></a>

		<?php if($bread_crum !='') { ?><img alt="blue" src="<?php echo base_url().'img/blue-bullet.jpg';?>">  <?php } ?><?php  if(isset($bread_crum) && $bread_crum !='') echo $doc_name;?>
	</div>

	<div class="flt-l" id="content">
		<?php // var_dump($document_details); ?>
		<?php
			$attributes = array('class' => 'form-horizontal', 'id' => 'payment_details', 'name'=>'payment_details','target' =>'_blank','onsubmit' =>'validate_payment_details();');
			echo form_open('https://www.sandbox.paypal.com/cgi-bin/webscr',$attributes);
		?>
			<fieldset>
				<legend>Payment Details:</legend>

				<h5>
					Please enter all the below payment details.
				</h5>

				<div style="margin: 5px;">&nbsp;</div>

				<div class="control-group">
					<div id="contact_errors_data" class="errors_data"><?php echo (isset($errors)) ? $errors : '';?></div>
					<div id="contact_data"  class ="success_data" ><?php echo (isset($success)) ? $success : '';?></div>
				</div>

				<div class="control-group">
					<label for="contact_name" class="control-label">Your Name :</label>
					<div class="controls">
						<input type="text" placeholder="Your Name" name="contact_name" id="contact_name" class="input-xlarge">
					</div>
				</div>

				<div class="control-group">
					<label for="contact_email" class="control-label">Your Email :</label>
					<div class="controls">
						<input type="text" placeholder="Your Email" name="contact_email" id="contact_email" class="input-xlarge">
					</div>
				</div>

				<div class="control-group">
					<label for="contact_phone" class="control-label">Your Phone :</label>
					<div class="controls">
						<input type="text" placeholder="Your Phone" name="contact_phone" id="contact_phone" class="input-xlarge">
					</div>
				</div>

				<div class="control-group">
					<label for="doc_price" class="control-label">Document Price :</label>
					<div class="controls">
						<input type="hidden" id="doc_price" name="doc_price" value="<?php echo $document_details[0]['doc_price']; ?>" />
						<?php echo $document_details[0]['doc_price']; ?>
						<input type="hidden" id="doc_id" name="doc_id" value="<?php echo $document_details[0]['id']; ?>" />
						<?php echo $document_details[0]['id']; ?>

					</div>
				</div>


				<input type="hidden" name="cmd" value="_xclick" />
			    <input type="hidden" name="upload" value="1" />
			    <!--<input type="hidden" name="business" value="manager181@skintologyny.com" /> -->
			    <input type="hidden" name="business" value="sailu1214@gmail.com" /> 
			    <input type="hidden" name="currency_code" value="USD" />
			    <input type="hidden" name="rm" value="2">
			    <input type="hidden" name="return" value="<?php //echo $return_url?>" />
			    <input type="hidden" name="cancel_return" value="<?php //echo $cancel_url?>" />
			    <input type="hidden" name="item_name" value="Sample" />
			    <input type="hidden" name="custom" value=""  />
			    <input type="hidden" name="amount" value="<?php echo round($document_details[0]['doc_price'],2);?>" />
			    <!-- <div class="amount">
			      <label style ="margin-top: 9px;">Total Amount: </label>
			     
			      <span> $<?php //if(isset($total_with_tax)){ echo round($total_with_tax,2); ?>
			      <input type="submit" value="Pay" name="submit" /></span>
			      <?php //}else{?>
			      
			       <span><?=$currency?></span> 
			      <input type="text" onblur="if(validate_null(this.value,'Enter Price','error_prodprice','errorMsg')){ validate_priceinfo(this.value,'Enter Valid Price','error_prodprice')}" size="10" class="textbox" id="amount" name="amount" class="textbox" size="10" <?php echo $readonly?>/>
			      <input type="submit" value="Pay" name="submit" onclick="return validate_null(document.getElementById('amount').value,'Enter Price','error_prodprice','errorMsg') " />
			      <?php //}?>
			      <font color ="red">
			      <div id="error_prodprice"></div>
			      </font> </div> -->



				<div class="form-actions">
					<button type="submit" class="btn btn-primary">Pay Now!</button>
				</div>

			</fieldset>
			<?php echo form_close(); ?>
	</div>


	<!-- Begin sidebar div -->
	<?php include_once 'template/doc_rightnav.php';?>
	<!-- End sidebar div -->

	<!-- End main-content div -->
</div>
<!-- End inner wrapper div -->

<!-- Links Footer -->
<div style="border-top:1px #CCCCCC solid;" class="bottom-footer">
	<div class="data">
		<h2>Importent Links</h2>

		<div class="span3">
			<h3>Samples</h3>
			<?php if(isset($category) && $category !='') { ?>
				<ul>
					<?php foreach($category as $cat_id => $cat_values) {
							$sub_cat = $this->category_model->get_sub_cat($cat_values['id']);
							?>
						<li>
							<a href="<?php if($sub_cat =='')echo base_url().'category/get_category_product/'.$cat_values['id']; else echo base_url().'category/parent_category/'.$cat_values['id'];?>"><?php echo $cat_values['prod_cat_name'];?></a>
						</li>
					<?php } ?>
				</ul>
			<?php } ?>
		</div>
		<div class="span3">
			<h3>Documents</h3>
			<?php if(isset($doc_category) && $doc_category !='') { ?>
				<ul>
					<?php foreach($doc_category as $cat_id => $cat_values) {
							$sub_cat = $this->docs_category_model->get_sub_cat($cat_values['id']);
							?>
						<li>
							<a href="<?php if($sub_cat =='')echo base_url().'docs_category/get_category_document/'.$cat_values['id']; else echo base_url().'docs_category/parent_category/'.$cat_values['id'];?>"><?php echo $cat_values['doc_cat_name'];?></a>
						</li>
					<?php } ?>
				</ul>
			<?php } ?>
		</div>
		<div class="span3">
			<h3>&nbsp;</h3>
			<ul>
				<li>
					<a href="#">Terms of Service</a>
				</li>
				<li>
					<a href="#">Copyright</a>
				</li>
				<li>
					<a href="#">Privacy Policy</a>
				</li>
			</ul>
		</div>
	</div>
</div>
