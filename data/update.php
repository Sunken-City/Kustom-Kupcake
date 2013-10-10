<?php
function importDataToDB()
{
  $con = mysql_connect("localhost", "cupcaker", "nomnomnom") or die ("Could not connect: " . mysql_error());
  mysql_select_db("customcupcakes", $con) or die ("Could not connect: " . mysql_error());

  $json_string = 'http://54.200.82.84/Kustom-Kupcake/data/menu.json';
  $json = file_get_contents($json_string);
  
  $result = json_decode($json);
  foreach($result as $key => $value) 
  {
      if($value) 
      {

	      //how to use json array to insert data in Database
	  mysql_query("INSERT INTO customcupcakes (source, ypos, template) VALUES ($value->source, $value->ypos,$value->template)");
      }
  mysql_close($con);
  }
}
?>