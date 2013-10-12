<?php
	include 'API.php';

	$quantity = $_POST['quantity'];
	$flavor = $_POST['flavor'];
	$filling = $_POST['filling'];
	$icing = $_POST['icing'];

	//$formData = array('quantity'=>$quantity,'flavor'=>$flavor,'filling'=>$filling,'icing'=>$icing);

	$db = mysqli_connect("localhost","cupcaker","nomnomnom","customcupcakes");

	if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_errno());
		exit();
	}

	$getMaxIDQuery = "SELECT max(purchases.purchaseID) FROM purchases";
	$getMaxID = mysqli_query($db,$getMaxIDQuery);

	$frow = mysqli_fetch_array($getMaxID);

	if ($frow['max(purchases.purchaseID)'] == null) {
		$frow['max(purchases.purchaseID)'] = 0;
	}

	$id = intval($frow['max(purchases.purchaseID)']);
	
	$id = $id + 1;

	$insertAllQuery = "INSERT INTO purchases (purchaseID,quantity,cupcakeID,fillingID,icingID,userID)
			 VALUES (123, 1, 1, 1, 1,1)";
	mysqli_query($db,$insertAllQuery);

	if (!mysqli_query($db,$insertAllQuery)) {
		echo "There was an error processing your request. Please return to the previous page. Here's the error if you wanted to know:\n";
		die('Error: ' . mysqli_error($db));
	}

	mysql_close($con);

	//submitToDB2($formData);
?>
