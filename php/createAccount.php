<html>
	<head>
		<title>Create Account Form</title>
	</head>
	<body>
		<?php
			echo "Here I Am!";
			//will need to connect to the database
			// $con = mysql_connect("localhost","root","AtWsBcOotLFRR!");
			// if (!con)
			// {
			// 	die('Could not connect: ' .mysql_error());
			// }

			// mysql_select_db("customcupcakes", $con) or die("Unable to select database:" .mysql_error());
			// $query = 
			//get form data
			$formData = array(); //an array to house the submitted from data

			foreach($_POST as $key => $val)
			{
				$formData[$key] = htmlentities($val,ENT_QUOTES,'UTF-8');
			}

			if (isset($formData['telephone'])
			{
				//$expression = array('telephone')
			}

		?>
	</body>
</html>