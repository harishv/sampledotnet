function prod_rating(id,count){

		var data = { 'prod_id' : id ,'vote_value':count};
		var baseurl = base_url;
		$.ajax({
		url: baseurl+'index/product_rating',
		type: 'POST',
		data:data,
		dataType :'json',
		success: function(res)
		{
			//alert(res.status == 'succuss');return false;
			if(res.status == 'succuss'){
				window.location =baseurl;
			}
		 }
		});
}
