<?php
require_once("dbcontroller.php");
/* 
A domain Class to demonstrate RESTful web services
*/
Class Fragrance {
	private $fragrance = array();
	/*
		you should hookup the DAO here
	*/
	public function getAllFragrances(){
		$query = "SELECT * FROM rooms";
		$dbcontroller = new DBController();
		$this->fragrance = $dbcontroller->executeSelectQuery($query);
		return $this->fragrance;
	}	
}
?>