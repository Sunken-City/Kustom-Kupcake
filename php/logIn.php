		<?php
			###########################
			#connect to the database: #
			###########################
			$authenticated = true;
			$formData = array();

			foreach($_POST as $key => $val) {

				$formData[$key] = htmlentities($val,ENT_QUOTES,'UTF-8');

				if (!isset($formData[$key])) {

					break;
				}

			}

			//die ($username . "&" . $password);

			$db = mysqli_connect("localhost","cupcaker","nomnomnom","customcupcakes");

			if (mysqli_connect_errno()) {
				printf("Connect failed: %s\n", mysqli_connect_errno());
				exit();
			}
			############################################################
			#Check user credentials against known users: Query database#
			############################################################

			// $requestString = "SELECT email,password FROM users WHERE (email = '$formData['Email']' && password = '$formData['user']')";

			// $request = mysqli_query($db,$requestString);

			// if (mysqli_num_rows($request) == 0) {
			// 	$authenticated = false;
			// }

			mysql_close($con);

			$postData = array('success' => false);

			//header("js/mainScript.js");
			die (json_encode($postData));

		?>