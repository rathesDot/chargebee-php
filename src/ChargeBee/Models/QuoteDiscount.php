<?php

namespace Chargebee\Chargebee\Models;

use Chargebee\Chargebee\Model;

class QuoteDiscount extends Model
{
    protected $allowed = ['amount', 'description', 'entity_type', 'entity_id'];
}
