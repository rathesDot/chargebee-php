<?php

namespace Chargebee\Tests\Chargebee;

use Chargebee\Chargebee\Models\Event;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 * @coversNothing
 */
class WebhookDeserializeTest extends TestCase
{
    public function testWebhookSerializing()
    {
        $event = Event::deserialize((new SampleData)->webhookData());
        $content = $event->content();
        $this->assertNotEquals($content->customer(), null);
        $this->assertNotEquals($content->subscription(), null);
        $this->assertNotEquals($content->card(), null);
        $this->assertNotEquals($content->invoice(), null);
    }
}
