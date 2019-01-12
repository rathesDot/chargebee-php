<?php

namespace Chargebee\Test;

use Chargebee\ChargeBee;
use Chargebee\Response;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response as GuzzleResponse;
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

    /**
     * @test
     */
    public function itSendsAGetRequest()
    {
        $mock = new MockHandler([
            new GuzzleResponse(200, ['X-Foo' => 'Bar'], json_encode(['test' => 'test2'])),
        ]);

        $container = [];
        $history = Middleware::history($container);

        $stack = HandlerStack::create($mock);
        $stack->push($history);

        $httpClient = new Client([
            'handler' => $stack,
        ]);

        $client = new ChargeBee('site', 'api-key', 'v2', $httpClient);

        $response = $client->get('/subscription');

        /** @var Request $request */
        $request = $container[0]['request'];

        $this->assertEquals('/api/v2/subscription', $request->getUri()->getPath());
        $this->assertEquals('site.chargebee.com', $request->getUri()->getHost());
        $this->assertInstanceOf(Response::class, $response);
        $this->assertEquals(['test' => 'test2'], $response->getParsedBody());
    }
}
