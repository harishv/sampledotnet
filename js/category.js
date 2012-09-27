$(document).ready(function() {
	
	$('.star').raty({
		
		
  		click: function(score, evt) {
				
			var id= $(this).attr('value');
			 
			
	   		var data = { 'prod_id' : id ,'vote_value':score};
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
		
	});



	
});



function grab_now(id,url){


	var data = { 'prod_id' : id,'grab_url':url};
			var baseurl = base_url;

			$.ajax({
				url: baseurl+'index/grab_now',
				type: 'POST',
				data:data,
				dataType :'json',
				success: function(res)
				{
					
					//alert(res.status == 'succuss');return false;
					if(res.status == 'succuss'){
		
						
						window.location.assign(url);
						 $("#replace").html(res.page);
					
						//window.location =baseurl;
					}else{
						alert(res.data);
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
	var emailPattern=/^[a-z0-9]+((\.[a-z0-9]+)*(\_[a-z0-9]+)*)*@[a-zA-Z]+\.(([a-zA-Z]{2,3})|([a-zA-Z]{2}\.[a-zA-Z]{2}))$/;
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

	var  first_name_obj = document.getElementById('first_name');
	var  last_name_obj = document.getElementById('last_name');
	var email_address_obj = document.getElementById('email_add');
	var  ts_password_obj = document.getElementById('pass');
	var  ts_re_password_obj = document.getElementById('re_pass');

	
	
	if(!validate_isnull(first_name_obj)) {
		
	   errors += "First Name should not be null or empty<br >";
	   document.getElementById('errors_data_signup').innerHTML="";
	   document.getElementById('errors_data_signup').innerHTML=$.trim(errors);
	   return false;
	}

	if(!validate_isnull(last_name_obj)) {
	
	   errors += "Late Name should not be null or empty<br >";
	   document.getElementById('errors_data_signup').innerHTML="";
	   document.getElementById('errors_data_signup').innerHTML=$.trim(errors);
	   return false;
	}


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
		var customURL =  base_url+"register/register_user";
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
						$('#userlogin').each (function(){  
    					this.reset();
 						}); 
						
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



function validate_login() {
	
	var errors = "";
	var email = $.trim($('#email_address').val());
	var password= $('#password').val();
	
	errors += (email == undefined || email == "") ? "Email Id should not be null or empty<br />" : "";
	if(errors == ''){
		errors += (!validateEmail(document.getElementById("email_address"))) ? "Please enter a valid Email Id<br />" : "";
	}
	
	errors += (password == undefined || password == "") ? "Password should not be null or empty<br />" : "";
	
	if ($.trim(errors) == "") {
		$('#errors_data').html("");
		
		// Call check Login Ajax call
		var customURL = base_url+"login/login_check";
		var data = $('#user_login').serialize(true);

		$.ajax({
			  url: customURL,
			  type: 'POST',
			  data: data,
			  dataType: 'json',		  
			  success: function(result){
					
				  if(result.sucuss == 'sucuss'){
				

					window.location.href = window.location.href;
					
				  } else if(result.sucuss == 'failure') {
					  $('#errors_data').html("Login Failed");
				 	 
				  }
			  }
		});
	}
	
	$('#errors_data').html(errors);
	return false;
}



function validate_user_profile(){


	var errors = "";

	
	var dob_obj = document.getElementById('datepicker1');
	var address1_obj = document.getElementById('address1');
	var  address2_obj = document.getElementById('address2');
	var  state_obj = document.getElementById('state');
	var city_obj =document.getElementById('city');
	var zip_obj =document.getElementById('zip');

	
	if(!validate_isnull(dob_obj)) {
	
	   errors += "Date of Brith should not be null or empty<br >";
	   document.getElementById('errors_data_user_profile').innerHTML="";
	   document.getElementById('errors_data_user_profile').innerHTML=$.trim(errors);
	   return false;
	}

	if(!validate_isnull(address1_obj)) {
	
	   errors += "Address 1 should not be null or empty<br >";
	   document.getElementById('errors_data_user_profile').innerHTML="";
	   document.getElementById('errors_data_user_profile').innerHTML=$.trim(errors);
	   return false;
	}

	if(!validate_isnull(address2_obj)) {
	
	   errors += "Address2 should not be null or empty<br >";
	   document.getElementById('errors_data_user_profile').innerHTML="";
	   document.getElementById('errors_data_user_profile').innerHTML=$.trim(errors);
	   return false;
	}


	if(!validate_isnull(state_obj)) {
	
	   errors += "state should not be null or empty<br >";
	   document.getElementById('errors_data_user_profile').innerHTML="";
	   document.getElementById('errors_data_user_profile').innerHTML=$.trim(errors);
	   return false;
	}

	if(!validate_isnull(city_obj)) {
	
	   errors += "City should not be null or empty<br >";
	   document.getElementById('errors_data_user_profile').innerHTML="";
	   document.getElementById('errors_data_user_profile').innerHTML=$.trim(errors);
	   return false;
	}

	if(!validate_isnull(zip_obj)) {
	
	   errors += "Zip code  should not be null or empty<br >";
	   document.getElementById('errors_data_user_profile').innerHTML="";
	   document.getElementById('errors_data_user_profile').innerHTML=$.trim(errors);
	   return false;
	}


	
	if ($.trim(errors) == "") {
		$('#errors_data').html("");
		
		alert(base_url);
		// Call check Login Ajax call
		var customURL = base_url+"register/user_profile";
		var data = $('#user_profile_data').serialize(true);

		$.ajax({
			  url: customURL,
			  type: 'POST',
			  data: data,
			  dataType:'json',		  
			  success: function(response){
			  		
				  if(response.status == "success"){
				
				  	
				  	$("#success_data_user_profile").html(response.data);
					$('#user_profile_data').each (function(){  
    					this.reset();
 						}); 
				  	document.getElementById('success_data_user_profile').style.display = 'block';
					
					
					
				  } else{
					  $('#errors_data_user_profile').html(response.data);
				 	 
				  }
			  }
		});
	}
	return false;

}


function validate_forgetpassword(){

	var errors = "";

	
	var username_obj = document.getElementById('forgot_address');

	

	if(!validate_isnull(username_obj)) {
	   errors += "Email should not be null or empty<br />";
	   document.getElementById('forget_errors_data').innerHTML="";
	   document.getElementById('forget_errors_data').innerHTML=$.trim(errors);
	   return false;		
	} else if(username_obj.value.length > 60)
	{
		errors += "Email should not be more than 60 characters<br />";
		document.getElementById('forget_errors_data').innerHTML="";
	   document.getElementById('forget_errors_data').innerHTML=$.trim(errors);
	   return false;		
	}
	else if(!validateEmail(username_obj)) {
		errors += "Please enter valid email<br />";
		document.getElementById('forget_errors_data').innerHTML="";
	   document.getElementById('forget_errors_data').innerHTML=$.trim(errors);
	   return false;
	}



	if ($.trim(errors) == "") {
		$('#forget_errors_data	').html("");
		
		// Call check Login Ajax call
		var customURL = base_url+"login/forget_password_action";
		var data_forgot = $('#forgot_password').serialize(true);



		$.ajax({
			  url: customURL,
			  type: 'POST',
			  data: data_forgot,
			  dataType:'json',		  
			  success: function(response){
			  	
			  			
				  if(response.status == "sucuss"){
				
				  	
				  	$("#success_data_forgot").html(response.data);
					$('#forgot_password').each (function(){  
    					this.reset();
 						}); 
				  	document.getElementById('success_data_forgot').style.display = 'block';
					
					
				  } else{
					  $('#forget_errors_data').html(response.data);
				 	 
				  }
			  }
		});
	}
	return false;


}



