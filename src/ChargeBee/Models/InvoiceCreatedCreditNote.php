<?php

namespace Chargebee\Chargebee\Models;

use Chargebee\Chargebee\Model;

class ChargeBee_InvoiceCreatedCreditNote extends Model
{
    protected $allowed = ['cn_id', 'cn_type', 'cn_reason_code', 'cn_date', 'cn_total', 'cn_status'];
}
