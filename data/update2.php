<?php
importDataToDB();
function importDataToDB()
{
  echo("<html><body>");
  $con = mysql_connect("localhost", "cupcaker", "nomnomnom") or die ("Could not connect: " . mysql_error());
  mysql_select_db("customcupcakes", $con) or die ("Could not connect: " . mysql_error());
   
  mysql_query("load data local infile '54.200.82.84/github/Kustom-Kupcake/data/CustomCupcakesDBData-Users.csv' into table users fields terminated by ',' optionally enclosed by '\"' lines terminated by '\n' ignore 1 lines (UserID, onMailingList, givenName, surname, streetAddress, city, state, zipCode, email, password, telephone);"); 
  mysql_query("load data local infile '54.200.82.84/github/Kustom-Kupcake/data/CustomCupcakesDBData-ToppingsBridge.csv' into table toppingBridge fields terminated by ',' lines terminated by '\n' ignore 1 lines (bridgeID, cupcakeID, toppingID);");
  
  mysql_close($con);
  /*include 'simplexlsx.class.php';
  $xlsx = new SimpleXLSX('http://54.200.82.84/Kustom-Kupcake/data/CustomCupcakesDBData-FavoriteCupcakes.xlsx');
  echo( $xlsx->rows() );*/
  echo("Success!</body></html>");
}
?>
