<?php

namespace Chargebee\Chargebee\Models;

class ChargeBee_TransactionLinkedPayment extends ChargeBee_Model
{
    protected $allowed = ['id', 'status', 'amount', 'date'];
}
