<?php

namespace Chargebee\Tests\Chargebee;

use Chargebee\Chargebee\ListResult;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 * @coversNothing
 */
class ListResultTest extends TestCase
{
    public function testResponseToListConversion()
    {
        $list = new ListResult(SampleData::listSubscriptions(), null);
        $this->assertEquals($list->count(), 2);
        foreach ($list as $l) {
            $this->assertEquals($l->subscription()->id, 'sample_subscription');
        }
    }
}
