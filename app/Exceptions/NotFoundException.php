<?php

namespace App\Exceptions;

use Exception;
//use App\Helpers\ApiExceptionHandler;

class NotFoundException extends Exception
{
   // use ApiExceptionHandler;
    public function render(){
    	
        $exceptionJson['statusCode'] = 400;
        $exceptionJson['error']['name'] = 'name';
        $exceptionJson['error']['message'] = 'message';

       
        return response()->json($exceptionJson,$exceptionJson['statusCode']);
    }
}