<?php

namespace Chargebee\Chargebee\Models;

class ChargeBee_InvoiceIssuedCreditNote extends ChargeBee_Model
{
    protected $allowed = ['cn_id', 'cn_reason_code', 'cn_date', 'cn_total', 'cn_status'];
}
