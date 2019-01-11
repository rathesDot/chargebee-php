<?php

namespace Chargebee\Chargebee\Models;

class ChargeBee_TransactionLinkedRefund extends ChargeBee_Model
{
    protected $allowed = ['txn_id', 'txn_status', 'txn_date', 'txn_amount'];
}
