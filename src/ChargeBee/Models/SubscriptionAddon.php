<?php

namespace Chargebee\Chargebee\Models;

use Chargebee\Chargebee\Model;

class SubscriptionAddon extends Model
{
    protected $allowed = ['id', 'quantity', 'unit_price', 'amount', 'trial_end', 'remaining_billing_cycles'];
}
