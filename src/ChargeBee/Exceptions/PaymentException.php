<?php
class ChargeBee_PaymentException extends ChargeBee_APIError
{
    public function __construct($httpStatusCode, $jsonObject)
    {
        parent::__construct($httpStatusCode, $jsonObject);
    }
}
