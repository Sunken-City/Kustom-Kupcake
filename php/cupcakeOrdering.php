<html>
	<head>
		<title> Cupcake Ordering </title>
	</head>
	<body>
		<?php
			$con=mysql_connect("localhost","cupcaker","nomnomnom");

			if (!$con){
				die('Could not connect: ' . mysql_error());
			}

			mysql_select_db("customcupcakes");
			$result = mysql_query("SELECT * FROM flavor");

			echo "<table id="flavor">
					<tbody>"
			while($var = mysql_fetch_assoc($result)){
				$pic = $var["picLoc"];
				$flavor = $var["flavorName"];
			echo "<td> <img src="$pic"> $flavor</td>";}
			echo "</tbody>
				</table>";


			$result = mysql_query("SELECT * FROM filling");
			echo "<table id="filling">
					<tbody>";
			while($var = mysql_fetch_assoc($result)){
				$pic = $var["rgbVal"];
				$filling = $var["fillingName"];
			echo "<td> <img src="$pic"> $filling</td>";}
			echo "</tbody>
				</table>";

			$result = mysql_query("SELECT * FROM icing");
			echo "<table id="icing">
					<tbody>";
			while($var = mysql_fetch_assoc($result)){
				$pic = $var["picLoc"];
				$icing = $var["icingName"];
			echo "<td> <img src="$pic"> $icing</td>";}
			echo "</tbody>
				</table>";
		?>
	<body>
</html>
