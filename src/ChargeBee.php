<?php

namespace Chargebee;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use InvalidArgumentException;

class ChargeBee
{
    const ALLOWED_API_VERSIONS = ['v1', 'v2'];

    /**
     * @var string
     */
    private $site;

    /**
     * @var string
     */
    private $apiKey;

    /**
     * @var string
     */
    private $apiVersion;

    /**
     * @var ClientInterface
     */
    private $httpClient;

    public function __construct(
        string $site,
        string $apiKey,
        string $apiVersion = 'v2',
        ?ClientInterface $httpClient = null
    ) {
        $this->site = $site;
        $this->apiKey = $apiKey;

        if (!in_array($apiVersion, self::ALLOWED_API_VERSIONS)) {
            throw new InvalidArgumentException("${apiVersion} is not a valid API version.");
        }

        $this->apiVersion = $apiVersion;

        if (null === $httpClient) {
            $httpClient = new Client();
        }
        $this->httpClient = $httpClient;
    }

    public function getApiVersion(): string
    {
        return $this->apiVersion;
    }

    public function get(string $endpoint): Response
    {
        return $this->request('GET', $endpoint);
    }

    private function request(string $method, string $endpoint, $options = []): Response
    {
        $response = $this->httpClient->request(
            $method,
            $this->getBaseUrl().$endpoint,
            array_merge(
                $options,
                [
                    'auth' => [
                        $this->apiKey, '',
                    ],
                ]
            )
        );

        return new Response(
            $response->getStatusCode(),
            $response->getHeaders(),
            $response->getBody(),
            $response->getProtocolVersion(),
            $response->getReasonPhrase()
        );
    }

    private function getBaseUrl(): string
    {
        return "https://$this->site.chargebee.com/api/$this->apiVersion";
    }
}
