<?php

namespace Chargebee\Chargebee\Models;

class ChargeBee_QuoteLineItemTax extends ChargeBee_Model
{
    protected $allowed = ['line_item_id', 'tax_name', 'tax_rate', 'tax_amount', 'tax_juris_type', 'tax_juris_name', 'tax_juris_code'];
}
