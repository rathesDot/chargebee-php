<?php

namespace Chargebee\Chargebee\Models;

use Chargebee\Chargebee\Model;

class ChargeBee_PaymentSourcePaypal extends Model
{
    protected $allowed = ['email', 'agreement_id'];
}
