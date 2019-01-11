<?php

namespace Chargebee\Chargebee\Models;

use Chargebee\Chargebee\Model;

class CreditNoteEstimateDiscount extends Model
{
    protected $allowed = ['amount', 'description', 'entity_type', 'entity_id'];
}
