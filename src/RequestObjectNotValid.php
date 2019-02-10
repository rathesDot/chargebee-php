<?php

namespace Chargebee;

use RuntimeException;

class RequestObjectNotValid extends RuntimeException
{
    public function __construct(string $requestObjectClassName)
    {
        parent::__construct("$requestObjectClassName is not a valid request object.");
    }
}