<?php

namespace Chargebee\Chargebee\Models;

class ChargeBee_InvoiceDiscount extends ChargeBee_Model
{
    protected $allowed = ['amount', 'description', 'entity_type', 'entity_id'];
}
