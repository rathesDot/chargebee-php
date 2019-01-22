<?php

namespace Chargebee\Test;

use Chargebee\ChargeBee;
use Chargebee\SDK;
use PHPUnit\Framework\TestCase;

class SDKTest extends TestCase
{
    /**
     * @test
     */
    public function itCreatesInstancesOfAnSDK()
    {
        $client = new ChargeBee('sitename', 'some-api-key');
        $sdk = new SDK($client);

        $this->assertInstanceOf(SDK::class, $sdk);
    }
}