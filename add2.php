<?php
   	include("connect2.php");
   	
   	$link=Connection();

	$temp1=$_GET["ruch1"];
	

	$query = "INSERT INTO `ruchLog` (`ruch1`) 
		VALUES ('".$ruch1."')"; 
   	
   	mysql_query($query,$link);
	mysql_close($link);

   	
?>
