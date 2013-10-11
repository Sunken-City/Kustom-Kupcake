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


		// if( !password.match(pwdPattern) ) {
		// 	alert("Password is Invalid");
		// }

		var formData = $("#logIn").serialize();

		$.post("php/logIn.php",formData,function(data,status,xhr) {
			window.location.href = "php/redirect.php";
		})
		.done(function() {
    		//alert( "second success" );
  		})
  		.fail(function() {
    		alert( "Password or Username Invalid!" );
    		e.preventDefault();
  		})
  		.always(function() {
    		//alert( "finished" );
		});

		// $.ajax({
		// 	type: "POST",
		// 	url: "php/logIn.php",
		// 	data: formData,
		// 	success: function () {
		// 		success = true;
		// 		//$.ajax({ url:"php/redirect.php"});
		// 		e.preventDefault();
		// 	},
		// 	failure: function() {
		// 		alert("Password or Username Invalid!");
		// 		e.preventDefault();
		// 	}
		// });

		//action="php/redirect.php"
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

	// var authenticate = new XMLHttpRequest();

	// authenticate.open("POST","php/logIn.php",true);
	// authenticate.send();

	// authenticate.onreadystatechange = function () {

	// }


	// $("#logIn").click(function(e) {
	// 	//add submit listener to log in button
	// 	$('#message').slideUp('fast');

	// 	$.post('php/logIn.php',$("#logIn").serialize()+'&action=
	// 		'+ $(event.target).attr('id'),function(data) {

	// 		var code = $(data)[0].nodeName.toLowerCase();

	//     	$('#message').removeClass('error');
	//       	$('#message').removeClass('success');
	//       	$('#message').addClass(code);
	//       	if(code == 'success') {

	//       		//redirect
	//       		$.ajax({ url: 'php/redirect.php' });
	        
	//       	}
	//       	else if(code == 'error') {
	//       		$.ajax({ url: 'php/redirect.php' });
	//         	//$('#message').html('An error occurred, please try again.');
	//         	//$('#message').slideDown('fast');
	//       	}

	// 	});

	// 	return e.preventDefault();

	// });
	//$.ajax({ url: 'php/redirect.php' });