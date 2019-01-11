<?php

namespace Chargebee\Chargebee\Models;

use Chargebee\Chargebee\Model;

class UnbilledChargeTier extends Model
{
    protected $allowed = ['starting_unit', 'ending_unit', 'quantity_used', 'unit_amount'];
}
