<!-- Author: Nathan Moore -->
<!-- Receives form data from index.html, validates it, and sends to createAccoundDB.php for submission to database -->

<html>

	<head>

		<title>Create Account Form</title>

	</head>

	<body>

		<?php

			include 'createAccountDB.php';
			
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

			###############################################
			#Insert user input data from form in $formData#
			###############################################
			foreach($_POST as $key => $val) {

				$formData[$key] = htmlentities($val,ENT_QUOTES,'UTF-8');

				if (!isset($formData[$key])) {

					break;
				}

			}
			######################################################
			# User just submitted data to create a new account#
			######################################################
			if (isset($formData['join']) && isset($formData['fname']) && isset($formData['lname']) 
				&& isset($formData['Email']) && isset($formData['newpwd']) && isset($formData['phone']) 
				&& isset($formData['Address']) && isset($formData['City']) && isset($formData['states']) 
				&& isset($formData['zip']))  {
				
				//strip out any nondigits
				$formData['phone'] = preg_replace(/\D/g, '', $formData['phone']);

				$submission = submitToDB($formData); // send validated data to next layer for submission to database

			}
			#######################################################
			#If form data was successfully authenticated/submitted#
			#######################################################
			if ($submission) {
				// Redirect to
	    		header("Location: http://Kustom-Kupcake/cupcakeordering.html");
			}

		?>

	</body>

</html>