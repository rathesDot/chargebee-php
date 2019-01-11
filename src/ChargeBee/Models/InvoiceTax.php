<?php

namespace Chargebee\Chargebee\Models;

use Chargebee\Chargebee\Model;

class InvoiceTax extends Model
{
    protected $allowed = ['name', 'amount', 'description'];
}
