<html>
	<head>
		<title> Cupcake Ordering </title>
	</head>
	<body>
		<?php
			$db = mysqli_connect("localhost","cupcaker","nomnomnom","customcupcakes");

			if (mysqli_connect_errno()) {
				printf("Connect failed: %s\n", mysqli_connect_errno());
				exit();
			}

			$result = mysqli_query($db,"SELECT * FROM flavor");
			echo "<table>
					<tbody>";
			while($row = mysqli_fetch_assoc($result)) {

				$pic = $row["picLoc"];
				$flavor = $row["flavorName"];
				//do something with the pic and flavor??//
				echo "
				
					<td name=$flavor>
						<img src=\"http://54.200.82.84/Kustom-Kupcake/artwork/$pic\" alt=$flavor> $flavor
					</td>";

				}echo "</tbody></table>";


			$result = mysqli_query($db,"SELECT * FROM filling");
			echo "<br>";
			echo "<table>
					<tbody>";
			while($row = mysqli_fetch_assoc($result)) {

				$rgbVal = $row["rgbVal"];
				$filling = $row["fillingName"];
				//do something with the pic and filling??//
				echo "
				
					<td name=$filling>
					<td bgcolor=$rgbVal>
						 $filling
					</td>";

				}echo "</tbody> </table>";


			$result = mysqli_query($db,"SELECT * FROM icing");
			echo "<br>";
			echo "<table>
					<tbody>";
			while($row = mysqli_fetch_assoc($result)){
				$pic = $row["picLoc"];
				$icing = $row["icingName"];
				//do something with the pic and filling??//
				echo "
				
					<td name=$icing>
					<img src=\"http://54.200.82.84/Kustom-Kupcake/artwork/$pic\" alt=$icing> $icing
					</td>";

				}echo "</tbody> </table>";
				
			$result = mysqli_query($db,"SELECT * FROM topping");
			echo "<br>";
			echo "<table>
					<tbody>";
			while($row = mysqli_fetch_assoc($result)){
				$name = $row["toppingName"];
				//do something with the pic and filling??//
				echo "
				    <input type=\"checkbox\" name = $name value=$name>$name
				";

				}echo "</tbody> </table>";
		?>
	<body>
</html>
