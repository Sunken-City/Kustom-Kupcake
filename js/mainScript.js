//Author: Nathan Moore


$(document).ready(function() {
	alert("Page Loaded");

	//authenticate user after login
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