<?php

namespace Chargebee\Chargebee\Exceptions;

class ChargeBee_IOException extends Exception
{
    private $errorNo;

    public function __construct($message, $errorNo)
    {
        parent::__construct($message);
        $this->errorNo = $errorNo;
    }

    public function getCurlErrorCode()
    {
        return $this->errorNo;
    }
}
