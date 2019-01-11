<?php

namespace Chargebee\Chargebee\Models;

class ChargeBee_PlanTier extends ChargeBee_Model
{
    protected $allowed = ['starting_unit', 'ending_unit', 'price'];
}
