<?php

namespace Chargebee\Tests\Chargebee;

use Chargebee\Chargebee\Result;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 * @coversNothing
 */
class ResultTest extends TestCase
{
    public function testSimpleResponseToObjectConversion()
    {
        $result = new Result((new SampleData)->simpleSubscription());
        $s = $result->subscription();
        $c = $result->customer();
        $this->assertEquals($s->id, 'simple_subscription');
        $this->assertEquals($s->planId, 'basic');
        $this->assertEquals($c->firstName, 'simple');
        $this->assertEquals($c->lastName, 'subscription');
    }

    public function testNestedResponseToObjectConversion()
    {
        $result = new Result((new SampleData)->nestedSubscription());
        $s = $result->subscription();
        $this->assertEquals($s->id, 'nested_subscription');
        $addons = $s->addons;
        $this->assertEquals(count($addons), 2);
        foreach ($addons as $a) {
            $this->assertTrue(in_array($a->id, ['monitor', 'ssl']));
        }
    }

    public function testEventResponseToObjectConversion()
    {
        $result = new Result((new SampleData)->sampleEvent());
        $event = $result->event();
        $content = $event->content();
        $s = $content->subscription();
        $this->assertEquals($s->id, 'unpaid_cancelled');
        $c = $content->customer();
        $this->assertEquals($c->email, 'unpaid_cancelled@tests.com');
        $card = $content->card();
        $this->assertEquals($card->cardType, 'visa');
    }
}
