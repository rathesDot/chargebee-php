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

    /**
     * @var array
     */
    private $requestObjects = [];

    /**
     * @var string
     */
    private $requestObjectsNamespace;

    public function __construct(
        ChargeBee $client,
        string $requestObjectsNamespace = self::REQUEST_OBJECTS_NAMESPACE
    ) {
        $this->client = $client;
        $this->requestObjectsNamespace = $requestObjectsNamespace;
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

        $className = $this->requestObjectsNamespace.ucfirst($name);

        if (!class_exists($className)) {
            throw new RequestObjectNotFound($className);
        }

        if (!in_array( Request::class, class_implements($className))) {
            throw new RequestObjectNotValid($className);
        }

        $this->requestObjects[$name] = new $className($this->client->getHttpClient());

        return $this->requestObjects[$name];
    }
}
