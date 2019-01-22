<?php

namespace Chargebee\Test;

use Chargebee\ChargeBee;
use Chargebee\Requests\Subscription;
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

    /**
     * @test
     */
    public function itCreatesInstanceFromApiCredentials()
    {
        $sdk = SDK::create('sitename', 'some-api-key', 'v1');

        $expectedClient = new ChargeBee('sitename', 'some-api-key', 'v1');

        $this->assertInstanceOf(SDK::class, $sdk);
        $this->assertEquals(
            $expectedClient,
            $sdk->getClient()
        );
    }

    /**
     * @test
     */
    public function itGetsTheCorrectRequestObject()
    {
        $sdk = SDK::create('sitename', 'some-api-key', 'v1');

        $this->assertInstanceOf(
            Subscription::class,
            $sdk->subscription
        );
    }
}