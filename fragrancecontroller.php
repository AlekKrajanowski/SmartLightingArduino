<?php
require_once("FragranceRestHandler.php");
		
$view = "";
if(isset($_GET["view"]))
	$view = $_GET["view"];
/*
controls the RESTful services
URL mapping
*/
switch($view){

	case "all":
		// to handle REST Url /mobile/list/
		$fragranceRestHandler = new FragranceRestHandler();
		$fragranceRestHandler->getAllFragrances();
		break;

	case "" :
		//404 - not found;
		break;
}
?>
