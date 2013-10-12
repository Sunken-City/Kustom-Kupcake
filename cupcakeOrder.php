<!DOCTYPE HTML>

<html lang="en">
	<head>
		<title>Custom Cupcakes</title>
		<link rel="stylesheet" type="text/css" href="css/mainStyle.css">
                <link rel="shortcut icon" href="artwork/cupcake_icon.ico" type="image/x-icon">
    	<script type = "text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    	<script type ="text/javascript" src="js/cupcakeordering.js"></script>
	</head>	

	<body>
			<table id="Favorites">
				<caption> Favorites </caption>
				<tbody>
					<?php
						$db = mysqli_connect("localhost","cupcaker","nomnomnom","customcupcakes");

						if (mysqli_connect_errno()) {
						printf("Connect failed: %s\n", mysqli_connect_errno());
						exit();

						$user = $_SESSION['uname'];
						$result = mysqli_query($db,"SELECT * FROM favorites WHERE(userID = '$user');");

					while($row = mysqli_fetch_assoc($result)) {

					$cupcakeName = $row["cupcakeName"];

					$flavorId = $row["cupcakeID"];
					$flavor = mysqli_query($db,"SELECT flavorName FROM flavor WHERE(flavorID = '$flavorId');");

					$fillingId = $row["fillingID"];
					$filling = mysqli_query($db,"SELECT fillingName FROM filling WHERE(fillingID = '$fillingId');");

					$icingId = $row["icingID"];
					$icing = mysqli_query($db,"SELECT icingName FROM icing WHERE(icingID = '$icingId');");

					$toppingId = $row["favoriteID"];
					$topping = mysqli_query($db,"SELECT toppingName FROM toppingBridge,topping WHERE(toppingBridge.favoriteID = '$toppingId');");

					//do something with the pic and flavor??//
					echo "<tr>"
					echo "<td name=$cupcakeName> $cupcakeName"
					echo "<td name=$flavor> $flavor </td>";
					echo "<td name=$filling> $filling </td>";
					echo "<td name=$icing> $icing </td>";
					echo "<td name=$topping> $topping </td>";
					echo "</tr>";
					}


				}
					?>
				</tbody>
			</table>
        
	<div id="OptionsHolder">
	<div>
        		<nav id="Flavorholder" class="OptionTable">
		<table id="Flavor" class="Tables">
			<tbody>
			<?php
				$db = mysqli_connect("localhost","cupcaker","nomnomnom","customcupcakes");

				if (mysqli_connect_errno()) {
					printf("Connect failed: %s\n", mysqli_connect_errno());
					exit();
				}

				$result = mysqli_query($db,"SELECT * FROM flavor");

				while($row = mysqli_fetch_assoc($result)) {

					$pic = $row["picLoc"];
					$flavor = $row["flavorName"];
					//do something with the pic and flavor??//
					echo "<td name=$flavor> <img src=\"http://54.200.82.84/Kustom-Kupcake/artwork/$pic\" alt=$flavor name = $flavor> $flavor </td>";

				}

			?>	
			</tbody>
		</table>
                </nav>
        </div>
        <div id="Fillingholder"  class="OptionTable">
        	<nav>
		<table id="Filling" class="Tables">
			<tbody>
				<?php
					$db = mysqli_connect("localhost","cupcaker","nomnomnom","customcupcakes");
					if (mysqli_connect_errno()) {
					printf("Connect failed: %s\n", mysqli_connect_errno());
					exit();
				}
					$result = mysqli_query($db,"SELECT * FROM filling");
					while($row = mysqli_fetch_assoc($result)) {

						$rgbVal = $row["rgbVal"];
						$filling = $row["fillingName"];
						//do something with the pic and filling??//
						echo "
				
						<td name=$filling bgcolor=$rgbVal>
							 $filling
						</td>";

				}
				?>
			</tbody>
		</table>
			</nav>
		</div>

		<div>
			<nav id="Icingholder"  class="OptionTable">
		<table id="Icing" class="Tables">
			<tbody>
			<?php
			$db = mysqli_connect("localhost","cupcaker","nomnomnom","customcupcakes");
			if (mysqli_connect_errno()) {
					printf("Connect failed: %s\n", mysqli_connect_errno());
					exit();
				}
			$result = mysqli_query($db,"SELECT * FROM icing");
			while($row = mysqli_fetch_assoc($result)){
				$pic = $row["picLoc"];
				$icing = $row["icingName"];
				//do something with the pic and filling??//
				echo "
				
					<td name=$icing>
					<img src=\"http://54.200.82.84/Kustom-Kupcake/artwork/$pic\" alt=$icing name=$icing> $icing
					</td>";

				}
				?>
			</tbody>
		</table>
			</nav>
		</div>



		
		<div id="toppings"  class="OptionTable">
			<?php
			$db = mysqli_connect("localhost","cupcaker","nomnomnom","customcupcakes");
			if (mysqli_connect_errno()) {
					printf("Connect failed: %s\n", mysqli_connect_errno());
					exit();
				}

			$result = mysqli_query($db,"SELECT * FROM topping");

			while($row = mysqli_fetch_assoc($result)){
				$name = $row["toppingName"];
				//do something with the pic and filling??//
				echo "
				    <input type=\"checkbox\" name = $name value=$name>$name
				";

				}
				?>
		</div>
			<input type = "button" id="checkAll" name="CheckAll" value="All Toppings"
			onClick="checkAll(document.all)">

			<input type ="button" id="uncheckAll" name="UncheckAll" value = "Clear All Toppings"
			onClick="uncheckAll (document.all)">
			
		
		
		<div id="cupcakeOptions">
			<input type ="button" id = "resetCupcake" name="ResetCupcake" value="Reset Cupcake">
			<div id="quantity">
				<input id = "quantityCupcakes" type="number" min="0" max="99999"/>
			</div>
			<input type ="button" id="updateOrder" name="UpdateOrder" value ="Update Order"
			>
		</div>
		
		<div>
			<input type="submit" id="submitOrder" name="analyticsSubmit" value = "Submit Order">
		</div>
   		<div>
			<input type="submit" id="addFavs" name="addToFavorites" value = "Add to Favorites">
		</div>
	</div>
		
		<div id="shoppingCart">
			<input type="button" id="deleteRow" name="deleteRow" value = "Delete Selected Rows">
			<table id="cupcakeCart">
				<tbody>
				</tbody>
			</table>
		</div>
	</body>
</html>
