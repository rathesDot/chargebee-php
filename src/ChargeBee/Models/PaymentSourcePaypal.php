<?php

namespace Chargebee\Chargebee\Models;

use Chargebee\Chargebee\Model;

class PaymentSourcePaypal extends Model
{
    protected $allowed = ['email', 'agreement_id'];
}
