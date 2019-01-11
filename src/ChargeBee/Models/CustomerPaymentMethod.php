<?php

namespace Chargebee\Chargebee\Models;

use Chargebee\Chargebee\Model;

class ChargeBee_CustomerPaymentMethod extends Model
{
    protected $allowed = ['type', 'gateway', 'gateway_account_id', 'status', 'reference_id'];
}
