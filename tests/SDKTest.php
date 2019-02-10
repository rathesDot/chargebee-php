<?php

namespace Chargebee\Test;

use Chargebee\ChargeBee;
use Chargebee\RequestObjectNotFound;
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

    /**
     * @test
     */
    public function itThrowsIfRequestObjectWasNotFound()
    {
        $sdk = SDK::create('sitename', 'some-api-key', 'v1');

        $this->expectException(RequestObjectNotFound::class);
        $sdk->somethingElse;
    }

    /**
     * @test
     */
    public function itReturnsTheSameObjectIfAlreadyDefined()
    {
        $sdk = SDK::create('sitename', 'some-api-key', 'v1');

        $this->assertSame(
            $sdk->subscription,
            $sdk->subscription
        );
    }

    /**
     * @test
     */
    public function itThrowsIfRequestObjectDoesNotImplementsInterface()
    {
        $client = new ChargeBee('sitename', 'some-api-key', 'v1');
        $sdk = new SDK($client, 'Chargebee\\Test\\Dummy');

        $this->expectException(RequestObjectNotValid::class);
        $sdk->someClass;
    }
}
