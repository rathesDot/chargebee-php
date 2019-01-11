<?php

namespace Chargebee\Chargebee\Models;

use Chargebee\Chargebee\Model;

class PlanAttachedAddon extends Model
{
    protected $allowed = ['id', 'quantity', 'billing_cycles', 'type'];
}
