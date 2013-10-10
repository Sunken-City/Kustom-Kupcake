<?php
function importDataToDB()
{
  $con = mysql_connect("localhost", "cupcaker", "nomnomnom") or die ("Could not connect: " . mysql_error());
  mysql_select_db("customcupcakes", $con) or die ("Could not connect: " . mysql_error());

  $json_string = 'http://54.200.82.84/Kustom-Kupcake/data/menu.json';
  $json = file_get_contents($json_string);
  
  $result = json_decode($json, TRUE);
  /*foreach($result as $value) 
  {
      if($value) 
      {
	  //mysql_query
	  echo("INSERT INTO cupcakes (flavorID, ypos, template) VALUES ($value['menu']['cakes']['flavor'], $value->ypos,$value->template)");
      }
  mysql_close($con);
  }*/
  include 'simplexlsx.class.php';
  $xlsx = new SimpleXLSX('http://54.200.82.84/Kustom-Kupcake/data/CustomCupcakesDBData-FavoriteCupcakes.xlsx');
  print_r( $xlsx->rows() );
}
?>