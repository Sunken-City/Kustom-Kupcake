//Author: Nathan Moore
//Scripts to run in concert with index.html

$(document).ready(function() {
	//alert("Page Loaded");

	/*\
	|*|				:: >> Authenticate User After Login << ::
	|*|
	|*|		# add a click listener to the submit button associated 
	|*|			with the log in form (not the create account form)
	|*|		# make sure password is at least 8 characters long
	|*|		# make an ajax request that sends the form data to 
	|*|			logIn.php for authentication
	|*|		# if it is authenticated (i.e., success) the page will 
	|*|			be redirected to the cupcakeordering.html page
	|*|		# otherwise an alert will go off and form submission will 
	|*|			be aborted
	|*|
	\*/
	
	$("#logInButton").click(function(e) {
		var username = $("#username").val();
		var password = $("#password").val();
		var pwdPattern = /.{8,}/g;

		var formData = {pass: password, user: username};

		$.post("php/logIn.php",formData,function(data){

			if(data['success']) {
            	// do successful things
            	window.location.href = "php/redirect2.php";
        	}
        	else {
            	// do failure things
            	alert("Username or Password is Invalid!");
        	}
		},"json");

		e.preventDefault();

	});

});

	/*\
	|*|				:: >> Validate Telephone Number Inputted By User << ::
	|*|
	|*|		# returns boolean validated: true if valid, false (default) 
	|*|		# use DOM to get the value inputted by user 
	|*|		# strip out all non digits
	|*|		# check against regexp: must be 10 digits
	|*|		# alert the user and abort submission if invalid
	|*|
	\*/

function validateTely(){

	var validated = false;

	var tely = document.getElementById('telephone').value;
	tely = tely.replace(/\D/g,'');

	var telypattern = /\d{10,}/g;

	if (tely.match(telypattern))
	{
		validated = true;
	}
	else
	{
		alert("Phone Number must be valid 10 digit phone number");
	}

	return validated;
}