<?php

namespace Chargebee\Chargebee\Models;

use Chargebee\Chargebee\Model;

class AddonTier extends Model
{
    protected $allowed = ['starting_unit', 'ending_unit', 'price'];
}
