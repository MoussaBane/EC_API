<?php

namespace App\Exceptions;

use Exception;

class NotAccessException extends Exception
{
    public function render()
    {
        return [
            "errors" => "Access Denided !!!"
        ];
    }
}
