<?php

namespace Chargebee;

use RuntimeException;

class RequestObjectNotFound extends RuntimeException
{
    public function __construct(string $requestObjectClassName)
    {
        parent::__construct("$requestObjectClassName was not found.");
    }
}
