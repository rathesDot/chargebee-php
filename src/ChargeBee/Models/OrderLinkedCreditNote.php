<?php

namespace Chargebee\Chargebee\Models;

use Chargebee\Chargebee\Model;

class ChargeBee_OrderLinkedCreditNote extends Model
{
    protected $allowed = ['amount', 'type', 'id', 'status', 'amount_adjusted', 'amount_refunded'];
}
