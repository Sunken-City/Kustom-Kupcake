<!-- Author: Nathan Moore -->
<!-- Gets data from createAccount.php and communicates with database as necessary -->
<html>

	<head>

		<title>Create Account to Database Communication</title>

	</head>

	<body>

		<?php

			/*\
			|*|
			|*|		:: >> Input 'validated' user data to database for creating new user account << ::
			|*|		
			|*|			#connect to database
			|*|			#check if email inputted by user is already associated with a user
			|*|			#if not, then go and insert data into database
			|*|
			\*/

			function submitToDB($formData) {

				$submitted = true; /*Will change when I get a real database to work with*/
				$db = mysqli_connect("localhost","cupcaker","nomnomnom","customcupcakes");

				if (mysqli_connect_errno()) {
					printf("Connect failed: %s\n", mysqli_connect_errno());
					exit();
				}

				#check if email inputted by user is already associated with a user
				$checkEmailQuery = "SELECT email FROM users WHERE email = " . $formData['Email'];
				$checkEmail = mysqli_query($db,$checkEmailQuery);

				if (!(mysqli_num_rows($checkEmail) == 0)) {
					die('The email you entered is already associated with a user.
						 Please return to the previous page and log in with your 
						 password or use a different email.');
				}

				#if not, then go and insert data into database

				mysqli_close($db);

				return $submitted;
			}

		?>

	</body>

</html>