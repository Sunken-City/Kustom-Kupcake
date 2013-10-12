<?php
importDataToDB();
function importDataToDB()
{
  echo("<html><body>");
  $db = mysqli_connect("localhost","cupcaker","nomnomnom","customcupcakes");

	if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_errno());
		exit();
	}
   
  mysqli_query("SOURCE /var/www/Kustom-Kupcake/data/populate.sql");
        
  echo "echo";
		if (!mysqli_query($db,$sql)) {
			echo "There was an error processing your request. Please return to the previous page. Here's the error if you wanted to know:\n";
			die('Error: ' . mysqli_error($db));
		}
  
  mysqli_close($db);
  /*include 'simplexlsx.class.php';
  $xlsx = new SimpleXLSX('http://54.200.82.84/Kustom-Kupcake/data/CustomCupcakesDBData-FavoriteCupcakes.xlsx');
  echo( $xlsx->rows() );*/
  echo("Success!</body></html>");
}
?>
