<?php

namespace Chargebee\Chargebee\Models;

use Chargebee\Chargebee\Model;

class InvoiceLineItemTier extends Model
{
    protected $allowed = ['line_item_id', 'starting_unit', 'ending_unit', 'quantity_used', 'unit_amount'];
}
