<?php
	
	$cupcakeName = $_GET['cupcakeName']
	$flavor= $_GET['flavor'];
	$filling = $_GET['action'];
	$icing = $_GET['icing'];
	$toppings = $_GET['toppings'];
	$quantity = $_GET['quantity'];
	$action = $_GET['action'];

	switch($action){

			case "add":
				$_SESSION['cart'][$flavor,$filling,$icing,$toppings]+=$quantity; //Add to the cart a cupcake of flavor, filling, icing, and toppings with the desired quantity
			break;

			case "empty":
				unset($_SESSION['cart']); //Empty cart
				break;
	}

?>