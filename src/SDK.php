<?php

namespace Chargebee;

class SDK
{
    /**
     * @var ChargeBee
     */
    private $client;

    public function __construct(ChargeBee $client)
    {
        $this->client = $client;
    }
}