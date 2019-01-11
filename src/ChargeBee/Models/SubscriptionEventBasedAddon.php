<?php

namespace Chargebee\Chargebee\Models;

class ChargeBee_SubscriptionEventBasedAddon extends ChargeBee_Model
{
    protected $allowed = ['id', 'quantity', 'unit_price', 'on_event', 'charge_once'];
}
