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

				$submitted = true; /*Will change when I get a real database to work with*/

				$con = mysql_connect("projectsite","phpuser","some_pass");
				if (!$con)
				{
					die('Could not connect: ' . mysql_error());
				}
				mysql_select_db("phptest",$con) or die("Unable to select database:" . mysql_error());
			
				$query = "select * from user where email = '";
				$query = $query . $_POST['id'] . "' and password = '" . $_POST['pw'] . "'";

				$result = mysql_query($query);

				if (mysql_num_rows($result) == 0)
					header ('Location: http://projectsite/error.html');
				else
					header ('Location: http://projectsite/success.html');

				mysql_close($con);

				return $submitted;
			}

		?>

	</body>

</html>
