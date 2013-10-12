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

		$getMaxIDQuery = "SELECT max(UserID) FROM users";
		$getMaxID = mysqli_query($db,$getMaxIDQuery);

		$frow = mysqli_fetch_array($getMaxID);

		if ($frow['max(UserID)'] == null) {
			$frow['max(UserID)'] = 0;
		}

		$id = intval($frow['max(UserID)']);

		#	$formData format: 		::		database columns:	
		#	[0] = join 				::	UserID				password
		#	[1] = fname 			::	onMailingList		telephone
		#	[2] = lname 			::	employee
		#	[3] = Email 			::	givenName
		#	[4] = newpwd 			::	surname
		#	[5] = phone 			::	streetAddress
		#	[6] = Address 		 	::	city
		#	[7] = City 				::	state
		#	[8] = states 			::	zipCode
		#	[9] = zip 				::	email
		
		$id = $id + 1;
		$onMailingList = "no";
		$employee = "no";
		$givenName = $formData['fname'];
		$surname = $formData['lname'];
		$streetAddress = $formData['Address'];
		$city = $formData['City'];
		$state = $formData['states'];
		$zipCode = $formData['zip'];
		$email = $formData['Email'];
		$password = $formData['newpwd'];
		$telephone = $formData['phone'];


		if ($formData['join'] === 'yes') {
			$onMailingList = "yes";
		}

		$insertAllQuery = "INSERT INTO users (UserID,onMailingList,employee,givenName,surname,streetAddress,city,state,zipCode,email,password,telephone)
			 VALUES ( '$id', '$onMailingList', '$employee', '$givenName', '$surname', '$streetAddress', '$city', '$state', '$zipCode', '$email', '$password', '$telephone')";
		//mysqli_query($db,$insertAllQuery);

		if (!mysqli_query($db,$insertAllQuery)) {
			echo "There was an error processing your request. Please return to the previous page. Here's the error if you wanted to know:\n";
			die('Error: ' . mysqli_error($db));
		}

		mysqli_close($db);

		return $submitted;
	}

	function populateFlavorTable()
	{
			$db = mysqli_connect("localhost","cupcaker","nomnomnom","customcupcakes");

			if (mysqli_connect_errno()) {
				printf("Connect failed: %s\n", mysqli_connect_errno());
				exit();
			}

			$result = mysqli_query($db,"SELECT * FROM flavor");

			while($row = mysqli_fetch_assoc($result)) {


				//do something with the pic and flavor??//
				}



	}

	function populateFillingTable()
	{
		$result = mysqli_query($db,"SELECT * FROM filling");
			while($row = mysqli_fetch_assoc($result)) {

				$rgbVal = $row["rgbVal"];
				$filling = $row["fillingName"];
				//do something with the pic and filling??//
				}
	}

	function populateIcingTable()
	{
		$result = mysqli_query($db,"SELECT * FROM icing");
			while($row = mysqli_fetch_assoc($result)){
				$pic = $row["picLoc"];
				$icing = $row["icingName"];
				//do something with the pic and filling??//
				}
				
	}

	function populateToppingTable(){
		
	}
?>