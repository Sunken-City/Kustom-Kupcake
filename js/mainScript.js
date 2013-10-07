//Author: Nathan Moore
$(document).ready(function(){
   
	$con = mysql_connect("Kustom-Kupcake","root","AtWsBcOotLFRR!");
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db("customcupcakes",$con) or die("Unable to select database:" . mysql_error());

 });