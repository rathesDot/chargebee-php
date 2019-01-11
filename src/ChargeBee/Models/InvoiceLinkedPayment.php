<?php

namespace Chargebee\Chargebee\Models;

use Chargebee\Chargebee\Model;

class ChargeBee_InvoiceLinkedPayment extends Model
{
    protected $allowed = ['txn_id', 'applied_amount', 'applied_at', 'txn_status', 'txn_date', 'txn_amount'];
}
