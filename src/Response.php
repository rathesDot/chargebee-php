<?php

namespace Chargebee;

use GuzzleHttp\Psr7\Response as GuzzleResponse;
use Psr\Http\Message\ResponseInterface;

final class Response extends GuzzleResponse implements ResponseInterface
{
    public function getParsedBody(): array
    {
        return json_decode($this->getBody(), true);
    }
}
