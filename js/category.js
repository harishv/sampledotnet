function get_products(id){
	var data = { 'cat_id' : id};

		
		
		var base_url = base_url;
		


		//var redirect_path = base_path+"sendkash_gift";
		
			
		$.ajax({
		url: base_url,
		type: 'POST',
		data:data,
		dataType :'json',
		success: function(res)
		{
				
			alert(res);return false;

			if((res.status == "failure") || (res.status == "FAILURE")) { 
				$("#show_paypal_errors_setting").html(res.errors);	
					return false;		
			}				
		
			if(res.status == 'SUCCESS')
			{			
				$("#paypal_popup_setting").fadeOut();

							
			}
		 }
		})


}
