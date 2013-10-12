<?php
	include 'API.php';

	$quantity = intval($_POST['quantity']);
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

	$email = $_SESSION['uname'];

	$getUserIDQuery = "SELECT userID FROM users WHERE(email = '$email')"; 
	$getFlavorID = "SELECT flavorID FROM flavor WHERE(flavorName = '$flavor')";
	$getFillingID = "SELECT fillingID FROM filling WHERE (fillingName = '$filling')";
	$getIcingID = "SELECT icingID FROM icing WHERE (icingName = '$icing')";

	$rgrow = mysqli_fetch_array($getFlavorID);
	$hgrow = mysqli_fetch_array($getFillingID);
	$ugrow = mysqli_fetch_array($getIcingID);
	$grow = mysqli_fetch_array($getUserIDQuery);

	$uID = intval($grow['userID']);
	$iceID = intval($ugrow['icingID']);
	$fillID = intval($hgrow['fillingID']);
	$cakeID = intval($rgrow['flavorID']);

	$insertAllQuery = "INSERT INTO purchases (purchaseID,quantity,cupcakeID,fillingID,icingID,userID)
			 VALUES ('$id', '$quantity', '$cakeID', '$fillID', '$iceID', '$uID')";
	mysqli_query($db,$insertAllQuery);

	if (!mysqli_query($db,$insertAllQuery)) {
		echo "There was an error processing your request. Please return to the previous page. Here's the error if you wanted to know:\n";
		die('Error: ' . mysqli_error($db));
	}

	mysql_close($con);

	//submitToDB2($formData);
?>
