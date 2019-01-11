<?php

namespace Chargebee\Chargebee\Models;

class ChargeBee_SubscriptionCoupon extends ChargeBee_Model
{
    protected $allowed = ['coupon_id', 'apply_till', 'applied_count', 'coupon_code'];
}
