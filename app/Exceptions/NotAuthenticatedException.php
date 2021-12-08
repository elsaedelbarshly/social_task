<?php

namespace App\Exceptions;

use Exception;
use App\Helpers\ApiExceptionHandler;

class NotAuthenticatedException extends Exception
{
    use ApiExceptionHandler;
    public function render(){
    	return $this->renderException('ContentNotAuthenticatedException','You are Not Authenticated', 401);
    }
}
