<?php

  getFillings();
  getIcings();
  getFlavors();
  //Goes and grabs all of the values that Gustavo needed from the database.
  function getFillings()
  {
    echo ("<HTML><BODY> Fillings: \n");
    //Connect to the database
    $con = mysql_connect("localhost", "cupcaker", "nomnomnom") or die ("Could not connect: " . mysql_error());
    mysql_select_db("customcupcakes", $con) or die ("Could not connect: " . mysql_error());
    
    $counts = array();
    for ($i = 1; $i < 10; $i++)
    {
      $result = mysql_query("SELECT count(purchases.purchaseID) FROM (purchases NATURAL JOIN filling) WHERE (filling.fillingID = $i);");
      $counts[$i] = mysql_result($result, 0);
      echo ($counts[$i]."\n");
    }
    echo ("</BODY></HTML>");
  }

  function getIcings()
  {
    echo ("<HTML><BODY> Icings: \n");
    //Connect to the database
    $con = mysql_connect("localhost", "cupcaker", "nomnomnom") or die ("Could not connect: " . mysql_error());
    mysql_select_db("customcupcakes", $con) or die ("Could not connect: " . mysql_error());
    
    $counts = array();
    for ($i = 1; $i < 25; $i++)
    {
      $result = mysql_query("SELECT count(purchases.purchaseID) FROM (purchases NATURAL JOIN icing) WHERE (icing.icingID = $i);");
      $counts[$i] = mysql_result($result, 0);
      echo ($counts[$i]."\n");
    }
    echo ("</BODY></HTML>");
  }

  function getFlavors()
  {
    echo ("<HTML><BODY> Flavors: \n");
    //Connect to the database
    $con = mysql_connect("localhost", "cupcaker", "nomnomnom") or die ("Could not connect: " . mysql_error());
    mysql_select_db("customcupcakes", $con) or die ("Could not connect: " . mysql_error());
    
    $counts = array();
    for ($i = 1; $i < 15; $i++)
    {
      $result = mysql_query("SELECT count(purchases.purchaseID) FROM (purchases NATURAL JOIN flavor) WHERE (flavor.flavorID = $i);");
      $counts[$i] = mysql_result($result, 0);
      echo ($counts[$i]."\n");
    }
    echo ("</BODY></HTML>");
  }

?>