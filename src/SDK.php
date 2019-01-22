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

    public static function create(string $siteName, string $apiKey, string $apiVersion) : self
    {
        $client = new ChargeBee($siteName, $apiKey, $apiVersion);

        return new self($client);
    }

    public function getClient(): ChargeBee
    {
        return $this->client;
    }
}