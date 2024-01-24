<?php

namespace App\Exceptions;

use Exception;

class RegisterAdminException extends Exception
{

    function __construct(string $message)
    {
        parent::$message = $message;
    }
}
