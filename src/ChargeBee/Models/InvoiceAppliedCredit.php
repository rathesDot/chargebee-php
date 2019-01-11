<?php

namespace Chargebee\Chargebee\Models;

class ChargeBee_InvoiceAppliedCredit extends ChargeBee_Model
{
    protected $allowed = ['cn_id', 'applied_amount', 'applied_at', 'cn_reason_code', 'cn_date', 'cn_status'];
}
