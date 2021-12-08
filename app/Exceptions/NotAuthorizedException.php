<?php

namespace App\Exceptions;

use Exception;
use App\Helpers\ApiExceptionHandler;

class NotAuthorizedException extends Exception
{
    use ApiExceptionHandler;
    public function render(){
    	return $this->renderException('ContentNotAuthorizedException','You are not authorized', 403);
    }
}
