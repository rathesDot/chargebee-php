<?php

namespace Chargebee\Chargebee\Models;

use Chargebee\Chargebee\Model;

class CreditNoteAllocation extends Model
{
    protected $allowed = ['invoice_id', 'allocated_amount', 'allocated_at', 'invoice_date', 'invoice_status'];
}
