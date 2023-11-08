<?php

namespace App\Exceptions;

use Exception;

class ProductNotBelongsToUserException extends Exception
{
    public function render()
    {
        return ['errors' => 'Product Not Belongs To User Error !!!'];
    }
}
