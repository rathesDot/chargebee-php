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
     * @var MockHandler
     */
    private $handler;

    /**
     * @var array
     */
    private $requestContainer;

    /**
     * @var ChargeBee
     */
    private $client;

    protected function setUp()
    {
        $this->handler = new MockHandler([]);

        $this->requestContainer = [];

        $history = Middleware::history($this->requestContainer);
        $stack = HandlerStack::create($this->handler);
        $stack->push($history);

        $httpClient = new Client([
            'handler' => $stack,
        ]);

        $this->client = new ChargeBee('site', 'api-key', 'v2', $httpClient);
    }

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
        $this->handler->append(new GuzzleResponse(200, ['X-Foo' => 'Bar'], json_encode(['test' => 'test2'])));

        $response = $this->client->get('/subscription');

        /** @var Request $request */
        $request = $this->requestContainer[0]['request'];

        $this->assertEquals('/api/v2/subscription', $request->getUri()->getPath());
        $this->assertEquals('site.chargebee.com', $request->getUri()->getHost());
        $this->assertEquals(['Basic '.base64_encode('api-key:')], $request->getHeader('Authorization'));
        $this->assertInstanceOf(Response::class, $response);
        $this->assertEquals(['test' => 'test2'], $response->getParsedBody());
    }

    /**
     * @test
     */
    public function itSendsAPostRequest()
    {
        $this->handler->append(new GuzzleResponse(200, ['X-Foo' => 'Bar'], json_encode(['test' => 'test2'])));

        $body = [
            'some' => 'key',
            'more' => [
                'item-a',
                'item-b',
                'item-c',
            ],
        ];
        $response = $this->client->post('/subscription', $body);

        /** @var Request $request */
        $request = $this->requestContainer[0]['request'];

        $this->assertEquals('/api/v2/subscription', $request->getUri()->getPath());
        $this->assertEquals('site.chargebee.com', $request->getUri()->getHost());
        $this->assertEquals(['Basic '.base64_encode('api-key:')], $request->getHeader('Authorization'));
        parse_str(urldecode($request->getBody()->getContents()), $result);
        $this->assertEquals($body, $result);
        $this->assertInstanceOf(Response::class, $response);
        $this->assertEquals(['test' => 'test2'], $response->getParsedBody());
    }
}
