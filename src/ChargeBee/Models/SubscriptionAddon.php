<?php

namespace Chargebee\Chargebee\Models;

class ChargeBee_SubscriptionAddon extends ChargeBee_Model
{
    protected $allowed = ['id', 'quantity', 'unit_price', 'amount', 'trial_end', 'remaining_billing_cycles'];
}
