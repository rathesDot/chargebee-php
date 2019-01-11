<?php

namespace Chargebee\Chargebee\Models;

use Chargebee\Chargebee\Model;

class PaymentSourceBankAccount extends Model
{
    protected $allowed = ['last4', 'name_on_account', 'bank_name', 'mandate_id', 'account_type', 'echeck_type', 'account_holder_type'];
}
