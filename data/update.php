<?php
importDataToDB();
function importDataToDB()
{
  echo("<html><body>");
  $con = mysql_connect("localhost", "cupcaker", "nomnomnom") or die ("Could not connect: " . mysql_error());
  mysql_select_db("customcupcakes", $con) or die ("Could not connect: " . mysql_error());

  $json_string = 'http://54.200.82.84/Kustom-Kupcake/data/menu.json';
  $json = file_get_contents($json_string);
  
  $result = json_decode($json, TRUE);
  $i = 0;
  //foreach($result as $value) 
  {
	  //mysql_query
	  echo("INSERT INTO flavor (flavorID, flavorName, picLoc) VALUES (".$i."," 
	  .$result['menu']['cakes'][$i]['flavor']."," 
	  .$result['menu']['cakes'][$i]['img_url'].")");
	  $i++;
  //mysql_close($con);
  }
  /*include 'simplexlsx.class.php';
  $xlsx = new SimpleXLSX('http://54.200.82.84/Kustom-Kupcake/data/CustomCupcakesDBData-FavoriteCupcakes.xlsx');
  echo( $xlsx->rows() );*/
  echo("</html></body>");
}
?>