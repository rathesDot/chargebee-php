<?php

namespace Chargebee;

class ChargeBee
{
    /**
     * @var string
     */
    private $site;

    /**
     * @var string
     */
    private $apiKey;

    /**
     * @var string
     */
    private $apiVersion;

    public function __construct(string $site, string $apiKey, string $apiVersion = 'v2')
    {
        $this->site = $site;
        $this->apiKey = $apiKey;
        $this->apiVersion = $apiVersion;
    }

    public function getApiVersion(): string
    {
        return $this->apiVersion;
    }
}
