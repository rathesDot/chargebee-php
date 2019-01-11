<?php

namespace Chargebee\Chargebee\Models;

class ChargeBee_CustomerPaymentMethod extends ChargeBee_Model
{
    protected $allowed = ['type', 'gateway', 'gateway_account_id', 'status', 'reference_id'];
}
