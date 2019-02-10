<?php

namespace Chargebee\Requests;

use Chargebee\Request;
use GuzzleHttp\ClientInterface;

class Subscription implements Request
{
    /**
     * @var ClientInterface
     */
    private $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }
}
