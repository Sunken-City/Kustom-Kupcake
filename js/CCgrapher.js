//Gustavo Castillo

var data = [
	{
		value: 30,
		color:"#F38630"
	},
	{
		value : 50,
		color : "#E0E4CC"
	},
	{
		value : 100,
		color : "#69D2E7"
	}			
]

var data2 = {
	labels : ["Sprinkles","Bacon","M&Ms","Reeses","Skittles","Mini Chocolate Chips","Oreo Bits","Twix Bits","Butterfinger Bits","Snicker Bits","Mini Marshellows"],
	datasets : [
		{
			fillColor : "rgba(220,220,220,0.5)",
			strokeColor : "rgba(220,220,220,1)",
			data : [65,59,90,81,56,55,40,20,32,14,55]
		},

	]
}
window.onload = function draw(){
	var canvas = document.getElementById("FlavorPieG");
	var ctx = canvas.getContext("2d");
	var FlavorGraph = new Chart(ctx).Pie(data);

        var canvas = document.getElementById("FillingPieG");
	var ctx = canvas.getContext("2d");
	var FlavorGraph = new Chart(ctx).Pie(data);

	var canvas = document.getElementById("ToppingPieG");
	var ctx = canvas.getContext("2d");
	var FlavorGraph = new Chart(ctx).Pie(data);

	var canvas = document.getElementById("FrostingBarG");
	var ctx = canvas.getContext("2d");
	var FlavorGraph = new Chart(ctx).Bar(data2);
}

