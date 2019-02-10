<?php

namespace Chargebee;

use GuzzleHttp\ClientInterface;

interface Request
{
    public function __construct(ClientInterface $client);
}