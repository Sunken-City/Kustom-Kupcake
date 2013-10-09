window.onload = function(){
	alert("loaded");
	function selectImage(e){
		var pics=document.getElementsByTagName('img');

		for(var i = 0, len=pics.length;i < len; i++) {
			pics[i].setAttribute('class','');
		}

		var picture = e.target;
		picture.setAttribute('class','selected');
	}

	var imgs = document.getElementsByTagName('img');

	for(var i = 0, len = imgs.length;i<len;i++) {
		imgs[i].addEventListener('click',selectImage,false);
	}
};