<?php

namespace Chargebee\Chargebee\Models;

use Chargebee\Chargebee\Model;

class ChargeBee_SubscriptionEventBasedAddon extends Model
{
    protected $allowed = ['id', 'quantity', 'unit_price', 'on_event', 'charge_once'];
}
