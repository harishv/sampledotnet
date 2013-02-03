<?php
$star_alt = array(1=>'poor', 2=>'average', 3=>'ok', 4=>'good', 5=>'excellent');

if (isset($product_value)) {
	for($i = 1; $i <= 5; $i++) {
		if ($i <= $product_value['product_rating']) {
			$image_id = "full_on" . $product_value['id'] . $i;
			$image_src = base_url('img') . '/star-full.png';
		} else {
			$image_id = "full_off" . $product_value['id'] . $i;
			$image_src = base_url('img') . '/star-off.png';
		}
		?>
		<img id ="<?php echo $image_id; ?>" class="start_img" onmouseover="mouseOverImage(<?php echo $product_value['id']. $i;?>)" onmouseout="mouseOutImage(<?php echo $product_value['id']. $i;?>);" src="<?php echo $image_src; ?>" title="<?php echo $star_alt[$i]; ?>" alt="<?php echo $star_alt[$i]; ?>" onclick="return prod_rating(<?php echo $product_value['id'];?>, <?php echo $i;?>);" />
<?php }
}

if (isset($document_value)) {
	for($i = 1; $i <= 5; $i++) {
		if ($i <= $document_value['document_rating']) {
			$image_id = "full_on" . $document_value['id'] . $i;
			$image_src = base_url('img') . '/star-full.png';
		} else {
			$image_id = "full_off" . $document_value['id'] . $i;
			$image_src = base_url('img') . '/star-off.png';
		}
		?>
		<img id ="<?php echo $image_id; ?>" class="start_img" onmouseover="mouseOverImage(<?php echo $document_value['id']. $i;?>)" onmouseout="mouseOutImage(<?php echo $document_value['id']. $i;?>);" src="<?php echo $image_src; ?>" title="<?php echo $star_alt[$i]; ?>" alt="<?php echo $star_alt[$i]; ?>" onclick="return doc_rating(<?php echo $document_value['id'];?>, <?php echo $i;?>);" />
<?php }
} ?>