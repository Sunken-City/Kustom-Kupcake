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

window.onload = function draw(){
	var canvas = document.getElementById("FlavorPieG");
	var ctx = canvas.getContext("2d");
	var FlavorGraph = new Chart(ctx).Pie(data);
}

