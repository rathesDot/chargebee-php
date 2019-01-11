<?php

namespace Chargebee\Chargebee\Models;

class ChargeBee_CreditNoteAllocation extends ChargeBee_Model
{
    protected $allowed = ['invoice_id', 'allocated_amount', 'allocated_at', 'invoice_date', 'invoice_status'];
}
