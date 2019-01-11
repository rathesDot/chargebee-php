<?php

namespace Chargebee\Chargebee\Models;

use Chargebee\Chargebee\Model;

class ChargeBee_CustomerBalance extends Model
{
    protected $allowed = ['promotional_credits', 'excess_payments', 'refundable_credits', 'unbilled_charges', 'currency_code', 'balance_currency_code'];
}
