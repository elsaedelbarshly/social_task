<?php

namespace App\Exceptions;

use Exception;
use App\Helpers\ApiExceptionHandler;

class FailedUpdateException extends Exception
{
    use ApiExceptionHandler;
    public function render(){
    	return $this->renderException('FailedUpdate','Failed To Update', 400);
    }
}
