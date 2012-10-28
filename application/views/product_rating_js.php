<script type="text/javascript">

function mouseOverImage(id) {
	var str = new String(id);
	var prod_id = str.substr(0, (str.length - 1));

	var n = str.substr(-1, 1);

	for (i = 1; i <= n; i++) {
		$('img#full_off' + prod_id + i).attr('src', base_url + 'img/star-full.png');
		$('img#full_on' + prod_id + i).attr('src', base_url + 'img/star-full.png');
	}

	for (var j = 5; j > n; j--) {
		$('img#full_off' + prod_id + j).attr('src' ,base_url + 'img/star-off.png');
		$('img#full_on' + prod_id + j).attr('src' ,base_url + 'img/star-off.png');
	}
}

function mouseOutImage(id) {
	var str = new String(id);
	var prod_id = str.substr(0, (str.length - 1));

	// When mouse out all fulloff will be switched off and fullon will be switched on.
	for (var i = 1; i <= 5; i++) {
		$('img#full_off' + prod_id + i).attr('src' ,base_url + 'img/star-off.png');
		$('img#full_on' + prod_id + i).attr('src' ,base_url + 'img/star-full.png');
	}
}

function prod_rating(id, count) {
	var data = {
		'prod_id': id,
		'vote_value': count
	};

	var request_type = base_url.substr(0, 5);

	if (request_type != 'https') {
		request_type = 'http';
	}

	var redirect_url = request_type + '://<?php echo $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"]; ?>';

	if (redirect_url.substr(redirect_url.length - 4, 4) == '.php') {
		redirect_url = redirect_url.replace('.php', '.html');
	}
	redirect_url = redirect_url.replace('.php', '');

	$.ajax({
		url: base_url + 'index/product_rating',
		type: 'POST',
		data: data,
		dataType: 'json',
		success: function(res) {
			if (res.status == 'succuss') {
				window.location = redirect_url;
				return true;
			} else if (res.status == 'login_please') {
				alert('Please login to access this feature.');
				return false;
			}

			return false;
		}
	});
}
</script>