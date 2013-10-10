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
			|*|			:: >> Input 'validated' user data to database << ::
			|*|				:: >> For creating new user account << ::
			|*|		
			|*|		#connect to database
			|*|		#check if email inputted by user is already associated with a user
			|*|		#if not, then go and insert data into database
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

				###############################################
				#If not, then go and insert data into database#
				###############################################

				#first must get the highest current user id and add 1 to it to make the new user's id

				$getMaxIDQuery = "SELECT max(UserId) FROM users";
				$getMaxID = mysqli_query($db,$getMaxIDQuery);

				$frow = mysqli_fetch_array($getMaxID);

				$id = intval($frow['max(UserId)']);
				$id++;

				//$formdata format: 	::	database columns:
				//[0] = join 			::	
				//[1] = fname 			::
				//[2] = lname 			::
				//[3] = Email 			::
				//[4] = newpwd 			::
				//[5] = phone 			::
				//[6] = Address 		::
				//[7] = City 			::
				//[8] = states 			::
				//[9] = zip 			::

				mysqli_close($db);

				return $submitted;
			}

		?>

	</body>

</html>