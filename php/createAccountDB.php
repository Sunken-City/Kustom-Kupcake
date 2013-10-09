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

				$con = mysql_connect("localhost","cupcaker","nomnomnom"); /*will change for real server*/
				if (!$con) {

					die('Could not connect: ' . mysql_error());
				}

				mysql_select_db("customcupcakes",$con) or die("Unable to select database:" . mysql_error());

				/*\
				|*|
				|*|					:: << TODO >> ::
				|*|		# See if the user email is already in database
				|*|		# If it is, then do something about it
				|*|			% ...
				|*|			% ...
				|*|		# If not (Yay!) add new data to database
				|*|
				|*|
				|*|
				\*/

				$getEmailIfExists = "la la";

				mysql_close($con);

				return $submitted;
			}

		?>

	</body>

</html>