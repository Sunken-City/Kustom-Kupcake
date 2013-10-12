<?php
importDataToDB();
function importDataToDB()
{
  echo("<html><body>");
  $con = mysql_connect("localhost", "cupcaker", "nomnomnom") or die ("Could not connect: " . mysql_error());
  mysql_select_db("customcupcakes", $con) or die ("Could not connect: " . mysql_error());
   
  $sql = "LOAD DATA LOCAL INFILE '/var/www/Kustom-Kupcake/data/CustomCupcakesDBData-Users.csv'
        INTO TABLE users
        FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '\"'
        LINES TERMINATED BY '\n'
        IGNORE 1 LINES
        (UserID, onMailingList, givenName, surname, streetAddress, city, state, zipCode, email, password, telephone);
        ";
  
  mysql_query($sql);
   
  mysql_query("load data local infile '/var/www/Kustom-Kupcake/data/CustomCupcakesDBData-FavoriteCupcakes.csv' into table favorites fields terminated by ',' lines terminated by '\n' ignore 1 lines (FavoriteID, UserID, flavorID, icingID, fillingID)");
  
  mysql_query("load data local infile '/var/www/Kustom-Kupcake/data/CustomCupcakesDBData-ToppingsBridge.csv' into table toppingBridge fields terminated by ',' lines terminated by '\n' ignore 1 lines (bridgeID, cupcakeID, toppingID);");
  
  mysql_close($con);
  /*include 'simplexlsx.class.php';
  $xlsx = new SimpleXLSX('http://54.200.82.84/Kustom-Kupcake/data/CustomCupcakesDBData-FavoriteCupcakes.xlsx');
  echo( $xlsx->rows() );*/
  echo("Success!</body></html>");
}
?>
