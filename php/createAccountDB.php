<!-- Author: Nathan Moore -->
<!-- Gets data from createAccount.php and communicates with database as necessary -->
<html>

	<head>

		<title>Create Account to Database Communication</title>

	</head>

	<body>

		<?php
			##############################################################
			#Input validated data to database: For creating a new account#
			##############################################################
			function submitToDB($formData) {

				$submitted = true;

				$con = mysql_connect("localhost","cupcaker","nomnomnom");
				if (!$con) {

					die('Could not connect: ' . mysql_error());
				}

				mysql_select_db("customcupcakes",$con) or die("Unable to select database:" . mysql_error());

				mysql_close($con);

				return $submitted;
			}

		?>

	</body>

</html>