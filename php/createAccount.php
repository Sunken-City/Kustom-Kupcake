<!-- Author: Nathan Moore -->

<html>
	<head>
		<title>Create Account Form</title>
	</head>
	<body>
		<?php
			
			$formData = array(); //an array to house the submitted from data

			foreach($_POST as $key => $val)
			{
				$formData[$key] = htmlentities($val,ENT_QUOTES,'UTF-8');
			}

			

		?>
	</body>
</html>