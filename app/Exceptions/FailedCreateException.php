<?php

namespace App\Exceptions;

use Exception;
use App\Helpers\ApiExceptionHandler;

class FailedCreateException extends Exception
{
    use ApiExceptionHandler;
    public function render(){
    	return $this->renderException('FailedCreate','Failed To Create', 400);
    }
}