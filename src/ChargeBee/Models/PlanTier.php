<?php

namespace Chargebee\Chargebee\Models;

use Chargebee\Chargebee\Model;

class PlanTier extends Model
{
    protected $allowed = ['starting_unit', 'ending_unit', 'price'];
}
