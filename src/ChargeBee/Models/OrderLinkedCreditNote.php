<?php

namespace Chargebee\Chargebee\Models;

class ChargeBee_OrderLinkedCreditNote extends ChargeBee_Model
{
    protected $allowed = ['amount', 'type', 'id', 'status', 'amount_adjusted', 'amount_refunded'];
}
