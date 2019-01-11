<?php

namespace Chargebee\Chargebee\Models;

use Chargebee\Chargebee\Model;

class QuoteTax extends Model
{
    protected $allowed = ['name', 'amount', 'description'];
}
