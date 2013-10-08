//Author: Nathan Moore


window.onload=function(){

	//

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