//Author: Nathan Moore


window.onload=function(){

	var x = 2;
	var y = 3;
	if (x < y) {
		x = y + 10;
	}

}

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