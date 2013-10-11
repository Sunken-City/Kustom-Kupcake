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
				echo '
				
					<td name="$flavor">
						<img src="artwork/'$pic'" alt="$flavor"> "$flavor"
					</td>';

				}echo "</tbody></table>";


			$result = mysqli_query($db,"SELECT * FROM filling");
			echo "<br>";
			echo "<table>
					<tbody>";
			while($row = mysqli_fetch_assoc($result)) {

				$pic = $row["rgbVal"];
				$filling = $row["fillingName"];
				//do something with the pic and filling??//
				echo '
				
					<td name="$filling">
						<img src="artwork/'$pic'" alt="$filling"> "$filling"
					</td>';

				}echo "</tbody> </table>";


			$result = mysqli_query($db,"SELECT * FROM icing");
			echo "<br>";
			echo "<table>
					<tbody>";
			while($row = mysqli_fetch_assoc($result)){
				$pic = $row["picLoc"];
				$icing = $row["icingName"];
				//do something with the pic and filling??//
				echo '
				
					<td name="$icing">
					</td>';

				}echo "</tbody> </table>";
		?>
	<body>
</html>
