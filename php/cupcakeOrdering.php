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
			$result = mysql_query("SELECT * FROM flavors");

			echo "<table id="flavor">
					<tbody>"
			while($var = mysql_fetch_assoc($result)){
				$pic = $var["picLock"];
				$flavor = $var["flavorName"];
			echo "<td> <img src="$pic"> $flavor</td>";}
			echo "</tbody>
				</table>";


			$result = mysql_query("SELECT * FROM fillings");
			echo "<table id="filling">
					<tbody>";
			while($var = mysql_fetch_assoc($result)){
				$pic = $var["picLock"];
				$filling = $var["fillingName"];
			echo "<td> <img src="$pic"> $filling</td>";}
			echo "</tbody>
				</table>";

			$result = mysql_query("SELECT * FROM icings");
			echo "<table id="icing">
					<tbody>";
			while($var = mysql_fetch_assoc($result)){
				$pic = $var["picLock"];
				$icing = $var["icinggName"];
			echo "<td> <img src="$pic"> $icing</td>";}
			echo "</tbody>
				</table>";
		?>
	<body>
</html>