<?php

namespace App\Exceptions;

use Throwable;

final class LocationNotFound extends \Exception
{
    public function __construct($code = 0, Throwable $previous = null)
    {
        parent::__construct('Unable to find the location with the given co-ordinates.', $code, $previous);
    }
}