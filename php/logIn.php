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
			$authenticated = true;
			$username = $_POST['username'];
			$password = $_POST['password'];

			//die ($username . "&" . $password);

			$db = mysqli_connect("localhost","cupcaker","nomnomnom","customcupcakes");

			if (mysqli_connect_errno()) {
				printf("Connect failed: %s\n", mysqli_connect_errno());
				exit();
			}
			############################################################
			#Check user credentials against known users: Query database#
			############################################################

			mysql_close($con);

		?>

	</body>

</html>