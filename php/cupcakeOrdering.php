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

			while($row = mysqli_fetch_assoc($result)) {

				$pic = $row["picLoc"];
				$flavor = $row["flavorName"];
				//do something with the pic and flavor??//
				echo "picLoc: " . $pic . " & flavorName: " . $flavor;
				echo "<br>";
			}


			$result = mysqli_query($db,"SELECT * FROM filling");
			echo "<br>";

			while($row = mysqli_fetch_assoc($result)) {

				$pic = $row["rgbVal"];
				$filling = $row["fillingName"];
				//do something with the pic and filling??//
				echo "rgbVal: " . $pic . " & fillingName: " . $filling;
				echo "<br>";
			}

			$result = mysqli_query($db,"SELECT * FROM icing");
			echo "<br>";

			while($row = mysqli_fetch_assoc($result)){
				$pic = $row["picLoc"];
				$icing = $row["icingName"];
				//do something with the pic and filling??//
				echo "picLoc: " . $pic . " & icingName: " . $icing;
				echo "<br>";
			}
			die("Get rid of this die after you test this page if not sooner");
		?>
	<body>
</html>
