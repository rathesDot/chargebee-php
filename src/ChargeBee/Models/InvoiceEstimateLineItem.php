<?php

namespace Chargebee\Chargebee\Models;

class ChargeBee_InvoiceEstimateLineItem extends ChargeBee_Model
{
    protected $allowed = ['id', 'subscription_id', 'date_from', 'date_to', 'unit_amount', 'quantity', 'amount', 'pricing_model', 'is_taxed', 'tax_amount', 'tax_rate', 'discount_amount', 'item_level_discount_amount', 'description', 'entity_type', 'tax_exempt_reason', 'entity_id'];
}
