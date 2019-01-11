<?php

namespace Chargebee;

use InvalidArgumentException;

class ChargeBee
{
    const ALLOWED_API_VERSIONS = ['v1', 'v2'];

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

        if (!in_array($apiVersion, self::ALLOWED_API_VERSIONS)) {
            throw new InvalidArgumentException("$apiVersion is not a valid API version.");
        }

        $this->apiVersion = $apiVersion;
    }

    public function getApiVersion(): string
    {
        return $this->apiVersion;
    }
}
