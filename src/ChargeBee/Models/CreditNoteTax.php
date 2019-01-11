<?php

namespace Chargebee\Chargebee\Models;

use Chargebee\Chargebee\Model;

class CreditNoteTax extends Model
{
    protected $allowed = ['name', 'amount', 'description'];
}
