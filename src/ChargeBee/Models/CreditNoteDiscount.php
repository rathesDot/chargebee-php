<?php

namespace Chargebee\Chargebee\Models;

use Chargebee\Chargebee\Model;

class CreditNoteDiscount extends Model
{
    protected $allowed = ['amount', 'description', 'entity_type', 'entity_id'];
}
