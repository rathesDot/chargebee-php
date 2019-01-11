<?php

namespace Chargebee\Chargebee\Models;

class ChargeBee_TransactionLinkedInvoice extends ChargeBee_Model
{
    protected $allowed = ['invoice_id', 'applied_amount', 'applied_at', 'invoice_date', 'invoice_total', 'invoice_status'];
}
