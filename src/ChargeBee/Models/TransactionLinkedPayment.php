<?php

namespace Chargebee\Chargebee\Models;

use Chargebee\Chargebee\Model;

class ChargeBee_TransactionLinkedPayment extends Model
{
    protected $allowed = ['id', 'status', 'amount', 'date'];
}
