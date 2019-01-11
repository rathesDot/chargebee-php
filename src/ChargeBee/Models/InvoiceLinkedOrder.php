<?php

namespace Chargebee\Chargebee\Models;

use Chargebee\Chargebee\Model;

class ChargeBee_InvoiceLinkedOrder extends Model
{
    protected $allowed = ['id', 'document_number', 'status', 'order_type', 'reference_id', 'fulfillment_status', 'batch_id', 'created_at'];
}
