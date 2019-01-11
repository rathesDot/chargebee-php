<?php

namespace Chargebee\Test;

use Chargebee\ChargeBee;
use PHPUnit\Framework\TestCase;

final class ChargebeeTest extends TestCase
{
    /**
     * @test
     */
    public function it_instantiates_a_client_for_v2()
    {
        $client = new Chargebee('siteName', 'api-key');

        $this->assertEquals('v2', $client->getApiVersion());
    }
}