<?php

namespace Chargebee\Chargebee\Models;

class ChargeBee_QuoteLineItemDiscount extends ChargeBee_Model
{
    protected $allowed = ['line_item_id', 'discount_type', 'coupon_id', 'discount_amount'];
}
