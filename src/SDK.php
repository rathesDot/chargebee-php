<?php

namespace Chargebee;

use Chargebee\Requests\Subscription;

/**
 * @property Subscription subscription
 */
class SDK
{
    const REQUEST_OBJECTS_NAMESPACE = '\\Chargebee\Requests\\';

    /**
     * @var ChargeBee
     */
    private $client;

    private $requestObjects = [];

    public function __construct(ChargeBee $client)
    {
        $this->client = $client;
    }

    public static function create(string $siteName, string $apiKey, string $apiVersion): self
    {
        $client = new ChargeBee($siteName, $apiKey, $apiVersion);

        return new self($client);
    }

    public function getClient(): ChargeBee
    {
        return $this->client;
    }

    public function __get(string $name)
    {
        if (isset($this->requestObjects[$name])) {
            return $this->requestObjects[$name];
        }

        $className = self::REQUEST_OBJECTS_NAMESPACE.ucfirst($name);

        if (!class_exists($className)) {
            throw new RequestObjectNotFound($className);
        }

        $this->requestObjects[$name] = new $className();

        return $this->requestObjects[$name];
    }
}
