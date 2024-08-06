<?php
namespace App\Exceptions;

class UnauthorizedException extends \Exception
{
    public function __construct($message = 'UNAUTHORIZED', $code = 401, \Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}