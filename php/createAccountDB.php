<!-- Author: Nathan Moore -->

<html>

	<head>

		<title>Create Account to Database Communication</title>

	</head>

	<body>

		<?php
			//connect to the database: 
			$con = mysql_connect("localhost","cupcaker","nomnomnom");
			if (!$con)
			{
				die('Could not connect: ' . mysql_error());
			}
			mysql_select_db("customcupcakes",$con) or die("Unable to select database:" . mysql_error());

			function submitToDB($formData) {
				$submitted = true;

				return $submitted;
			}

			function authenticate($formData) {
				$authenticated = true;

				return $authenticated;
			}

		?>

	</body>

</html>