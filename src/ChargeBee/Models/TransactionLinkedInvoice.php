<?php

namespace Chargebee\Chargebee\Models;

use Chargebee\Chargebee\Model;

class ChargeBee_TransactionLinkedInvoice extends Model
{
    protected $allowed = ['invoice_id', 'applied_amount', 'applied_at', 'invoice_date', 'invoice_total', 'invoice_status'];
}
