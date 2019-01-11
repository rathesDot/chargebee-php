<?php

namespace Chargebee\Chargebee\Models;

use Chargebee\Chargebee\Model;

class ChargeBee_TransactionLinkedCreditNote extends Model
{
    protected $allowed = ['cn_id', 'applied_amount', 'applied_at', 'cn_reason_code', 'cn_date', 'cn_total', 'cn_status', 'cn_reference_invoice_id'];
}
