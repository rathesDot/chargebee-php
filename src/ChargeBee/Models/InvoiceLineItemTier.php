<?php

namespace Chargebee\Chargebee\Models;

class ChargeBee_InvoiceLineItemTier extends ChargeBee_Model
{
    protected $allowed = ['line_item_id', 'starting_unit', 'ending_unit', 'quantity_used', 'unit_amount'];
}
