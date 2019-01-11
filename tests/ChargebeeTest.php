<?php

namespace Chargebee\Test;

use Chargebee\ChargeBee;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

final class ChargebeeTest extends TestCase
{
    /**
     * @test
     */
    public function itInstantiatesAClientForV2()
    {
        $client = new Chargebee('siteName', 'api-key');

        $this->assertEquals('v2', $client->getApiVersion());
    }

    /**
     * @test
     */
    public function itThrowsForInvalidApiVersions()
    {
        $client = new Chargebee('siteName', 'api-key', 'v2');
        $this->assertEquals('v2', $client->getApiVersion());

        $client = new Chargebee('siteName', 'api-key', 'v1');
        $this->assertEquals('v1', $client->getApiVersion());

        $this->expectException(InvalidArgumentException::class);
        new Chargebee('siteName', 'api-key', 'v3');
    }
}
