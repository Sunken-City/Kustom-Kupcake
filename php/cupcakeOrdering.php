<?php

?>

<?php
	include 'API.php';

	$quantity = $_POST['quantity'];
	$flavor = $_POST['flavor'];
	$filling = $_POST['filling'];
	$icing = $_POST['icing'];
	
	$formData = array('quantity'=>$quantity,'flavor'=>$flavor,'filling'=>$filling,'icing'=>$icing);

	submitToDB2($formData);
?>
