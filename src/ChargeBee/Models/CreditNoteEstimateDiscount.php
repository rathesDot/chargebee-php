<?php

namespace Chargebee\Chargebee\Models;

use Chargebee\Chargebee\Model;

class ChargeBee_CreditNoteEstimateDiscount extends Model
{
    protected $allowed = ['amount', 'description', 'entity_type', 'entity_id'];
}
