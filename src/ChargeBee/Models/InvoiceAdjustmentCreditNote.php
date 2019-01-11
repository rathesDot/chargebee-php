<?php

namespace Chargebee\Chargebee\Models;

use Chargebee\Chargebee\Model;

class InvoiceAdjustmentCreditNote extends Model
{
    protected $allowed = ['cn_id', 'cn_reason_code', 'cn_date', 'cn_total', 'cn_status'];
}
