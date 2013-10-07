<!-- Author: Nathan Moore -->

<html>

	<head>

		<title>Create Account Form</title>

	</head>

	<body>

		<?php
			
			$formData = array(); //an array to house the submitted from data
			//[0] = joinYes || joinNo
			//[1] = firstName
			//[2] = lastName
			//[3] = email
			//[4] = password
			//[5] = telephone
			//[6] = address
			//[7] = city
			//[8] = state
			//[9] = zipcode


			foreach($_POST as $key => $val)
			{
				$formData[$key] = htmlentities($val,ENT_QUOTES,'UTF-8');
				if (!isset($formData[$key]))
				{
					die("Invalid form data");
				}
			}

			//connect to the database: 
			$con = mysql_connect("localhost","cupcaker","nomnomnom");
			if (!$con)
			{
				die('Could not connect: ' . mysql_error());
			}
			mysql_select_db("customcupcakes",$con) or die("Unable to select database:" . mysql_error());

			// If processing was successful, redirect
	    	header("Location: http://Kustom-Kupcake/cupcakeordering.html");

		?>

	</body>

</html>