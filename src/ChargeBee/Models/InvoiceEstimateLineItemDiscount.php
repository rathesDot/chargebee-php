<?php

namespace Chargebee\Chargebee\Models;

use Chargebee\Chargebee\Model;

class ChargeBee_InvoiceEstimateLineItemDiscount extends Model
{
    protected $allowed = ['line_item_id', 'discount_type', 'coupon_id', 'discount_amount'];
}
