<?php

namespace Chargebee\Chargebee\Models;

class ChargeBee_UnbilledChargeTier extends ChargeBee_Model
{
    protected $allowed = ['starting_unit', 'ending_unit', 'quantity_used', 'unit_amount'];
}
