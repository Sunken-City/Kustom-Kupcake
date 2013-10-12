$(document).ready(function() {

	function loadPage () {
		$.ajax({
			url: "php/cupcakeOrdering.php"
		});
	}

	loadPage();

	var checkBoxesButton = document.getElementById('checkAll');
	var uncheckBoxesButton = document.getElementById('uncheckAll');
	var resetCupcake = document.getElementById('resetCupcake');
	var shoppingCart = [];
	uncheckBoxesButton.onclick=uncheckAllBoxes;
	checkBoxesButton.onclick=checkAllBoxes;
	resetCupcake.onclick=resetCupcake;

	$.ajax({
			type: "POST",
			url: "php/cupcakeOrdering.php"
	});

	function selectFlavor(e){

		var flavors=document.getElementById('Flavor').getElementsByTagName('td');
		var flavors2=document.getElementById('Flavor').getElementsByTagName('img');

		for(var i = 0, len=flavors.length;i < len; i++) {
			flavors[i].setAttribute('class','');
			flavors2[i].setAttribute('class','');
		}

		var selectedFlavor = e.target;
		selectedFlavor.setAttribute('class','selected');
	}
	var flavors = document.getElementById('Flavor').getElementsByTagName('td');
	var flavors2 = document.getElementById('Flavor').getElementsByTagName('img');

	for(var i = 0, len = flavors.length;i<len;i++) {
		flavors[i].addEventListener('click',selectFlavor,false);
		flavors2[i].addEventListener('click',selectFlavor,false);
	}

	function selectFilling(e){

		var fillings=document.getElementById('Filling').getElementsByTagName('td');
		var fillings2=document.getElementById('Filling').getElementsByTagName('img');

		for(var i = 0, len=fillings.length;i < len; i++) {
			fillings[i].setAttribute('class','');
		}

		var selectedFilling = e.target;
		selectedFilling.setAttribute('class','selected');
	}
	var fillings = document.getElementById('Filling').getElementsByTagName('td');
	var fillings2 =document.getElementById('Filling').getElementsByTagName('img');

	for(var i = 0, len = fillings.length;i<len;i++) {
		fillings[i].addEventListener('click',selectFilling,false);
	}

	function selectIcing(e){

		var icings=document.getElementById('Icing').getElementsByTagName('td');
		var icings=document.getElementById('Icing').getElementsByTagName('img');

		for(var i = 0, len=icings.length;i < len; i++) {
			icings[i].setAttribute('class','');
		}

		var selectedIcing = e.target;
		selectedIcing.setAttribute('class','selected');
	}
	var icings = document.getElementById('Icing').getElementsByTagName('td');
	var icings=document.getElementById('Icing').getElementsByTagName('img');

	for(var i = 0, len = icings.length;i<len;i++) {
		icings[i].addEventListener('click',selectIcing,false);
	}

	function checkAllBoxes(){
		var toppings = new Array();
		toppings  = document.getElementById('toppings').getElementsByTagName('input');
		for (var i = 0; i < toppings.length; i++)
		{
			if (toppings[i].type == 'checkbox')
			{
				toppings[i].checked = true;
			}
		}
	}

	function uncheckAllBoxes(){
		var toppings = new Array();
		toppings  = document.getElementById('toppings').getElementsByTagName('input');
		for (var i = 0; i < toppings.length; i++)
		{
			if (toppings[i].type == 'checkbox')
			{
				toppings[i].checked = false;
			}
		}

	}

	$("#deleteRow").click(function(e){
		try{
			var table = document.getElementById("cupcakeCart");
			var rowCount = table.rows.length;

			for(var i=0; i<rowCount; i++){
				var row = table.rows[i];
				var chkbox = row.cells[0].childNodes[0];
				if(null != chkbox && true == chkbox.checked) {
					table.deleteRow(i);
					rowCount--;
					i--;
				}
			}
		}catch(e) {
			alert(e);
		}
	});

	$("#submitOrderButton").click(function(e) {
		//ajax call to the database with all the analytics
	});

	$("#resetCupcake").click(function(e) {

		$("td").removeClass("selected");
		$("img").removeClass("selected");
		uncheckAllBoxes();
	})


	$("#quantityCupcakes").keypress(function(event){
		if (event.which == 45) {
			event.preventDefault();
		}
	})
	
	$("#updateOrder").click(function(e){

		var temps = [];
		var flavor;
		var filling;
		var icing;
		var quantity;

		$("#Flavor").find(".selected").each(function(){
				temps.push($(this).attr('name'));
		});

		for(var i = 0; i < temps.length; i++){
			flavor = temps[i];
		}
		temps = [];
		$("#Filling").find(".selected").each(function(){
				temps.push($(this).attr('name'));
		});

		for(var i = 0; i < temps.length; i++){
			filling = temps[i];
		}
		temps = [];
		$("#Icing").find(".selected").each(function(){
				temps.push($(this).attr('name'));
		});

		for(var i = 0; i < temps.length; i++){
			icing = temps[i];
		}

		var toppings = [];

		$('input:checked').each(function(){
			toppings.push($(this).attr("name"));
		})

		quantity = document.getElementById('quantityCupcakes').value;

		var table = document.getElementById('cupcakeCart');
		var rowCount = table.rows.length;
		var row = table.insertRow(rowCount);

		var cell1 = row.insertCell(0);
		var element1=document.createElement("input");
		element1.type="checkbox";
		element1.name="chkbox[]";
		cell1.appendChild(element1);

		var cell2 = row.insertCell(1);
		cell2.innerHTML = quantity;

		var cell3 = row.insertCell(2);
		cell3.innerHTML = flavor + ", " + filling + ", " + icing + ", " + toppings;
		var newCupcake = cupcake(flavor, filling, icing, toppings);

	})

	function cupcake(newFlavor,newFilling,newIcing,newToppings){
		var that=this;
		this.flavor=newFlavor;
		this.filling=newFilling;
		this.icing=newIcing;
		this.toppings=newToppings;

		this.toString=function(){
			return 'Cupcake Creation: ' +that.flavor+', ' +that.filling+', '+that.icing+', '+that.topping;
		};
	}
});

