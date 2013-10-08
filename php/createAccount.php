<!-- Author: Nathan Moore -->

<html>

	<head>

		<title>Create Account Form</title>

	</head>

	<body>

		<?php
			include 'createAccountDB.php';
			
			$submission = false;
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
			// OR
			//[0] = username
			//[1] = password


			foreach($_POST as $key => $val)
			{
				$formData[$key] = htmlentities($val,ENT_QUOTES,'UTF-8');
				if (!isset($formData[$key]))
				{
					die("Invalid form data");
				}
			}

			if (sizeof($formData) < 10) {
				$submission = authenticate($formData);
			} else
			{
				$submission = submitToDB($formData);
			}

			if (submission)
			{
				// If processing was successful, redirect
	    		header("Location: http://Kustom-Kupcake/cupcakeordering.html");
			} else
			{
				die("Can't authenticate");
			}
			

		?>

	</body>

</html>