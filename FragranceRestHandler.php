<?php
require_once("SimpleRest.php");
require_once("Fragrance.php");
		
class FragranceRestHandler extends SimpleRest {

	function getAllFragrances() {	

		$fragrance = new Fragrance();
		$rawData = $fragrance->getAllFragrances();

		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No fragrance found!');		
		} else {
			$statusCode = 200;
		}

		$requestContentType = 'application/json';//$_POST['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
		
		$result["fragrances"] = $rawData;
				
		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($result);
			echo $response;
		}
	}
	
	public function encodeJson($responseData) {
		$jsonResponse = json_encode($responseData);
		return $jsonResponse;		
	}
}
?>