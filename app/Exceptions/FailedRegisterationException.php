<?php

namespace App\Exceptions;

use Exception;
use App\Helpers\ApiExceptionHandler;

class FailedRegisterationException extends Exception
{
    use ApiExceptionHandler;
    public function render(){
    	return $this->renderException('FailedRegisteration','Failed To register', 400);
    }
}
