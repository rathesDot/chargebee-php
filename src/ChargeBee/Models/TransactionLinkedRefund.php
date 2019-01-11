<?php

namespace Chargebee\Chargebee\Models;

use Chargebee\Chargebee\Model;

class ChargeBee_TransactionLinkedRefund extends Model
{
    protected $allowed = ['txn_id', 'txn_status', 'txn_date', 'txn_amount'];
}
