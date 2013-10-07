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
				if (isset($formData[$key]))
				{
					echo $key . ": " . $val . "&";
				} else
				{
					echo 'false\n';
				}
			}

		?>
	</body>
</html>