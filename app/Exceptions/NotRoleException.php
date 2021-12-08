<?php

namespace App\Exceptions;

use Exception;
use App\Helpers\ApiExceptionHandler;

class NotRoleException extends Exception
{
    use ApiExceptionHandler;
    public function render(){
    	return $this->renderException('ContentNotFound','You Dont have Role to Get this element', 404);
    }
}