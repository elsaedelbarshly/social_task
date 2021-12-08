<?php


namespace App\Http\Traits;
use Illuminate\Http\Response;

trait ApiResponse{


    /**
	* Return response with json object
	* @param $responseObject, $responseKey, $statusCode 
	* @return \Illuminate\Http\JsonResponse
	*/
	public function sendJson($responseObject, $statusCode = 200, $responseKey = 'response'){
		$jsonResponse['statusCode'] = $statusCode;
		if($responseObject !== null)
			$jsonResponse[$responseKey] = $responseObject;
		return response($jsonResponse, $statusCode);
	}
	


	



}