//Author: Nathan Moore


$(document).ready(function() {
	alert("Page Loaded");

	//authenticate user after login
		//add submit listener to log in button
	$("#logIn").submit(function(e){
		
		$.ajax ({

			url: "logIn.php"

		});
	}

});

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