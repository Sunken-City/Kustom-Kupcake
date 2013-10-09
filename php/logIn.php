<!-- Author: Nathan Moore -->
<!-- Gets data from mainScript.js ajax call and communicates with database as necessary -->
<html>

	<head>

		<title>Log In Database Communication</title>

	</head>

	<body>

		<?php
			###########################
			#connect to the database: #
			###########################
			$con = mysql_connect("localhost","cupcaker","nomnomnom");

			if (!$con) {

				die('Could not connect: ' . mysql_error());
			}

			mysql_select_db("customcupcakes",$con) or die("Unable to select database:" . mysql_error());
			############################################################
			#Check user credentials against known users: Query database#
			############################################################

			

			
			function authenticate($formData) {
				$authenticated = true;

				return $authenticated;
			}

			mysql_close($con);

		?>

	</body>

</html>