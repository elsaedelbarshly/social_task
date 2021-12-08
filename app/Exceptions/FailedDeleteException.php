<?php

namespace App\Exceptions;

use Exception;
use App\Helpers\ApiExceptionHandler;

class FailedDeleteException extends Exception
{
    use ApiExceptionHandler;
    public function render(){
    	return $this->renderException('FailedDelete','Failed To Delete', 400);
    }
}
