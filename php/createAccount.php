<!-- Author: Nathan Moore -->
<!-- Receives form data from index.html, validates it, and sends to createAccoundDB.php for submission to database -->

<html>

	<head>

		<title>Create Account Form</title>

	</head>

	<body>

		<?php

			include 'createAccountDB.php';

			#############################################################################
			#validates user inputted email: Is it acceptably formatted for the database?#
			#############################################################################
			function validateEmail($email) {

				//
				return $email;
			}
			################################################################################
			#validates user inputted password: Is it acceptably formatted for the database?#
			################################################################################
			function validatePassword($pass) {

				//
				return $pass;
			}
			
			$submission = true; //if successful submission of the form
			$formData = array(); //an array to house the submitted from data
			//[0] = join
			//[1] = fname
			//[2] = lname
			//[3] = Email
			//[4] = newpwd
			//[5] = phone
			//[6] = Address
			//[7] = City
			//[8] = states
			//[9] = zip
			// OR
			//[0] = user (email)
			//[1] = pwd

			###############################################
			#Insert user input data from form in $formData#
			###############################################
			foreach($_POST as $key => $val) {

				$formData[$key] = htmlentities($val,ENT_QUOTES,'UTF-8');

				if (!isset($formData[$key])) {

					die("Invalid form data");
				}

			}
			######################################################
			# If user just submitted data to create a new account#
			######################################################
			if (isset($formData['join']) && isset($formData['fname']) && isset($formData['lname']) 
				&& isset($formData['Email']) && isset($formData['newpwd']) && isset($formData['phone']) 
				&& isset($formData['Address']) && isset($formData['City']) && isset($formData['states']) 
				&& isset($formData['zip']))  {
				//Validate all data: Make sure it's acceptable to input the given data to the database

				$submission = submitToDB($formData); // send validated data to next layer for submission to database

			} elseif (isset($formData['user']) && isset($formData['pwd'])) { //if user just submitted data as existing account
				//Validate and Authenticate data

				$formData['user'] = validateEmail($formData['user']);
				$formData['pwd'] = validatePassword($formData['pwd']);

			 	$submission = authenticate($formData);

			} else {

				die("Error loging in: Please go back to the previous page");
			}
			#######################################################
			#If form data was successfully authenticated/submitted#
			#######################################################
			if ($submission) {
				// Redirect to
	    		header("Location: http://Kustom-Kupcake/cupcakeordering.html");

			} else {

				die("Can't authenticate");
			}

		?>

	</body>

</html>