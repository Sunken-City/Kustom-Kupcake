$(document).ready(function() {
	alert("loaded");
	function selectImage(e){

		var testTable = $("#Flavor");
		var pics=document.getElementsByClassName('FlavorClass');

		for(var i = 0, len=pics.length;i < len; i++) {
			pics[i].setAttribute('class','');
			pics[i].setAttribute('class','FlavorClass');
		}

		var picture = e.target;
		picture.setAttribute('class','selected');
	}
	var testTable = $("#Flavor");
	var imgs = document.getElementsByClassName('FlavorClass');

	for(var i = 0, len = imgs.length;i<len;i++) {
		imgs[i].addEventListener('click',selectImage,false);
	}
});