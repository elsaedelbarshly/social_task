<?php

namespace App\Exceptions;

use Exception;
use App\Helpers\ApiExceptionHandler;

class NotFoundOrganizationException extends Exception
{
    use ApiExceptionHandler;
    public function render(){
    	return $this->renderException('NotFoundOrganizationException','Organization Not Found', 404);
    }
}