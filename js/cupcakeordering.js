$(document).ready(function() {
	alert("loaded");
	function selectImage(e){

		var testTable = $("#Flavor");
		var pics=testTable.getElementsByTagName('td');

		for(var i = 0, len=pics.length;i < len; i++) {
			pics[i].setAttribute('class','');
		}

		var picture = e.target;
		picture.setAttribute('class','selected');
	}
	var testTable = $("#Flavor");
	var imgs = testTable.getElementsByTagName('td');

	for(var i = 0, len = imgs.length;i<len;i++) {
		imgs[i].addEventListener('click',selectImage,false);
	}
});