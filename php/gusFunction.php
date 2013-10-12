<?php

  getFillings();
  
  //Goes and grabs all of the values that Gustavo needed from the database.
  function getFillings()
  {
    echo ("<HTML><BODY> Fillings: \n");
    //Connect to the database
    $con = mysql_connect("localhost", "cupcaker", "nomnomnom") or die ("Could not connect: " . mysql_error());
    mysql_select_db("customcupcakes", $con) or die ("Could not connect: " . mysql_error());
    
    $counts = array();
    for ($i = 0; $i < 9; $i++)
    {
      $result = mysql_query("SELECT count(purchases.purchaseID) FROM (purchases NATURAL JOIN filling) WHERE (filling.fillingID = $i);");
      $counts[$i] = mysql_result($result, 0);
      echo ($counts[$i]."\n");
    }
    echo ("</BODY></HTML>");
  }


?>