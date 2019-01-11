<?php

namespace Chargebee\Tests\Chargebee;

use Chargebee\Chargebee\Environment;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 * @coversNothing
 */
class EnvironmentTest extends TestCase
{
    public function testConfigure()
    {
        Environment::configure('test_site', 'test_api_key');
        $defEnvConfig = Environment::defaultEnv();
        $this->assertEquals('test_site', $defEnvConfig->getSite());
        $this->assertEquals('test_api_key', $defEnvConfig->getApiKey());
        $this->assertEquals('https://test_site.chargebee.com/api/v1', $defEnvConfig->getApiEndpoint());
    }
}
