<?php

namespace Chargebee\Chargebee\Models;

class ChargeBee_PlanEventBasedAddon extends ChargeBee_Model
{
    protected $allowed = ['id', 'quantity', 'on_event', 'charge_once'];
}
