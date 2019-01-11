<?php

namespace Chargebee\Chargebee\Models;

class ChargeBee_CustomerBalance extends ChargeBee_Model
{
    protected $allowed = ['promotional_credits', 'excess_payments', 'refundable_credits', 'unbilled_charges', 'currency_code', 'balance_currency_code'];
}
