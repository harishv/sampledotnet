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

				 //$('#ratings').html();
				 $("#replace").html(res.page);
				//window.location =baseurl;
			}
		 }
		});
}

// checking for the null validation 
function validate_isnull(field_id)
{

if( field_id == null ||  $.trim(field_id.value) == "")
{
return false;
}
else
return true;
}

// checking the email validation

function validateEmail(element, typeSent){
	if(typeof(typeSent)==='undefined') typeSent = "object";
	//var emailPattern = /^[a-zA-Z0-9]+[a-zA-Z0-9._]+@[a-zA-Z]+\.(([a-zA-Z]{2,3})|([a-zA-Z]{2}\.[a-zA-Z]{2}))$/;
	//var emailPattern=/^[a-z0-9]+((\.[a-z0-9]+)*(\_[a-z0-9]+)*)*@[a-zA-Z]+\.(([a-zA-Z]{2,3})|([a-zA-Z]{2}\.[a-zA-Z]{2}))$/;
	var emailPattern=/^[a-z0-9]+((\.[a-z0-9]+)*(\_[a-z0-9]+)*)*@[a-zA-Z]+\.[a-zA-Z.]*[a-zA-Z]$/;
	if (typeSent == 'value') {
		var compound_email = element.split("<");
		
		if (compound_email.length > 1) {
			var email = (compound_email[1].split(">"))[0];
		} else {
			var email = (compound_email[0].split(">"))[0];
		}
		
		return emailPattern.test(email);
	}
	return emailPattern.test(element.value);  
} 




function validate_registerform() {
	
	var errors = "";

	
	var email_address_obj = document.getElementById('email_add');
	var  ts_password_obj = document.getElementById('pass');
	var  ts_re_password_obj = document.getElementById('re_pass');

	
	
	if(!validate_isnull(email_address_obj)) {
	   errors += "Email should not be null or empty<br />";
	   document.getElementById('errors_data_signup').innerHTML="";
	   document.getElementById('errors_data_signup').innerHTML=$.trim(errors);
	   return false;		
	} else if(email_address_obj.value.length > 60)
	{
		errors += "Email should not be more than 60 characters<br />";
		document.getElementById('errors_data_signup').innerHTML="";
	   document.getElementById('errors_data_signup').innerHTML=$.trim(errors);
	   return false;		
	}
	else if(!validateEmail(email_address_obj)) {
		errors += "Please enter valid email<br />";
		document.getElementById('errors_data_signup').innerHTML="";
	   document.getElementById('errors_data_signup').innerHTML=$.trim(errors);
	   return false;
	}

	if(!validate_isnull(ts_password_obj)) {
	   errors += "Password should not be null or empty<br />";
	   document.getElementById('errors_data_signup').innerHTML="";
	   document.getElementById('errors_data_signup').innerHTML=$.trim(errors);
	   return false;		
	} else if (ts_password_obj.value.length < 8){
		errors += "Password should contain at least 8 characters<br />";
		document.getElementById('errors_data_signup').innerHTML="";
	   document.getElementById('errors_data_signup').innerHTML=$.trim(errors);
	   return false;
	} else {
		if(!validate_isnull(ts_re_password_obj)){
		   errors += "Verify Password should not be null or empty<br />";
		   document.getElementById('errors_data_signup').innerHTML="";
	   document.getElementById('errors_data_signup').innerHTML=$.trim(errors);
	   return false;		
		} else if(ts_password_obj.value !=ts_re_password_obj.value)	{
			errors += "Password and Verify password should be same<br />";
			document.getElementById('errors_data_signup').innerHTML="";
	   document.getElementById('errors_data_signup').innerHTML=$.trim(errors);
	   return false;
		}
	}

	if($.trim(errors) == '')
	{
				$('#errors_data_signup').html("");
		// Call check Login Ajax call
		var customURL = "index.php/register/register_user";
		var data = $('#userlogin').serialize(true);

		$.ajax({
			  url: customURL,
			  type: 'POST',
			  data: data,
  			  dataType:'json',
			  success: function(result){
				if(result.status == "success" )
				  {
						$("#success_data_signup").html(result.data);
						document.getElementById('success_data_signup').style.display = 'block';
						
						
				  }
				  else
				  {		
						if(result.data.search("@@")!=-1){
				                 var email_data=result.data.split(" @@");
				                
				                 document.getElementById('errors_email_singup').style.display = 'block';
				                 document.getElementById('errors_email_singup').style.color = 'red';
				  		$('#email_replace').html(email_data[0]);
						
				  		}else{
						$("#errors_data_signup").html(result.data);
						}
						
				  } 
			  }
		});

	}
	return false;
}



