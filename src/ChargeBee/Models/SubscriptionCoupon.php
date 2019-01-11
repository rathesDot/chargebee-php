<?php

namespace Chargebee\Chargebee\Models;

use Chargebee\Chargebee\Model;

class ChargeBee_SubscriptionCoupon extends Model
{
    protected $allowed = ['coupon_id', 'apply_till', 'applied_count', 'coupon_code'];
}
