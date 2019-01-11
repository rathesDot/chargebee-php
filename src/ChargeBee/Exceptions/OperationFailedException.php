<?php

namespace Chargebee\Chargebee\Exceptions;

class ChargeBee_OperationFailedException extends ChargeBee_APIError
{
    public function __construct($httpStatusCode, $jsonObject)
    {
        parent::__construct($httpStatusCode, $jsonObject);
    }
}
