<?php

namespace Chargebee\Chargebee\Models;

class ChargeBee_InvoiceCreatedCreditNote extends ChargeBee_Model
{
    protected $allowed = ['cn_id', 'cn_type', 'cn_reason_code', 'cn_date', 'cn_total', 'cn_status'];
}
