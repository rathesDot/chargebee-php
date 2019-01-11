<?php

namespace Chargebee\Chargebee\Models;

class ChargeBee_InvoiceAdjustmentCreditNote extends ChargeBee_Model
{
    protected $allowed = ['cn_id', 'cn_reason_code', 'cn_date', 'cn_total', 'cn_status'];
}
