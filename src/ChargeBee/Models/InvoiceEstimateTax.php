<?php

namespace Chargebee\Chargebee\Models;

use Chargebee\Chargebee\Model;

class InvoiceEstimateTax extends Model
{
    protected $allowed = ['name', 'amount', 'description'];
}
