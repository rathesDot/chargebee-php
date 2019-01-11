<?php

namespace Chargebee\Chargebee\Models;

use Chargebee\Chargebee\Model;

class PlanEventBasedAddon extends Model
{
    protected $allowed = ['id', 'quantity', 'on_event', 'charge_once'];
}
